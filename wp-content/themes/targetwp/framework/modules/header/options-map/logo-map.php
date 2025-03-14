<?php

if ( ! function_exists('target_qodef_logo_options_map') ) {

	function target_qodef_logo_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo', 'targetwp'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = target_qodef_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__( 'Logo', 'targetwp')
			)
		);

		target_qodef_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo', 'targetwp'),
				'description' => esc_html__('Enabling this option will hide logo image', 'targetwp'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#qodef_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = target_qodef_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default', 'targetwp'),
				'description' => esc_html__('Choose a default logo image to display ', 'targetwp'),
				'parent' => $hide_logo_container
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Dark', 'targetwp'),
				'description' => esc_html__('Choose a default logo image to display ', 'targetwp'),
				'parent' => $hide_logo_container
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Light', 'targetwp'),
				'description' => esc_html__('Choose a default logo image to display ', 'targetwp'),
				'parent' => $hide_logo_container
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky', 'targetwp'),
				'description' => esc_html__('Choose a default logo image to display ', 'targetwp'),
				'parent' => $hide_logo_container
			)
		);

		target_qodef_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => QODE_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile', 'targetwp'),
				'description' => esc_html__('Choose a default logo image to display ', 'targetwp'),
				'parent' => $hide_logo_container
			)
		);

	}

	add_action( 'target_qodef_options_map', 'target_qodef_logo_options_map',2);

}