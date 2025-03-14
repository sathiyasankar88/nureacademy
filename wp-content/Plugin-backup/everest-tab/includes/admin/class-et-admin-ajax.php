<?php
defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETab_Admin_Ajax') ) {

    class ETab_Admin_Ajax extends ETab_Library {

        /**
         * All the ajax related tasks are hooked
         *
         * @since 1.0.0
         */
        function __construct() {
            add_action('wp_ajax_et_append_tab_html', array( $this, 'generate_new_tab_html' ));
            add_action('wp_ajax_nopriv_et_append_tab_html', array( $this, 'no_permission' ));
            add_action('wp_ajax_etab_clear_cache', array($this, 'fn_clear_cache')); 
            add_action('wp_ajax_nopriv_etab_clear_cache', array($this, 'no_permission'));
        }

        function no_permission() {
            die('No script kiddies please!!');
        }

        function generate_new_tab_html() {
            if ( isset($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'et-admin-ajax-nonce') ) {
                if($_POST['_action'] == 'add_tab'){
                 include(ETAB_PATH.'/includes/admin/metabox/ajax/et-add-new-tab.php');
                }
                die();
            } else {
                die('No script kiddies please!!');
            }
        }

      /*
      * Clear Cache Using Ajax
      */
      public function fn_clear_cache(){
        if ( isset($_POST[ 'nonce' ]) && wp_verify_nonce($_POST[ 'nonce' ], 'et-admin-ajax-nonce') ) {
                $args = array( 'post_type' => 'everest_tab');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $Post_ID = get_the_ID();
                    $et_tab_settings = get_post_meta($Post_ID, 'et_tab_settings', true);
                    if(isset($et_tab_settings) && !empty($et_tab_settings)){
                      foreach ($et_tab_settings as $key => $value) {
                        if($value['components'] === "social_feeds"){
                              $facebook_transient = 'etab_fbfeeds_<?php echo esc_attr($key);?>';
                              $twitter_transient  = 'etab_twitterfeeds_<?php echo esc_attr($key);?>';
                              delete_transient( $facebook_transient );
                              delete_transient( $twitter_transient );
                             die('success');
                        }
                       }        
                    }
                endwhile;
         } else {
                die('No script kiddies please!!');
          }
      }

        
    }
    new ETab_Admin_Ajax();
}
