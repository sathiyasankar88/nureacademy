<?php
namespace TargetQodef\Modules\Shortcodes\Counter;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_counter';

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
            'name' => esc_html__('Select Counter', 'select-core'),
            'base' => $this->getBase(),
            'category' => esc_html__('by SELECT','select-core'),
            'admin_enqueue_css' => array(target_qodef_get_skin_uri().'/assets/css/qodef-vc-extend.css'),
            'icon' => 'icon-wpb-counter extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Type', 'select-core'),
                    'param_name' => 'type',
                    'value' => array(
                        esc_html__('Zero Counter', 'select-core') => 'zero',
                        esc_html__('Random Counter', 'select-core') => 'random'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Style', 'select-core'),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__('Icon Above Text', 'select-core') => 'above',
                        esc_html__('Icon Left From Text', 'select-core') => 'left'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Text Position', 'select-core'),
                    'param_name' => 'position',
                    'value' => array(
                        esc_html__('Left', 'select-core') => 'left',
                        esc_html__('Right', 'select-core') => 'right',
                        esc_html__('Center', 'select-core') => 'center'
                    ),
                    'save_always' => true,
                    'description' => '',
                    'dependency' => array('element' => 'style', 'value' => 'above')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Digit', 'select-core'),
                    'param_name' => 'digit',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Digit Font Size (px)', 'select-core'),
                    'param_name' => 'font_size',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Digit Color', 'select-core'),
                    'param_name' => 'digit_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'select-core'),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Title Tag', 'select-core'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        ''   => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Text', 'select-core'),
                    'param_name' => 'text',
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Icon Font Size (px)', 'select-core'),
                    'param_name' => 'icon_font_size',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Icon Color', 'select-core'),
                    'param_name' => 'icon_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color', 'select-core'),
                    'param_name' => 'title_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Text Color', 'select-core'),
                    'param_name' => 'text_color',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Padding Bottom(px)', 'select-core'),
                    'param_name' => 'padding_bottom',
                    'description' => '',
                    'group' => esc_html__('Design Options', 'select-core')
                )
            ),
                target_qodef_icon_collections()->getVCParamsArray()
            )
        ) );

    }

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
            'type' => '',
            'style' => '',
            'position' => '',
            'digit' => '',
            'underline_digit' => '',
            'title' => '',
            'title_tag' => 'h5',
            'font_size' => '',
            'digit_color' => '',
            'icon_font_size' => '',
            'icon_color' => '',
            'title_color' => '',
            'text_color' => '',
            'text' => '',
            'padding_bottom' => ''

		);
        $args = array_merge($args, target_qodef_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

		//get correct heading value. If provided heading isn't valid get the default one
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
        $params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];
        $params['icon'] = $this->getCounterIcon($params);
        $params['counter_holder_styles'] = $this->getCounterHolderStyle($params);
        $params['counter_styles'] = $this->getCounterStyle($params);
        $params['title_styles'] = $this->getTitleStyle($params);
        $params['text_styles'] = $this->getTextStyle($params);

		//Get HTML from template
            $html = select_core_get_shortcode_template_part('templates/counter-template-'.$params['style'], 'counter', '', $params);



		return $html;

	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderStyle($params) {
		$counterHolderStyle = array();

		if ($params['padding_bottom'] !== '') {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode(';', $counterHolderStyle);
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterStyle($params) {
		$counterStyle = array();

		if ($params['font_size'] !== '') {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}

        if ($params['digit_color'] !== '') {
            $counterStyle[] = 'color: ' . $params['digit_color'];
        }

		return implode(';', $counterStyle);
	}

    private function getIconStyles($params) {

        $iconStyles = array();

        if ($params['icon_color'] !== '') {
            $iconStyles[] = 'color: ' . $params['icon_color'];
        }

        if ($params['icon_font_size'] !== '') {
            $iconStyles[] = 'font-size: ' . $params['icon_font_size'] . 'px';
        }

        return implode(';', $iconStyles);

    }

    private function getCounterIcon($params) {

        $icon = target_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $iconStyles = array();
        $iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

        $counter_icon = target_qodef_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles);

        return $counter_icon;

    }

    /**
     * Return Title styles
     *
     * @param $params
     * @return string
     */
    private function getTitleStyle($params) {
        $titleStyle = array();

        if ($params['title_color'] !== '') {
            $titleStyle[] = 'color: ' . $params['title_color'];
        }

        return implode(';', $titleStyle);
    }


    /**
     * Return Title styles
     *
     * @param $params
     * @return string
     */
    private function getTextStyle($params) {
        $textStyle = array();

        if ($params['title_color'] !== '') {
            $textStyle[] = 'color: ' . $params['text_color'];
        }

        return implode(';', $textStyle);
    }
}