<?php

/*** Quote Post Format ***/

if(!function_exists('target_qodef_map_quote')) {
    function target_qodef_map_quote()
    {

        $quote_post_format_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'targetwp'),
                'name' => 'post_format_quote_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'targetwp'),
                'description' => esc_html__('Enter Quote text', 'targetwp'),
                'parent' => $quote_post_format_meta_box,

            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_quote');

}
