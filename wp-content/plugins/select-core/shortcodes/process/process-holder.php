<?php
namespace TargetQodef\Modules\Shortcodes\Process;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
class ProcessHolder implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'qodef_process_holder';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => esc_html__('Process', 'select-core'),
            'base'                    => $this->getBase(),
            'as_parent'               => array('only' => 'qodef_process_item'),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'category'                => esc_html__('by SELECT','select-core'),
            'icon'                    => 'icon-wpb-process extended-custom-icon',
            'js_view'                 => 'VcColumnView',
            'params'                  => array(
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'number_of_items',
                    'heading'     => esc_html__('Number of Process Items', 'select-core'),
                    'value'       => array(
                        esc_html__('Three', 'select-core') => 'three',
                        esc_html__('Four', 'select-core')  => 'four',
                        esc_html__('Five', 'select-core')  => 'five'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'param_name'  => 'animate_process_items',
                    'heading'     => esc_html__('Animate Process Items when they enter the viewport', 'select-core'),
                    'value'       => array(
                        esc_html__('Yes', 'select-core') => 'yes',
                        esc_html__('No', 'select-core')  => 'no',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'number_of_items' => '',
            'animate_process_items' => 'yes'
        );

        $params            = shortcode_atts($default_atts, $atts);
        $params['content'] = $content;

        $params['holder_classes'] = array(
            'qodef-process-holder',
            'clearfix',
            'qodef-process-holder-items-'.$params['number_of_items'],
            'qodef-animate-process-items-'.$params['animate_process_items']
        );

        return select_core_get_shortcode_template_part('templates/process-holder-template', 'process', '', $params);
    }
}