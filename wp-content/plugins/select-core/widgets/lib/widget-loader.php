<?php

if ( ! function_exists( 'target_qodef_register_widgets' ) ) {
	function target_qodef_register_widgets() {
		$widgets = array(
			'TargetQodefFullScreenMenuOpener',
			'TargetQodefLatestPosts',
			'TargetQodefSearchOpener',
			'TargetQodefSeparatorWidget',
			'TargetQodefSideAreaOpener',
			'TargetQodefSocialIconWidget',
		);

		if ( target_qodef_is_woocommerce_installed() ) {
			$widgets[] = 'TargetQodefWoocommerceDropdownCart';
		}

		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
}

add_action( 'widgets_init', 'target_qodef_register_widgets' );