<?php

if(!function_exists('target_qodef_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function target_qodef_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'targetwp'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'targetwp'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

    }

    add_action('widgets_init', 'target_qodef_register_sidebars');
}

if(!function_exists('target_qodef_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates TargetQodefSidebar object
     */
    function target_qodef_add_support_custom_sidebar() {
        add_theme_support('TargetQodefSidebar');
        if (get_theme_support('TargetQodefSidebar')) new TargetQodefSidebar();
    }

    add_action('after_setup_theme', 'target_qodef_add_support_custom_sidebar');
}
