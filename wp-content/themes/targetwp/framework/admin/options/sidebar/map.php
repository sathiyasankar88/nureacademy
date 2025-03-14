<?php

if ( ! function_exists('target_qodef_sidebar_options_map') ) {

	function target_qodef_sidebar_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'targetwp'),
				'icon'  => 'fa fa-bars'
			)
		);

		$panel_widgets = target_qodef_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'targetwp')
			)
		);

		/**
		 * Navigation style
		 */
		target_qodef_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'targetwp'),
			'description'	=> esc_html__('Choose background color for sidebar', 'targetwp'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = target_qodef_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'targetwp'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = target_qodef_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'targetwp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'targetwp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'targetwp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'targetwp'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'targetwp'),
			'description'	=> esc_html__('Choose text aligment', 'targetwp'),
			'options'		=> array(
				'left' => esc_html__('Left', 'targetwp'),
				'center' => esc_html__('Center', 'targetwp'),
				'right' => esc_html__('Right', 'targetwp')
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'target_qodef_options_map', 'target_qodef_sidebar_options_map',12);

}