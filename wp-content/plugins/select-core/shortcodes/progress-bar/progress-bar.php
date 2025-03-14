<?php
namespace TargetQodef\Modules\Shortcodes\ProgressBar;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'qodef_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Select Progress Bar', 'select-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__('by SELECT','select-core'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'select-core'),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
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
					'admin_label' => true,
					'heading' => esc_html__('Percentage', 'select-core'),
					'param_name' => 'percent',
					'description' => ''
				),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Style', 'select-core'),
                    'param_name' => 'style',
                    'value' => array(
                        esc_html__('Solid', 'select-core')   => 'solid',
                        esc_html__('Gradient', 'select-core') => 'gradient'
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Active Bar Color ', 'select-core'),
                    'param_name' => 'active_color',
                    'description' => '',
                    'dependency' => array('element' => 'style', 'value' => array('solid'))
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Active Gradient Bar Color 1', 'select-core'),
                    'param_name' => 'active_color_1',
                    'description' => esc_html__('First color for gradient', 'select-core'),
                    'dependency' => array('element' => 'style', 'value' => array('gradient'))
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Active Gradient Bar Color 2', 'select-core'),
                    'param_name' => 'active_color_2',
                    'description' => esc_html__('Second color for gradient', 'select-core'),
                    'dependency' => array('element' => 'style', 'value' => array('gradient'))
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Inactive Bar Color', 'select-core'),
                    'param_name' => 'inactive_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Font Size (px)', 'select-core'),
                    'param_name' => 'title_font_size',
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Font Weight', 'select-core'),
                    'param_name' => 'title_font_weight',
                    'value'       => target_qodef_get_font_weight_array( true ),
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Color', 'select-core'),
                    'param_name' => 'title_color',
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Digit Font Size (px)', 'select-core'),
                    'param_name' => 'digit_font_size',
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Digit Font Weight', 'select-core'),
                    'param_name' => 'digit_font_weight',
                    'value'       => target_qodef_get_font_weight_array( true ),
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Digit Color', 'select-core'),
                    'param_name' => 'digit_color',
                    'description' => '',
                    'group'       =>esc_html__( 'Design Options','select-core')
                )

			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h5',
            'percent' => '100',
            'style' => 'solid',
            'inactive_color' => '',
            'active_color' => '',
            'active_color_1' => '',
            'active_color_2' => '',
            'title_font_size'=>'',
            'title_font_weight'=>'',
            'title_color'   =>'',
            'digit_font_size'=>'',
            'digit_font_weight'=>'',
            'digit_color'   =>''

        );
		$params = shortcode_atts($args, $atts);

        $params['bar_style'] = $this->getBarStyle($params);
        $params['active_bar_style'] = $this->getActiveBarStyle($params);
        $params['bar_classes']      = $this->getBarClasses($params);
        $params['title_style'] = $this->getTitleStyle($params);
        $params['digit_style'] = $this->getDigitStyle($params);

        //init variables
		$html = select_core_get_shortcode_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}

    /**
     * Generates bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getBarStyle($params) {
        $style = array();
        if(!empty($params['inactive_color'])) {
            $style[] = 'background-color: ' . $params['inactive_color'];
        }
        return $style;
    }

    /**
     * Generates active bar style
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveBarStyle($params) {
        $style = array();
        if($params['style'] == 'solid'  && $params['active_color'] !== '' ) {
            $style[] = 'background-color: ' . $params['active_color'];
        }
        if($params['style'] == 'gradient'  && $params['active_color_1'] !== '' && $params['active_color_2'] !== '' ) {
            $style[] = 'background-color:background: -webkit-linear-gradient(left,'.$params['active_color_1'].','.$params['active_color_2'].'); background: -o-linear-gradient(right,'.$params['active_color_1'].','.$params['active_color_2'].');  background: -moz-linear-gradient(right,'.$params['active_color_1'].','.$params['active_color_2'].'); background: linear-gradient(to right,'.$params['active_color_1'].','.$params['active_color_2'].'); ' ;
        }
        return $style;
    }

    private function getBarClasses($params) {
        $barClasses = '';

        if($params['style'] == 'solid') {
            $barClasses = 'qodef-progress-solid';
        }

        if($params['style'] == 'gradient' ) {
            $barClasses = 'qodef-progress-gradient';
        }

        return $barClasses;
    }
    /**
     * Generates title style
     *
     * @param $params
     *
     * @return array
     */

    private function getTitleStyle($params){
        $style = array();
        if($params['title_font_size']!=='') {
            $style[] = 'font-size: ' . target_qodef_filter_px($params['title_font_size']).'px';
        }
        if($params['title_font_weight']!=='') {
            $style[] = 'font-weight: ' . $params['title_font_weight'];
        }
        if($params['title_color']!=='') {
            $style[] = 'color: ' . $params['title_color'];
        }

        return $style;
    }

    /**
     * Generates digit style
     *
     * @param $params
     *
     * @return array
     */

    private function getDigitStyle($params){
        $style = array();
        if($params['digit_font_size']!=='') {
            $style[] = 'font-size: ' . target_qodef_filter_px($params['digit_font_size']).'px';
        }
        if($params['digit_font_weight']!=='') {
            $style[] = 'font-weight: ' . $params['digit_font_weight'];
        }
        if($params['digit_color']!=='') {
            $style[] = 'color: ' . $params['digit_color'];
        }

        return $style;
    }

}