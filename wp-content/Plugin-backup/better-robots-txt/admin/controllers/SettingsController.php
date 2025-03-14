<?php

namespace Pagup\BetterRobots\Controllers;

use  Pagup\BetterRobots\Core\Option ;
use  Pagup\BetterRobots\Core\Plugin ;
use  Pagup\BetterRobots\Core\Request ;
use  Pagup\BetterRobots\Traits\Sitemap ;
use  Pagup\BetterRobots\Traits\RobotsHelper ;
class SettingsController
{
    use  RobotsHelper, Sitemap ;
    protected  $get_pro = '' ;
    protected  $yoast_sitemap_url = '' ;
    protected  $xml_sitemap_url = '' ;
    public function __construct()
    {
        $this->get_pro = sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', "better-robots-txt" ), array(
            'a' => array(
            'href'   => array(),
            'target' => array(),
        ),
        ) ), esc_url( "admin.php?page=better-robots-txt-pricing" ) );
        $this->yoast_sitemap_url = home_url() . '/sitemap_index.xml';
        $this->xml_sitemap_url = home_url() . '/sitemap.xml';
    }
    
    public function add_settings()
    {
        add_menu_page(
            __( 'Better Robots.txt Settings', 'better-robots-txt' ),
            __( 'Better Robots.txt', 'better-robots-txt' ),
            'manage_options',
            'better-robots-txt',
            array( &$this, 'page' ),
            'dashicons-text-page'
        );
    }
    
    public function page()
    {
        if ( !current_user_can( 'manage_options' ) ) {
            wp_die( __( 'Sorry, you are not allowed to access this page.', "better-robots-txt" ) );
        }
        // only users with `unfiltered_html` can edit scripts.
        if ( !current_user_can( 'unfiltered_html' ) ) {
            wp_die( __( 'Sorry, you are not allowed to edit this page. Ask your administrator for assistance.', "better-robots-txt" ) );
        }
        // $yoast_sitemap = $this->yoast_sitemap();
        // $xml_sitemap = $this->xml_sitemap();
        $agents = $this->agents();
        $isPremium = rtf_fs()->can_use_premium_code__premium_only();
        $success = '';
        
        if ( isset( $_POST['update'] ) ) {
            if ( !function_exists( 'current_user_can' ) || !current_user_can( 'manage_options' ) || !current_user_can( 'unfiltered_html' ) ) {
                die( 'Sorry, not allowed...' );
            }
            check_admin_referer( 'rt__settings', 'rt__nonce' );
            if ( !isset( $_POST['rt__nonce'] ) || !wp_verify_nonce( $_POST['rt__nonce'], 'rt__settings' ) ) {
                die( "Sorry, not allowed. Nonce doesn't verify" );
            }
            $safe = [
                "allow",
                "disallow",
                "yes",
                "no",
                "remove_settings",
                "wp_sitemap",
                "yoast_sitemap",
                "aios_sitemap",
                "custom_sitemap"
            ];
            $fields = $this->getFields( $safe );
            $options = [];
            foreach ( $fields as $key => $type ) {
                
                if ( $type === 'numeric' ) {
                    $options[$key] = (int) Request::numeric( $key );
                } elseif ( $type === 'textarea' ) {
                    $options[$key] = Request::textarea( $key );
                } elseif ( $type === 'text' ) {
                    $options[$key] = Request::text( $key );
                } elseif ( $type === 'array' ) {
                    $options[$key] = ( Request::check( $key ) ? maybe_serialize( Request::array( $_POST[$key] ) ) : "" );
                } else {
                    // Assuming $type is $safe
                    $options[$key] = Request::safe( $key, $type );
                }
            
            }
            foreach ( $agents as $key => $bot ) {
                $options[$bot['slug']] = Request::safe( $bot['slug'], $safe );
            }
            if ( $isPremium ) {
                update_option( 'blog_public', $_POST['blog_public'] );
            }
            update_option( 'robots_txt', $options );
            echo  '<div class="notice rt-notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.' ) . '</strong></p></div>' ;
        }
        
        $options = new Option();
        $renderer = new \Pagup\BetterRobots\Core\SwitchRenderer();
        
        if ( !$isPremium ) {
            $notification = new \Pagup\BetterRobots\Controllers\NotificationController();
            echo  $notification->support() ;
        }
        
        // Plugin::dd($_POST);
        // var_dump(maybe_unserialize(Option::get("backlinks_bots")));
        $sitemap_notification = $this->sitemap_notification();
        $get_pro = $this->get_pro;
        $exclude_bots = ( Option::check( "backlinks_bots" ) ? maybe_unserialize( Option::get( "backlinks_bots" ) ) : [] );
        $exclude_bots = array_map( 'stripslashes', $exclude_bots );
        wp_localize_script( 'rt_script', 'data', array(
            'backlinks_bots' => $this->backlinks_pro(),
            'exclude_bots'   => $exclude_bots,
        ) );
        // Return Views
        $allowed_tabs = [
            'rt-settings',
            'rt-faq',
            'rt-recs',
            'rt-growth'
        ];
        //set active class for navigation tabs
        $active_tab = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $allowed_tabs ) ? sanitize_key( $_GET['tab'] ) : 'rt-settings' );
        $view_map = [
            'rt-settings' => 'settings',
            'rt-faq'      => 'faq',
            'rt-recs'     => 'recommendations',
            'rt-growth'   => 'growth',
        ];
        
        if ( array_key_exists( $active_tab, $view_map ) ) {
            $view_name = $view_map[$active_tab];
            $data = compact( 'active_tab' );
            // Additional data for the 'rt-settings' tab
            if ( $active_tab == 'rt-settings' ) {
                $data += compact(
                    'options',
                    'agents',
                    'sitemap_notification',
                    'get_pro',
                    'success',
                    'renderer',
                    'isPremium'
                );
            }
            return Plugin::view( $view_name, $data );
        }
    
    }
    
    /**
     * Get the fields, including both free and premium fields if applicable.
     *
     * @param array $safe The array of safe values used for validation.
     * @return array The merged array of free and premium fields, if premium is available.
     */
    public function getFields( array $safe ) : array
    {
        $fields = [
            'feed_protector'  => $safe,
            'user_agents'     => 'textarea',
            'crawl_delay'     => 'numeric',
            'personalize'     => 'textarea',
            'boost-alt'       => $safe,
            'rt-mobilook'     => $safe,
            'rt-bigta'        => $safe,
            'rt-meta'         => $safe,
            'rt-vidseo'       => $safe,
            'ads-txt'         => $safe,
            'app-ads-txt'     => $safe,
            'remove_settings' => $safe,
        ];
        $premium_fields = [];
        return array_merge( $fields, $premium_fields );
    }

}
$settings = new SettingsController();