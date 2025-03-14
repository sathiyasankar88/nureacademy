<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'target_qodef_child_theme_enqueue_scripts' ) ) {
	function target_qodef_child_theme_enqueue_scripts() {
		$parent_style = 'target-qodef-default-style';

		wp_enqueue_style( 'target-qodef-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'target_qodef_child_theme_enqueue_scripts' );
}