<?php

//Content bottom

if(!function_exists('target_qodef_map_content_bottom')) {
    function target_qodef_map_content_bottom()
    {

        $content_bottom_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Content Bottom', 'targetwp'),
                'name' => 'content_bottom_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_enable_content_bottom_area_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Enable Content Bottom Area', 'targetwp'),
                'description' => esc_html__('This option will enable Content Bottom area on pages', 'targetwp'),
                'parent' => $content_bottom_meta_box,
                'options' => array(
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#qodef_qodef_show_content_bottom_meta_container',
                        'no' => '#qodef_qodef_show_content_bottom_meta_container'
                    ),
                    'show' => array(
                        'yes' => '#qodef_qodef_show_content_bottom_meta_container'
                    )
                )
            )
        );

        $show_content_bottom_meta_container = target_qodef_add_admin_container(
            array(
                'parent' => $content_bottom_meta_box,
                'name' => 'qodef_show_content_bottom_meta_container',
                'hidden_property' => 'qodef_enable_content_bottom_area_meta',
                'hidden_value' => '',
                'hidden_values' => array('', 'no')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_content_bottom_sidebar_custom_display_meta',
                'type' => 'selectblank',
                'default_value' => '',
                'label' => esc_html__('Sidebar to Display', 'targetwp'),
                'description' => esc_html__('Choose a Content Bottom sidebar to display', 'targetwp'),
                'options' => target_qodef_get_custom_sidebars(),
                'parent' => $show_content_bottom_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'type' => 'selectblank',
                'name' => 'qodef_content_bottom_in_grid_meta',
                'default_value' => '',
                'label' => esc_html__('Display in Grid', 'targetwp'),
                'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'targetwp'),
                'options' => array(
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                ),
                'parent' => $show_content_bottom_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'type' => 'color',
                'name' => 'qodef_content_bottom_background_color_meta',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'targetwp'),
                'description' => esc_html__('Choose a background color for Content Bottom area', 'targetwp'),
                'parent' => $show_content_bottom_meta_container
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_content_bottom');

}