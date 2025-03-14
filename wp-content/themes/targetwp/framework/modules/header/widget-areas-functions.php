<?php

if ( ! function_exists( 'target_qodef_register_top_header_areas' ) ) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function target_qodef_register_top_header_areas() {
		if ( target_qodef_core_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Left', 'targetwp' ),
				'id'            => 'qodef-top-bar-left',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the left hand side in top bar', 'targetwp' )
			) );

			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Center', 'targetwp' ),
				'id'            => 'qodef-top-bar-center',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear in the center in top bar', 'targetwp' )
			) );

			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Right', 'targetwp' ),
				'id'            => 'qodef-top-bar-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side in top bar', 'targetwp' )
			) );
		}
	}

	add_action( 'widgets_init', 'target_qodef_register_top_header_areas' );
}

if ( ! function_exists( 'target_qodef_header_standard_widget_areas' ) ) {
	/**
	 * Registers widget areas for standard header type
	 */
	function target_qodef_header_standard_widget_areas() {
		if ( target_qodef_core_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Header Widget Area', 'targetwp' ),
				'id'            => 'qodef-header-widget-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-header-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the main menu', 'targetwp' )
			) );
		}
	}

	add_action( 'widgets_init', 'target_qodef_header_standard_widget_areas' );
}


if ( ! function_exists( 'target_qodef_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function target_qodef_register_mobile_header_areas() {
		if ( target_qodef_is_responsive_on() && target_qodef_core_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Right From Mobile Logo', 'targetwp' ),
				'id'            => 'qodef-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo', 'targetwp' )
			) );
		}
	}

	add_action( 'widgets_init', 'target_qodef_register_mobile_header_areas' );
}

if ( ! function_exists( 'target_qodef_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function target_qodef_register_sticky_header_areas() {
		if ( target_qodef_core_installed() ) {
			if ( in_array( target_qodef_options()->getOptionValue( 'header_behaviour' ), array(
				'sticky-header-on-scroll-up',
				'sticky-header-on-scroll-down-up'
			) ) ) {
				register_sidebar( array(
					'name'          => esc_html__( 'Sticky Right', 'targetwp' ),
					'id'            => 'qodef-sticky-right',
					'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
					'after_widget'  => '</div>',
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side in sticky menu', 'targetwp' )
				) );
			}
		}
	}

	add_action( 'widgets_init', 'target_qodef_register_sticky_header_areas' );
}