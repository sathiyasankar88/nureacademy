<?php
/**
 * The plugin gutenberg block Initializer.
 *
 * @link       https://shapedplugin.com/
 * @since      2.1.5
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/admin
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Tabs_Free_Gutenberg_Block_Init' ) ) {
	/**
	 * WP_Tabs_Free_Gutenberg_Block_Init class.
	 */
	class WP_Tabs_Free_Gutenberg_Block_Init {
		/**
		 * Script and style suffix
		 *
		 * @since 2.1.5
		 * @access protected
		 * @var string
		 */
		protected $min;
		/**
		 * Custom Gutenberg Block Initializer.
		 */
		public function __construct() {
			$this->min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || defined( 'WP_DEBUG' ) && WP_DEBUG ? '' : '.min';
			add_action( 'init', array( $this, 'sptabfree_gutenberg_shortcode_block' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'sptabfree_block_editor_assets' ) );
		}

		/**
		 * Register block editor script for backend.
		 */
		public function sptabfree_block_editor_assets() {
			wp_enqueue_script(
				'wp-tabs-free-shortcode-block',
				plugins_url( '/GutenbergBlock/build/index.js', dirname( __FILE__ ) ),
				array( 'jquery', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components' ),
				WP_TABS_VERSION,
				true
			);

			/**
			 * Register block editor css file enqueue for backend.
			 */
			wp_enqueue_style( 'sptpro-accordion-style', esc_url( WP_TABS_URL . 'public/css/sptpro-accordion' . $this->min . '.css' ), array(), WP_TABS_VERSION, 'all' );
			wp_enqueue_style( 'sptpro-style', esc_url( WP_TABS_URL . 'public/css/wp-tabs-public' . $this->min . '.css' ), array(), WP_TABS_VERSION, 'all' );
		}
		/**
		 * Shortcode list.
		 *
		 * @return array
		 */
		public function sptabfree_post_list() {
			$shortcodes = get_posts(
				array(
					'post_type'      => 'sp_wp_tabs',
					'post_status'    => 'publish',
					'posts_per_page' => 9999,
				)
			);

			if ( count( $shortcodes ) < 1 ) {
				return array();
			}

			return array_map(
				function ( $shortcode ) {
						return (object) array(
							'id'    => absint( $shortcode->ID ),
							'title' => esc_html( $shortcode->post_title ),
						);
				},
				$shortcodes
			);
		}

		/**
		 * Register Gutenberg shortcode block.
		 */
		public function sptabfree_gutenberg_shortcode_block() {
			/**
			 * Register block editor js file enqueue for backend.
			 */
			wp_register_script( 'sptpro-tab', esc_url( WP_TABS_URL . 'public/js/tab' . $this->min . '.js' ), array( 'jquery' ), WP_TABS_VERSION, false );
			wp_register_script( 'sptpro-collapse', esc_url( WP_TABS_URL . 'public/js/collapse' . $this->min . '.js' ), array( 'jquery' ), WP_TABS_VERSION, false );
			wp_register_script( 'sptpro-script', esc_url( WP_TABS_URL . 'public/js/wp-tabs-public' . $this->min . '.js' ), array( 'jquery' ), WP_TABS_VERSION, true );

			wp_localize_script(
				'sptpro-script',
				'sp_tab_free_gb_block',
				array(
					'url'           => WP_TABS_URL,
					'loadPublic'    => WP_TABS_URL . 'public/js/wp-tabs-public.min.js',
					'link'          => admin_url( 'post-new.php?post_type=sp_wp_tabs' ),
					'shortCodeList' => $this->sptabfree_post_list(),
				)
			);
			/**
			 * Register Gutenberg block on server-side.
			 */
			register_block_type(
				'sp-wp-tabs-free/shortcode',
				array(
					'attributes'      => array(
						'shortcode'          => array(
							'type'    => 'string',
							'default' => '',
						),
						'showInputShortcode' => array(
							'type'    => 'boolean',
							'default' => true,
						),
						'preview'            => array(
							'type'    => 'boolean',
							'default' => false,
						),
						'is_admin'           => array(
							'type'    => 'boolean',
							'default' => is_admin(),
						),
					),
					'example'         => array(
						'attributes' => array(
							'preview' => true,
						),
					),
					// Enqueue blocks.editor.build.js in the editor only.
					'editor_script'   => array(
						'sptpro-tab',
						'sptpro-collapse',
						'sptpro-script',
					),
					// Enqueue blocks.editor.build.css in the editor only.
					'editor_style'    => array(),
					'render_callback' => array( $this, 'wp_tabs_free_render_shortcode' ),
				)
			);
		}

		/**
		 * Render callback.
		 *
		 * @param string $attributes Shortcode.
		 * @return string
		 */
		public function wp_tabs_free_render_shortcode( $attributes ) {

			$class_name = '';
			if ( ! empty( $attributes['className'] ) ) {
				$class_name = 'class="' . $attributes['className'] . '"';
			}

			if ( ! $attributes['is_admin'] ) {
				return '<div ' . $class_name . '>' . do_shortcode( '[wptabs id="' . sanitize_text_field( $attributes['shortcode'] ) . '"]' ) . '</div>';
			}
			return '<div id="' . uniqid() . '" ' . $class_name . ' >' . do_shortcode( '[wptabs id="' . sanitize_text_field( $attributes['shortcode'] ) . '"]' ) . '</div>';
		}
	}
}
