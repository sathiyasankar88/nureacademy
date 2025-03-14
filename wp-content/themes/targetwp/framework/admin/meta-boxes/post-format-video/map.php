<?php

/*** Video Post Format ***/
if(!function_exists('target_qodef_map_video')) {
    function target_qodef_map_video()
    {

        $video_post_format_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'targetwp'),
                'name' => 'post_format_video_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'targetwp'),
                'description' => esc_html__('Choose video type', 'targetwp'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'social_networks',
                'options' => array(
                    'social_networks' => esc_html__('Youtube or Vimeo', 'targetwp'),
                    'self' => esc_html__('Self Hosted' ,'targetwp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'social_networks' => '#qodef_qodef_video_self_hosted_container',
                        'self' => '#qodef_qodef_video_embedded_container'
                    ),
                    'show' => array(
                        'social_networks' => '#qodef_qodef_video_embedded_container',
                        'self' => '#qodef_qodef_video_self_hosted_container')
                )
            )
        );

        $qodef_video_embedded_container = target_qodef_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'qodef_video_embedded_container',
                'hidden_property' => 'qodef_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $qodef_video_self_hosted_container = target_qodef_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'qodef_video_self_hosted_container',
                'hidden_property' => 'qodef_video_type_meta',
                'hidden_value' => 'social_networks'
            )
        );


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_video_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video URL', 'targetwp'),
                'description' =>esc_html__( 'Enter Video URL', 'targetwp'),
                'parent' => $qodef_video_embedded_container,

            )
        );


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'targetwp'),
                'description' => esc_html__('Upload video image', 'targetwp'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_video_webm_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video WEBM', 'targetwp'),
                'description' => esc_html__('Enter video URL for WEBM format', 'targetwp'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_video_mp4_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'targetwp'),
                'description' => esc_html__('Enter video URL for MP4 format', 'targetwp'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_post_video_ogv_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video OGV', 'targetwp'),
                'description' => esc_html__('Enter video URL for OGV format', 'targetwp'),
                'parent' => $qodef_video_self_hosted_container,

            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_video');

}