<?php
/**
 * Dynamic style.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 *
 * @package    WP_Tabs
 * @subpackage WP_Tabs/public
 */

$sptpro_tabs_horizontal_alignment = isset( $sptpro_shortcode_options['sptpro_tabs_horizontal_alignment'] ) ? $sptpro_shortcode_options['sptpro_tabs_horizontal_alignment'] : '';
$sptpro_set_small_screen          = isset( $sptpro_shortcode_options['sptpro_set_small_screen'] ) ? $sptpro_shortcode_options['sptpro_set_small_screen'] : '';
$sptpro_title_hover_bg_color      = isset( $sptpro_shortcode_options['sptpro_title_bg_color']['title-hover-bg-color'] ) ? $sptpro_shortcode_options['sptpro_title_bg_color']['title-hover-bg-color'] : '';
$sptpro_title_bg_color            = isset( $sptpro_shortcode_options['sptpro_title_bg_color']['title-bg-color'] ) ? $sptpro_shortcode_options['sptpro_title_bg_color']['title-bg-color'] : '';
$sptpro_title_active_bg_color     = isset( $sptpro_shortcode_options['sptpro_title_bg_color']['title-active-bg-color'] ) ? $sptpro_shortcode_options['sptpro_title_bg_color']['title-active-bg-color'] : '';
$sptpro_tabs_border               = isset( $sptpro_shortcode_options['sptpro_tabs_border'] ) ? $sptpro_shortcode_options['sptpro_tabs_border'] : '';
$sptpro_margin_between_tabs       = isset( $sptpro_shortcode_options['sptpro_margin_between_tabs']['all'] ) ? $sptpro_shortcode_options['sptpro_margin_between_tabs']['all'] : '';
$sptpro_tab_border_radius         = isset( $sptpro_shortcode_options['sptpro_tab_border_radius'] ) ? $sptpro_shortcode_options['sptpro_tab_border_radius'] : '';
$sptpro_title_padding             = isset( $sptpro_shortcode_options['sptpro_title_padding'] ) ? $sptpro_shortcode_options['sptpro_title_padding'] : '';
$sptpro_desc_border               = isset( $sptpro_shortcode_options['sptpro_desc_border'] ) ? $sptpro_shortcode_options['sptpro_desc_border'] : '';
$sptpro_desc_border_style         = isset( $sptpro_desc_border['style'] ) ? $sptpro_desc_border['style'] : 'solid';
$sptpro_desc_padding              = isset( $sptpro_shortcode_options['sptpro_desc_padding'] ) ? $sptpro_shortcode_options['sptpro_desc_padding'] : '';
$sptpro_desc_bg_color             = isset( $sptpro_shortcode_options['sptpro_desc_bg_color'] ) ? $sptpro_shortcode_options['sptpro_desc_bg_color'] : '';

$sptpro_section_title_typo = isset( $sptpro_shortcode_options['sptpro_section_title_typo'] ) ? $sptpro_shortcode_options['sptpro_section_title_typo'] : '';
$sptpro_tabs_title_typo    = isset( $sptpro_shortcode_options['sptpro_tabs_title_typo'] ) ? $sptpro_shortcode_options['sptpro_tabs_title_typo'] : '';
$sptpro_desc_typo          = isset( $sptpro_shortcode_options['sptpro_desc_typo'] ) ? $sptpro_shortcode_options['sptpro_desc_typo'] : '';
$sptpro_dynamic_style      = '';
$sptpro_dynamic_style      = '<style type="text/css">';

switch ( $sptpro_tabs_horizontal_alignment ) {
	case 'tab-horizontal-alignment-right':
		$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav {justify-content: flex-end;}';
		break;
	case 'tab-horizontal-alignment-left':
		$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav {justify-content: start;}';
		break;
	default:
		$sptpro_dynamic_style .= '';
		break;
}

