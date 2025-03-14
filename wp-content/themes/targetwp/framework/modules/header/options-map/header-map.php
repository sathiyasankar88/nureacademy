<?php

if ( ! function_exists('target_qodef_header_options_map') ) {

	function target_qodef_header_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'targetwp'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = target_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'targetwp'),
				'description' => esc_html__('Select the type of header you would like to use', 'targetwp'),
				'options' => array(
					'header-standard' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-standard.png'
					),
                    'header-block' => array(
                        'image' => QODE_ASSETS_ROOT . '/img/header-block.png'
                    ),
                    'header-vertical' => array(
	                    'image' => QODE_ASSETS_ROOT . '/img/header-vertical.png'
                    ),
					'header-full-screen' => array(
						'image' => QODE_ASSETS_ROOT . '/img/header-fullscreen.png'
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu',
						'header-block' => '#qodef_panel_header_block, #qodef_panel_main_menu',
                        'header-vertical' => '#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu',
						'header-full-screen' => '#qodef_panel_header_full_screen,#qodef_header_behaviour,#qodef_panel_sticky_header,#qodef_panel_fixed_header'
					),
					'hide' => array(
						'header-standard' => '#qodef_panel_header_full_screen,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu, #qodef_panel_header_block',
						'header-block' => '#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header, #qodef_panel_header_vertical,#qodef_panel_vertical_main_menu, #qodef_panel_header_full_screen,#qodef_header_behaviour,#qodef_panel_sticky_header,#qodef_panel_fixed_header',
                        'header-vertical' => '#qodef_panel_header_full_screen,#qodef_panel_header_standard,#qodef_header_behaviour,#qodef_panel_fixed_header,#qodef_panel_sticky_header,#qodef_panel_main_menu, #qodef_panel_header_block',
						'header-full-screen' => '#qodef_panel_header_standard,#qodef_panel_main_menu,#qodef_panel_header_vertical,#qodef_panel_vertical_main_menu, #qodef_panel_header_block'
					)
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour', 'targetwp'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'targetwp'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'targetwp'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'targetwp'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll', 'targetwp')
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical', 'header-block'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_sticky_header',
						'fixed-on-scroll' => '#qodef_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#qodef_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#qodef_panel_fixed_header',
						'fixed-on-scroll' => '#qodef_panel_sticky_header',
					)
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'targetwp'),
				'description' => esc_html__('Enabling this option will show top bar area', 'targetwp'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_container"
				)
			)
		);

		$top_bar_container = target_qodef_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		target_qodef_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label' => esc_html__('Choose top bar layout', 'targetwp'),
				'description' => esc_html__('Select the layout for top bar', 'targetwp'),
				'options' => array(
					'two-columns' => esc_html__('Two columns', 'targetwp'),
					'three-columns' => esc_html__('Three columns', 'targetwp')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#qodef_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#qodef_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = target_qodef_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

        $top_bar_layout_container_two = target_qodef_add_admin_container(array(
            'name' => 'top_bar_layout_container_two',
            'parent' => $top_bar_container,
            'hidden_property' => 'top_bar_layout',
            'hidden_value' => '',
            'hidden_values' => array("three-columns"),
        ));

		target_qodef_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths', 'targetwp'),
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

        target_qodef_add_admin_field(
            array(
                'parent' => $top_bar_layout_container_two,
                'type' => 'select',
                'name' => 'top_bar_two_column_widths',
                'default_value' => '75-25',
                'label' => esc_html__('Choose column widths', 'targetwp'),
                'description' => '',
                'options' => array(
                    '50-50' => '50% - 50%',
                    '75-25' => '75% - 25%',
                    '25-75' => '25% - 75%'
                )
            )
        );

		target_qodef_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Top Bar in grid', 'targetwp'),
				'description' => esc_html__('Set top bar content to be in grid', 'targetwp'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_top_bar_in_grid_container"
				)
			)
		);



		$top_bar_in_grid_container = target_qodef_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'targetwp'),
			'description' => esc_html__('Set grid background color for top bar', 'targetwp'),
			'parent' => $top_bar_in_grid_container
		));


		target_qodef_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency', 'targetwp'),
			'description' => esc_html__('Set grid background transparency for top bar', 'targetwp'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

        target_qodef_add_admin_field(
            array(
                'name' => 'top_bar_border',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Top Bar Border', 'targetwp'),
                'description' => esc_html__('Enable gradient bottom border', 'targetwp'),
                'parent' => $top_bar_container
            )
        );

		target_qodef_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'targetwp'),
			'description' => esc_html__('Set background color for top bar', 'targetwp'),
			'parent' => $top_bar_layout_container
		));

		target_qodef_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'targetwp'),
			'description' => esc_html__('Set background transparency for top bar', 'targetwp'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		target_qodef_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height', 'targetwp'),
			'description' => esc_html__('Enter top bar height (Default is 40px)', 'targetwp'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'targetwp'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'targetwp'),
				'options' => array(
					'' => '',
					'light-header' => 'Light',
					'dark-header' => 'Dark'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll', 'targetwp'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'targetwp'),
			)
		);


		$panel_header_standard = target_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'targetwp'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-vertical',
					'header-block',
					'header-full-screen'
				)
			)
		);

		target_qodef_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid', 'targetwp'),
				'description' => esc_html__('Set header content to be in grid', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = target_qodef_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid Background color', 'targetwp'),
				'description' => esc_html__('Set grid background color for header area', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid background transparency', 'targetwp'),
				'description' => esc_html__('Set grid background transparency for header', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color', 'targetwp'),
				'description' => esc_html__('Set background color for header', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'targetwp'),
				'description' => esc_html__('Set background transparency for header','targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'color',
                'name' => 'menu_area_border_color_header_standard',
                'default_value' => '',
                'label' => esc_html__('Border color', 'targetwp'),
                'description' => esc_html__('Set border bottom color for header', 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_standard,
                'type' => 'text',
                'name' => 'menu_area_border_transparency_header_standard',
                'default_value' => '',
                'label' => esc_html__('Border transparency', 'targetwp'),
                'description' => esc_html__('Set border bottom transparency for header','targetwp'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'targetwp'),
				'description' => esc_html__('Enter header height (default is 100px)', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_block = target_qodef_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_block',
                'title' => esc_html__('Header Block', 'targetwp'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-vertical',
                    'header-full-screen',
                    'header-standard'
                )
            )
        );

        target_qodef_add_admin_section_title(
            array(
                'parent' => $panel_header_block,
                'name' => 'menu_area_title',
                'title' => esc_html__('Menu Area', 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_block,
                'type' => 'color',
                'name' => 'menu_area_background_color_header_block',
                'default_value' => '',
                'label' => esc_html__('Background color', 'targetwp'),
                'description' => esc_html__('Set background color for header', 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_block,
                'type' => 'text',
                'name' => 'menu_area_background_transparency_header_block',
                'default_value' => '',
                'label' => esc_html__('Background transparency', 'targetwp'),
                'description' => esc_html__('Set background transparency for header','targetwp'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_block,
                'type' => 'text',
                'name' => 'menu_area_height_header_block',
                'default_value' => '',
                'label' => esc_html__('Height', 'targetwp'),
                'description' => esc_html__('Enter header height (default is 90px)', 'targetwp'),
                'args' => array(
                    'col_width' => 3,
                    'suffix' => 'px'
                )
            )
        );

        $panel_header_vertical = target_qodef_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'targetwp'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-block',
					'header-full-screen'
				)
            )
        );

            target_qodef_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' =>esc_html__( 'Background Color', 'targetwp'),
                'description' => esc_html__('Set background color for vertical menu', 'targetwp'),
                'parent' => $panel_header_vertical
            ));

            target_qodef_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'targetwp'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'targetwp'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            target_qodef_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image', 'targetwp'),
                    'description' => esc_html__('Set background image for vertical menu', 'targetwp'),
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = target_qodef_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen', 'targetwp'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-block',
					'header-vertical'
				)
			)
		);


		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid', 'targetwp'),
				'description' => esc_html__('Set header content to be in grid', 'targetwp'),
			)
		);



		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color', 'targetwp'),
				'description' => esc_html__('Set background color for header', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'targetwp'),
				'description' => esc_html__('Set background transparency for header', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'color',
                'name' => 'menu_area_border_color_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Border color', 'targetwp'),
                'description' => esc_html__('Set border bottom color for header', 'targetwp')
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $panel_header_full_screen,
                'type' => 'text',
                'name' => 'menu_area_border_transparency_header_full_screen',
                'default_value' => '',
                'label' => esc_html__('Border transparency', 'targetwp'),
                'description' => esc_html__('Set border bottom transparency for header','targetwp'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height', 'targetwp'),
				'description' => esc_html__('Enter header height (default is 100px)', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'targetwp'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'targetwp'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'targetwp'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Sticky Header in grid', 'targetwp'),
				'description' => esc_html__('Set sticky header content to be in grid', 'targetwp'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#qodef_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = target_qodef_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'targetwp'),
			'description' => esc_html__('Set grid background color for sticky header', 'targetwp'),
			'parent' => $sticky_header_in_grid_container
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency', 'targetwp'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'targetwp'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'targetwp'),
			'description' => esc_html__('Set background color for sticky header', 'targetwp'),
			'parent' => $panel_sticky_header
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency', 'targetwp'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'targetwp'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'targetwp'),
			'description' => esc_html__('Enter height for sticky header (default is 73px)', 'targetwp'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = target_qodef_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu', 'targetwp'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'targetwp'),
		));

		$row1_sticky_header_menu = target_qodef_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'targetwp'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		target_qodef_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color', 'targetwp'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = target_qodef_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		target_qodef_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'targetwp'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size', 'targetwp'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height', 'targetwp'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform', 'targetwp'),
				'default_value' => '',
				'options' => target_qodef_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = target_qodef_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		target_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'targetwp'),
				'options' => target_qodef_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing', 'targetwp'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'targetwp'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		target_qodef_add_admin_field(array(
			'name' => 'animate_fixed_header_height_on_scroll',
			'type' => 'yesno',
			'default_value' => 'no',
			'label' => esc_html__('Animate fixed header height on scroll', 'targetwp'),
			'description' => esc_html__('Enabling this option will trigger fixed header height animation on scroll', 'targetwp'),
			'parent' => $panel_fixed_header
		));

		target_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color', 'targetwp'),
			'description' => esc_html__('Set grid background color for fixed header', 'targetwp'),
			'parent' => $panel_fixed_header
		));

		target_qodef_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' =>esc_html__( 'Header Transparency Grid', 'targetwp'),
			'description' =>esc_html__( 'Enter transparency for fixed header grid (value from 0 to 1)', 'targetwp'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		target_qodef_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'targetwp'),
			'description' => esc_html__('Set background color for fixed header', 'targetwp'),
			'parent' => $panel_fixed_header
		));

		target_qodef_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency', 'targetwp'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'targetwp'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'targetwp'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		target_qodef_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'targetwp')
			)
		);


		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu', 'targetwp'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'targetwp'),
				'options' => array(
					'left' => esc_html__('Left', 'targetwp'),
					'top' => esc_html__('Top', 'targetwp')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#qodef_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#qodef_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = target_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size', 'targetwp'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu', 'targetwp'),
				'description' => esc_html__('Choose menu item height', 'targetwp'),
				'options' => array(
					'small_item' => esc_html__('Small', 'targetwp'),
					'large_item' => esc_html__('Big' , 'targetwp')
				)
			)
		);


		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_menu_item_separators',
				'default_value' => 'no',
				'label' => esc_html__('Enable 1st Level Menu Item Separators', 'targetwp'),
				'description' => esc_html__('Enabling this option will display separators between menu items', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_menu_item_separators_container'
				)
			)
		);

		$menu_item_separators_container = target_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_separators_container',
				'hidden_property' => 'enable_menu_item_separators',
				'hidden_value' => 'no'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $menu_item_separators_container,
				'type' => 'color',
				'name' => 'menu_item_separators_color',
				'default_value' => '',
				'label' => esc_html__('Separators Color', 'targetwp'),
				'description' => esc_html__('Enter separators color', 'targetwp')
			)
		);


		$drop_down_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu', 'targetwp'),
				'description' =>  esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)','targetwp')
			)
		);

		$drop_down_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color', 'targetwp')
			)
		);


		$drop_down_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_row2,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__('Item Separator Full Width', 'targetwp')
			)
		);

		$drop_down_padding_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding', 'targetwp'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'targetwp')
			)
		);

		$drop_down_padding_row = target_qodef_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance', 'targetwp'),
				'description' => esc_html__('Choose appearance for dropdown menu', 'targetwp'),
				'options' => array(
					'dropdown-default' => esc_html__('Default', 'targetwp'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'targetwp'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top', 'targetwp'),
					'dropdown-animate-height' => esc_html__('Animate Height','targetwp')
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position', 'targetwp'),
				'description' => esc_html__('Enter value in percentage of entire header height', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'dropdown_border_around',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Dropdown Menu Border', 'targetwp'),
				'description' => esc_html__('Enabling this option will display border around dropdown menu', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_dropdown_border_around_container'
				)
			)
		);

		$enable_dropdown_top_separator_container = target_qodef_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'dropdown_border_around_container',
				'hidden_property' => 'dropdown_border_around',
				'hidden_value' => 'no'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $enable_dropdown_top_separator_container,
				'type' => 'color',
				'name' => 'dropdown_border_around_color',
				'default_value' => '',
				'label' => esc_html__('Dropdown Border Color', 'targetwp'),
				'description' => esc_html__('Choose a color for border around dropdown menu', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'targetwp'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'targetwp'),
			)
		);

		$first_level_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu', 'targetwp'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'targetwp')
			)
		);

		$first_level_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'targetwp'),
			)
		);

		$first_level_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__('Text Background Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Background Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Background Color', 'targetwp'),
			)
		);

		$first_level_row3 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Border Hover/Active Color', 'targetwp'),
			)
		);

		$first_level_row4 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Border Hover/Active Color', 'targetwp'),
			)
		);

		$first_level_row5 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Hover Background Color Transparency', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Active Background Color Transparency', 'targetwp'),
			)
		);

		$first_level_row6 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' =>esc_html__( 'Letter Spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$first_level_row7 = target_qodef_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu', 'targetwp'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'targetwp')
			)
		);

		$second_level_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color' , 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color' , 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color' , 'targetwp')
			)
		);

		$second_level_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' =>esc_html__( 'Font Family' , 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$second_level_wide_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu', 'targetwp'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu' , 'targetwp')
			)
		);

		$second_level_wide_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'targetwp')
			)
		);

		$second_level_wide_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' =>esc_html__( 'Font Family', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = target_qodef_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$third_level_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu', 'targetwp'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu' , 'targetwp')
			)
		);

		$third_level_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'targetwp')
			)
		);

		$third_level_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = target_qodef_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu', 'targetwp'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'targetwp')
			)
		);

		$third_level_wide_row1 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color', 'targetwp')
			)
		);

		$third_level_wide_row2 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = target_qodef_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = target_qodef_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu', 'targetwp'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-standard',
					'header-full-screen'
				)
            )
        );

        $drop_down_group = target_qodef_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'targetwp'),
                'description' => esc_html__('Set a style for dropdown menu' , 'targetwp')
            )
        );

        $vertical_drop_down_row1 = target_qodef_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'qodef_drop_down_row1',
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'targetwp'),
            )
        );

        $group_vertical_first_level = target_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> esc_html__('1st level', 'targetwp'),
            'description'	=> esc_html__('Define styles for 1st level menu', 'targetwp'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'targetwp'),
                'parent'		=> $row_vertical_first_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'targetwp'),
                'parent'		=> $row_vertical_first_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'targetwp'),
                'options'		=> target_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'targetwp'),
                'parent'		=> $row_vertical_first_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'targetwp'),
                'options'		=> target_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'targetwp'),
                'options'		=> target_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = target_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> esc_html__('2nd level', 'targetwp'),
            'description'	=> esc_html__('Define styles for 2nd level menu', 'targetwp'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'targetwp'),
                'parent'		=> $row_vertical_second_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'targetwp'),
                'parent'		=> $row_vertical_second_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'targetwp'),
                'options'		=> target_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'targetwp'),
                'parent'		=> $row_vertical_second_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'targetwp'),
                'options'		=> target_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'targetwp'),
                'options'		=> target_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = target_qodef_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> esc_html__('3rd level', 'targetwp'),
            'description'	=> esc_html__('Define styles for 3rd level menu', 'targetwp'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'targetwp'),
                'parent'		=> $row_vertical_third_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'targetwp'),
                'parent'		=> $row_vertical_third_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'targetwp'),
                'options'		=> target_qodef_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'targetwp'),
                'parent'		=> $row_vertical_third_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'targetwp'),
                'options'		=> target_qodef_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'targetwp'),
                'options'		=> target_qodef_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = target_qodef_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            target_qodef_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'targetwp'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));
	}

	add_action( 'target_qodef_options_map', 'target_qodef_header_options_map',3);

}