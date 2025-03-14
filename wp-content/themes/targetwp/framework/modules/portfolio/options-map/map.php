<?php

if ( ! function_exists('target_qodef_portfolio_options_map') ) {

	function target_qodef_portfolio_options_map() {

		target_qodef_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'targetwp'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = target_qodef_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'targetwp'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		target_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'targetwp'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages', 'targetwp'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images', 'targetwp'),
				'small-slider' => esc_html__('Portfolio small slider', 'targetwp'),
				'big-images' => esc_html__('Portfolio big images', 'targetwp'),
				'big-slider' => esc_html__('Portfolio big slider', 'targetwp'),
				'gallery' => esc_html__('Portfolio gallery', 'targetwp'),
				'masonry-gallery-left' => esc_html__('Portfolio masonry gallery left', 'targetwp'),
				'masonry-gallery-bottom' => esc_html__('Portfolio masonry gallery bottom', 'targetwp'),
				'pinterest' => esc_html__('Portfolio pinterest', 'targetwp'),
				'custom' => esc_html__('Portfolio custom', 'targetwp'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'targetwp')

			)
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'targetwp'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'targetwp'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'targetwp'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'targetwp'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'targetwp'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'targetwp'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		target_qodef_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'targetwp'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'targetwp'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#qodef_navigate_same_category_container'
			)
		));

		$container_navigate_category = target_qodef_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		target_qodef_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category', 'targetwp'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'targetwp'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		target_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'targetwp'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type', 'targetwp'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns', 'targetwp'),
				'three-columns' => esc_html__('3 columns', 'targetwp'),
				'four-columns' => esc_html__('4 columns', 'targetwp')
			)
		));

		target_qodef_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'targetwp'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'targetwp'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'target_qodef_options_map', 'target_qodef_portfolio_options_map',14);

}