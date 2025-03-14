<?php

//Header

if(!function_exists('target_qodef_map_header')) {
    function target_qodef_map_header()
    {

        $header_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Header', 'targetwp'),
                'name' => 'header_meta'
            )
        );

        $temp_holder_show = '';
        $temp_holder_hide = '';
        $temp_array_standard = array();
        $temp_array_block = array();
        $temp_array_vertical = array();
        $temp_array_full_screen = array();
        $temp_array_behaviour = array();

        $header = target_qodef_options()->getOptionValue('header_type');

        switch ($header) {

            case 'header-standard':
                $temp_holder_show = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_behaviour_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_vertical_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_block_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-block', 'header-vertical', 'header-full-screen')
                );
                $temp_array_block = array(
                    'hidden_values' => array('', 'header-standard', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-block', 'header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-block', 'header-standard', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-block', 'header-vertical')
                );
                break;

            case 'header-block':
                $temp_holder_show = '#qodef_qodef_header_block_type_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_vertical_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_containerr';

                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-block', 'header-vertical', 'header-full-screen')
                );
                $temp_array_block = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-standard', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-block', 'header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-block', 'header-standard', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('', 'header-block', 'header-vertical')
                );
                break;

            case 'header-vertical':
                $temp_holder_show = '#qodef_qodef_header_vertical_type_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_block_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-block', 'header-vertical', 'header-full-screen')
                );
                $temp_array_block = array(
                    'hidden_values' => array('', 'header-standard', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-standard', 'header-block', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-block', 'header-vertical')
                );

                $temp_array_behaviour = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('', 'header-block', 'header-vertical')
                );
                break;
            case 'header-full-screen':
                $temp_holder_show = '#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container';
                $temp_holder_hide = '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_block_type_meta_container, #qodef_qodef_header_vertical_type_meta_container';
                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-block', 'header-vertical', 'header-full-screen')
                );
                $temp_array_block = array(
                    'hidden_values' => array('', 'header-standard', 'header-vertical', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-block', 'header-standard', 'header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-block', 'header-vertical')
                );
                $temp_array_behaviour = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-block', 'header-vertical')
                );
                break;
        }


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_header_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Choose Header Type', 'targetwp'),
                'description' => esc_html__('Select header type layout', 'targetwp'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => 'Default',
                    'header-standard' => esc_html__('Standard Header Layout', 'targetwp'),
                    'header-block' => esc_html__('Block Header Layout', 'targetwp'),
                    'header-vertical' => esc_html__('Vertical Header Layout', 'targetwp'),
                    'header-full-screen' => esc_html__('Full Screen Header Layout', 'targetwp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => $temp_holder_hide,
                        'header-standard' => '#qodef_qodef_header_vertical_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_block_type_meta_container',
                        'header-block' => '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_vertical_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        'header-vertical' => '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_block_type_meta_container, #qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        'header-full-screen' => '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_block_type_meta_container, #qodef_qodef_header_vertical_type_meta_container'
                    ),
                    "show" => array(
                        "" => $temp_holder_show,
                        "header-standard" => '#qodef_qodef_header_standard_type_meta_container, #qodef_qodef_header_behaviour_meta_container',
                        "header-block" => '#qodef_qodef_header_block_type_meta_container',
                        "header-vertical" => '#qodef_qodef_header_vertical_type_meta_container',
                        "header-full-screen" => '#qodef_qodef_header_full_screen_type_meta_container, #qodef_qodef_header_behaviour_meta_container'
                    )
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_header_style_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Skin', 'targetwp'),
                'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'targetwp'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => '',
                    'light-header' => esc_html__('Light', 'targetwp'),
                    'dark-header' => esc_html__('Dark', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'parent' => $header_meta_box,
                'type' => 'select',
                'name' => 'qodef_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label' => esc_html__('Enable Header Style on Scroll', 'targetwp'),
                'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'targetwp'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp')
                )
            )
        );


        $header_standard_type_meta_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_standard_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_standard
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'targetwp'),
                'description' => esc_html__('Choose a background color for header area', 'targetwp'),
                'parent' => $header_standard_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'targetwp'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_border_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'targetwp'),
                'description' => esc_html__('Choose a border bottom color for header area', 'targetwp'),
                'parent' => $header_standard_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_border_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Border Transparency', 'targetwp'),
                'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        $header_in_grid_global_option_standard = target_qodef_options()->getOptionValue('menu_area_in_grid_header_standard_yesno');

        $header_in_grid_standard_default_dependency = array(
            '' => '#qodef_header_in_grid_standard_container'
        );

        $header_in_grid_standard_show_array = array(
            'yes' => '#qodef_header_in_grid_standard_container'
        );

        $header_in_grid_standard_hide_array = array(
            'no' => '#qodef_header_in_grid_standard_container'
        );

        if ($header_in_grid_global_option_standard && $header_in_grid_global_option_standard === 'yes') {
            $header_in_grid_standard_show_array = array_merge($header_in_grid_standard_show_array, $header_in_grid_standard_default_dependency);
            $temp_in_grid_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $header_in_grid_standard_hide_array = array_merge($header_in_grid_standard_hide_array, $header_in_grid_standard_default_dependency);
            $temp_in_grid_no = array(
                'hidden_values' => array('', 'no')
            );
        }


        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_menu_area_in_grid_header_standard_meta',
            'type' => 'select',
            'label' =>esc_html__( 'Header in grid', 'targetwp'),
            'description' => esc_html__('Set header content to be in grid', 'targetwp'),
            'parent' => $header_standard_type_meta_container,
            'default_value' => '',
            'options' => array(
                '' =>esc_html__( 'Default', 'targetwp'),
                'yes' => esc_html__('Yes', 'targetwp'),
                'no' => esc_html__('No', 'targetwp')
            ),
            'args' => array(
                "dependence" => true,
                'show' => $header_in_grid_standard_show_array,
                'hide' => $header_in_grid_standard_hide_array
            )
        ));

        $header_in_grid_standard_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'name' => 'header_in_grid_standard_container',
                    'parent' => $header_standard_type_meta_container,
                    'hidden_property' => 'qodef_menu_area_in_grid_header_standard_meta'
                ),
                $temp_in_grid_no
            )
        );


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_grid_background_color_header_standard_meta',
                'type' => 'color',
                'default_value' => '',
                'label' => esc_html__('Grid Background color', 'targetwp'),
                'description' => esc_html__('Set grid background color for header area', 'targetwp'),
                'parent' => $header_in_grid_standard_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_grid_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Grid Background Transparency', 'targetwp'),
                'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_in_grid_standard_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        $header_block_type_meta_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_block_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_block
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_block_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'targetwp'),
                'description' => esc_html__('Choose a background color for header area', 'targetwp'),
                'parent' => $header_block_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_block_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'targetwp'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_block_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        $header_vertical_type_meta_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_vertical_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta'
                ),
                $temp_array_vertical
            )
        );

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_vertical_header_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'targetwp'),
            'description' => esc_html__('Set background color for vertical menu', 'targetwp'),
            'parent' => $header_vertical_type_meta_container
        ));

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_vertical_header_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Background Transparency', 'targetwp'),
            'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'targetwp'),
            'parent' => $header_vertical_type_meta_container,
            'args' => array(
                'col_width' => 1
            )
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_vertical_header_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'targetwp'),
                'description' => esc_html__('Set background image for vertical menu', 'targetwp'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Background Image', 'targetwp'),
                'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'targetwp'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        $header_full_screen_type_meta_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_full_screen_type_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_full_screen
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'targetwp'),
                'description' => esc_html__('Choose a background color for Full Screen header area', 'targetwp'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_background_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Background Transparency', 'targetwp'),
                'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_border_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Border Color', 'targetwp'),
                'description' => esc_html__('Choose a border bottom color for Full Screen header area', 'targetwp'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_border_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Border Transparency', 'targetwp'),
                'description' => esc_html__('Choose a transparency for the Full Screen header border bottom color (0 = fully transparent, 1 = opaque)', 'targetwp'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_menu_area_in_grid_header_full_screen_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'targetwp'),
                'description' => esc_html__('Set header content to be in grid', 'targetwp'),
                'parent' => $header_full_screen_type_meta_container,
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );


        $header_behaviour_meta_container = target_qodef_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'qodef_header_behaviour_meta_container',
                    'hidden_property' => 'qodef_header_type_meta',

                ),
                $temp_array_behaviour
            )
        );
        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_scroll_amount_for_sticky_meta',
                'type' => 'text',
                'label' => esc_html__('Scroll amount for sticky header appearance', 'targetwp'),
                'description' => esc_html__('Define scroll amount for sticky header appearance', 'targetwp'),
                'parent' => $header_behaviour_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                ),
                'hidden_property' => 'qodef_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );
        target_qodef_create_meta_box_field(
            array(
                'parent' => $header_behaviour_meta_container,
                'type' => 'select',
                'name' => 'qodef_header_behaviour_meta',
                'default_value' => '',
                'label' => esc_html__('Choose Header behaviour', 'targetwp'),
                'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'targetwp'),
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'targetwp'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'targetwp'),
                    'fixed-on-scroll' => esc_html__('Fixed on scroll', 'targetwp')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        '' => '#qodef_qodef_sticky_header_container,',
                        'sticky-header-on-scroll-up' => '#qodef_qodef_fixed_header_container',
                        'sticky-header-on-scroll-down-up' => '#qodef_qodef_fixed_header_container',
                        'fixed-on-scroll' => '#qodef_qodef_sticky_header_container'
                    ),
                    'show' => array(
                        '' => '',
                        'sticky-header-on-scroll-up' => '#qodef_qodef_sticky_header_container',
                        'sticky-header-on-scroll-down-up' => '#qodef_qodef_sticky_header_container',
                        'fixed-on-scroll' => '#qodef_qodef_fixed_header_container'
                    )
                )
            )
        );

        $fixed_header_container = target_qodef_add_admin_container(
            array(
                'parent' => $header_behaviour_meta_container,
                'name' => 'qodef_fixed_header_container',
                'hidden_property' => 'qodef_header_behaviour_meta',
                'hidden_values' => array('', 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
            )
        );

        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_animate_fixed_header_height_on_scroll_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__('Animate fixed header height on scroll', 'targetwp'),
            'description' => esc_html__('Enabling this option will trigger fixed header height animation on scroll', 'targetwp'),
            'parent' => $fixed_header_container,
            'options' => array(
                '' => esc_html__('Default', 'targetwp'),
                'yes' => esc_html__('Yes', 'targetwp'),
                'no' => esc_html__('No', 'targetwp')
            ),
        ));

        $sticky_header_container = target_qodef_add_admin_container(
            array(
                'parent' => $header_behaviour_meta_container,
                'name' => 'qodef_sticky_header_container',
                'hidden_property' => 'qodef_header_behaviour_meta',
                'hidden_values' => array('', 'fixed-on-scroll')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_sticky_header_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Sticky Header in grid', 'targetwp'),
                'description' => esc_html__('Set header content to be in grid', 'targetwp'),
                'parent' => $sticky_header_container,
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                ),

            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_disable_header_widget_area_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Header Widget Area', 'targetwp'),
                'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'targetwp'),
                'parent' => $header_meta_box
            )
        );

        $target_qodef_custom_sidebars = target_qodef_get_custom_sidebars();
        if(count($target_qodef_custom_sidebars) > 0) {
            target_qodef_create_meta_box_field(array(
                'name' => 'qodef_custom_header_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Custom Widget Area in Header', 'targetwp'),
                'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'targetwp'),
                'parent' => $header_meta_box,
                'options' => $target_qodef_custom_sidebars
            ));
        }


        target_qodef_add_admin_section_title(array(
            'name' => 'top_bar_section_title',
            'parent' => $header_meta_box,
            'title' => esc_html__('Top Bar', 'targetwp')
        ));

        $top_bar_global_option = target_qodef_options()->getOptionValue('top_bar');

        $top_bar_default_dependency = array(
            '' => '#qodef_top_bar_container_no_style'
        );

        $top_bar_show_array = array(
            'yes' => '#qodef_top_bar_container_no_style'
        );

        $top_bar_hide_array = array(
            'no' => '#qodef_top_bar_container_no_style'
        );

        if ($top_bar_global_option === 'yes') {
            $top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_values' => array('', 'no')
            );
        }


        target_qodef_create_meta_box_field(array(
            'name' => 'qodef_top_bar_meta',
            'type' => 'select',
            'label' =>esc_html__( 'Enable Top Bar on This Page', 'targetwp'),
            'description' => esc_html__('Enabling this option will enable top bar on this page', 'targetwp'),
            'parent' => $header_meta_box,
            'default_value' => '',
            'options' => array(
                '' =>esc_html__( 'Default', 'targetwp'),
                'yes' => esc_html__('Yes', 'targetwp'),
                'no' => esc_html__('No', 'targetwp')
            ),
            'args' => array(
                "dependence" => true,
                'show' => $top_bar_show_array,
                'hide' => $top_bar_hide_array
            )
        ));

        $top_bar_container = target_qodef_add_admin_container_no_style(array_merge(array(
            'name' => 'top_bar_container_no_style',
            'parent' => $header_meta_box,
            'hidden_property' => 'qodef_top_bar_meta'
        ),
            $temp_top_no));


        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_top_bar_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Top Bar in grid', 'targetwp'),
                'description' => esc_html__('Enabling this option will show top bar area', 'targetwp'),
                'parent' => $top_bar_container,
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_top_bar_border_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Top Bar Border', 'targetwp'),
                'description' => esc_html__('Enabling this option will show top bar bottom border', 'targetwp'),
                'parent' => $top_bar_container,
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );

        target_qodef_add_admin_section_title(array(
            'name' => 'search_section_title',
            'parent' => $header_meta_box,
            'title' => esc_html__('Search', 'targetwp')
        ));

        $search_area_container = target_qodef_add_admin_container_no_style(
            array(
                'parent' => $header_meta_box,
                'name' => 'qodef_search_area_container',
                'hidden_property' => ''
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_search_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Search area in grid', 'targetwp'),
                'description' => esc_html__('Set search area to be in grid', 'targetwp'),
                'parent' => $search_area_container,
                'options' => array(
                    '' => esc_html__('Default', 'targetwp'),
                    'yes' => esc_html__('Yes', 'targetwp'),
                    'no' => esc_html__('No', 'targetwp')
                )
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_header');

}