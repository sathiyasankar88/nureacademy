<?php
if (!function_exists('target_qodef_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function target_qodef_register_side_area_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Side Area', 'targetwp'),
			'id' => 'sidearea', //TODO Change name of sidebar
			'description' => esc_html__('Side Area', 'targetwp'),
			'before_widget' => '<div id="%1$s" class="widget qodef-sidearea %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-sidearea-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'target_qodef_register_side_area_sidebar');

}

if(!function_exists('target_qodef_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function target_qodef_side_menu_body_class($classes) {

		if (is_active_widget( false, false, 'qodef_side_area_opener' )) {

			if (target_qodef_options()->getOptionValue('side_area_type')) {

				$classes[] = 'qodef-' . target_qodef_options()->getOptionValue('side_area_type');

				if (target_qodef_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'qodef-' . target_qodef_options()->getOptionValue('side_area_slide_with_content_width');

				}

        	}

		}

		return $classes;

    }

    add_filter('body_class', 'target_qodef_side_menu_body_class');
}


if(!function_exists('target_qodef_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function target_qodef_get_side_area() {

		if (is_active_widget( false, false, 'qodef_side_area_opener' )) {

			$parameters = array(
				'show_side_area_title' => target_qodef_options()->getOptionValue('side_area_title') !== '' ? true : false, //Dont show title if empty
			);

			target_qodef_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('target_qodef_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function target_qodef_get_side_area_title() {

		$parameters = array(
			'side_area_title' => target_qodef_options()->getOptionValue('side_area_title')
		);

		target_qodef_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

