<?php

if ( ! function_exists('target_qodef_error_404_options_map') ) {

	function target_qodef_error_404_options_map() {

		target_qodef_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'targetwp'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = target_qodef_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option' ,'targetwp')
		));

		target_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'targetwp'),
			'description' => esc_html__('Enter title for 404 page', 'targetwp')
		));

		target_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'targetwp'),
			'description' => esc_html__('Enter text for 404 page', 'targetwp')
		));

		target_qodef_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' =>esc_html__( 'Back to Home Button Label', 'targetwp'),
			'description' =>esc_html__( 'Enter label for "Back to Home" button', 'targetwp')
		));

	}

	add_action( 'target_qodef_options_map', 'target_qodef_error_404_options_map',18);

}