<?php

if ( ! function_exists('target_qodef_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function target_qodef_load_elements_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'targetwp'),
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'target_qodef_options_elements_map' );

	}

	add_action('target_qodef_options_map', 'target_qodef_load_elements_map',8);

}