<?php

if(!function_exists('target_qodef_map_masonry_gallery')) {

    function target_qodef_map_masonry_gallery()
    {

        $masonry_gallery_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('masonry-gallery'),
                'title' => esc_html__('Masonry Gallery General', 'targetwp'),
                'name' => 'masonry_gallery_meta'
            )
        );

        target_qodef_create_meta_box_field(array(
            'name'        	=> 'qodef_masonry_gallery_item_title_tag',
            'type'        	=> 'select',
            'label'       	=> esc_html__('Title Tag', 'targetwp'),
            'default_value'	=> 'h5',
            'description' 	=> '',
            'options'		=> array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'parent'      	=> $masonry_gallery_meta_box,
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_item_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'targetwp'),
                'parent' => $masonry_gallery_meta_box
            )
        );
        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_item_link',
                'type' => 'text',
                'label' => esc_html__('Link', 'targetwp'),
                'parent' => $masonry_gallery_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_item_link_target',
                'type' => 'select',
                'default_value' => '_self',
                'label' => esc_html__('Link target', 'targetwp'),
                'parent' => $masonry_gallery_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'targetwp'),
                    '_blank' => esc_html__('Blank', 'targetwp')
                )
            )
        );

        target_qodef_add_admin_section_title(array(
            'name' => 'masonry_gallery_section_style_title',
            'parent' => $masonry_gallery_meta_box,
            'title' => esc_html__('Masonry Gallery Item Style', 'targetwp')
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_item_size',
                'type' => 'select',
                'default_value' => 'square-small',
                'label' => esc_html__('Size', 'targetwp'),
                'parent' => $masonry_gallery_meta_box,
                'options' => array(
                    'square-small' => esc_html__('Square Small', 'targetwp'),
                    'square-big' => esc_html__('Square Big', 'targetwp'),
                    'rectangle-portrait' => esc_html__('Rectangle Portrait', 'targetwp'),
                    'rectangle-landscape' => esc_html__('Rectangle Landscape', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_item_type',
                'type' => 'select',
                'default_value' => 'with-button',
                'label' => esc_html__('Type', 'targetwp'),
                'parent' => $masonry_gallery_meta_box,
                'options' => array(
                    'standard' => esc_html__('Standard', 'targetwp'),
                    'with-button' => esc_html__('With Button', 'targetwp'),
                    'simple' => esc_html__('Simple', 'targetwp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'with-button' => '#qodef_masonry_gallery_icon_container',
                        'simple' => '#qodef_masonry_gallery_item_button_type_container',
                        'standard' => '#qodef_masonry_gallery_item_button_type_container, #qodef_masonry_gallery_icon_container'
                    ),
                    'show' => array(
                        'with-button' => '#qodef_masonry_gallery_item_button_type_container',
                        'simple' => '#qodef_masonry_gallery_icon_container',
                        'standard' => ''
                    )
                )
            )
        );

        $masonry_gallery_item_button_type_container = target_qodef_add_admin_container_no_style(array(
            'name' => 'masonry_gallery_item_button_type_container',
            'parent' => $masonry_gallery_meta_box,
            'hidden_property' => 'qodef_masonry_gallery_item_type',
            'hidden_values' => array('standard', 'simple')
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_masonry_gallery_button_label',
                'type' => 'text',
                'label' => esc_html__('Button Label', 'targetwp'),
                'parent' => $masonry_gallery_item_button_type_container
            )
        );

        $masonry_gallery_item_icon_container = target_qodef_add_admin_container_no_style(array(
            'name' => 'masonry_gallery_icon_container',
            'parent' => $masonry_gallery_meta_box,
            'hidden_property' => 'qodef_masonry_gallery_item_type',
            'hidden_values' => array('standard', 'with-button')
        ));

        TargetQodefIconCollections::get_instance()->getMetaBoxOrOptionParamsArray($masonry_gallery_item_icon_container, 'qodef_masonry_gallery_item_icon', 'font_awesome', '', esc_html__('Icon', 'targetwp'), 'meta-box');
    }

    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_masonry_gallery');
}