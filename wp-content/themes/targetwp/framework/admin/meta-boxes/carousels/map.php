<?php

//Carousels

if(!function_exists('target_qodef_map_carousel')) {
    function target_qodef_map_carousel()
    {

        $carousel_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'targetwp'),
                'name' => 'carousel_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_carousel_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Image', 'targetwp'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'targetwp'),
                'parent' => $carousel_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_carousel_hover_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Hover Image', 'targetwp'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'targetwp'),
                'parent' => $carousel_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_carousel_item_link',
                'type' => 'text',
                'label' => esc_html__('Link', 'targetwp'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'targetwp'),
                'parent' => $carousel_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_carousel_item_target',
                'type' => 'selectblank',
                'label' => esc_html__('Target', 'targetwp'),
                'description' => esc_html__('Specify where to open the linked document', 'targetwp'),
                'parent' => $carousel_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'targetwp'),
                    '_blank' => esc_html__('Blank', 'targetwp')
                )
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_carousel');

}