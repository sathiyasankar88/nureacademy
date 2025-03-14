<?php

/*** Post Settings ***/

if(!function_exists('target_qodef_map_post')) {
    function target_qodef_map_post()
    {

        $post_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Post', 'targetwp'),
                'name' => 'post-meta'
            )
        );

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_blog_masonry_gallery_dimensions',
            'type' => 'select',
            'label' => esc_html__('Dimensions for Masonry Gallery', 'targetwp'),
            'description' => esc_html__('Choose image layout when it appears in Masonry Gallery list', 'targetwp'),
            'parent' => $post_meta_box,
            'options' => array(
                'default' => esc_html__('Default', 'targetwp'),
                'large-width' => esc_html__('Large width', 'targetwp'),
                'large-height' => esc_html__('Large height', 'targetwp'),
                'large-width-height' => esc_html__('Large width/height', 'targetwp')
            ),
            'default_value' => 'default'
        ));
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_post');
}
