<?php

if(!function_exists('target_qodef_map_sidebar')) {
    function target_qodef_map_sidebar()
    {

        $custom_sidebars = target_qodef_get_custom_sidebars();

        $sidebar_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Sidebar', 'targetwp'),
                'name' => 'sidebar_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_sidebar_meta',
                'type' => 'select',
                'label' => esc_html__('Layout', 'targetwp'),
                'description' => esc_html__('Choose the sidebar layout', 'targetwp'),
                'parent' => $sidebar_meta_box,
                'options' => array(
                    '' => 'Default',
                    'no-sidebar' => esc_html__('No Sidebar', 'targetwp'),
                    'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'targetwp'),
                    'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'targetwp'),
                    'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'targetwp'),
                    'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'targetwp')
                )
            )
        );

        if (count($custom_sidebars) > 0) {
            target_qodef_create_meta_box_field(array(
                'name' => 'qodef_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'targetwp'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'targetwp'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_sidebar');

}