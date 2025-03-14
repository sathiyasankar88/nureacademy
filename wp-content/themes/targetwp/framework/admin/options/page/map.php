<?php

if ( ! function_exists('target_qodef_page_options_map') ) {

    function target_qodef_page_options_map() {

        target_qodef_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'targetwp'),
                'icon'  => 'fa fa-institution'
            )
        );

        $custom_sidebars = target_qodef_get_custom_sidebars();

        $panel_sidebar = target_qodef_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'targetwp')
            )
        );

        target_qodef_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'targetwp'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'targetwp'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'targetwp'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'targetwp'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'targetwp'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'targetwp'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'targetwp')
            )
        ));


        if(count($custom_sidebars) > 0) {
            target_qodef_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'targetwp'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'targetwp'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        target_qodef_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label'       => esc_html__('Show Comments', 'targetwp'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'targetwp'),
            'default_value' => 'no',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'target_qodef_options_map', 'target_qodef_page_options_map',9);

}