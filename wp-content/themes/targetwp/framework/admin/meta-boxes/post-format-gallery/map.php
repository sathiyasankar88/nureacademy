<?php

/*** Gallery Post Format ***/

if(!function_exists('target_qodef_map_gallery')) {
    function target_qodef_map_gallery()
    {

        $gallery_post_format_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'targetwp'),
                'name' => 'post_format_gallery_meta'
            )
        );

        target_qodef_add_multiple_images_field(
            array(
                'name' => 'qodef_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'targetwp'),
                'description' => esc_html__('Choose your gallery images', 'targetwp'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_gallery');

}