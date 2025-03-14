<?php

if ( ! function_exists('target_qodef_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function target_qodef_woocommerce_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'targetwp'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = target_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List' , 'targetwp')
			)
		);

		target_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'targetwp'),
			'default_value'	=> 'qodef-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'targetwp'),
			'options'		=> array(
				'qodef-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'targetwp'),
				'qodef-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)' ,'targetwp')
			),
			'parent'      	=> $panel_product_list,
		));

		target_qodef_add_admin_field(array(
			'name'        	=> 'qodef_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'targetwp'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'targetwp'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		target_qodef_add_admin_field(array(
			'name'        	=> 'qodef_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'targetwp'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'		=> array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));

        $group_product_list_title = target_qodef_add_admin_group(array(
            'title' => esc_html__('Title Typography', 'targetwp'),
            'name' => 'group_product_list_title',
            'parent' => $panel_product_list,
            'description' => esc_html__('Define custom styles for product list title', 'targetwp'),
        ));

        $typography_row = target_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $group_product_list_title
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'product_list_title_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'targetwp'),
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'targetwp'),
            'options'       => target_qodef_get_text_transform_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'targetwp'),
            'options'       => target_qodef_get_font_style_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'product_list_title_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'targetwp'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = target_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $group_product_list_title
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'product_list_title_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'targetwp'),
            'options'       => target_qodef_get_font_weight_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'product_list_title_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'targetwp'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = target_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'targetwp')
			)
		);

		target_qodef_add_admin_field(array(
			'name'        	=> 'qodef_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag', 'targetwp'),
			'default_value'	=> 'h2',
			'description' 	=> '',
			'options'		=> array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_single_product,
		));

        $group_product_single_title = target_qodef_add_admin_group(array(
            'title' => esc_html__('Title Typography', 'targetwp'),
            'name' => 'group_product_single_title',
            'parent' => $panel_single_product,
            'description' => esc_html__('Define custom styles for product single title', 'targetwp'),
        ));

        $typography_row = target_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $group_product_single_title
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'product_single_title_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'targetwp'),
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'targetwp'),
            'options'       => target_qodef_get_text_transform_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'targetwp'),
            'options'       => target_qodef_get_font_style_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'product_single_title_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'targetwp'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = target_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $group_product_single_title
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'product_single_title_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'targetwp'),
            'options'       => target_qodef_get_font_weight_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'product_single_title_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'targetwp'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = target_qodef_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'targetwp')
			)
		);

			target_qodef_add_admin_field(array(
				'name'        	=> 'qodef_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'targetwp'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'targetwp'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'target_qodef_options_map', 'target_qodef_woocommerce_options_map', 21);
}