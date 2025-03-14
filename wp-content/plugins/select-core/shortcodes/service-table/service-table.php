<?php
namespace TargetQodef\Modules\ServiceTable;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ServiceTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_service_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

        $service_array = array();



        for ($y = 1; $y <= 8 ; $y++) {
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => sprintf(esc_html__('Feature %s Title', 'select-core'), $y),
                'param_name' => 'feature_' . $y . '_title',
                'value' => '',
                'group' => esc_html__('Features' , 'select-core')
            );
        }


        for ($x = 1; $x <= 3; $x++) {

            $service_array[] = array(
                'type' => 'dropdown',
                'heading' => sprintf(esc_html__('Service %s Enabled', 'select-core'), $x),
                'param_name' => 'service_'.$x.'_enabled',
                'value' => array(
                    '' => '',
                    esc_html__('No', 'select-core') => 'no',
                    esc_html__('Yes', 'select-core') => 'yes'
                ),
                'save_always' => true
            );

            $service_array[] = array(
                'type' => 'textfield',
                'heading' => sprintf(esc_html__('Service %s Title', 'select-core'), $x),
                'param_name' => 'service_'.$x.'_title',
                'value' => '',
                'dependency' => array('element' => 'service_'.$x.'_enabled', 'value' => 'yes')
            );

            $service_array[] = array(
                'type' => 'dropdown',
                'heading' => sprintf(esc_html__('Button %s Enabled', 'select-core'), $x),
                'param_name' => 'service_'.$x.'_button_enabled',
                'value' => array(
                    '' => '',
                    esc_html__('No', 'select-core') => 'no',
                    esc_html__('Yes', 'select-core') => 'yes'
                )
            );

            $service_array[] = array(
                'type' => 'textfield',
                'heading' => sprintf(esc_html__('Button %s Text', 'select-core'), $x),
                'param_name' => 'button_'.$x.'_text',
                'value' => '',
                'dependency' => array('element' => 'service_'.$x.'_button_enabled', 'value' => 'yes')
            );

            $service_array[] = array(
                'type' => 'textfield',
                'heading' => sprintf(esc_html__('Button %s Link', 'select-core'), $x),
                'param_name' => 'button_'.$x.'_link',
                'value' => '',
                'dependency' => array('element' => 'service_'.$x.'_button_enabled', 'value' => 'yes')
            );

            $service_array[] = array(
                'type' => 'dropdown',
                'heading' => sprintf(esc_html__('Button %s Target', 'select-core'), $x),
                'param_name' => 'button_'.$x.'_target',
                'value' => array(
                    '' => '',
                    esc_html__('Self', 'select-core') => '_self',
                    esc_html__('Blank', 'select-core') => '_blank'
                ),
                'save_always' => true,
                'dependency' => array('element' => 'service_'.$x.'_button_enabled', 'value' => 'yes')
            );


            for ($y = 1; $y <= 8; $y++) {


                $service_array[] = array(
                    'type' => 'dropdown',
                    'heading' => sprintf(esc_html__('Feature %s Enable', 'select-core'), $y),
                    'param_name' => 'feature_' . $y . '_' . $x . '_enabled',
                    'value' => array(
                        '' => '',
                        esc_html__('No', 'select-core') => 'no',
                        esc_html__('Yes', 'select-core') => 'yes'
                    ),
                    'group' => sprintf(esc_html__('Service %s ', 'select-core'),$x ),
                    'dependency' => array('element' => 'feature_'.$y.'_title', 'not_empty' => true)
                );
            }

        }


		vc_map( array(
			'name' => 'Select Service Table',
			'base' => $this->base,
			'icon' => 'icon-wpb-service-table extended-custom-icon',
			'category' => esc_html__('by SELECT','select-core'),
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
                array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Feature Column Title', 'select-core'),
                        'param_name' => 'feature_column_title',
                        'admin_label' => true
                    )
                ),
                $service_array
            )
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
            'feature_column_title'  => ''
		);

        $service_count = 3;
        $features_count = 8;
        $feature_fields = array();
        $service_fields = array();
        $service_feature_fields = array();
        $service_buttons = array();
        $service_buttons_text = array();
        $service_buttons_link = array();
        $service_buttons_target = array();

        for($y = 1; $y <= $features_count; $y++) {
            $feature_fields['feature_' . $y . '_title'] = '';
        }



        for ($x = 1; $x <= $service_count; $x++) {
            for ($y = 1; $y <= $features_count; $y++) {
                $service_feature_fields['feature_' . $y . '_' . $x . '_enabled'] = '';
            }

            $service_fields['service_'.$x.'_enabled'] = '';
            $service_fields['service_'.$x.'_title'] = '';

        }

        for ($y = 1; $y <= $service_count; $y++) {
            $service_buttons['service_' . $y . '_button_enabled'] = '';
        }

        for ($y = 1; $y <= $service_count; $y++) {
            $service_buttons_text['button_' . $y . '_text'] = '';
        }

        for ($y = 1; $y <= $service_count; $y++) {
            $service_buttons_link['button_' . $y . '_link'] = '';
        }

        for ($y = 1; $y <= $service_count; $y++) {
            $service_buttons_target['button_' . $y . '_target'] = '';
        }



        $args = array_merge($args, $service_fields, $feature_fields, $service_feature_fields, $service_buttons, $service_buttons_text, $service_buttons_link, $service_buttons_target);
        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['service_count'] = $service_count;
        $params['features_count'] = $features_count;

        $params['table_titles'] = $this->getTableTitles($params);
        $params['table_rows'] = $this->getTableRows($params);
        $params['table_buttons'] = $this->getTableButtons($params);
        $params['enabled_services'] = $this -> getEnabledServices($params);
        $cols = $this->getColNumber($params);

		$html = '';

        $html .= '<div class="qodef-service-table qodef-cols-' . $cols . '">';
        $html .= '<div class="qodef-service-table-inner">';
        $html .= '<table class="qodef-service-table-holder">';
		
		$html .= select_core_get_shortcode_template_part('templates/service-table-template','service-table', '', $params);

        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
		return $html;

	}


    private function getEnabledServices($params) {

        extract($params);
        $count_enabled = 1;

        for ($x = 1; $x <= $service_count; $x++) {
            if($params['service_'.$x.'_enabled'] == 'yes') {
                $count_enabled++;
            }
        }
        return $count_enabled;
    }


    private function getTableTitles($params) {

        extract($params);
        $titles = array();

        $titles[] = $params['feature_column_title'];

        for ( $i = 1; $i <= $service_count; $i++ ) {
            if($params['service_'.$i.'_enabled'] == 'yes') {
                $titles[] = ${'service_' . $i . '_title'};
            }
        }

        return $titles;

    }

    private function getTableButtons($params) {

        extract($params);
        $button_params_array = array();

        for ( $i = 1; $i <= $service_count; $i++ ) {
            if($params['button_'.$i.'_text'] !== '') {
                $array_temp = array();
                $array_temp['text'] = $params['button_'.$i.'_text'];
                $array_temp['link'] = $params['button_'.$i.'_link'];
                $array_temp['target'] = $params['button_'.$i.'_target'];
                $array_temp['type'] = 'transparent';
                $button_params_array[] = $array_temp;
            }
        }


        return $button_params_array;

    }

    private function getColNumber($params) {

        extract($params);
        $cols = 0;

        for ( $i = 1; $i <= $service_count; $i++ ) {
            if($params['service_'.$i.'_enabled'] == 'yes') {
                $cols++;
            }
        }

        return $cols;

    }

    private function getTableRows($params) {

        extract($params);
        $features = array();

        for ( $i = 1; $i <= $features_count; $i++ ) {
            if($params['feature_' . $i . '_title'] != '') {
                $feature_title = ${'feature_' . $i . '_title'};
                $feature_enabled = array();
                for ( $j = 1; $j <= $service_count; $j++ ) {
                    if($params['service_'.$j.'_enabled'] == 'yes') {
                        $feature_enabled[] = $params['feature_' . $i . '_' . $j . '_enabled'];
                    }
                }

                $feature['title'] = $feature_title;
                $feature['features_enabled'] = $feature_enabled;

                $features[] = $feature;
            }
        }

        return $features;

    }

}
