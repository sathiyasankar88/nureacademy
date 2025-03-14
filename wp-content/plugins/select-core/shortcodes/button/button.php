<?php
namespace TargetQodef\Modules\Shortcodes\Button;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package TargetQodef\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_button';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Select Button', 'select-core'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT','select-core'),
            'icon'                      => 'icon-wpb-button extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size', 'select-core'),
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Default', 'select-core')                => '',
                            esc_html__('Small' , 'select-core')                 => 'small',
                            esc_html__('Medium', 'select-core')                 => 'medium',
                            esc_html__('Large', 'select-core')                  => 'large',
                            esc_html__('Extra Large', 'select-core')            => 'huge',
                            esc_html__('Extra Large Full Width', 'select-core') => 'huge-full-width'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Type', 'select-core'),
                        'param_name'  => 'type',
                        'value'       => array(
                            esc_html__('Default', 'select-core') => '',
                            esc_html__('Outline', 'select-core') => 'outline',
                            esc_html__('Solid', 'select-core')   => 'solid',
                            esc_html__('Transparent', 'select-core')   => 'transparent'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Text', 'select-core'),
                        'param_name'  => 'text',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'select-core'),
                        'param_name'  => 'link',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Link Target', 'select-core'),
                        'param_name'  => 'target',
                        'value'       => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Custom CSS class', 'select-core'),
                        'param_name'  => 'custom_class',
                        'admin_label' => true
                    )
                ),
                target_qodef_icon_collections()->getVCParamsArray(array(), '', true),
                array(
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Color', 'select-core'),
                        'param_name'  => 'color',
                        'group'       => esc_html__('Design Options', 'select-core'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Color', 'select-core'),
                        'param_name'  => 'hover_color',
                        'group'       => esc_html__('Design Options', 'select-core'),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color', 'select-core'),
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid')),
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Background Color', 'select-core'),
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Border Color', 'select-core'),
                        'param_name'  => 'border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Border Color', 'select-core'),
                        'param_name'  => 'hover_border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('solid','outline','')),
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Font Size (px)', 'select-core'),
                        'param_name'  => 'font_size',
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Font Weight', 'select-core'),
                        'param_name'  => 'font_weight',
                        'value'       => array(
                            esc_html__('Default', 'select-core') => '',
                            esc_html__('Thin', 'select-core') 	=> '100',
                            esc_html__('Extra Light', 'select-core')   => '200',
                            esc_html__('Light', 'select-core')   => '300',
                            esc_html__('Normal', 'select-core')   => '400',
                            esc_html__('Medium', 'select-core')   => '500',
                            esc_html__('Semi Bold', 'select-core')   => '600',
                            esc_html__('Bold', 'select-core')   => '700',
                            esc_html__('Extra Bold', 'select-core')   => '800',
                            esc_html__('Ultra Bold', 'select-core')   => '900'
                        ),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'select-core'),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Padding', 'select-core'),
                        'param_name'  => 'padding',
                        'description' => esc_html__('Padding left/right', 'select-core'),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Margin', 'select-core'),
                        'param_name'  => 'margin',
                        'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'select-core'),
                        'admin_label' => true,
                        'group'       => esc_html__('Design Options', 'select-core')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Hover Behavior', 'select-core'),
                        'param_name'  => 'hover_behavior',
                        'value'       => array(
                            esc_html__('Text flip', 'select-core') => 'flip',
                            esc_html__('Basic', 'select-core')   => 'basic',
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('','solid', 'outline')),
                        'group'       => esc_html__('Behavior', 'select-core')
                    )
                )
            ) //close array_merge
        ));
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'type'                   => '',
            'text'                   => '',
            'link'                   => '',
            'target'                 => '',
            'color'                  => '',
            'hover_color'            => '',
            'background_color'       => '',
            'hover_background_color' => '',
            'border_color'           => '',
            'hover_border_color'     => '',
            'font_size'              => '',
            'font_weight'            => '',
            'padding'                => '',
            'margin'                 => '',
            'custom_class'           => '',
            'html_type'              => 'anchor',
            'input_name'             => '',
            'hover_behavior'         => 'flip',
            'custom_attrs'           => array()
        );

        $default_atts = array_merge($default_atts, target_qodef_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        if($params['html_type'] !== 'input') {
            $iconPackName   = target_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $iconPackName ? $params[$iconPackName] : '';
            $iconParams = array();
            $iconParams['icon_attributes']['class'] = 'qodef-btn-icon-element';
            $params['icon_params'] = $iconParams;
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']      = $this->getButtonClasses($params);
        $params['button_custom_attrs'] = !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']       = $this->getButtonStyles($params);
        $params['button_data']         = $this->getButtonDataAttr($params);

        return select_core_get_shortcode_template_part('templates/'.$params['html_type'], 'button', '', $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color'])) {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.target_qodef_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['padding'])) {
            $styles[] = 'padding-left: '.$params['padding'].'px';
        }

        if(!empty($params['padding'])) {
            $styles[] = 'padding-right: '.$params['padding'].'px';
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'qodef-btn',
            'qodef-btn-'.$params['size'],
            'qodef-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'qodef-btn-custom-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'qodef-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_behavior']) && $params['type'] != 'transparent') {
            $buttonClasses[] = 'qodef-btn-'.$params['hover_behavior'];
        }

        return $buttonClasses;
    }
}