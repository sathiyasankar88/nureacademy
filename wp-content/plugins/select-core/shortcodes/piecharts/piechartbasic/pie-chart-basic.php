<?php
namespace TargetQodef\Modules\Shortcodes\PieCharts\PieChartBasic;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class PieChartBasic
 */
class PieChartBasic implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'qodef_pie_chart';

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
			'name' => esc_html__('Select Pie Chart', 'select-core'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart extended-custom-icon',
			'category' => esc_html__('by SELECT','select-core'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Percentage', 'select-core'),
					'param_name' => 'percent',
					'description' => '',
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'select-core'),
					'param_name' => 'title',
					'description' => '',
					'admin_label' => true
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
					'description' => '',
					'admin_label' => true
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Active Color', 'select-core'),
                    'param_name' => 'active_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Inactive Color', 'select-core'),
                    'param_name' => 'inactive_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'select-core')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Size(px)', 'select-core'),
					'param_name' => 'size',
					'description' => '',
					'admin_label' => true,
					'group' => esc_html__('Design Options', 'select-core')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Margin below chart (px)', 'select-core'),
					'param_name' => 'margin_below_chart',
					'description' => '',
					'group' => esc_html__('Design Options', 'select-core')
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color', 'select-core'),
                    'param_name' => 'title_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Text Color', 'select-core'),
                    'param_name' => 'text_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'select-core')
                )
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
			'size' => '',
			'type_of_central_text' => 'percent',
			'title' => '',
			'title_tag' => 'h5',
			'percent' => '',
			'text' => '',
            'active_color' => '',
            'inactive_color' => '',
			'margin_below_chart' => '',
            'title_color' => '',
            'text_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['title_tag'] = $this->getValidTitleTag($params, $args);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
		$params['title_style'] = $this->getPieChartTitleStyle($params);
		$params['text_style'] = $this->getPieChartTextStyle($params);

		$html = select_core_get_shortcode_template_part('templates/pie-chart-basic', 'piecharts/piechartbasic', '', $params);

		return $html;


	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @param $args
	 */
	private function getValidTitleTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        else if (target_qodef_options()->getOptionValue('first_color') !== "") {
            $pieChartData['data-bar-color'] = target_qodef_options()->getOptionValue('first_color');
        }
        else {
            $pieChartData['data-bar-color'] = '#66dbc9';
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }
        else {
            $pieChartData['data-track-color'] = '#e3e3e3';
        }

		return $pieChartData;

	}

	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

    private function getPieChartTitleStyle($params) {

        $pieChartTitleStyle = array();

        if ($params['title_color'] !== '') {
            $pieChartTitleStyle[] = 'color: ' . $params['title_color'];
        }

        return $pieChartTitleStyle;

    }

    private function getPieChartTextStyle($params) {

        $pieChartTextStyle = array();

        if ($params['text_color'] !== '') {
            $pieChartTextStyle[] = 'color: ' . $params['text_color'];
        }

        return $pieChartTextStyle;

    }

}