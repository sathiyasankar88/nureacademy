<?php
if(!function_exists('target_qodef_tabs_typography_styles')){
	function target_qodef_tabs_typography_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = target_qodef_options()->getOptionValue('tabs_font_family');
		
		if(target_qodef_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = target_qodef_get_font_option_val($font_family);
		}
		
		$text_transform = target_qodef_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = target_qodef_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = target_qodef_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = target_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = target_qodef_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        $font_size = target_qodef_options()->getOptionValue('tabs_font_size');
        if($font_size !== '') {
            $tabs_tipography_array['font-size'] = target_qodef_filter_px($font_size).'px';
        }

        echo target_qodef_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('target_qodef_style_dynamic', 'target_qodef_tabs_typography_styles');
}

if(!function_exists('target_qodef_tabs_inital_color_styles')){
	function target_qodef_tabs_inital_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li a';
		$styles = array();
		
		if(target_qodef_options()->getOptionValue('tabs_color')) {
            $styles['color'] = target_qodef_options()->getOptionValue('tabs_color');
        }
		if(target_qodef_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = target_qodef_options()->getOptionValue('tabs_back_color');
            $styles['border-right-color'] = target_qodef_options()->getOptionValue('tabs_back_color');
        }
		
		echo target_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li a';
        $styles_vertical = array();

        if(target_qodef_options()->getOptionValue('tabs_back_color')) {
            $styles_vertical['border-right-color'] = target_qodef_options()->getOptionValue('tabs_back_color');
        }
        echo target_qodef_dynamic_css($selector_vertical, $styles_vertical);

        $selector_horizontal = '.qodef-tabs.qodef-horizontal-tab .qodef-tab-container';
        $styles_horizontal = array();

        if(target_qodef_options()->getOptionValue('tabs_back_color')) {
            $styles_horizontal['border-top-color'] = target_qodef_options()->getOptionValue('tabs_back_color');
        }
        echo target_qodef_dynamic_css($selector_horizontal, $styles_horizontal);
	}
	add_action('target_qodef_style_dynamic', 'target_qodef_tabs_inital_color_styles');
}
if(!function_exists('target_qodef_tabs_active_color_styles')){
	function target_qodef_tabs_active_color_styles(){
		$selector = '.qodef-tabs .qodef-tabs-nav li.ui-state-active a, .qodef-tabs .qodef-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(target_qodef_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = target_qodef_options()->getOptionValue('tabs_color_active');
        }
		if(target_qodef_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = target_qodef_options()->getOptionValue('tabs_back_color_active');
        }

        echo target_qodef_dynamic_css($selector, $styles);

        $selector_vertical = '.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-active a, .qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-hover a';
        $styles_vertical = array();

        if(target_qodef_options()->getOptionValue('tabs_back_color_active')) {
            $styles_vertical['border-right-color'] = target_qodef_options()->getOptionValue('tabs_back_color_active');
        }
        echo target_qodef_dynamic_css($selector_vertical, $styles_vertical);

	}
	add_action('target_qodef_style_dynamic', 'target_qodef_tabs_active_color_styles');
}