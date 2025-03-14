<?php

//General

if(!function_exists('target_qodef_map_general')) {
    function target_qodef_map_general()
    {

        $general_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('General', 'targetwp'),
                'name' => 'general_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_boxed_meta',
                'type' => 'select',
                'label' => esc_html__('Boxed Layout', 'targetwp'),
                'description' => esc_html__('Enabling this option will show boxed layout', 'targetwp'),
                'parent' => $general_meta_box,
                'options' => array(
                    '' => '',
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_page_background_color_meta',
                'type' => 'color',
                'default_value' => '',
                'label' => esc_html__('Page Background Color', 'targetwp'),
                'description' => esc_html__('Choose background color for page content', 'targetwp'),
                'parent' => $general_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_page_padding_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Page Padding', 'targetwp'),
                'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'targetwp'),
                'parent' => $general_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_page_slider_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Slider Shortcode', 'targetwp'),
                'description' => esc_html__('Paste your slider shortcode here', 'targetwp'),
                'parent' => $general_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_page_transition_type',
                'type' => 'selectblank',
                'label' => esc_html__('Page Transition', 'targetwp'),
                'description' => esc_html__('Choose the type of transition to this page', 'targetwp'),
                'parent' => $general_meta_box,
                'default_value' => '',
                'options' => array(
                    'no-animation' => esc_html__('No animation', 'targetwp'),
                    'fade' => esc_html__('Fade', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_page_comments_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Show Comments', 'targetwp'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'targetwp'),
                'parent' => $general_meta_box,
                'options' => array(
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_general');

}