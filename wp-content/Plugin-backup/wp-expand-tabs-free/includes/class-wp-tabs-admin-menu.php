<?php
/**
 * Admin Submenu of the Plugin
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/includes
 */

/**
 * Admin Submenu of the Plugin
 */
class WP_Tabs_Admin_Menu {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Add plugin action menu
	 *
	 * @param array $links The action link.
	 * @param array $file The file link.
	 *
	 * @return array
	 */
	public function sptpro_plugin_action_links( $links, $file ) {

		if ( WP_TABS_BASENAME === $file ) {

			$new_links = array(
				sprintf( '<a href="%s">%s</a>', admin_url( 'post-new.php?post_type=sp_wp_tabs' ), __( 'Add Tab Group', 'wp-expand-tabs-free' ) ),
			);
			$links[]   = '<a href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" style="color: #35b747; font-weight: 700;">' . __( 'Go Premium!', 'wp-expand-tabs-free' ) . '</a>';

			return array_merge( $new_links, $links );
		}

		return $links;
	}



	/**
	 * Bottom review notice.
	 *
	 * @param string $text The review notice.
	 * @return string
	 */
	public function sptpro_review_text( $text ) {
		$screen = get_current_screen();
		if ( 'sp_wp_tabs' === get_post_type() || ( 'sp_wp_tabs_page_tabs_settings' === $screen->id ) || ( 'sp_wp_tabs_page_tabs_help' === $screen->id ) ) {
			$url  = 'https://wordpress.org/support/plugin/wp-expand-tabs-free/reviews/?filter=5#new-post';
			$text = sprintf( wp_kses_post( 'If you like <strong>WP Tabs</strong>, please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more. ', 'wp-expand-tabs-free' ), esc_url( $url ) );
		}

		return $text;
	}

}
