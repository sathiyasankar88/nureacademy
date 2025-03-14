<?php

/*** Link Post Format ***/

if(!function_exists('target_qodef_map_link')) {
    function target_qodef_map_link()
    {

        $link_post_format_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'targetwp'),
                'name' => 'post_format_link_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_link_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'targetwp'),
                'description' => esc_html__('Enter link', 'targetwp'),
                'parent' => $link_post_format_meta_box,

            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_link');

}

