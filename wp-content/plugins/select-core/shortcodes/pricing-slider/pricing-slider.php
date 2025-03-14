<?php
namespace TargetQodef\Modules\PricingSlider;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class PricingInfo that represents pricing info shortcode
 * @package TargetQodef\Modules\Shortcodes\PricingInfo
 */
class PricingSlider implements ShortcodeInterface
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
        $this->base = 'qodef_pricing_slider';

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
            'name' => esc_html__('Select Pricing Slider', 'select-core'),
            'base' => $this->base,
            'category' => esc_html__('by SELECT','select-core'),
            'icon' => 'icon-wpb-pricing-slider extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Info Layout', 'select-core'),
                    'param_name' => 'info_layout',
                    'value' => array(
                        '' => '',
                        esc_html__('One Row', 'select-core') => 'one-row',
                        esc_html__('Two Rows', 'select-core') => 'two-rows'
                    ),
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Unit name', 'select-core'),
                    'param_name' => 'unit_name',
                    'description' => esc_html__('Enter singular name of unit you will charge for (ex. unit)', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Unit range', 'select-core'),
                    'param_name' => 'units_range',
                    'description' => esc_html__('Enter maximum number of units you will charge (ex. 1000)', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Unit breakpoints', 'select-core'),
                    'param_name' => 'units_breakpoints',
                    'description' => esc_html__('Enter breakpoint value where price per unit will be reduced (ex. 100)', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Per Unit', 'select-core'),
                    'param_name' => 'price_per_unit',
                    'description' => esc_html__('Enter value of price that will be charged per unit (ex. 5)', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Reduce Per Breakpoint', 'select-core'),
                    'param_name' => 'price_reduce_per_breakpoint',
                    'description' => esc_html__('Enter value for which price will be reduced on each breakpoint (ex. 0.2)', 'select-core')
                ),
                /* Pricing info parameters */
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Title', 'select-core'),
                    'param_name' => 'title',
                    'value' => 'Pay what you need',
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Tag', 'select-core'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        '' => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'select-core'),
                    'param_name' => 'description',
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Currency', 'select-core'),
                    'param_name' => 'currency',
                    'description' => esc_html__('Default mark is $', 'select-core'),
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Period', 'select-core'),
                    'param_name' => 'price_period_info',
                    'description' => esc_html__('Default label is monthly', 'select-core'),
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Show Button', 'select-core'),
                    'param_name' => 'show_button',
                    'value' => array(
                        esc_html__('Default', 'select-core') => '',
                        esc_html__('Yes', 'select-core') => 'yes',
                        esc_html__('No', 'select-core') => 'no'
                    ),
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Button Text', 'select-core'),
                    'param_name' => 'button_text',
                    'dependency' => array('element' => 'show_button', 'value' => 'yes'),
                    'group' => esc_html__('Pricing Info', 'select-core')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Button Link', 'select-core'),
                    'param_name' => 'link',
                    'dependency' => array('element' => 'show_button', 'value' => 'yes'),
                    'group' => esc_html__('Pricing Info', 'select-core')
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
            'info_layout' => 'one-row',
            'unit_name' => 'unit',
            'units_range' => '0',
            'units_breakpoints' => '0',
            'price_per_unit' => '0',
            'price_reduce_per_breakpoint' => '0',
            'title' => 'Pay what you need',
            'description' => '',
            'title_tag' => 'h5',
            'currency' => '$',
            'price_period_info' => 'Monthly',
            'show_button' => 'yes',
            'link' => '',
            'button_text' => 'button'
        );

        $params = shortcode_atts($default_atts, $atts);
        //Extract params for use in method
        extract($params);

        $params['button_value'] = $this->getButtonData($params);
        $params['slider_data'] = $this->getSliderData($params);
        $params['pricing_slider_classes'] = $this->getPricingSliderClasses($params);

        $html = select_core_get_shortcode_template_part('templates/pricing-slider-' . $info_layout, 'pricing-slider', '', $params);

        return $html;
    }

    /**
     * Return data attributes for button
     *
     * @param $params
     * @return array
     */
    private function getButtonData($params)
    {

        $buttonData = array();

        if ($params['price_per_unit'] !== '') {
            $buttonData['data-price-per-unit'] = $params['price_per_unit'];
        }

        if ($params['price_reduce_per_breakpoint'] !== '') {
            $buttonData['data-price-reduce-per-breakpoint'] = $params['price_reduce_per_breakpoint'];
        }


        return $buttonData;

    }

    /**
     * Return data attributes for slider
     *
     * @param $params
     * @return array
     */
    private function getSliderData($params)
    {

        $sliderData = array();

        if ($params['units_range'] !== '') {
            $sliderData['data-units-range'] = $params['units_range'];
        }

        if ($params['units_breakpoints'] !== '') {
            $sliderData['data-units-breakpoints'] = $params['units_breakpoints'];
        }

        if ($params['unit_name'] !== '') {
            $sliderData['data-unit-name'] = $params['unit_name'];
        }

        if ($params['price_per_unit'] !== '') {
            $sliderData['data-price-per-unit'] = $params['price_per_unit'];
        }

        if ($params['price_reduce_per_breakpoint'] !== '') {
            $sliderData['data-price-reduce-per-breakpoint'] = $params['price_reduce_per_breakpoint'];
        }


        return $sliderData;

    }

    /**
     * Return data attributes for button
     *
     * @param $params
     * @return array
     */
    private function getPricingSliderClasses($params)
    {

        $pricingSliderClasses = array();

        $pricingSliderClasses[] = 'qodef-pricing-slider';

        if ($params['info_layout'] !== '') {
            $pricingSliderClasses[] = 'qodef-pricing-slider-' . $params['info_layout'];
        }

        return $pricingSliderClasses;

    }
}