$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom {
	display: flex;
	flex-direction: column-reverse;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul {
	border-top: ' . $sptpro_tabs_border['all'] . 'px solid ' . $sptpro_tabs_border['color'] . ';
	border-bottom: 0;
	margin-top: 0;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul li label.sp-tab__active {
	border-color: transparent ' . $sptpro_tabs_border['color'] . $sptpro_tabs_border['color'] . ';
	margin-top: -' . $sptpro_tabs_border['all'] . 'px;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul li label,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul li a,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul .sp-tab__nav-item {
	border-top: 0;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-left-radius: ' . $sptpro_tab_border_radius['all'] . $sptpro_tab_border_radius['unit'] . ';
	border-bottom-right-radius: ' . $sptpro_tab_border_radius['all'] . $sptpro_tab_border_radius['unit'] . ';
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom ul {
		border-bottom: none;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__horizontal-bottom .sp-tab__tab-content .sp-tab__tab-pane {
	border-top: ' . $sptpro_desc_border['all'] . 'px ' . $sptpro_desc_border_style . ' ' . $sptpro_desc_border['color'] . ';
	border-bottom: 0;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab-content ul,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab-content ol {
	border-bottom: none;
}';

/* Tabs Border Style */
$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-link.sp-tab__active .sp-tab__tab_title,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label .sp-tab__card-header {
		color: ' . $sptpro_tabs_title_typo['active_color'] . ';
	}
	#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-item.show .sp-tab__nav-link,
	#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-item .sp-tab__nav-link.sp-tab__active,
	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label .sp-tab__card-header {
		background-color: ' . $sptpro_title_active_bg_color . ';
	}

	#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-item.show .sp-tab__nav-link,
	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul li label.sp-tab__active {
		border-color: ' . $sptpro_tabs_border['color'] . $sptpro_tabs_border['color'] . ' transparent;
	}

	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul li label,
	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul li a {
		cursor: pointer;
		border-color: ' . $sptpro_tabs_border['color'] . ';
		padding-top: ' . $sptpro_title_padding['top'] . 'px;
		padding-right: ' . $sptpro_title_padding['right'] . 'px;
		padding-bottom: ' . $sptpro_title_padding['bottom'] . 'px;
		padding-left: ' . $sptpro_title_padding['left'] . 'px;
	}

	#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-link {
		border: ' . $sptpro_tabs_border['all'] . 'px ' . $sptpro_tabs_border['style'] . ' ' . $sptpro_tabs_border['color'] . ';
		height: 100%;
	}

	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul li label,
	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul li a,
	#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item {
		border-top-left-radius: ' . $sptpro_tab_border_radius['all'] . $sptpro_tab_border_radius['unit'] . ';
		border-top-right-radius: ' . $sptpro_tab_border_radius['all'] . $sptpro_tab_border_radius['unit'] . ';
	}';

$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . ' .sp-tab__nav-tabs .sp-tab__nav-item {
    margin-bottom: -' . $sptpro_tabs_border['all'] . 'px; }';

$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label.collapsed .sp-tab__card-header {
	background-color: ' . $sptpro_title_bg_color . ';
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item {
	margin-right: ' . $sptpro_margin_between_tabs . 'px;
}
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item:last-child {
  margin-right: 0;
}

#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item label:hover .sp-tab__tab_title,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item a:hover .sp-tab__tab_title,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label.collapsed .sp-tab__card-header:hover {
	color: ' . $sptpro_tabs_title_typo['hover_color'] . ';
	transition: .3s;
}

#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item:hover,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label.collapsed .sp-tab__card-header:hover {
	background-color: ' . $sptpro_title_hover_bg_color . ';
}';

$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab__tab-pane {
    border: ' . $sptpro_desc_border['all'] . 'px ' . $sptpro_desc_border_style . ' ' . $sptpro_desc_border['color'] . ';
    padding-top: ' . $sptpro_desc_padding['top'] . 'px;
    padding-right: ' . $sptpro_desc_padding['right'] . 'px;
    padding-bottom: ' . $sptpro_desc_padding['bottom'] . 'px;
    padding-left: ' . $sptpro_desc_padding['left'] . 'px;
		border-top: 0px;
		background-color: ' . $sptpro_desc_bg_color . ';
	}';

$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul {
	border-bottom: ' . $sptpro_desc_border['all'] . 'px ' . $sptpro_desc_border_style . ' ' . $sptpro_desc_border['color'] . ';
}';

if ( 'full_widht' === $sptpro_tabs_on_small_screen ) {
	$sptpro_dynamic_style .= '@media(max-width:' . $sptpro_set_small_screen['all'] . 'px) {
		#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default li.sp-tab__nav-item {
			width: 100%;
			margin-right: 0px;
		}
		#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default li.sp-tab__nav-item:last-child {
			margin-bottom: 1px;
		}';
	$sptpro_dynamic_style .= '}'; // @media end.
}
if ( 'accordion_mode' === $sptpro_tabs_on_small_screen ) {
	$sptpro_dynamic_style .= '.sp-tab__default-accordion .sp-tab__nav-tabs {
		display: none;
	}

	.sp-tab__default-accordion .sp-tab__card {
		border-radius: 0;
	}

	.sp-tab__default-accordion .sp-tab__card-header {
		cursor: pointer;
	}

	@media(min-width:' . $sptpro_set_small_screen['all'] . 'px) {
		.sp-tab__default-accordion .sp-tab__nav-tabs {
			display: flex;
		}
		.sp-tab__card {
			border: none;
		}
		.sp-tab__card .sp-tab__card-header {
			display: none;
		}
		.sp-tab__card .sp-tab__collapse {
			display: block;
		}
	}

	@media(max-width:' . $sptpro_set_small_screen['all'] . 'px) {
		#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default.sp-tab__default-accordion .sp-tab__tab-content .sp-tab__tab-pane {
			border: 0;
			padding: 0;
		}

		.sp-tab__collapse:not(.sp-tab__show) {
			display: none;
		}
		.sp-tab__default-accordion .sp-tab__tab-content .sp-tab__tab-pane {
			display: block !important;
			opacity: 1;
		}
		.sp-tab__default-accordion .sp-tab__tab-content .sp-tab__tab-pane {
			border: none;
			padding: 0;
		}
		.sp-tab__default-accordion .sp-tab__card-header {
			border: 1px solid #ccc;
		}
		.sp-tab__default-accordion .sp-tab__card-body {
			border: 1px solid #ccc;
			border-top: none;
			-ms-flex: 1 1 auto;
			flex: 1 1 auto;
			padding: 1.25rem;
		}
	}';
}

