<?php

//Blog

if(!function_exists('target_qodef_map_blog')) {
    function target_qodef_map_blog()
    {

        $qode_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $qode_blog_categories[$category->term_id] = $category->name;
        }

        $blog_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'targetwp'),
                'name' => 'blog_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'targetwp'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'targetwp'),
                'parent' => $blog_meta_box,
                'options' => $qode_blog_categories
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'targetwp'),
                'description' => esc_html__('Enter the number of posts to display', 'targetwp'),
                'parent' => $blog_meta_box,
                'options' => $qode_blog_categories,
                'args' => array("col_width" => 3)
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_blog');

}
	

