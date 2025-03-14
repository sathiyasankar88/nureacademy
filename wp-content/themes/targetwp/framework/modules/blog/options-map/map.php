<?php

if ( ! function_exists('target_qodef_blog_options_map') ) {

	function target_qodef_blog_options_map() {

		target_qodef_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'targetwp'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = target_qodef_get_custom_sidebars();

		$panel_blog_lists = target_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists' , 'targetwp'),
			)
		);

		target_qodef_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'targetwp'),
			'description' => esc_html__('Choose a default blog layout', 'targetwp'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard', 'targetwp'),
				'masonry' 				=> esc_html__('Blog: Masonry', 'targetwp'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width', 'targetwp'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post', 'targetwp')
			)
		));

		target_qodef_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'targetwp'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'targetwp'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'targetwp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'targetwp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'targetwp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'targetwp'),
				'sidebar-25-left' 	=>esc_html__('Sidebar 1/4 Left', 'targetwp')
			)
		));


		if(count($custom_sidebars) > 0) {
			target_qodef_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'targetwp'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'targetwp'),
				'parent' => $panel_blog_lists,
				'options' => target_qodef_get_custom_sidebars()
			));
		}

        target_qodef_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'pagination',
                'default_value' => 'yes',
                'label' => esc_html__('Pagination', 'targetwp'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'targetwp'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#qodef_qodef_pagination_container'
                )
            )
        );

        $pagination_container = target_qodef_add_admin_container(
            array(
                'name' => 'qodef_pagination_container',
                'hidden_property' => 'pagination',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        target_qodef_add_admin_field(
            array(
                'parent' => $pagination_container,
                'type' => 'text',
                'name' => 'blog_page_range',
                'default_value' => '',
                'label' => esc_html__('Pagination Range limit', 'targetwp'),
                'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'targetwp'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );
        target_qodef_add_admin_field(
            array(
                'type' => 'selectblank',
                'name' => 'pagination_type',
                'default_value' => 'standard_pagination',
                'label' => esc_html__('Pagination Type', 'targetwp'),
                'parent' => $pagination_container,
                'description' => esc_html__('Choose Pagination Type', 'targetwp'),
                'options' => array(
                    'standard_paginaton' => esc_html__('Standard Pagination', 'targetwp'),
                    'load_more_pagination' => esc_html__('Load More', 'targetwp'),
                    'navigation'	=> esc_html__('Navigation', 'targetwp')
                ),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'type' => 'selectblank',
                'name' => 'gallery_pagination_type',
                'default_value' => '',
                'label' => esc_html__('Gallery Pagination Type', 'targetwp'),
                'parent' => $pagination_container,
                'description' => esc_html__('Choose Pagination Type for Gallery Blog Template', 'targetwp'),
                'options' => array(
                    'standard_pagination' => esc_html__('Standard Pagination', 'targetwp'),
                    'load_more_pagination' => esc_html__('Load More', 'targetwp'),
                    'navigation'	=> esc_html__('Navigation' , 'targetwp')
                ),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        target_qodef_add_admin_field(
            array(
                'type' => 'selectblank',
                'name' => 'masonry_pagination_type',
                'default_value' => '',
                'label' => esc_html__('Masonry Pagination Type', 'targetwp'),
                'parent' => $pagination_container,
                'description' => esc_html__('Choose Pagination Type for Masonry Blog Template', 'targetwp'),
                'options' => array(
                    'standard_paginaton' => esc_html__('Standard Pagination', 'targetwp'),
                    'load_more_pagination' => esc_html__('Load More', 'targetwp'),
                    'navigation'	=> esc_html__('Navigation', 'targetwp')
                ),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter', 'targetwp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		target_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'targetwp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		target_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'targetwp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		target_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'targetwp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'targetwp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = target_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'targetwp')
			)
		);


		target_qodef_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'targetwp'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'targetwp'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'targetwp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'targetwp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'targetwp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'targetwp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'targetwp'),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			target_qodef_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'targetwp'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'targetwp'),
				'parent' => $panel_blog_single,
				'options' => target_qodef_get_custom_sidebars()
			));
		}

		target_qodef_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'targetwp'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'targetwp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

        target_qodef_add_admin_field(
            array(
                'type'        => 'yesno',
                'name' => 'blog_single_tags',
                'default_value' => 'yes',
                'label'       => esc_html__('Show Tags', 'targetwp'),
                'description' => esc_html__('Enabling this option will show tags on single post pages', 'targetwp'),
                'parent'      => $panel_blog_single,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
		
		target_qodef_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'targetwp'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'targetwp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		target_qodef_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'targetwp'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.', 'targetwp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'targetwp'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = target_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'targetwp'),
				'description' => esc_html__('Limit your navigation only through current category', 'targetwp'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		target_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box', 'targetwp'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'targetwp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = target_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		target_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'targetwp'),
				'description' => esc_html__('Enabling this option will show author email', 'targetwp'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'target_qodef_options_map', 'target_qodef_blog_options_map',13);

}











