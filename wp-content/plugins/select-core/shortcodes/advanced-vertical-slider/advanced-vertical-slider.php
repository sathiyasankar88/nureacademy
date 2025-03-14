<?php
namespace TargetQodef\Modules\Shortcodes\AdvancedVerticalSlider;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class AdvancedVerticalSlider
 */
class AdvancedVerticalSlider implements ShortcodeInterface {

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'qodef_advanced_vertical_slider';

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
            'name' => esc_html__('Select Advanced Vertical Slider', 'select-core'),
            'base' => $this->getBase(),
            'category' => esc_html__('by SELECT','select-core'),
            'icon' => 'icon-wpb-advanced-vertical-slider extended-custom-icon',
            'as_parent' => array('only' => 'qodef_advanced_vertical_slider_item'),
            'js_view' => 'VcColumnView',
            'show_settings_on_create' => false,
            'params' => array(

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

        $args = array();

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['mobile_images'] = $this->getMobileImages($params);
        $params['background_styles'] = $this->getBackgroundStyles($params);

        $html = '';
        $html .= '<div class="qodef-avs">'; //open qodef-avs

        //content part
        $html .= '<div class="qodef-avs-fixed-content qodef-avs-overlay-section">'; //open qodef-avs-fixed-content
        $html .= '<div class="qodef-avs-fixed-content-inner">';
        $html .= '<div class="qodef-avs-fixed-content-container">';

        $html .= select_core_get_shortcode_template_part('templates/avs-mobile-image-template', 'advanced-vertical-slider', '', $params); //render scrolling images and mobile holder

        $html .= '<div class="qodef-avs-fixed-content-text">';
        $html .= do_shortcode($content); //render textual content right of mobile with scrolling images
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= ' <a href="#" class="qodef-avs-down-arrow"><span class="lnr lnr-chevron-down"></span></a>';
        $html .= '</div>'; //close qodef-avs-fixed-content

        //background part
        $html .= '<div class="qodef-avs-scroll-content qodef-avs-overlay-section">';
        $html .= '<div class="qodef-avs-scroll-content-inner">';

        $html .= select_core_get_shortcode_template_part('templates/avs-background-image-template', 'advanced-vertical-slider', '', $params); //render fullscreen sections with background styles

        $html .= '</div>';
        $html .= '</div>';


        $html .= '</div>'; //close qodef-avs

        return $html;
    }

    private function getMobileImages($params) {

        $mobile_images_array = array();

        preg_match_all('/avs_mobile_image="([^\"]+)"/i', $params['content'], $mobile_images_matches, PREG_OFFSET_CAPTURE);

        if (isset($mobile_images_matches[0])) {
            $mobile_images = $mobile_images_matches[0];
        }

        foreach($mobile_images as $mobile_image) {
            preg_match('/avs_mobile_image="([^\"]+)"/i', $mobile_image[0], $slide_mobile_images_matches, PREG_OFFSET_CAPTURE);
            $mobile_images_array[] = $slide_mobile_images_matches[1][0];
        }

        return $mobile_images_array;
    }

    private function getBackgroundStyles($params) {

        $background_images_array = array();

        preg_match_all('/avs_background_image="([^\"]+)"/i', $params['content'], $background_images_matches, PREG_OFFSET_CAPTURE);
        preg_match_all('/avs_background_color="([^\"]+)"/i', $params['content'], $background_color_matches, PREG_OFFSET_CAPTURE);

        foreach($background_images_matches[1] as $background_image) {
            $image_matches[] = $background_image[0];
        }
        foreach($background_color_matches[1] as $color) {
            $color_matches[] = $color[0];
        }

        if(isset($image_matches)) {
            foreach($image_matches as $key=>$val1){ // Loop though one array
                $val2 = $color_matches[$key]; // Get the values from the other array
                $temp_style = array();
                if (isset($val2) && $val2 != '') {
                    $temp_style[] = 'background-color: ' . $val2;
                }
                if (isset($val1) && $val1 != '') {
                    $temp_style[] = 'background-image: url(' . wp_get_attachment_url($val1) . ')';
                }
                $background_images_array[] = $temp_style;
            }
        }

        return $background_images_array;
    }
}