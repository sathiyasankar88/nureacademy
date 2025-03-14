<?php

if ( ! function_exists('target_qodef_sidearea_options_map') ) {

	function target_qodef_sidearea_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'targetwp'),
				'icon' => 'fa fa-bars'
			)
		);

		$side_area_panel = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'targetwp'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_type',
				'default_value' => 'side-menu-slide-from-right',
				'label' => esc_html__('Side Area Type', 'targetwp'),
				'description' => esc_html__('Choose a type of Side Area', 'targetwp'),
				'options' => array(
					'side-menu-slide-from-right' => esc_html__('Slide from Right Over Content', 'targetwp'),
					'side-menu-slide-with-content' => esc_html__('Slide from Right With Content', 'targetwp'),
					'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'targetwp')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'side-menu-slide-from-right' => '#qodef_side_area_slide_with_content_container',
						'side-menu-slide-with-content' => '#qodef_side_area_width_container',
						'side-area-uncovered-from-content' => '#qodef_side_area_width_container, #qodef_side_area_slide_with_content_container'
					),
					'show' => array(
						'side-menu-slide-from-right' => '#qodef_side_area_width_container',
						'side-menu-slide-with-content' => '#qodef_side_area_slide_with_content_container',
						'side-area-uncovered-from-content' => ''
					)
				)
			)
		);

		$side_area_width_container = target_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_width_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-with-content',
					'side-area-uncovered-from-content'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'targetwp'),
				'description' => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'color',
				'name' => 'side_area_content_overlay_color',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Color', 'targetwp'),
				'description' => esc_html__('Choose a background color for a content overlay', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_content_overlay_opacity',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Transparency', 'targetwp'),
				'description' => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		$side_area_slide_with_content_container = target_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_slide_with_content_container,
				'type' => 'select',
				'name' => 'side_area_slide_with_content_width',
				'default_value' => 'width-470',
				'label' => esc_html__('Side Area Width', 'targetwp'),
				'description' => esc_html__('Choose width for Side Area', 'targetwp'),
				'options' => array(
					'width-270' => '270px',
					'width-370' => '370px',
					'width-470' => '470px'
				)
			)
		);

		$side_area_icon_style_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'targetwp'),
				'description' => esc_html__('Define styles for Side Area icon', 'targetwp')
			)
		);

		$side_area_icon_style_row1 = target_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row1'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'targetwp'),
			)
		);

		$side_area_icon_style_row2 = target_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row2',
				'next'			=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Hover Color', 'targetwp'),
			)
		);

		$side_area_icon_style_row3 = target_qodef_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row3',
				'next'			=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'targetwp'),
			)
		);

		$icon_spacing_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing', 'targetwp'),
				'description' => esc_html__('Define padding and margin for side area icon', 'targetwp'),
			)
		);

		$icon_spacing_row = target_qodef_add_admin_row(
			array(
				'parent'		=> $icon_spacing_group,
				'name'			=> 'icon_spancing_row',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_icon_border_yesno',
				'default_value' => 'no',
				'label' => esc_html__('Icon Border', 'targetwp'),
				'descritption' => esc_html__('Enable border around icon', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_side_area_icon_border_container'
				)
			)
		);

		$side_area_icon_border_container = target_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_border_container',
				'hidden_property' => 'side_area_icon_border_yesno',
				'hidden_value' => 'no'
			)
		);

		$border_style_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_icon_border_container,
				'name' => 'border_style_group',
				'title' => esc_html__('Border Style', 'targetwp'),
				'description' => esc_html__('Define styling for border around icon', 'targetwp')
			)
		);

		$border_style_row_1 = target_qodef_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'targetwp'),
			)
		);

		$border_style_row_2 = target_qodef_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_2',
				'next'			=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_width',
				'default_value' => '',
				'label' => esc_html__('Width', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_radius',
				'default_value' => '',
				'label' => esc_html__('Radius', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'selectsimple',
				'name' => 'side_area_icon_border_style',
				'default_value' => '',
				'label' => esc_html__('Style', 'targetwp'),
				'options' => array(
					'solid' => esc_html__('Solid', 'targetwp'),
					'dashed' => esc_html__('Dashed', 'targetwp'),
					'dotted' => esc_html__('Dotted', 'targetwp')
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Aligment', 'targetwp'),
				'description' => esc_html__('Choose text aligment for side area', 'targetwp'),
				'options' => array(
					'center' => esc_html__('Center', 'targetwp'),
					'left' => esc_html__('Left', 'targetwp'),
					'right' => esc_html__('Right', 'targetwp')
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title', 'targetwp'),
				'description' => esc_html__('Enter a title to appear in Side Area', 'targetwp'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'targetwp'),
				'description' => esc_html__('Choose a background color for Side Area', 'targetwp'),
			)
		);

		$padding_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding', 'targetwp'),
				'description' => esc_html__('Define padding for Side Area', 'targetwp'),
			)
		);

		$padding_row = target_qodef_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'default_value' => '',
				'label' => esc_html__('Right Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'default_value' => '',
				'label' => esc_html__('Left Padding', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_close_icon',
				'default_value' => 'light',
				'label' => esc_html__('Close Icon Style', 'targetwp'),
				'description' => esc_html__('Choose a type of close icon', 'targetwp'),
				'options' => array(
					'light' => esc_html__('Light', 'targetwp'),
					'dark' => esc_html__('Dark', 'targetwp')
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_close_icon_size',
				'default_value' => '',
				'label' => esc_html__('Close Icon Size', 'targetwp'),
				'description' => esc_html__('Define close icon size', 'targetwp'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$title_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'title_group',
				'title' => esc_html__('Title', 'targetwp'),
				'description' => esc_html__('Define Style for Side Area title', 'targetwp')
			)
		);

		$title_row_1 = target_qodef_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$title_row_2 = target_qodef_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'text_group',
				'title' => esc_html__('Text', 'targetwp'),
				'description' => esc_html__('Define Style for Side Area text', 'targetwp')
			)
		);

		$text_row_1 = target_qodef_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$text_row_2 = target_qodef_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'targetwp'),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'targetwp'),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = target_qodef_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'widget_links_group',
				'title' => esc_html__('Link Style', 'targetwp'),
				'description' => esc_html__('Define styles for Side Area widget links', 'targetwp')
			)
		);

		$widget_links_row_1 = target_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'targetwp'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'targetwp'),
				'options' => target_qodef_get_text_transform_array()
			)
		);

		$widget_links_row_2 = target_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_2',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'fontsimple',
				'name' => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'targetwp' ),
				'options' => target_qodef_get_font_style_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'targetwp' ),
				'options' => target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'textsimple',
				'name' => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'targetwp' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = target_qodef_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_3',
				'next' => true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $widget_links_row_3,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_enable_bottom_border',
				'default_value' => 'no',
				'label' => esc_html__('Border Bottom on Elements', 'targetwp'),
				'description' => esc_html__('Enable border bottom on elements in side area', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_side_area_bottom_border_container'
				)
			)
		);

		$side_area_bottom_border_container = target_qodef_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_bottom_border_container',
				'hidden_property' => 'side_area_enable_bottom_border',
				'hidden_value' => 'no'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $side_area_bottom_border_container,
				'type' => 'color',
				'name' => 'side_area_bottom_border_color',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Color', 'targetwp'),
				'description' => esc_html__('Choose color for border bottom on elements in sidearea', 'targetwp')
			)
		);

	}

	add_action('target_qodef_options_map', 'target_qodef_sidearea_options_map',15);

}