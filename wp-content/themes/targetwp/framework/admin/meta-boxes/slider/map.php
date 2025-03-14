<?php

//Slider

if(!function_exists('target_qodef_map_slider')) {
    function target_qodef_map_slider()
    {

        $slider_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Background','targetwp'),
                'name' => 'slides_type'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_background_type',
                'type' => 'select',
                'default_value' => 'image',
                'label' => esc_html__('Slide Background Type','targetwp'),
                'description' => esc_html__('Do you want to upload an image or video?','targetwp'),
                'parent' => $slider_meta_box,
                'options' => array(
                    "image" => esc_html__("Image","targetwp"),
                    "video" => esc_html__("Video", "targetwp")
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "image" => "#qodef_qodef_slides_video_settings",
                        "video" => "#qodef_qodef_slides_image_settings"
                    ),
                    "show" => array(
                        "image" => "#qodef_qodef_slides_image_settings",
                        "video" => "#qodef_qodef_slides_video_settings"
                    )
                )
            )
        );


//Slide Image

        $image_meta_container = target_qodef_add_admin_container(
            array(
                'name' => 'qodef_slides_image_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'qodef_slide_background_type',
                'hidden_values' => array('video')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_image',
                'type' => 'image',
                'label' => esc_html__('Slide Image','targetwp'),
                'description' => esc_html__('Choose background image','targetwp'),
                'parent' => $image_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_overlay_image',
                'type' => 'image',
                'label' => esc_html__('Overlay Image','targetwp'),
                'description' => esc_html__('Choose overlay image (pattern) for background image','targetwp'),
                'parent' => $image_meta_container
            )
        );


//Slide Video

        $video_meta_container = target_qodef_add_admin_container(
            array(
                'name' => 'qodef_slides_video_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'qodef_slide_background_type',
                'hidden_values' => array('image')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_webm',
                'type' => 'text',
                'label' => esc_html__('Video - webm', 'targetwp'),
                'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'targetwp'),
                'parent' => $video_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_mp4',
                'type' => 'text',
                'label' =>esc_html__( 'Video - mp4', 'targetwp'),
                'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'targetwp'),
                'parent' => $video_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_ogv',
                'type' => 'text',
                'label' => esc_html__('Video - ogv', 'targetwp'),
                'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'targetwp'),
                'parent' => $video_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_image',
                'type' => 'image',
                'label' => esc_html__('Video Preview Image', 'targetwp'),
                'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'targetwp'),
                'parent' => $video_meta_container
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_overlay',
                'type' => 'yesempty',
                'default_value' => '',
                'label' => esc_html__('Video Overlay Image', 'targetwp'),
                'description' => esc_html__('Do you want to have a overlay image on video?', 'targetwp'),
                'parent' => $video_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_qodef_slide_video_overlay_container"
                )
            )
        );

        $slide_video_overlay_container = target_qodef_add_admin_container(array(
            'name' => 'qodef_slide_video_overlay_container',
            'parent' => $video_meta_container,
            'hidden_property' => 'qodef_slide_video_overlay',
            'hidden_values' => array('', 'no')
        ));

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_video_overlay_image',
                'type' => 'image',
                'label' => esc_html__('Overlay Image', 'targetwp'),
                'description' => esc_html__('Choose overlay image (pattern) for background video.', 'targetwp'),
                'parent' => $slide_video_overlay_container
            )
        );


