<?php

if ( ! function_exists('target_qodef_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function target_qodef_parallax_options_map()
	{

		target_qodef_add_admin_page(
			array(
				'slug' => '_parallax_page',
				'title' => esc_html__('Parallax', 'targetwp'),
				'icon' => 'fa fa-unsorted'
			)
		);

		$panel_parallax = target_qodef_add_admin_panel(
			array(
				'page'  => '_parallax_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'targetwp')
			)
		);

		target_qodef_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'targetwp'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'targetwp'),
			'parent'		=> $panel_parallax
		));

		target_qodef_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'targetwp'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'targetwp'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'target_qodef_options_map', 'target_qodef_parallax_options_map',19);

}