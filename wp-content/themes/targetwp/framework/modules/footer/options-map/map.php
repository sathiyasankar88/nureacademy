<?php

if ( ! function_exists('target_qodef_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function target_qodef_footer_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'targetwp'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = target_qodef_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'targetwp'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer', 'targetwp'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'targetwp'),
				'parent' => $footer_panel,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'targetwp'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'targetwp'),
				'parent' => $footer_panel,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'targetwp'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = target_qodef_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'targetwp'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'targetwp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent' => $show_footer_top_container,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment', 'targetwp'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'targetwp'),
				'options' => array(
					'left' => esc_html__('Left', 'targetwp'),
					'center' => esc_html__('Center', 'targetwp'),
					'right' => esc_html__('Right', 'targetwp')
				),
				'parent' => $show_footer_top_container,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'targetwp'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = target_qodef_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		target_qodef_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '3',
				'label' => esc_html__('Footer Bottom Columns', 'targetwp'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'targetwp'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'target_qodef_options_map', 'target_qodef_footer_options_map',5);

}