//Slide Elements

        $elements_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Elements', 'targetwp'),
                'name' => 'qodef_slides_elements'
            )
        );

        target_qodef_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_frame',
                'title' => esc_html__('Elements Holder Frame' , 'targetwp')
            )
        );

        target_qodef_add_slide_holder_frame_scheme(
            array(
                'parent' => $elements_meta_box
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_elements_alignment',
                'type' => 'select',
                'label' => esc_html__('Elements Alignment', 'targetwp'),
                'description' => esc_html__('How elements are aligned with respect to the Holder Frame', 'targetwp'),
                'parent' => $elements_meta_box,
                'default_value' => 'center',
                'options' => array(
                    "center" => esc_html__("Center", 'targetwp'),
                    "left" => esc_html__("Left", 'targetwp'),
                    "right" => esc_html__("Right", 'targetwp'),
                    "custom" => esc_html__("Custom" , 'targetwp')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "center" => "#qodef_qodef_slide_holder_frame_height",
                        "left" => "#qodef_qodef_slide_holder_frame_height",
                        "right" => "#qodef_qodef_slide_holder_frame_height",
                        "custom" => ""
                    ),
                    "show" => array(
                        "center" => "",
                        "left" => "",
                        "right" => "",
                        "custom" => "#qodef_qodef_slide_holder_frame_height"
                    )
                )
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_in_grid',
                'type' => 'select',
                'label' => esc_html__('Holder Frame in Grid?', 'targetwp'),
                'description' => esc_html__('Whether to keep the holder frame width the same as that of the grid.', 'targetwp'),
                'parent' => $elements_meta_box,
                'default_value' => 'no',
                'options' => array(
                    "yes" => esc_html__("Yes", "targetwp"),
                    "no" => esc_html__("No", "targetwp")
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "yes" => "#qodef_qodef_slide_holder_frame_width, #qodef_qodef_holder_frame_responsive_container",
                        "no" => ""
                    ),
                    "show" => array(
                        "yes" => "",
                        "no" => "#qodef_qodef_slide_holder_frame_width, #qodef_qodef_holder_frame_responsive_container"
                    )
                )
            )
        );

        $holder_frame = target_qodef_add_admin_group(array(
            'title' => esc_html__('Holder Frame Properties', 'targetwp'),
            'description' => esc_html__('The frame is always positioned centrally on the slide. All elements are positioned and sized relatively to the holder frame. Refer to the scheme above.', 'targetwp'),
            'name' => 'qodef_holder_frame',
            'parent' => $elements_meta_box
        ));

        $row1 = target_qodef_add_admin_row(array(
            'name' => 'row1',
            'parent' => $holder_frame
        ));

        $holder_frame_width = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width',
                'type' => 'textsimple',
                'label' => esc_html__('Relative width (C/A*100)', 'targetwp'),
                'parent' => $row1,
                'hidden_property' => 'qodef_slide_holder_frame_in_grid',
                'hidden_values' => array('yes')
            )
        );

        $holder_frame_height = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_height',
                'type' => 'textsimple',
                'label' => esc_html__('Height to width ratio (D/C*100)', 'targetwp'),
                'parent' => $row1,
                'hidden_property' => 'qodef_slide_holder_elements_alignment',
                'hidden_values' => array('center', 'left', 'right')
            )
        );

        $holder_frame_responsive_container = target_qodef_add_admin_container(array(
            'name' => 'qodef_holder_frame_responsive_container',
            'parent' => $elements_meta_box,
            'hidden_property' => 'qodef_slide_holder_frame_in_grid',
            'hidden_values' => array('yes')
        ));

        $holder_frame_responsive = target_qodef_add_admin_group(array(
            'title' =>esc_html__( 'Responsive Relative Width', 'targetwp'),
            'description' => esc_html__('Enter different relative widths of the holder frame for each responsive stage. Leave blank to have the frame width scale proportionally to the screen size.', 'targetwp'),
            'name' => 'qodef_holder_frame_responsive',
            'parent' => $holder_frame_responsive_container
        ));

        $screen_widths_holder_frame = array(
            // These values must match those in qode.layout.inc, slider.php and shortcodes.js
            "mobile" => 600,
            "tabletp" => 800,
            "tabletl" => 1024,
            "laptop" => 1440
        );

        $row2 = target_qodef_add_admin_row(array(
            'name' => 'row2',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_mobile',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Mobile (up to %s px)', 'targetwp' ), $screen_widths_holder_frame["mobile"] ),
                'parent' => $row2
            )
        );

        $holder_frame_height = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_tablet_p',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__('Tablet - Portrait (%s - %s px)' , 'targetwp'),$screen_widths_holder_frame["mobile"] + 1, $screen_widths_holder_frame["tabletp"] ),
                'parent' => $row2
            )
        );

        $holder_frame_height = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_tablet_l',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__('Tablet - Landscape (%s - %s px)' , 'targetwp'), $screen_widths_holder_frame["tabletp"] + 1, $screen_widths_holder_frame["tabletl"] ),
                'parent' => $row2
            )
        );

        $row3 = target_qodef_add_admin_row(array(
            'name' => 'row3',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_laptop',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Laptop (%s - %s px)', 'targetwp' ), $screen_widths_holder_frame["tabletl"] + 1,  $screen_widths_holder_frame["laptop"]),
                'parent' => $row3
            )
        );

        $holder_frame_height = target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_slide_holder_frame_width_desktop',
                'type' => 'textsimple',
                'label' => sprintf( esc_html__( 'Desktop (above %s px)', 'targetwp' ), $screen_widths_holder_frame["laptop"] ),
                'parent' => $row3
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'qodef_slide_elements_default_width',
                'label' => esc_html__('Default Screen Width in px (A)', 'targetwp'),
                'description' => esc_html__('All elements marked as responsive scale at the ratio of the actual screen width to this screen width. Default is 1920px.', 'targetwp'),
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'select',
                'name' => 'qodef_slide_elements_default_animation',
                'default_value' => 'none',
                'label' => esc_html__('Default Elements Animation', 'targetwp'),
                'description' => esc_html__('This animation will be applied to all elements except those with their own animation settings.', 'targetwp'),
                'options' => array(
                    "none" => esc_html__("No Animation", "targetwp"),
                    "flip" => esc_html__("Flip", "targetwp"),
                    "spin" => esc_html__("Spin", "targetwp"),
                    "fade" => esc_html__("Fade In", "targetwp"),
                    "from_bottom" => esc_html__("Fly In From Bottom", "targetwp"),
                    "from_top" => esc_html__("Fly In From Top", "targetwp"),
                    "from_left" => esc_html__("Fly In From Left", "targetwp"),
                    "from_right" => esc_html__("Fly In From Right", "targetwp")
                )
            )
        );

        target_qodef_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_list',
                'title' => esc_html__('Elements' , 'targetwp')
            )
        );

        $slide_elements = target_qodef_add_slide_elements_framework(
            array(
                'parent' => $elements_meta_box,
                'name' => 'qodef_slides_elements_holder'
            )
        );

