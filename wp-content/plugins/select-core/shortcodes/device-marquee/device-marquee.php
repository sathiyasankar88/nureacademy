<?php
namespace TargetQodef\Modules\Shortcodes\DeviceMarquee;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class DeviceMarquee implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_device_marquee';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Device Marquee', 'select-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-device-marquee extended-custom-icon',
			'category' => esc_html__('by SELECT','select-core'),
			'params' => array(
				array(
					'type'			=> 'attach_image',
					'heading'		=> esc_html__('Device Image', 'select-core'),
					'param_name'	=> 'device_image',
					'description'	=> esc_html__('This image will be set inside the desktop device frame.', 'select-core'),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Link', 'select-core'),
					'param_name'	=> 'link',
					'description'	=> esc_html__('Enter an external URL to link to.', 'select-core'),
				),
				array(
				    'type'       => 'dropdown',
				    'heading'    => esc_html__('Target', 'select-core'),
				    'param_name' => 'target',
				    'value'      => array(
				        esc_html__('Self', 'select-core')  => '_self',
				        esc_html__('Blank', 'select-core') => '_blank'
				    ),
				    'dependency' => array('element' => 'link', 'not_empty' => true),
				),
				array(
				    'type'       => 'attach_image',
				    'heading'    => esc_html__('Background Image', 'select-core'),
				    'param_name' => 'background_image',
				),
				array(
				    'type'       => 'dropdown',
				    'heading'    => esc_html__('Image Infinite Scroll Effect', 'select-core'),
				    'param_name' => 'infinite_scroll_effect',
					'admin_label'	=> true,
				    'value'      => array(
				        esc_html__('Yes', 'select-core')  => 'yes',
				        esc_html__('No', 'select-core') => 'no'
				    ),
				    'save_always' => true,
					'description' => esc_html__('Toggle Background Image Infinite Horizontal Scroll Effect', 'select-core'),
				    'dependency' => array('element' => 'background_image', 'not_empty' => true)
				),
				array(
				    'type'       => 'dropdown',
				    'heading'    => esc_html__('Blurred Background', 'select-core'),
				    'param_name' => 'blurred_background',
					'admin_label'	=> true,
				    'value'      => array(
				        esc_html__('Yes', 'select-core')  => 'yes',
				        esc_html__('No', 'select-core') => 'no'
				    ),
				    'save_always' => true,
				    'dependency' => array('element' => 'background_image', 'not_empty' => true)
				),
				array(
				    'type'       => 'dropdown',
				    'heading'    => esc_html__('Device Appear Effect', 'select-core'),
				    'param_name' => 'device_appear_effect',
					'admin_label'	=> true,
				    'value'      => array(
				        esc_html__('Yes', 'select-core')  => 'yes',
				        esc_html__('No', 'select-core') => 'no'
				    ),
				    'save_always' => true,
				),
				
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'device_image'	=> '',
			'link' => '',
			'target' => '_self',
			'background_image' => '',
			'infinite_scroll_effect' => 'yes',
			'blurred_background' => 'yes',
			'device_appear_effect' => 'yes',
		);

		$params = shortcode_atts($args, $atts);

		$params['shortcode_classes'] = $this->getShortcodeClasses($params);

		$html = select_core_get_shortcode_template_part('templates/device-marquee-template', 'device-marquee', '', $params);

		return $html;

	}

	/**
	 * Generates classes for Device Marquee shortcode
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getShortcodeClasses($params){

		$shortcode_classes = array();

		if($params['background_image'] !== ''){
			$shortcode_classes[] = 'qodef-background-image-set';

			if($params['infinite_scroll_effect'] == 'yes'){
				$shortcode_classes[] = 'qodef-infinite-scroll-effect';
			}
		}

		if($params['device_appear_effect'] == 'yes'){
			$shortcode_classes[] = 'qodef-device-appear-effect';
		}

		if($params['blurred_background'] == 'yes'){
			$shortcode_classes[] = 'qodef-blurred-background';
		}

		return implode(' ', $shortcode_classes);
	}
}