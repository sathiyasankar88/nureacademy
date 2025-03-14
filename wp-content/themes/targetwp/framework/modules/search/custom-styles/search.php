<?php

if (!function_exists('target_qodef_search_opener_icon_colors')) {

	function target_qodef_search_opener_icon_colors()
	{

		if (target_qodef_options()->getOptionValue('header_search_icon_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-opener', array(
				'color' => target_qodef_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (target_qodef_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'color' => target_qodef_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (target_qodef_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-light-header .qodef-top-bar .qodef-search-opener', array(
				'color' => target_qodef_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (target_qodef_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-light-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-light-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-light-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => target_qodef_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (target_qodef_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener', array(
				'color' => target_qodef_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (target_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-dark-header .qodef-page-header > div:not(.qodef-sticky-header) .qodef-search-opener:hover,
			.qodef-dark-header.qodef-header-style-on-scroll .qodef-page-header .qodef-search-opener:hover,
			.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover', array(
				'color' => target_qodef_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_opener_icon_colors');

}

if (!function_exists('target_qodef_search_opener_icon_background_colors')) {

	function target_qodef_search_opener_icon_background_colors()
	{

		if (target_qodef_options()->getOptionValue('search_icon_background_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-opener', array(
				'background-color' => target_qodef_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (target_qodef_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-opener:hover', array(
				'background-color' => target_qodef_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_opener_icon_background_colors');
}

if (!function_exists('target_qodef_search_opener_text_styles')) {

	function target_qodef_search_opener_text_styles()
	{
		$text_styles = array();

		if (target_qodef_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = target_qodef_options()->getOptionValue('search_icon_text_color');
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = target_qodef_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = target_qodef_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = target_qodef_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo target_qodef_dynamic_css('.qodef-search-icon-text', $text_styles);
		}
		if (target_qodef_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => target_qodef_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_opener_text_styles');
}

if (!function_exists('target_qodef_search_opener_spacing')) {

	function target_qodef_search_opener_spacing()
	{
		$spacing_styles = array();

		if (target_qodef_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo target_qodef_dynamic_css('.qodef-search-opener', $spacing_styles);
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_opener_spacing');
}

if (!function_exists('target_qodef_search_bar_background')) {

	function target_qodef_search_bar_background()
	{

		if (target_qodef_options()->getOptionValue('search_background_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-cover', array(
				'background-color' => target_qodef_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_bar_background');
}

if (!function_exists('target_qodef_search_text_styles')) {

	function target_qodef_search_text_styles()
	{
		$text_styles = array();

		if (target_qodef_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = target_qodef_options()->getOptionValue('search_text_color');
            echo target_qodef_dynamic_css('.qodef-search-cover input:focus::-webkit-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input:focus::-moz-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input:focus:-moz-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input:focus:-ms-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_color')
            ));
		}
		if (target_qodef_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (target_qodef_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = target_qodef_options()->getOptionValue('search_text_texttransform');
		}
		if (target_qodef_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (target_qodef_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = target_qodef_options()->getOptionValue('search_text_fontstyle');
		}
		if (target_qodef_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = target_qodef_options()->getOptionValue('search_text_fontweight');
		}
		if (target_qodef_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo target_qodef_dynamic_css('.qodef-search-cover input[type="text"]', $text_styles);
		}
		if (target_qodef_options()->getOptionValue('search_text_disabled_color') !== '') {
            echo target_qodef_dynamic_css('.qodef-search-cover input::-webkit-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input::-moz-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input:-moz-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
            echo target_qodef_dynamic_css('.qodef-search-cover input:-ms-input-placeholder', array(
                'color' => target_qodef_options()->getOptionValue('search_text_disabled_color')
            ));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_text_styles');
}

if (!function_exists('target_qodef_search_close_icon_styles')) {

	function target_qodef_search_close_icon_styles()
	{

		if (target_qodef_options()->getOptionValue('search_close_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i', array(
				'color' => target_qodef_options()->getOptionValue('search_close_color')
			));
		}
		if (target_qodef_options()->getOptionValue('search_close_hover_color') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i:hover', array(
				'color' => target_qodef_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (target_qodef_options()->getOptionValue('search_close_size') !== '') {
			echo target_qodef_dynamic_css('.qodef-search-cover .qodef-search-close i', array(
				'font-size' => target_qodef_filter_px(target_qodef_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('target_qodef_style_dynamic', 'target_qodef_search_close_icon_styles');
}

?>
