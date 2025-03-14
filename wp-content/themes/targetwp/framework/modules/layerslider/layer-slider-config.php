<?php
	if(!function_exists('target_qodef_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function target_qodef_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'target_qodef_layerslider_overrides');
	}
?>