//Slide Behaviour

        $behaviours_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Behaviours', 'targetwp'),
                'name' => 'qodef_slides_behaviour_settings'
            )
        );

        target_qodef_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'qodef_header_styling_title',
                'title' => esc_html__('Header' , 'targetwp')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'parent' => $behaviours_meta_box,
                'type' => 'selectblank',
                'name' => 'qodef_slide_header_style',
                'default_value' => '',
                'label' => esc_html__('Header Style', 'targetwp'),
                'description' =>esc_html__( 'Header style will be applied when this slide is in focus', 'targetwp'),
                'options' => array(
                    "light" => esc_html__("Light", "targetwp"),
                    "dark" =>esc_html__( "Dark" ,"targetwp")
                )
            )
        );

        target_qodef_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'qodef_image_animation_title',
                'title' => esc_html__('Slide Image Animation' , 'targetwp')
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_enable_image_animation',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Image Animation', 'targetwp'),
                'description' => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'targetwp'),
                'parent' => $behaviours_meta_box,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#qodef_qodef_enable_image_animation_container"
                )
            )
        );

        $enable_image_animation_container = target_qodef_add_admin_container(array(
            'name' => 'qodef_enable_image_animation_container',
            'parent' => $behaviours_meta_box,
            'hidden_property' => 'qodef_enable_image_animation',
            'hidden_value' => 'no'
        ));

        target_qodef_create_meta_box_field(
            array(
                'parent' => $enable_image_animation_container,
                'type' => 'select',
                'name' => 'qodef_enable_image_animation_type',
                'default_value' => 'zoom_center',
                'label' => esc_html__('Animation Type', 'targetwp'),
                'options' => array(
                    "zoom_center" => esc_html__("Zoom In Center", "targetwp"),
                    "zoom_top_left" => esc_html__("Zoom In to Top Left", "targetwp"),
                    "zoom_top_right" => esc_html__("Zoom In to Top Right", "targetwp"),
                    "zoom_bottom_left" =>esc_html__( "Zoom In to Bottom Left", "targetwp"),
                    "zoom_bottom_right" => esc_html__("Zoom In to Bottom Right" ,"targetwp")
                )
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_slider');

}