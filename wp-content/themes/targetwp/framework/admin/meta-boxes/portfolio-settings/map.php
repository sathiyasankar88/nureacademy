<?php

if(!function_exists('target_qodef_map_portfolio_settings')) {
    function target_qodef_map_portfolio_settings() {
        $meta_box = target_qodef_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'targetwp'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        target_qodef_create_meta_box_field(array(
            'name'        => 'qodef_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'targetwp'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'targetwp'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'targetwp'),
                'small-images'      => esc_html__('Portfolio small images', 'targetwp'),
                'small-slider'      => esc_html__('Portfolio small slider', 'targetwp'),
                'big-images'        =>esc_html__( 'Portfolio big images', 'targetwp'),
                'big-slider'        => esc_html__('Portfolio big slider', 'targetwp'),
                'gallery' => esc_html__('Portfolio gallery', 'targetwp'),
                'masonry-gallery-left' => esc_html__('Portfolio masonry gallery left', 'targetwp'),
                'masonry-gallery-bottom' => esc_html__('Portfolio masonry gallery bottom', 'targetwp'),
                'pinterest' => esc_html__('Portfolio pinterest', 'targetwp'),
                'custom'            => esc_html__('Portfolio custom', 'targetwp'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'targetwp')


            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        target_qodef_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'targetwp'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'targetwp'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        target_qodef_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'targetwp'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'targetwp'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        target_qodef_create_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'targetwp'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'targetwp'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'targetwp'),
                'large_width'        => esc_html__('Large width', 'targetwp'),
                'large_height'       => esc_html__('Large height', 'targetwp'),
                'large_width_height' => esc_html__('Large width/height', 'targetwp')
            )
        ));
    }

    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_portfolio_settings');
}