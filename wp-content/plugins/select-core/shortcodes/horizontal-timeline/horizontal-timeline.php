<?php
namespace TargetQodef\Modules\Shortcodes\HorizontalTimeline;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class ProductList that represents product list shortcode
 * @package TargetQodef\Modules\Shortcodes\HorizontalTimeline
 */
class HorizontalTimeline implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct()
    {
        $this->base = 'qodef_horizontal_timeline';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap()
    {
        vc_map(array(
            'name' => esc_html__('Select Horizontal Timeline', 'select-core'),
            'base' => $this->base,
            'category' => esc_html__('by SELECT','select-core'),
            'icon' => 'icon-wpb-horizontal-timeline extended-custom-icon',
            'js_view' => 'VcColumnView',
            'as_parent' => array('only' => 'qodef_horizontal_timeline_item'),
            'params' => array(
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Timeline Position', 'select-core'),
                    'param_name'  => 'position',
                    'value'       => array(
                        esc_html__('Top' , 'select-core')       => 'top',
                        esc_html__('Bottom', 'select-core')     => 'bottom'
                    )
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
    public function render($atts, $content = null)
    {
        $default_atts = array(
            'position' => 'top'
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $params['timeline_params'] = $this->getTimelineParams($content);
        $params['content'] = $content;
        $timeline_class = 'qodef-timeline-' . $position;

        $html = "<div class='qodef-horizontal-timeline " . $timeline_class . "'>";
        $html .= select_core_get_shortcode_template_part('templates/horizontal-timeline-' . $position . '-template','horizontal-timeline', '', $params);
        $html .= "</div>";

        return $html;
    }

    public function getTimelineParams($content)
    {

        // Extract timeline labels

        preg_match_all('/timeline_label="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $timeline_labels = array();

        if (isset($matches[0])) {
            $timeline_labels = $matches[0];
        }

        $timeline_labels_array = array();

        foreach ($timeline_labels as $label) {
            preg_match('/timeline_label="([^\"]+)"/i', $label[0], $labels_matches, PREG_OFFSET_CAPTURE);
            $timeline_labels_array[] = $labels_matches[1][0];
        }

        // Extract timeline dates

        preg_match_all('/timeline_date="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $timeline_dates = array();

        if (isset($matches[0])) {
            $timeline_dates = $matches[0];
        }

        $timeline_dates_array = array();

        foreach ($timeline_dates as $date) {
            preg_match('/timeline_date="([^\"]+)"/i', $date[0], $date_matches, PREG_OFFSET_CAPTURE);
            $timeline_dates_array[] = $date_matches[1][0];
        }

        if(sizeof($timeline_dates_array) == 0) {
            for($i = 0; $i < sizeof($timeline_labels_array); $i++) {
                $timeline_dates_array[] = $i;
            }
        }
        else if(((!$timeline_dates_array) || sizeof($timeline_dates_array)) < sizeof($timeline_labels_array)) {
            for ($i = 1; $i <= (sizeof($timeline_labels_array) - sizeof($timeline_dates_array)); $i++) {
                $day = sprintf('%02d', $i);
                $timeline_dates_array[] = $day . '/' . date('m') . '/' . date('Y');
            }
        }

        $timeline_params = array_combine($timeline_dates_array, $timeline_labels_array);
        return $timeline_params;
    }
}