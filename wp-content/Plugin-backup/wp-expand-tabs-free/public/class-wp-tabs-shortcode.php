<?php
/**
 * Define the shortcode functionality
 *
 * Loads and defines the shortcode for this plugin
 * so that it is ready for shortcode base view system.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/public
 */

/**
 * Define the shortcode functionality.
 */
class WP_Tabs_Shortcode {

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
	 * Full html show.
	 *
	 * @param array $post_id Shortcode ID.
	 * @param array $sptpro_data_src get all layout options.
	 * @param array $sptpro_shortcode_options get all meta options.
	 * @param array $main_section_title shows section title.
	 */
	public static function sp_tabs_html_show( $post_id, $sptpro_data_src, $sptpro_shortcode_options, $main_section_title ) {
		$sptpro_data_src             = isset( $sptpro_data_src['sptpro_content_source'] ) ? $sptpro_data_src['sptpro_content_source'] : null;
		$sptpro_preloader            = isset( $sptpro_shortcode_options['sptpro_preloader'] ) ? $sptpro_shortcode_options['sptpro_preloader'] : false;
		$sptpro_tabs_activator_event = isset( $sptpro_shortcode_options['sptpro_tabs_activator_event'] ) ? $sptpro_shortcode_options['sptpro_tabs_activator_event'] : '';
		$sptpro_tab_opened           = 1;
		$sptpro_tabs_on_small_screen = isset( $sptpro_shortcode_options['sptpro_tabs_on_small_screen'] ) ? $sptpro_shortcode_options['sptpro_tabs_on_small_screen'] : '';
		$sptpro_title_heading_tag    = isset( $sptpro_shortcode_options['sptpro_title_heading_tag'] ) ? $sptpro_shortcode_options['sptpro_title_heading_tag'] : '';

		ob_start();

		$wrapper_class   = 'sp-tab__lay-default';
		$content_class   = 'sp-tab__lay-default';
		$title_data_attr = '';
		switch ( $sptpro_tabs_on_small_screen ) {
			case 'full_widht':
				$title_data_attr = 'aria-controls=%s aria-selected=false';
				break;
			case 'accordion_mode':
				wp_enqueue_style( 'sptpro-accordion-style' );
				wp_enqueue_script( 'sptpro-collapse' );
				$wrapper_class .= ' sp-tab__default-accordion';
				break;
		}
		wp_enqueue_style( 'sptpro-style' );
		wp_enqueue_script( 'sptpro-tab' );
		wp_enqueue_script( 'sptpro-script' );

		include WP_TABS_PATH . 'public/partials/section-title.php';
		?>

		<div id="sp-wp-tabs-wrapper_<?php echo esc_attr( $post_id ); ?>" class="<?php echo esc_html( $wrapper_class ); ?>" data-preloader="<?php echo esc_html( $sptpro_preloader ); ?>" data-activemode="<?php echo esc_html( $sptpro_tabs_activator_event ); ?>">

			<?php
			/**
			 * Preloader.
			 */
			include WP_TABS_PATH . '/public/preloader.php';
			?>

			<ul class="sp-tab__nav sp-tab__nav-tabs" id="sp-tab__ul" role="tablist">
				<?php
				if ( is_array( $sptpro_data_src ) || is_object( $sptpro_data_src ) ) {
					$sptpro_data_count = 1;
					foreach ( $sptpro_data_src as $key => $sptpro_data ) {
						$sptpro_active_class       = $sptpro_tab_opened === $sptpro_data_count ? ' sp-tab__active' : '';
						$tabs_content_title        = '<' . $sptpro_title_heading_tag . ' class="sp-tab__tab_title">' . $sptpro_data['tabs_content_title'] . '</' . $sptpro_title_heading_tag . '>';
						$tabs_aria_controls_for_id = 'tab-' . $post_id . $sptpro_data_count;
						?>
						<li class="sp-tab__nav-item">
							<label class="sp-tab__nav-link<?php echo esc_attr( $sptpro_active_class ); ?>" data-sptoggle="tab" for="#<?php echo esc_attr( $tabs_aria_controls_for_id ); ?>" role="tab" <?php echo sprintf( esc_attr( $title_data_attr ), esc_attr( $tabs_aria_controls_for_id ) ); ?>>
								<span class="tab_title_area"><?php echo wp_kses_post( $tabs_content_title ); ?></span>
							</label>
						</li>
						<?php
						$sptpro_data_count++;
					}
				}
				?>
			</ul>

			<div class="sp-tab__tab-content">
				<?php
					include WP_TABS_PATH . '/public/partials/content.php';
				?>
			</div>

		</div>

		<?php
		include WP_TABS_PATH . 'public/dynamic_style.php';
	}

	/**
	 * Shortcode of the Plugin.
	 *
	 * @since 2.0.0
	 * @param array $attributes Attribute.
	 * @param null  $content Param.
	 */
	public function sptpro_shortcode_execute( $attributes, $content = null ) {

		if ( empty( $attributes['id'] ) || ( get_post_status( $attributes['id'] ) === 'trash' ) ) {
			return;
		}

		$post_id                  = intval( $attributes['id'] );
		$sptpro_data_src          = get_post_meta( $post_id, 'sp_tab_source_options', true );
		$sptpro_shortcode_options = get_post_meta( $post_id, 'sp_tab_shortcode_options', true );
		$main_section_title       = get_the_title( $post_id );

		self::sp_tabs_html_show( $post_id, $sptpro_data_src, $sptpro_shortcode_options, $main_section_title );

		return ob_get_clean();

	}

}
