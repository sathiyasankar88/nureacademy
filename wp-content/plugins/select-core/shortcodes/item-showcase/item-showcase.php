<?php
namespace TargetQodef\Modules\Shortcodes\ItemShowcase;

use TargetQodef\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ItemShowcase
 */
class ItemShowcase implements ShortcodeInterface{
	private $base; 
	
	function __construct() {
		$this->base = 'qodef_item_showcase';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
		* Returns base for shortcode
		* @return string
	 */
	public function getBase() {
		return $this->base;
	}	
	public function vcMap() {
						
		vc_map( array(
			'name' => esc_html__('Select Item Showcase', 'select-core'),
			'base' => $this->base,
			'category' => esc_html__('by SELECT','select-core'),
			'icon' => 'icon-wpb-showcase extended-custom-icon',
            'as_parent' => array('only' => 'qodef_item_showcase_list_item'),
            'js_view' => 'VcColumnView',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Image', 'select-core'),
                    'param_name' => 'item_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Top Offset', 'select-core'),
                    'admin_label' => true,
                    'value' => '-180px',
                    'save_always' => true,
                    'param_name' => 'image_top_offset',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Padding', 'select-core'),
                    'admin_label' => true,
                    'value' => '50',
                    'save_always' => true,
                    'param_name' => 'image_padding',
                    'description' => esc_html__('Insert number value only (without PX)', 'select-core')
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Skin', 'select-core'),
                    'param_name'  => 'skin',
                    'value'       => array(
                        esc_html__('Dark', 'select-core')  => 'dark',
                        esc_html__('Light', 'select-core') => 'light'
                    ),
                    'save_always' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'admin_label' => true,
                    'heading'     => esc_html__('Display separator', 'select-core'),
                    'param_name'  => 'display_separator',
                    'value'       => array(
                        esc_html__('Yes', 'select-core')  => 'yes',
                        esc_html__('No', 'select-core') => 'no'
                    ),
                    'save_always' => true
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'item_image'    => '',
            'image_top_offset' => '',
            'image_padding' => '50',
            'skin'  =>'',
            'display_separator'=>''
        );

		$params = shortcode_atts($args, $atts);

        extract($params);

        $html = '';

        $item_showcase_classes = array();
        $item_showcase_classes[] = 'clearfix qodef-item-showcase';
        $item_showcase_class = $this->getItemShowcaseClasses($params);
        $item_padding = $this->getPaddingData($params);

        $item_image_style = '';
        $item_image_style .= 'margin-top:' . target_qodef_filter_px($image_top_offset) . 'px;';

        $html .= '<div '. target_qodef_get_class_attribute($item_showcase_class) . ' '.  target_qodef_get_inline_attrs($item_padding).'>';
            $html .= '<div class="qodef-item-image" '. target_qodef_get_inline_style($item_image_style)  .'>';
                if ($item_image != '') {
                    $html .= wp_get_attachment_image($item_image,'full');
                }
            $html .= '</div>';
            $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;

	}

    private function getPaddingData($params) {

        $paddingData = array();

            if ( !empty($params['image_padding'])) {
                $paddingData['data-padding'] = $params['image_padding'];
            }

        return $paddingData;

    }


    private function getItemShowcaseClasses($params){
        $classes = array();

        $classes [] =  'clearfix qodef-item-showcase';

        switch($params['skin']){
            case 'light':
                $classes [] = 'qodef-showcase-light-skin';
                break;
            default:
                $classes [] = 'qodef-showcase-dark-skin';
                break;
        }


        switch($params['display_separator']){
            case 'yes':
                $classes [] = 'qodef-showcase-enable-separator';
                break;
            case 'no':
                $classes [] = 'qodef-showcase-disable-separator';
                break;
        }

        return implode(' ',$classes);
    }

}