<?php
namespace TargetQodef\Modules\Shortcodes\Process;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'qodef_process_item';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name'                    => esc_html__('Process Item', 'select-core'),
            'base'                    => $this->getBase(),
            'as_child'                => array('only' => 'qodef_process_holder'),
            'category'                => esc_html__('by SELECT','select-core'),
            'icon'                    => 'icon-wpb-process-item extended-custom-icon',
            'show_settings_on_create' => true,
            'params'                  => array_merge(
                \TargetQodefIconCollections::get_instance()->getVCParamsArray(), array(
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Title',
                    'param_name'  => 'title',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => 'Text',
                    'param_name'  => 'text',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => 'Number',
                    'param_name'  => 'number',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background Color', 'select-core'),
                    'param_name' => 'background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color', 'select-core'),
                    'param_name' => 'title_color',
                    'description' => ''
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Text Color', 'select-core'),
                    'param_name' => 'text_color',
                    'description' => ''
                ),
            ))
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'image'             => '',
            'title'             => '',
            'text'              => '',
            'number'            => '',
            'background_color'  =>'',
            'text_color'  =>'',
            'title_color'  =>''
        );

        $args = array_merge($args, target_qodef_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);
        extract($params);

        $iconPackName = target_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $params['icon'] = $params[$iconPackName];
        $params['background_color'] =$this->getBackgroundColor($params);
        $params['title_color'] =$this->getTitleColor($params);
        $params['text_color'] =$this->getTextColor($params);

        $params['item_classes'] = array(
            'qodef-process-item-holder'
        );



        return select_core_get_shortcode_template_part('templates/process-item-template', 'process', '', $params);
    }

    private function getBackgroundColor($params){

        $style='';

        if($params['background_color']!==''){
            $style.='background-color:'.$params['background_color'];
        }

        return $style;
    }

    private function getTitleColor($params){

        $style='';

        if($params['title_color']!==''){
            $style.='color:'.$params['title_color'];
        }

        return $style;
    }

    private function getTextColor($params){

        $style='';

        if($params['text_color']!==''){
            $style.='color:'.$params['text_color'];
        }

        return $style;
    }

}