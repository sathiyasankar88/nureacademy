<?php

if ( ! function_exists( 'target_qodef_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 *
	 */
	function target_qodef_load_widget_class() {
		include_once QODE_CORE_ABS_PATH . '/widgets/lib/widget-class.php';
	}

	add_action( 'target_qodef_before_options_map', 'target_qodef_load_widget_class' );
}

if ( ! function_exists( 'target_qodef_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to target_qodef_after_options_map action
	 */
	function target_qodef_load_widgets() {
		foreach ( glob( QODE_CORE_ABS_PATH . '/widgets/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}

		include_once QODE_CORE_ABS_PATH . '/widgets/lib/widget-loader.php';
	}

	add_action( 'target_qodef_before_options_map', 'target_qodef_load_widgets' );
}