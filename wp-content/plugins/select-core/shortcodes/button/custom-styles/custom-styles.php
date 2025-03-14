<?php

if(!function_exists('target_qodef_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function target_qodef_button_typography_styles() {
        $selector = '.qodef-btn';
        $styles = array();

        $font_family = target_qodef_options()->getOptionValue('button_font_family');
        if(target_qodef_is_font_option_valid($font_family)) {
            $styles['font-family'] = target_qodef_get_font_option_val($font_family);
        }

        $text_transform = target_qodef_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = target_qodef_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = target_qodef_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = target_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = target_qodef_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo target_qodef_dynamic_css($selector, $styles);
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_button_typography_styles');
}

if(!function_exists('target_qodef_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function target_qodef_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.qodef-btn.qodef-btn-outline';

        if(target_qodef_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = target_qodef_options()->getOptionValue('btn_outline_text_color');
        }

        if(target_qodef_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = target_qodef_options()->getOptionValue('btn_outline_border_color');
        }

        echo target_qodef_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(target_qodef_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-color):hover',
                array('color' => target_qodef_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(target_qodef_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => target_qodef_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(target_qodef_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover',
                array('border-color' => target_qodef_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_button_outline_styles');
}

if(!function_exists('target_qodef_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function target_qodef_button_solid_styles() {
        //solid styles
        $solid_selector = '.qodef-btn.qodef-btn-solid';
        $solid_styles = array();

        if(target_qodef_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = target_qodef_options()->getOptionValue('btn_solid_text_color');
        }

        if(target_qodef_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = target_qodef_options()->getOptionValue('btn_solid_border_color');
        }

        if(target_qodef_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_styles['background-color'] = target_qodef_options()->getOptionValue('btn_solid_bg_color');
        }

        echo target_qodef_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(target_qodef_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-color):hover',
                array('color' => target_qodef_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(target_qodef_options()->getOptionValue('btn_solid_hover_bg_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('background-color' => target_qodef_options()->getOptionValue('btn_solid_hover_bg_color').'!important')
            );
        }

        if(target_qodef_options()->getOptionValue('btn_solid_hover_border_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-bg):hover',
                array('border-color' => target_qodef_options()->getOptionValue('btn_solid_hover_border_color').'!important')
            );
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_button_solid_styles');
}

if(!function_exists('target_qodef_button_transparent_styles')) {
    /**
     * Generate styles for transparent type buttons
     */
    function target_qodef_button_transparent_styles() {
        //transparent styles

        $transparent_selector = '.qodef-btn.qodef-btn-transparent';
        $transparent_styles = array();

        if(target_qodef_options()->getOptionValue('btn_transparent_text_color')) {
            $transparent_styles['color'] = target_qodef_options()->getOptionValue('btn_transparent_text_color');
        }

        echo target_qodef_dynamic_css($transparent_selector, $transparent_styles);

        //solid hover styles
        if(target_qodef_options()->getOptionValue('btn_transparent_hover_text_color')) {
            echo target_qodef_dynamic_css(
                '.qodef-btn.qodef-btn-transparent:not(.qodef-btn-custom-hover-color):hover',
                array('color' => target_qodef_options()->getOptionValue('btn_transparent_hover_text_color').'!important')
            );
        }

    }

    add_action('target_qodef_style_dynamic', 'target_qodef_button_transparent_styles');
}