<?php

if (!function_exists('target_qodef_fullscreen_menu_general_styles')) {

	function target_qodef_fullscreen_menu_general_styles()
	{
		$fullscreen_menu_background_color = '';
		if (target_qodef_options()->getOptionValue('fullscreen_alignment') !== '') {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu ul li, .qodef-fullscreen-above-menu-widget-holder, .qodef-fullscreen-below-menu-widget-holder', array(
				'text-align' => target_qodef_options()->getOptionValue('fullscreen_alignment')
			));
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
			$fullscreen_menu_background_color = target_qodef_hex2rgb(target_qodef_options()->getOptionValue('fullscreen_menu_background_color'));
			if (target_qodef_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
				$fullscreen_menu_background_transparency = target_qodef_options()->getOptionValue('fullscreen_menu_background_transparency');
			} else {
				$fullscreen_menu_background_transparency = 0.9;
			}
		}

		if ($fullscreen_menu_background_color !== '') {
			echo target_qodef_dynamic_css('.qodef-fullscreen-menu-holder', array(
				'background-color' => 'rgba(' . $fullscreen_menu_background_color[0] . ',' . $fullscreen_menu_background_color[1] . ',' . $fullscreen_menu_background_color[2] . ',' . $fullscreen_menu_background_transparency . ')'
			));
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
			echo target_qodef_dynamic_css('.qodef-fullscreen-menu-holder', array(
				'background-image' => 'url(' . target_qodef_options()->getOptionValue('fullscreen_menu_background_image') . ')',
				'background-position' => 'center 0',
				'background-repeat' => 'no-repeat'
			));
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
			echo target_qodef_dynamic_css('.qodef-fullscreen-menu-holder', array(
				'background-image' => 'url(' . target_qodef_options()->getOptionValue('fullscreen_menu_pattern_image') . ')',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_general_styles');

}

if (!function_exists('target_qodef_fullscreen_menu_first_level_style')) {

	function target_qodef_fullscreen_menu_first_level_style()
	{

		$first_menu_style = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_color') !== '') {
			$first_menu_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_color');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
			$first_menu_style['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts')) . ',sans-serif';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
			$first_menu_style['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_fontsize')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
			$first_menu_style['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_lineheight')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
			$first_menu_style['font-style'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
			$first_menu_style['font-weight'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontweight');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
			$first_menu_style['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
			$first_menu_style['text-transform'] = target_qodef_options()->getOptionValue('fullscreen_menu_texttransform');
		}

		if (!empty($first_menu_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu > ul > li > a, nav.qodef-fullscreen-menu > ul > li > h6', $first_menu_style);
		}
		
		$first_menu_hover_style = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
			$first_menu_hover_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_color');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
			$first_menu_hover_style['background-color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color');
		}

		if (!empty($first_menu_hover_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu > ul > li > a:hover, nav.qodef-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
		}

		$first_menu_active_style = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
			$first_menu_active_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_active_color');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
			$first_menu_active_style['background-color'] = target_qodef_options()->getOptionValue('fullscreen_menu_active_background_color');
		}

		if (!empty($first_menu_active_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_first_level_style');

}

if (!function_exists('target_qodef_fullscreen_menu_second_level_style')) {

	function target_qodef_fullscreen_menu_second_level_style()
	{
		$second_menu_style = array();
		if (target_qodef_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
			$second_menu_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_color_2nd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
			$second_menu_style['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')) . ',sans-serif';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
			$second_menu_style['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_fontsize_2nd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
			$second_menu_style['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_lineheight_2nd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
			$second_menu_style['font-style'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
			$second_menu_style['font-weight'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
			$second_menu_style['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
			$second_menu_style['text-transform'] = target_qodef_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
		}

		if (!empty($second_menu_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu ul li ul li a, nav.qodef-fullscreen-menu ul li ul li h6', $second_menu_style);
		}

		$second_menu_hover_style = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
			$second_menu_hover_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
			$second_menu_hover_style['background-color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
		}

		if (!empty($second_menu_hover_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu ul li ul li a:hover, nav.qodef-fullscreen-menu ul li ul li h6:hover', $second_menu_hover_style);
		}
	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_second_level_style');

}

if (!function_exists('target_qodef_fullscreen_menu_third_level_style')) {

	function target_qodef_fullscreen_menu_third_level_style()
	{
		$third_menu_style = array();
		if (target_qodef_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
			$third_menu_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_color_3rd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
			$third_menu_style['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')) . ',sans-serif';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
			$third_menu_style['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_fontsize_3rd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
			$third_menu_style['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_lineheight_3rd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
			$third_menu_style['font-style'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
			$third_menu_style['font-weight'] = target_qodef_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
			$third_menu_style['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
			$third_menu_style['text-transform'] = target_qodef_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
		}

		if (!empty($third_menu_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu ul li ul li ul li a', $third_menu_style);
		}

		$third_menu_hover_style = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
			$third_menu_hover_style['color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
			$third_menu_hover_style['background-color'] = target_qodef_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
		}

		if (!empty($third_menu_hover_style)) {
			echo target_qodef_dynamic_css('nav.qodef-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
		}
	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_third_level_style');

}

if (!function_exists('target_qodef_fullscreen_menu_icon_styles')) {

	function target_qodef_fullscreen_menu_icon_styles()
	{

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

			echo target_qodef_dynamic_css('.qodef-fullscreen-menu-opener .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_icon_color')
			));

		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

			echo target_qodef_dynamic_css('.qodef-fullscreen-menu-opener:hover .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_icon_hover_color')
			));

		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span,
			.qodef-light-header .qodef-top-bar .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_light_icon_color') . ' !important'
			));

		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

			echo target_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span,
			.qodef-light-header .qodef-top-bar .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') . ' !important'
			));

		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

			echo target_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span,
			.qodef-dark-header .qodef-top-bar .qodef-fullscreen-menu-opener:not(.opened) .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_dark_icon_color') . ' !important'
			));

		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

			echo target_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span,
			.qodef-dark-header .qodef-top-bar .qodef-fullscreen-menu-opener:not(.opened):hover .qodef-fullscreen-menu-lines > span', array(
				'background-color' => target_qodef_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') . ' !important'
			));

		}
	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_icon_styles');

}

if (!function_exists('target_qodef_fullscreen_menu_icon_spacing')) {

	function target_qodef_fullscreen_menu_icon_spacing()
	{

		$fullscreen_menu_icon_spacing = array();

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
			$fullscreen_menu_icon_spacing['padding-left'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_icon_padding_left')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
			$fullscreen_menu_icon_spacing['padding-right'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_icon_padding_right')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
			$fullscreen_menu_icon_spacing['margin-left'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_icon_margin_left')) . 'px';
		}

		if (target_qodef_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
			$fullscreen_menu_icon_spacing['margin-right'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('fullscreen_menu_icon_margin_right')) . 'px';
		}

		if (!empty($fullscreen_menu_icon_spacing)) {
			echo target_qodef_dynamic_css('a.qodef-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_fullscreen_menu_icon_spacing');

}