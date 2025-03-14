<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/public/partials
 */

$sptpro_section_title               = isset( $sptpro_shortcode_options['sptpro_section_title'] ) ? $sptpro_shortcode_options['sptpro_section_title'] : false;
$sptpro_section_title_margin_bottom = isset( $sptpro_shortcode_options['sptpro_section_title_margin_bottom']['all'] ) ? $sptpro_shortcode_options['sptpro_section_title_margin_bottom']['all'] : '';
if ( $sptpro_section_title ) { ?>
	<h2 class="sp-tab__section_title_<?php echo esc_html( $post_id ); ?>"> <?php echo wp_kses_post( $main_section_title ); ?></h2>
	<?php
}
