<?php
if ( ! function_exists('target_qodef_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function target_qodef_contact_form_map()
	{

		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'targetwp'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'targetwp') => 'default',
				esc_html__('Custom Style 1', 'targetwp') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'targetwp') => 'cf7_custom_style_2'
			),
			'description' => esc_html__('You can style each form element individually in Qode Options > Contact Form 7', 'targetwp')
		));

	}
	add_action('vc_after_init', 'target_qodef_contact_form_map');
}
?>