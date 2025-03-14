<?php
/**
 * Custom styles for woocommerce pages
 * Hooks to moments_qodef_style_dynamic hook
 */

if(!function_exists('target_qodef_product_list_title_typography_styles')){
    function target_qodef_product_list_title_typography_styles(){
        $selector = 'ul.products > .product .qodef-pl-text-wrapper .qodef-product-list-title';
        $styles = array();

        $font_family = target_qodef_options()->getOptionValue('product_list_title_font_family');
        if(target_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = target_qodef_get_font_option_val($font_family);
        }

        $text_transform = target_qodef_options()->getOptionValue('product_list_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = target_qodef_options()->getOptionValue('product_list_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = target_qodef_options()->getOptionValue('product_list_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = target_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = target_qodef_options()->getOptionValue('product_list_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = target_qodef_options()->getOptionValue('product_list_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = target_qodef_filter_px($font_size).'px';
        }

        echo target_qodef_dynamic_css($selector, $styles);
    }
    add_action('target_qodef_style_dynamic', 'target_qodef_product_list_title_typography_styles');
}

if(!function_exists('target_qodef_product_single_title_typography_styles')){
    function target_qodef_product_single_title_typography_styles(){
        $selector = '.qodef-single-product-title';
        $styles = array();

        $font_family = target_qodef_options()->getOptionValue('product_single_title_font_family');
        if(target_qodef_is_font_option_valid($font_family)){
            $styles['font-family'] = target_qodef_get_font_option_val($font_family);
        }

        $text_transform = target_qodef_options()->getOptionValue('product_single_title_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = target_qodef_options()->getOptionValue('product_single_title_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = target_qodef_options()->getOptionValue('product_single_title_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = target_qodef_filter_px($letter_spacing).'px';
        }

        $font_weight = target_qodef_options()->getOptionValue('product_single_title_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $font_size = target_qodef_options()->getOptionValue('product_single_title_font_size');
        if($font_size !== '') {
            $styles['font-size'] = target_qodef_filter_px($font_size).'px';
        }

        echo target_qodef_dynamic_css($selector, $styles);
    }
    add_action('target_qodef_style_dynamic', 'target_qodef_product_single_title_typography_styles');
}
