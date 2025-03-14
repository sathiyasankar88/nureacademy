<?php
namespace TargetQodef\Modules\Shortcodes\AdvancedVerticalSliderItem;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class AdvancedVerticalSliderItem
 */
class AdvancedVerticalSliderItem implements ShortcodeInterface {

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'qodef_advanced_vertical_slider_item';

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
            'name' => esc_html__('Select AVS Item', 'select-core'),
            'base' => $this->getBase(),
            'category' => esc_html__('by SELECT','select-core'),
            'as_child' => array('only' => 'qodef_advanced_vertical_slider'),
            'as_parent' => array('only' => 'vc_single_image, qodef_button, qodef_icon, qodef_icon_list_item, qodef_icon_with_text, qodef_list_ordered, qodef_progress_bar, qodef_separator, qodef_unordered_list, qodef_video_button, vc_empty_space, vc_column_text, qodef_custom_font'),
            'content_element' => true,
            'icon' => 'icon-wpb-advanced-vertical-slider-item extended-custom-icon',
            'js_view' => 'VcColumnView',
            'params' => array(
                array(
                    'type'			=> 'attach_image',
                    'heading'		=> esc_html__('Mobile Slider Image', 'select-core'),
                    'param_name'	=> 'avs_mobile_image',
                    'description'	=> 'Number of image should match with number of items'
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__('Background Color', 'select-core'),
                    'param_name' => 'avs_background_color',
                    'value' => '',
                    'description' => ''
                ),
                array(
                    'type' => 'attach_image',
                    'class' => '',
                    'heading' => esc_html__('Background Image', 'select-core'),
                    'param_name' => 'avs_background_image',
                    'value' => '',
                    'description' => ''
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Header Skin', 'select-core'),
                    'param_name'  => 'header_skin',
                    'value'       => array(
                        esc_html__('Default', 'select-core') => '',
                        esc_html__('Light', 'select-core') => 'light',
                        esc_html__('Dark', 'select-core')   => 'dark'
                    ),
                    'save_always' => true,
                    'admin_label' => true
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
            'avs_mobile_image' => '',
            'avs_background_color' => '',
            'avs_background_image' => '',
            'header_skin' => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);
        $params['content']= $content;

        $html = '';

        $html .= select_core_get_shortcode_template_part('templates/avs-item-template', 'advanced-vertical-slider', '', $params);

        return $html;
    }
}