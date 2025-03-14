<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 */
class WP_Tabs_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->min         = ( apply_filters( 'enqueue_dev_mode', false ) || WP_DEBUG ) ? '' : '.min';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Tabs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Tabs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_style( 'sptpro-accordion-style', esc_url( WP_TABS_URL . 'public/css/sptpro-accordion' . $this->min . '.css' ), array(), $this->version, 'all' );
		wp_register_style( 'sptpro-style', esc_url( WP_TABS_URL . 'public/css/wp-tabs-public' . $this->min . '.css' ), array(), $this->version, 'all' );
		$settings             = get_option( 'sp-tab__settings' );
		$sptpro_dynamic_style = isset( $settings['sptpro_custom_css'] ) ? trim( html_entity_decode( $settings['sptpro_custom_css'] ) ) : '';
		wp_add_inline_style( 'sptpro-style', $sptpro_dynamic_style );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Tabs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Tabs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script( 'sptpro-tab', esc_url( WP_TABS_URL . 'public/js/tab' . $this->min . '.js' ), array( 'jquery' ), $this->version, false );
		wp_register_script( 'sptpro-collapse', esc_url( WP_TABS_URL . 'public/js/collapse' . $this->min . '.js' ), array( 'jquery' ), $this->version, false );
		wp_register_script( 'sptpro-script', esc_url( WP_TABS_URL . 'public/js/wp-tabs-public' . $this->min . '.js' ), array( 'jquery' ), $this->version, true );

	}
	/**
	 * Enqueue styles file for live preview.
	 *
	 * @since    2.0.15
	 */
	public function admin_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Tabs_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Tabs_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$current_screen        = get_current_screen();
		$the_current_post_type = $current_screen->post_type;
		if ( 'sp_wp_tabs' === $the_current_post_type ) {
			wp_enqueue_style( 'admin-sptpro-accordion-style', esc_url( WP_TABS_URL . 'public/css/sptpro-accordion' . $this->min . '.css' ), array(), $this->version, 'all' );
			wp_enqueue_style( 'admin-sptpro-style', esc_url( WP_TABS_URL . 'public/css/wp-tabs-public' . $this->min . '.css' ), array(), $this->version, 'all' );
		}
	}

}