// Typography.
if ( $sptpro_section_title ) {
	$sptpro_dynamic_style .= '#poststuff h2.sp-tab__section_title_' . $post_id . ', h2.sp-tab__section_title_' . $post_id . ' ,.editor-styles-wrapper .wp-block h2.sp-tab__section_title_' . $post_id . '{
		margin-bottom: ' . $sptpro_section_title_margin_bottom . 'px !important;
		font-weight: 600;
		font-style: normal;
		font-size: 28px;
		line-height: 28px;
		letter-spacing: 0px;
		color: ' . $sptpro_section_title_typo['color'] . ';
	}';
}
$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default ul .sp-tab__nav-item .sp-tab__tab_title,
#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default label.collapsed .sp-tab__card-header {
	font-weight: 600;
	font-style: normal;
	font-size: 16px;
	line-height: 22px;
	letter-spacing: 0px;
	color: ' . $sptpro_tabs_title_typo['color'] . ';
	margin: 0px;
}';
$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab__tab-pane {
	font-weight: 400;
	font-style: normal;
	font-size: 16px;
	line-height: 24px;
	letter-spacing: 0px;
	color: ' . $sptpro_desc_typo['color'] . ';
}';
$sptpro_dynamic_style .= '#sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab__tab-pane ul li a, #sp-wp-tabs-wrapper_' . $post_id . '.sp-tab__lay-default .sp-tab__tab-content .sp-tab__tab-pane ol li a {
	color: ' . $sptpro_desc_typo['color'] . ';
}';
$sptpro_dynamic_style .= '</style>';

echo wp_kses(
	$sptpro_dynamic_style,
	array(
		'style' => array(
			'type' => array(),
		),
	)
);
