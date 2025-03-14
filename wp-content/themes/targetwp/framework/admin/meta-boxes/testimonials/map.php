<?php

//Testimonials

if(!function_exists('target_qodef_map_testimonials')) {
    function target_qodef_map_testimonials()
    {

        $testimonial_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'targetwp'),
                'name' => 'testimonial_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_testimonial_title',
                'type' => 'text',
                'label' => esc_html__('Title', 'targetwp'),
                'description' => esc_html__('Enter testimonial title', 'targetwp'),
                'parent' => $testimonial_meta_box,
            )
        );


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_testimonial_author',
                'type' => 'text',
                'label' => esc_html__('Author', 'targetwp'),
                'description' => esc_html__('Enter author name', 'targetwp'),
                'parent' => $testimonial_meta_box,
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_testimonial_author_position',
                'type' => 'text',
                'label' => esc_html__('Job Position', 'targetwp'),
                'description' => esc_html__('Enter job position', 'targetwp'),
                'parent' => $testimonial_meta_box,
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_testimonial_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'targetwp'),
                'description' => esc_html__('Enter testimonial text', 'targetwp'),
                'parent' => $testimonial_meta_box,
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_testimonials');

}