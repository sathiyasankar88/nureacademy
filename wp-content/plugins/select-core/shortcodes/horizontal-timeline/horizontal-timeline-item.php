<?php
namespace TargetQodef\Modules\Shortcodes\HorizontalTimelineItem;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class ProductList that represents product list shortcode
 * @package TargetQodef\Modules\Shortcodes\HorizontalTimelineItem
 */
class HorizontalTimelineItem implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_horizontal_timeline_item';

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
            'name'                      => esc_html__('Select Horizontal Timeline Item', 'select-core'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT','select-core'),
            'icon'                      => 'icon-wpb-horizontal-timeline-item extended-custom-icon',
            'js_view'                   => 'VcColumnView',
            'as_child'                  => array('only' => 'qodef_horizontal_timeline'),
            'as_parent' => array('only' => 'vc_single_image, qodef_button, qodef_icon, qodef_icon_list_item, qodef_icon_with_text, qodef_list_ordered, qodef_progress_bar, qodef_separator, qodef_unordered_list, qodef_video_button, vc_empty_space, vc_column_text, qodef_custom_font'),
            'params'                    => array(
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'heading' => esc_html__('Timeline Label', 'select-core'),
                    'param_name' => 'timeline_label'
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'heading' => esc_html__('Timeline Date', 'select-core'),
                    'param_name' => 'timeline_date',
                    'description' => esc_html__('Enter date in format dd/mm/yyyy.', 'select-core')
                ),
                array(
                    'type' => 'attach_image',
                    'class' => '',
                    'heading' => esc_html__('Content Image', 'select-core'),
                    'param_name' => 'content_image',
                    'value' => '',
                    'description' => ''
                )
            )
        ));
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'timeline_label' => '',
            'timeline_date' => '',
            'content_image' => '',
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);
        $html = "<li class='qodef-hti-content' data-date='" . esc_attr($timeline_date) . "'>";
        $html .= "<div class='qodef-hti-content-inner'>";
        $html .= "<div class='qodef-hti-content-inner-shadow'>";
        $html .= "<div class='qodef-hti-content-image'>";
        $html .= wp_get_attachment_image($content_image, 'full');
        $html .= "</div>";
        $html .= "<div class='qodef-hti-content-value'>";
        $html .= do_shortcode($content);
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</li>";

        return $html;
    }
}