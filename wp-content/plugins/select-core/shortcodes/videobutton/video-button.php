<?php
namespace TargetQodef\Modules\Shortcodes\VideoButton;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class VideoButton
 */
class VideoButton implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_video_button';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see qode_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Select Video Button', 'select-core'),
				'base' => $this->getBase(),
				'category' => esc_html__('by SELECT','select-core'),
				'icon' => 'icon-wpb-video-button extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Style', 'select-core'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Solid', 'select-core')   => 'solid',
                            esc_html__('Gradient', 'select-core') => 'gradient'
                        ),
                        'description' => '',
                        "save_always" => true
                    ),
				    array(
                        "type" => "dropdown",
                        "heading" => esc_html__("Skin", 'select-core'),
                        "param_name" => "skin",
                        "value" => array(
                            "Dark" => "dark",
                            "Light" => "light"
                        ),
                        "save_always" => true
                    ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Video Link", 'select-core'),
						"param_name" => "video_link",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Play Button Size (px)", 'select-core'),
						"param_name" => "button_size",
						"value" => "",
						"dependency" => array('element' => 'video_link', 'not_empty' => true),
					),
                    array(
                        "type" => "colorpicker",
                        "heading" => esc_html__("Button Background Color", 'select-core'),
                        "param_name" => "background_color",
                        "value" => ""
                    ),
                    array(
                        "type" => "colorpicker",
                        "heading" => esc_html__("Second Button Background Color", 'select-core'),
                        "param_name" => "background_color_1",
                        "value" => "",
                        "dependency" => array('element' => 'type', 'value' => 'gradient'),
                        "description" => "For gradient type"
                    ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'select-core'),
						"param_name" => "title",
						"value" => "",
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Title Tag", 'select-core'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						),
						"dependency" => array('element' => 'title', 'not_empty' => true),
					),
				)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
		    'type' => '',
			'skin' => 'dark',
			'video_link' => '#',
			'button_size' => '',
            'background_color' => '',
            'background_color_1' => '',
			'title' => '',
			'title_tag' => 'h6',
		);

		$params = shortcode_atts($args, $atts);

		$params['button_style'] = $this->getButtonStyle($params);
		$params['video_title_tag'] = $this->getVideoButtonTitleTag($params,$args);
        $params['video_class'] = $this->getVideoButtonClasses($params);
        $params['background_color'] = $this->getBackgroundStyle($params);

		//Get HTML from template
		$html = select_core_get_shortcode_template_part('templates/video-button-template', 'videobutton', '', $params);

		return $html;

	}

	/**
	 * Return Style for Button
	 *
	 * @param $params
	 * @return string
	 */
	private function getButtonStyle($params) {
		$button_style = array();

		if ($params['button_size'] !== '') {
			$button_size = strstr($params['button_size'], 'px') ? $params['button_size'] : $params['button_size'].'px';
			$button_style[] = 'width: '.$button_size;
			$button_style[] = 'height: '.$button_size;
			$button_style[] = 'font-size: '. intval($button_size)*0.8 .'px';
		}

		return implode(';', $button_style);
	}

	/**
	 * Return Title Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return string
	 */
	private function getVideoButtonTitleTag($params,$args) {
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];
	}

	private function getVideoButtonClasses($params){
	    $videoClasses = '';

        if($params['type'] == 'solid') {
            $videoClasses = 'video-button-solid';
        }

        if($params['type'] == 'gradient'){
            $videoClasses = 'video-button-gradient';
        }

        return $videoClasses;
    }

    private function getBackgroundStyle($params) {
        $style = array();

        if(!empty($params['background_color'])) {
            $style[] = 'background-color: ' . $params['background_color'];
        }

        if(!empty($params['background_color_1']) && $params['type']== 'gradient') {
            $style[] = 'background: -moz-linear-gradient(bottom, '.$params['background_color'].' 0%, '.$params['background_color_1'].' 100%);background: -webkit-linear-gradient(bottom, '.$params['background_color'].' 0%, '.$params['background_color_1'].' 100%);background: linear-gradient(to top, '.$params['background_color'].' 0%, '.$params['background_color_1'].' 100%);';
        }
        return $style;
    }
}
