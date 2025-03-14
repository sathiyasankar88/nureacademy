<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class TargetQodefSeparatorWidget extends TargetQodefWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'qode_separator_widget', // Base ID
            esc_html__('Select Separator Widget', 'select-core') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'select-core'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'select-core'),
                    'full-width' => esc_html__('Full Width' , 'select-core')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'select-core'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'select-core'),
                    'left' => esc_html__('Left', 'select-core'),
                    'right' => esc_html__('Right', 'select-core')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'select-core'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'select-core'),
                    'dashed' => esc_html__('Dashed', 'select-core'),
                    'dotted' => esc_html__('Dotted', 'select-core'),
                    'gradient' => esc_html__('Gradient', 'select-core')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color 1', 'select-core'),
                'name' => 'color_1'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color 2', 'select-core'),
                'name' => 'color_2',
                'description' => esc_html__('Use it if Style is set to Gradient', 'select-core')
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'select-core'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'select-core'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'select-core'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'select-core'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget qodef-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[qodef_separator $params]"); // XSS OK

        echo '</div>'; //close div.qodef-separator-widget
    }
}