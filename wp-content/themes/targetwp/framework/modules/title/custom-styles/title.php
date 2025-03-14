<?php

if (!function_exists('target_qodef_title_area_typography_style')) {

    function target_qodef_title_area_typography_style(){

        $title_styles = array();

        if(target_qodef_options()->getOptionValue('page_title_color') !== '') {
            $title_styles['color'] = target_qodef_options()->getOptionValue('page_title_color');
        }
        if(target_qodef_options()->getOptionValue('page_title_google_fonts') !== '-1') {
            $title_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('page_title_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('page_title_fontsize') !== '') {
            $title_styles['font-size'] = target_qodef_options()->getOptionValue('page_title_fontsize').'px';
        }
        if(target_qodef_options()->getOptionValue('page_title_lineheight') !== '') {
            $title_styles['line-height'] = target_qodef_options()->getOptionValue('page_title_lineheight').'px';
        }
        if(target_qodef_options()->getOptionValue('page_title_texttransform') !== '') {
            $title_styles['text-transform'] = target_qodef_options()->getOptionValue('page_title_texttransform');
        }
        if(target_qodef_options()->getOptionValue('page_title_fontstyle') !== '') {
            $title_styles['font-style'] = target_qodef_options()->getOptionValue('page_title_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('page_title_fontweight') !== '') {
            $title_styles['font-weight'] = target_qodef_options()->getOptionValue('page_title_fontweight');
        }
        if(target_qodef_options()->getOptionValue('page_title_letter_spacing') !== '') {
            $title_styles['letter-spacing'] = target_qodef_options()->getOptionValue('page_title_letter_spacing').'px';
        }

        $title_selector = array(
            '.qodef-title .qodef-title-holder h1'
        );

        echo target_qodef_dynamic_css($title_selector, $title_styles);


        $subtitle_styles = array();

        if(target_qodef_options()->getOptionValue('page_subtitle_color') !== '') {
            $subtitle_styles['color'] = target_qodef_options()->getOptionValue('page_subtitle_color');
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_google_fonts') !== '-1') {
            $subtitle_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('page_subtitle_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_fontsize') !== '') {
            $subtitle_styles['font-size'] = target_qodef_options()->getOptionValue('page_subtitle_fontsize').'px';
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_lineheight') !== '') {
            $subtitle_styles['line-height'] = target_qodef_options()->getOptionValue('page_subtitle_lineheight').'px';
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_texttransform') !== '') {
            $subtitle_styles['text-transform'] = target_qodef_options()->getOptionValue('page_subtitle_texttransform');
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_fontstyle') !== '') {
            $subtitle_styles['font-style'] = target_qodef_options()->getOptionValue('page_subtitle_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_fontweight') !== '') {
            $subtitle_styles['font-weight'] = target_qodef_options()->getOptionValue('page_subtitle_fontweight');
        }
        if(target_qodef_options()->getOptionValue('page_subtitle_letter_spacing') !== '') {
            $subtitle_styles['letter-spacing'] = target_qodef_options()->getOptionValue('page_subtitle_letter_spacing').'px';
        }

        $subtitle_selector = array(
            '.qodef-title .qodef-title-holder .qodef-subtitle'
        );

        echo target_qodef_dynamic_css($subtitle_selector, $subtitle_styles);


        $breadcrumb_styles = array();

        if(target_qodef_options()->getOptionValue('page_breadcrumb_color') !== '') {
            $breadcrumb_styles['color'] = target_qodef_options()->getOptionValue('page_breadcrumb_color');
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_google_fonts') !== '-1') {
            $breadcrumb_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('page_breadcrumb_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_fontsize') !== '') {
            $breadcrumb_styles['font-size'] = target_qodef_options()->getOptionValue('page_breadcrumb_fontsize').'px';
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_lineheight') !== '') {
            $breadcrumb_styles['line-height'] = target_qodef_options()->getOptionValue('page_breadcrumb_lineheight').'px';
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_texttransform') !== '') {
            $breadcrumb_styles['text-transform'] = target_qodef_options()->getOptionValue('page_breadcrumb_texttransform');
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_fontstyle') !== '') {
            $breadcrumb_styles['font-style'] = target_qodef_options()->getOptionValue('page_breadcrumb_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_fontweight') !== '') {
            $breadcrumb_styles['font-weight'] = target_qodef_options()->getOptionValue('page_breadcrumb_fontweight');
        }
        if(target_qodef_options()->getOptionValue('page_breadcrumb_letter_spacing') !== '') {
            $breadcrumb_styles['letter-spacing'] = target_qodef_options()->getOptionValue('page_breadcrumb_letter_spacing').'px';
        }

        $breadcrumb_selector = array(
            '.qodef-title .qodef-title-holder .qodef-breadcrumbs a, .qodef-title .qodef-title-holder .qodef-breadcrumbs span'
        );

        echo target_qodef_dynamic_css($breadcrumb_selector, $breadcrumb_styles);

        $breadcrumb_selector_styles = array();
        if(target_qodef_options()->getOptionValue('page_breadcrumb_hovercolor') !== '') {
            $breadcrumb_selector_styles['color'] = target_qodef_options()->getOptionValue('page_breadcrumb_hovercolor');
        }

        $breadcrumb_hover_selector = array(
            '.qodef-title .qodef-title-holder .qodef-breadcrumbs a:hover'
        );

        echo target_qodef_dynamic_css($breadcrumb_hover_selector, $breadcrumb_selector_styles);

    }

    add_action('target_qodef_style_dynamic', 'target_qodef_title_area_typography_style');

}


