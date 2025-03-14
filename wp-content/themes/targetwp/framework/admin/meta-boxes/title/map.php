<?php

if(!function_exists('target_qodef_map_title')) {
    function target_qodef_map_title()
    {

        $title_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Title', 'targetwp'),
                'name' => 'title_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'targetwp'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'targetwp'),
                'parent' => $title_meta_box,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "#qodef_qodef_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "#qodef_qodef_show_title_area_meta_container",
                        "no" => "",
                        "yes" => "#qodef_qodef_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = target_qodef_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'qodef_show_title_area_meta_container',
                'hidden_property' => 'qodef_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'targetwp'),
                'description' => esc_html__('Choose title type', 'targetwp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard', 'targetwp'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'targetwp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#qodef_qodef_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#qodef_qodef_title_area_type_meta_container",
                        "standard" => "#qodef_qodef_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = target_qodef_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'qodef_title_area_type_meta_container',
                'hidden_property' => 'qodef_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'targetwp'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'targetwp'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                ),
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'targetwp'),
                'description' => esc_html__('Choose an animation for Title Area', 'targetwp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' =>esc_html__( 'No Animation', 'targetwp'),
                    'right-left' =>esc_html__( 'Text right to left', 'targetwp'),
                    'left-right' =>esc_html__( 'Text left to right', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'targetwp'),
                'description' => esc_html__('Specify title vertical alignment', 'targetwp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header', 'targetwp'),
                    'window_top' => esc_html__('From Window Top' ,'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'targetwp'),
                'description' => esc_html__('Specify title horizontal alignment', 'targetwp'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left', 'targetwp'),
                    'center' => esc_html__('Center', 'targetwp'),
                    'right' =>esc_html__( 'Right', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'targetwp'),
                'description' => esc_html__('Choose a color for title text', 'targetwp'),
                'parent' => $show_title_area_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'targetwp'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'targetwp'),
                'parent' => $show_title_area_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'targetwp'),
                'description' => esc_html__('Choose a background color for Title Area', 'targetwp'),
                'parent' => $show_title_area_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'targetwp'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'targetwp'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#qodef_qodef_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = target_qodef_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'qodef_hide_background_image_meta_container',
                'hidden_property' => 'qodef_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'targetwp'),
                'description' => esc_html__('Choose an Image for Title Area', 'targetwp'),
                'parent' => $hide_background_image_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'targetwp'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'targetwp'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                        "no" => "#qodef_qodef_title_area_background_image_responsive_meta_container, #qodef_qodef_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = target_qodef_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'qodef_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'qodef_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'targetwp'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'targetwp'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'targetwp'),
            'description' => esc_html__('Set a height for Title Area', 'targetwp'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'targetwp'),
            'description' => esc_html__('Enter your subtitle text', 'targetwp'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'targetwp'),
                'description' => esc_html__('Choose a color for subtitle text', 'targetwp'),
                'parent' => $show_title_area_meta_container
            )
        );
        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_separator_color_meta',
                'type' => 'color',
                'label' => esc_html__('Separator Color', 'targetwp'),
                'description' => esc_html__('Choose a color for separator', 'targetwp'),
                'parent' => $show_title_area_meta_container
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_title');

}