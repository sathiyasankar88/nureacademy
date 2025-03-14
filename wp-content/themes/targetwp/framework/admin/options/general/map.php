<?php

if ( ! function_exists('target_qodef_general_options_map') ) {
    /**
     * General options page
     */
    function target_qodef_general_options_map() {

        target_qodef_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'targetwp'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = target_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style' , 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'targetwp'),
                'description'   => esc_html__('Choose a default Google font for your site', 'targetwp'),
                'parent' => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'targetwp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = target_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'targetwp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'targetwp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'targetwp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'targetwp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'targetwp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'targetwp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'targetwp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'targetwp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'targetwp'),
                'description'   => esc_html__('Choose additional Google font for your site', 'targetwp'),
                'parent'        => $additional_google_fonts_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'targetwp'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'targetwp'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100'       => esc_html__('100 Thin', 'targetwp'),
                    '100italic' => esc_html__('100 Thin Italic', 'targetwp'),
                    '200'       => esc_html__('200 Extra-Light', 'targetwp'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'targetwp'),
                    '300'       => esc_html__('300 Light', 'targetwp'),
                    '300italic' => esc_html__('300 Light Italic', 'targetwp'),
                    '400'       => esc_html__('400 Regular', 'targetwp'),
                    '400italic' => esc_html__('400 Regular Italic', 'targetwp'),
                    '500'       => esc_html__('500 Medium', 'targetwp'),
                    '500italic' => esc_html__('500 Medium Italic', 'targetwp'),
                    '600'       => esc_html__('600 Semi-Bold', 'targetwp'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'targetwp'),
                    '700'       => esc_html__('700 Bold', 'targetwp'),
                    '700italic' => esc_html__('700 Bold Italic', 'targetwp'),
                    '800'       => esc_html__('800 Extra-Bold', 'targetwp'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'targetwp'),
                    '900'       => esc_html__('900 Ultra-Bold', 'targetwp'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'targetwp')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'targetwp'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'targetwp'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'targetwp'),
                    'latin-ext' => esc_html__('Latin Extended', 'targetwp'),
                    'cyrillic' => esc_html__('Cyrillic', 'targetwp'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'targetwp'),
                    'greek' => esc_html__('Greek', 'targetwp'),
                    'greek-ext' => esc_html__('Greek Extended', 'targetwp'),
                    'vietnamese' => esc_html__('Vietnamese', 'targetwp')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'targetwp'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #1cbefc', 'targetwp'),
                'parent'        => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'second_color',
                'type'          => 'color',
                'label'         => esc_html__('Second Main Color', 'targetwp'),
                'description'   => esc_html__('Choose the second most dominant theme color. Default color is #5ae4b3', 'targetwp'),
                'parent'        => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'targetwp'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'targetwp'),
                'parent'        => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'targetwp'),
                'description'   =>esc_html__( 'Choose the color users see when selecting text', 'targetwp'),
                'parent'        => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'targetwp'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_boxed_container"
                )
            )
        );

        $boxed_container = target_qodef_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'targetwp'),
                'description'   => esc_html__('Choose the page background color outside box.', 'targetwp'),
                'parent'        => $boxed_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'targetwp'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'targetwp'),
                'parent'        => $boxed_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Pattern', 'targetwp'),
                'description'   => esc_html__('Choose an image to be used as background pattern', 'targetwp'),
                'parent'        => $boxed_container
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'targetwp'),
                'description'   => esc_html__('Choose background image attachment', 'targetwp'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => 'Fixed',
                    'scroll'    => 'Scroll'
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'targetwp'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to Default Template and rows set to In Grid)', 'targetwp'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => "1100px - default",
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'targetwp'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'targetwp'),
                'parent'        => $panel_design_style
            )
        );

        target_qodef_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'targetwp'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'targetwp'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = target_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings' , 'targetwp'),
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'targetwp'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'targetwp'),
                'parent'        => $panel_settings
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'targetwp'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'targetwp'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_page_transitions_container, #qodef_smooth_pt_spinner_gradient_container"
                )
            )
        );

        $page_transitions_container = target_qodef_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'targetwp'),
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = target_qodef_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'targetwp'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'targetwp'),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = target_qodef_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        target_qodef_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'targetwp'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "target" => esc_html__("Target", "targetwp"),
                "pulse" => esc_html__("Pulse", "targetwp"),
                "double_pulse" => esc_html__("Double Pulse", "targetwp"),
                "cube" => esc_html__("Cube", "targetwp"),
                "rotating_cubes" => esc_html__("Rotating Cubes", "targetwp"),
                "stripes" => esc_html__("Stripes", "targetwp"),
                "wave" =>esc_html__( "Wave", "targetwp"),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", "targetwp"),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", "targetwp"),
                "atom" => esc_html__("Atom", "targetwp"),
                "clock" => esc_html__("Clock", "targetwp"),
                "mitosis" => esc_html__("Mitosis", "targetwp"),
                "lines" => esc_html__("Lines", "targetwp"),
                "fussion" => esc_html__("Fussion", "targetwp"),
                "wave_circles" => esc_html__("Wave Circles", "targetwp"),
                "pulse_circles" => esc_html__("Pulse Circles", "targetwp")
            ),
            'args'          => array(
                "dependence"             => true,
                'show'        => array(
                    "target"                 => "#qodef_smooth_pt_spinner_gradient_container",
                    "pulse"                 => "",
                    "double_pulse"          => "",
                    "cube"                  => "",
                    "rotating_cubes"        => "",
                    "stripes"               => "",
                    "wave"                  => "",
                    "two_rotating_circles"  => "",
                    "five_rotating_circles" => "",
                    "atom"                  => "",
                    "clock"                 => "",
                    "mitosis"               => "",
                    "lines"                 => "",
                    "fussion"               => "",
                    "wave_circles"          => "",
                    "pulse_circles"         => ""
                ),
                'hide'        => array(
                    ""                 => "#qodef_smooth_pt_spinner_gradient_container",
                    "pulse"                 => "#qodef_smooth_pt_spinner_gradient_container",
                    "double_pulse"          => "#qodef_smooth_pt_spinner_gradient_container",
                    "cube"                  => "#qodef_smooth_pt_spinner_gradient_container",
                    "rotating_cubes"        => "#qodef_smooth_pt_spinner_gradient_container",
                    "stripes"               => "#qodef_smooth_pt_spinner_gradient_container",
                    "wave"                  => "#qodef_smooth_pt_spinner_gradient_container",
                    "two_rotating_circles"  => "#qodef_smooth_pt_spinner_gradient_container",
                    "five_rotating_circles" => "#qodef_smooth_pt_spinner_gradient_container",
                    "atom"                  => "#qodef_smooth_pt_spinner_gradient_container",
                    "clock"                 => "#qodef_smooth_pt_spinner_gradient_container",
                    "mitosis"               => "#qodef_smooth_pt_spinner_gradient_container",
                    "lines"                 => "#qodef_smooth_pt_spinner_gradient_container",
                    "fussion"               => "#qodef_smooth_pt_spinner_gradient_container",
                    "wave_circles"          => "#qodef_smooth_pt_spinner_gradient_container",
                    "pulse_circles"         => "#qodef_smooth_pt_spinner_gradient_container"
                )
            )
        ));

        target_qodef_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'targetwp'),
            'parent'        => $row_pt_spinner_animation
        ));

        $smooth_pt_spinner_gradient_container = target_qodef_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'smooth_pt_spinner_gradient_container',
                'hidden_property' => 'smooth_pt_spinner_type',
                'hidden_value'    => '',
                'hidden_values'   =>array(
                    "",
                    "pulse",
                    "double_pulse",
                    "cube",
                    "rotating_cubes",
                    "stripes",
                    "wave",
                    "two_rotating_circles",
                    "five_rotating_circles",
                    "atom",
                    "clock",
                    "mitosis",
                    "lines",
                    "fussion",
                    "wave_circles",
                    "pulse_circles"
                )
            )
        );

        $group_pt_spinner_additional_color = target_qodef_add_admin_group(array(
            'name'          => 'group_pt_spinner_additional_color',
            'title'         => esc_html__('Additional Color', 'targetwp'),
            'description'   => esc_html__('Define additional colors for Color Spinner', 'targetwp'),
            'parent'        => $smooth_pt_spinner_gradient_container
        ));

        $row_pt_spinner_additional_color = target_qodef_add_admin_row(array(
            'name'      => 'row_pt_spinner_additional_color',
            'parent'    => $group_pt_spinner_additional_color
        ));

        target_qodef_add_admin_field(
            array(
                'type'          => 'colorsimple',
                'name'          => 'smooth_pt_spinner_add_color',
                'default_value' => '',
                'label'         => esc_html__('Spinner Additional Color', 'targetwp'),
                'parent'        => $row_pt_spinner_additional_color,
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'targetwp'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'targetwp'),
                'parent'        => $panel_settings
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'targetwp'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'targetwp'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = target_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'targetwp'),
                'description'   => esc_html__('Enter your custom CSS here', 'targetwp'),
                'parent'        => $panel_custom_code
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'targetwp'),
                'description'   => esc_html__('Enter your custom Javascript here', 'targetwp'),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_api = target_qodef_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API' ,'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'targetwp'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'targetwp'),
                'parent'      => $panel_google_api
            )
        );

    }

    add_action( 'target_qodef_options_map', 'target_qodef_general_options_map', 1);

}