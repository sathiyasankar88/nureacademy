<?php

if ( ! function_exists('target_qodef_search_options_map') ) {

	function target_qodef_search_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'targetwp'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'targetwp'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'linear_icons',
				'label'			=> esc_html__('Search Icon Pack', 'targetwp'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'targetwp'),
				'options'		=> target_qodef_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Search area in grid', 'targetwp'),
				'description'	=> esc_html__('Set search area to be in grid', 'targetwp'),
			)
		);

		target_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header' , 'targetwp')
			)
		);

		$search_icon_color_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'targetwp'),
				'description'	=> esc_html__('Define color style for icon', 'targetwp'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'targetwp')
			)
		);
		target_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'targetwp')
			)
		);
		target_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'targetwp')
			)
		);
		target_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'targetwp')
			)
		);

		$search_icon_color_row2 = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'targetwp')
			)
		);
		target_qodef_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'targetwp')
			)
		);


		$search_icon_background_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'targetwp'),
				'description'	=> esc_html__('Define background style for icon', 'targetwp'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'targetwp'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", "targetwp"),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = target_qodef_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'targetwp'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text', 'targetwp')
			)
		);

		$enable_search_icon_text_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'targetwp'),
				'default_value'	=> ''
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'targetwp'),
				'default_value'	=> ''
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'targetwp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'targetwp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = target_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'targetwp'),
				'default_value'	=> '',
				'options'		=> target_qodef_get_text_transform_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'targetwp'),
				'default_value'	=> '-1',
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'targetwp'),
				'default_value'	=> '',
				'options'		=> target_qodef_get_font_style_array(),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'targetwp'),
				'default_value'	=> '',
				'options'		=> target_qodef_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = target_qodef_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'targetwp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'targetwp'),
				'description'	=> esc_html__('Define padding and margins for Search icon', 'targetwp'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'targetwp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'targetwp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'targetwp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'targetwp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		target_qodef_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'targetwp'),
				'description'	=> esc_html__('Choose a background color for Select search bar', 'targetwp')
			)
		);

		$search_input_text_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> 'Search Input Text',
				'description'	=> esc_html__('Define style for search text', 'targetwp'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__( 'Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_disabled_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Disabled Text Color', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'targetwp'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'targetwp'),
				'options'		=> target_qodef_get_text_transform_array()
			)
		);

		$search_input_text_row2 = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'targetwp'),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'targetwp'),
				'options'		=> target_qodef_get_font_style_array(),
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'targetwp'),
				'options'		=> target_qodef_get_font_weight_array()
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'targetwp'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close', 'targetwp'),
				'description'	=> esc_html__('Define style for search close icon', 'targetwp'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color', 'targetwp'),
				'default_value'	=> ''
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color', 'targetwp'),
				'default_value'	=> ''
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size', 'targetwp'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = target_qodef_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border', 'targetwp'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'targetwp'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = target_qodef_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> 'Border Color',
				'default_value'	=> ''
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color', 'targetwp'),
				'default_value'	=> ''
			)
		);

	}

	add_action('target_qodef_options_map', 'target_qodef_search_options_map',11);

}