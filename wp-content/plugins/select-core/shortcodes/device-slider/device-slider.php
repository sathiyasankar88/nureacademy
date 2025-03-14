<?php

namespace TargetQodef\Modules\Shortcodes\DeviceSlider;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Device List
 */
class DeviceSlider implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'qodef_device_slider';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Device Slider', 'select-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-device-slider extended-custom-icon',
			'category' => esc_html__('by SELECT','select-core'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type'			=> 'attach_images',
						'heading'		=> esc_html__('Images', 'select-core'),
						'param_name'	=> 'images',
						'description'	=> esc_html__('Select images from media library', 'select-core')
					),
                    array (
                        'type'         => 'textfield',
                        'heading'      => esc_html__('Autoplay timeout', 'select-core'),
                        'param_name'   => 'autoplay_timeout',
                        'description'  => esc_html__('Enter 0 to disable autoplay', 'select-core')
                    ),
				)
		) );

	}

	public function render($atts, $content = null) {

		$args = array(
			'images' => '',
			'autoplay_timeout' => ''
        );

		$html = '';

		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['images'] = $this->getGalleryImages($params);

        $html .= select_core_get_shortcode_template_part('templates/device-slider-holder', 'device-slider', '', $params);
		return $html;
		
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image['title'] = get_the_title($id);

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}
}
