<?php

namespace TargetQodef\Modules\Shortcodes\InteractiveBanner;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

class InteractiveBanner implements ShortcodeInterface
{

    private $base;

    function __construct()
    {
        $this->base = 'qodef_interactive_banner';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Select Interactive Banner', 'select-core'),
                    'base' => $this->base,
                    'category' => esc_html__('by SELECT','select-core'),
                    'icon' => 'icon-wpb-interactive-banner extended-custom-icon',
                    'params' => array_merge(
                        array (
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Type', 'select-core'),
                                'param_name' => 'type',
                                'value' => array(
                                    esc_html__('Standard', 'select-core') => 'standard',
                                    esc_html__('Simple', 'select-core') => 'simple',
                                    esc_html__('Info on hover', 'select-core') => 'info-on-hover'
                                ),
                                'save_always' => true,
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Skin', 'select-core'),
                                'param_name' => 'theme',
                                'value' => array(
                                    '' => '',
                                    esc_html__('Light', 'select-core') => 'light',
                                    esc_html__('Dark', 'select-core') => 'dark'
                                )
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Enable Icon', 'select-core'),
                                'param_name' => 'enable_icons',
                                'value' => array(
                                    '' => '',
                                    esc_html__('Yes', 'select-core') => 'yes',
                                    esc_html__('No', 'select-core') => 'no'
                                ),
                                'dependency' => array('element' => 'type', 'value' => array('standard', 'info-on-hover'))
                            )
                        ),
                        \TargetQodefIconCollections::get_instance()->getVCParamsArray(array('element' => 'enable_icons', 'value' => array('', 'yes'))),
                        array(
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Icon Color', 'select-core'),
                                'param_name' => 'icon_color',
                                'description' => '',
                                'dependency' => array('element' => 'enable_icons', 'value' => array('', 'yes'))
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Padding', 'select-core'),
                                'param_name' => 'padding',
                                'value' => '',
                                'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'select-core')
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Background Image', 'select-core'),
                                'param_name' => 'background_image'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Color', 'select-core'),
                                'param_name' => 'background_color'
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Hover Color', 'select-core'),
                                'param_name' => 'background_hover_color'
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'select-core'),
                                'param_name' => 'title',
                                'value' => '',
                                'admin_label' => true
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Title Tag', 'select-core'),
                                'param_name' => 'title_tag',
                                'value' => array(
                                    '' => '',
                                    esc_html__('h2', 'select-core') => 'h2',
                                    esc_html__('h3', 'select-core') => 'h3',
                                    esc_html__('h4', 'select-core') => 'h4',
                                    esc_html__('h5', 'select-core') => 'h5',
                                    esc_html__('h6', 'select-core') => 'h6',
                                ),
                                'dependency' => array('element' => 'title', 'not_empty' => true)
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Subtitle', 'select-core'),
                                'param_name' => 'subtitle',
                                'value' => '',
                                'admin_label' => true,
                                'dependency' => array('element' => 'type', 'value' => 'simple'),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Subtitle Tag', 'select-core'),
                                'param_name' => 'subtitle_tag',
                                'value' => array(
                                    '' => '',
                                    esc_html__('h2', 'select-core') => 'h2',
                                    esc_html__('h3', 'select-core') => 'h3',
                                    esc_html__('h4', 'select-core') => 'h4',
                                    esc_html__('h5', 'select-core') => 'h5',
                                    esc_html__('h6', 'select-core') => 'h6',
                                ),
                                'dependency' => array('element' => 'subtitle', 'not_empty' => true)
                            ),
                            array(
                                'type' => 'textarea',
                                'heading' => esc_html__('Text', 'select-core'),
                                'param_name' => 'text',
                                'dependency' => array('element' => 'type', 'value' => array('standard', 'info-on-hover'))
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Enable Separator', 'select-core'),
                                'param_name' => 'enable_separator',
                                'value' => array(
                                    '' => '',
                                    esc_html__('Yes', 'select-core') => 'yes',
                                    esc_html__('No', 'select-core') => 'no',
                                ),
                                'dependency' => array('element' => 'type', 'value' => array('standard', 'info-on-hover'))
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Link', 'select-core'),
                                'param_name' => 'link',
                                'value' => '',
                                'admin_label' => true
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Link Text', 'select-core'),
                                'param_name' => 'link_text',
                                'dependency' => array('element' => 'link', 'not_empty' => true)
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Target', 'select-core'),
                                'param_name' => 'select-core',
                                'value' => array(
                                    '' => '',
                                    esc_html__('Self', 'select-core') => '_self',
                                    esc_html__('Blank', 'select-core') => '_blank'
                                ),
                                'dependency' => array('element' => 'link', 'not_empty' => true),
                            ),
                            array(
                                'type' => 'dropdown',
                                'admin_label' => true,
                                'heading' => esc_html__('Item Alignment', 'select-core'),
                                'param_name' => 'item_alignment',
                                'value' => array(
                                    esc_html__('Left', 'select-core') => 'left',
                                    esc_html__('Center', 'select-core') => 'center',
                                    esc_html__('Right', 'select-core') => 'right'
                                ),
                                'save_always' => true
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Size', 'select-core'),
                                'param_name' => 'button_size',
                                'value' => array(
                                    esc_html__('Default', 'select-core') => '',
                                    esc_html__('Small', 'select-core') => 'small',
                                    esc_html__('Medium', 'select-core') => 'medium',
                                    esc_html__('Large', 'select-core') => 'large',
                                    esc_html__('Extra Large', 'select-core') => 'huge',
                                    esc_html__('Extra Large Full Width', 'select-core') => 'huge-full-width'
                                ),
                                'save_always' => true,
                                'group' => esc_html__('Button Options', 'select-core')
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Color', 'select-core'),
                                'param_name' => 'button_color',
                                'group' => esc_html__('Button Options', 'select-core'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Hover Color', 'select-core'),
                                'param_name' => 'button_hover_color',
                                'group' => esc_html__('Button Options', 'select-core'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Color', 'select-core'),
                                'param_name' => 'button_background_color',
                                'group' => esc_html__('Button Options', 'select-core')
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Hover Background Color', 'select-core'),
                                'param_name' => 'button_hover_background_color',
                                'group' => esc_html__('Button Options', 'select-core')
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Border Color', 'select-core'),
                                'param_name' => 'button_border_color',
                                'group' => esc_html__('Button Options', 'select-core')
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Hover Border Color', 'select-core'),
                                'param_name' => 'button_hover_border_color',
                                'group' => esc_html__('Button Options', 'select-core')
                            ),
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null)
    {

        $args = array(
            'enable_icons' => '',
            'theme' => 'light',
            'type' => '',
            'icon_color' => '',
            'padding' => '',
            'background_image' => '',
            'background_color' => '',
            'background_hover_color' => '',
            'title' => '',
            'title_tag' => 'h5',
            'subtitle' => '',
            'subtitle_tag' => 'h6',
            'text' => '',
            'enable_separator' => '',
            'link' => '',
            'link_text' => 'Read More',
            'target' => '_self',
            'item_alignment' => 'left',
            'button_size' => '',
            'button_color' => '',
            'button_hover_color' => '',
            'button_background_color' => '',
            'button_hover_background_color' => '',
            'button_border_color' => '',
            'button_hover_border_color' => ''
        );

        $args = array_merge($args, target_qodef_icon_collections()->getShortcodeParams());

        $params = shortcode_atts($args, $atts);

        extract($params);
        $iconPackName = target_qodef_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $html = '';

        $params['icon'] = $params[$iconPackName];
        $params['icon_style'] = $this->generateIconStyles($params);
        $params['classes'] = $this->generateInteractiveBannerClasses($params);
        $params['style'] = $this->generateInteractiveBannerStyles($params);
        $params['hover-style'] = $this->generateInteractiveBannerOverlay($params);
        $params['button_data'] = $this->getButtonParameters($params);
        $params['button_classes'] = $this->getButtonClasses($params);

        $html .= '<div class="' . $params['classes'] . '" style="' . $params['style'] . '">';
        $html .= '<a itemprop="url" class="qodef-interactive-banner-cover-link" href="' . $params['link'] . '" target="' . $params['target'] . '"></a>';
        $html .= '<div class="qodef-interactive-banner-overlay" style="' . $params['hover-style'] . '"></div>';
        if ($enable_icons == 'yes') {
            $html .= select_core_get_shortcode_template_part('templates/icon', 'interactive-banner', '', $params);
        }
        $html .= select_core_get_shortcode_template_part('templates/interactive-banner-' . $params['type'], 'interactive-banner', '', $params);
        $html .= '</div>';

        return $html;
    }


    /**
     * Generates icon styles array
     *
     * @param $params
     *
     * @return string
     */
    private function generateIconStyles($params)
    {
        $iconStyles = array();

        if (!empty($params['icon_color'])) {
            $iconStyles[] = 'color: ' . $params['icon_color'];
        }

        return implode(';', $iconStyles);
    }

    /**
     * Generates banner classes
     *
     * @param $params
     *
     * @return string
     */

    private function generateInteractiveBannerClasses($params)
    {
        $interactive_banner_classes = array();
        $interactive_banner_classes[] = 'qodef-interactive-banner-holder';

        if (!empty($params['item_alignment'])) {
            switch ($params['item_alignment']) {
                case 'left':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-left';
                    break;
                case 'center':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-center';
                    break;
                case 'right':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-align-right';
                    break;
                default:
                    break;
            }
        }

        if (!empty($params['theme'])) {
            switch ($params['theme']) {
                case 'light':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-light-theme';
                    break;
                case 'dark':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-dark-theme';
                    break;
                default:
                    break;
            }
        }

        if (!empty($params['type'])) {
            switch ($params['type']) {
                case 'standard':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-standard';
                    break;
                case 'simple':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-simple';
                    break;
                case 'info-on-hover':
                    $interactive_banner_classes[] = 'qodef-interactive-banner-info-on-hover';
                    break;
                default:
                    break;
            }
        }

        return implode(' ', $interactive_banner_classes);
    }

    private function generateInteractiveBannerStyles($params)
    {
        $interactive_banner_styles = array();

        if (!empty($params['background_color'])) {
            $interactive_banner_styles[] = 'background-color: ' . $params['background_color'];
        }

        if (!empty($params['background_image'])) {
            $interactive_banner_styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
        }

        if (!empty($params['padding'])) {
            $interactive_banner_styles[] = 'padding: ' . $params['padding'];
        }

        return implode(';', $interactive_banner_styles);
    }

    private function generateInteractiveBannerOverlay($params)
    {
        $interactive_banner_overlay_styles = array();

        if (!empty($params['background_hover_color'])) {
            $interactive_banner_overlay_styles[] = 'background-color: ' . $params['background_hover_color'];
        }

        return implode(';', $interactive_banner_overlay_styles);
    }

    private function getButtonParameters($params)
    {
        $button_params_array = array();

        $buttonClasses = array(
            'qodef-btn',
            'qodef-btn-' . $params['button_size']
        );

        if (!empty($params['link'])) {
            $button_params_array['link'] = $params['link'];
        }

        if (!empty($params['button_target'])) {
            $button_params_array['target'] = $params['button_target'];
        }

        if (!empty($params['button_size'])) {
            $button_params_array['size'] = $params['button_size'];
        }

        if (!empty($params['link_text'])) {
            $button_params_array['text'] = $params['link_text'];
        }

        if (!empty($params['button_background_color'])) {
            $button_params_array['background_color'] = $params['button_background_color'];
        }

        if (!empty($params['button_border_color'])) {
            $button_params_array['border_color'] = $params['button_border_color'];
        }

        if (!empty($params['button_color'])) {
            $button_params_array['color'] = $params['button_color'];
        }

        if (!empty($params['button_hover_color'])) {
            $button_params_array['hover_color'] = $params['button_hover_color'];
        }

        if (!empty($params['button_hover_background_color'])) {
            $button_params_array['hover_background_color'] = $params['button_hover_background_color'];
        }

        if (!empty($params['button_hover_border_color'])) {
            $button_params_array['hover_border_color'] = $params['button_hover_border_color'];
        }

        return $button_params_array;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params)
    {
        $buttonClasses = array(
            'qodef-btn',
            'qodef-btn-' . $params['button_size'],
        );

        return $buttonClasses;
    }

}