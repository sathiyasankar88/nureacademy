<?php

/*** Audio Post Format ***/

if(!function_exists('target_qodef_map_audio')) {
    function target_qodef_map_audio()
    {

        $audio_post_format_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'targetwp'),
                'name' => 'post_format_audio_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'targetwp'),
                'description' => esc_html__('Enter audion link', 'targetwp'),
                'parent' => $audio_post_format_meta_box,

            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_audio');

}
