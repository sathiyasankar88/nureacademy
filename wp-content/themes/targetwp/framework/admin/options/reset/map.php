<?php

if ( ! function_exists('target_qodef_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function target_qodef_reset_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'targetwp'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = target_qodef_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'targetwp')
			)
		);

		target_qodef_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'targetwp'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'targetwp'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'target_qodef_options_map', 'target_qodef_reset_options_map', 100 );

}