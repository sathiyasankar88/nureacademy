<?php
namespace TargetQodef\Modules\Header\Types;

use TargetQodef\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Standard layout and option
 *
 * Class HeaderStandard
 */
class HeaderStandard extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-standard';

        if(!is_admin()) {

            $menuAreaHeight       = target_qodef_filter_px(target_qodef_options()->getOptionValue('menu_area_height_header_standard'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? (int)$menuAreaHeight : (int)100;

            $mobileHeaderHeight       = target_qodef_filter_px(target_qodef_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? (int)$mobileHeaderHeight : (int)100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('target_qodef_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('target_qodef_per_page_js_vars', array($this, 'getPerPageJSVariables'));

        }
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {

        $parameters['menu_area_in_grid'] = target_qodef_get_meta_field_intersect('menu_area_in_grid_header_standard', target_qodef_get_page_id()) == 'yes' ? true : false;

        $parameters = apply_filters('target_qodef_header_standard_parameters', $parameters);

        target_qodef_get_module_template_part('templates/types/'.$this->slug, $this->moduleName, '', $parameters);

    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps(){
        $this->heightOfTransparency         = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight                 = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = target_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true) !== '1';
        }
        elseif(get_post_meta($id, 'qodef_menu_area_grid_background_color_header_standard_meta', true) !== '') {
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_grid_background_color_header_standard_meta', true) !== '' &&
                get_post_meta($id, 'qodef_menu_area_grid_background_transparency_header_standard_meta', true) !== '1';

        } elseif(target_qodef_options()->getOptionValue('menu_area_background_color_header_standard') == '') {
            $menuAreaTransparent = target_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '' &&
                                   target_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') !== '1';
        } else {
            $menuAreaTransparent = target_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
                                   target_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '1';
        }


        $sliderExists = get_post_meta($id, 'qodef_page_slider_meta', true) !== '';

        if($sliderExists){
            $menuAreaTransparent = true;
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;

            if(($sliderExists && target_qodef_is_top_bar_enabled())
               || target_qodef_is_top_bar_enabled() &&target_qodef_is_top_bar_transparent()) {
                $transparencyHeight += target_qodef_get_top_bar_height();
            }
        }

        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {
        $id = target_qodef_get_page_id();
        $transparencyHeight = 0;

        if(get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== ''){
            $menuAreaTransparent = get_post_meta($id, 'qodef_menu_area_background_color_header_standard_meta', true) !== '' &&
                                   get_post_meta($id, 'qodef_menu_area_background_transparency_header_standard_meta', true) === '0';
        } elseif(target_qodef_options()->getOptionValue('menu_area_background_color_header_standard') == '') {
            $menuAreaTransparent = target_qodef_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '' &&
                                   target_qodef_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') === '0';
        } else {
            $menuAreaTransparent = target_qodef_options()->getOptionValue('menu_area_background_color_header_standard') !== '' &&
                                   target_qodef_options()->getOptionValue('menu_area_background_transparency_header_standard') === '0';
        }

        if($menuAreaTransparent) {
            $transparencyHeight = $this->menuAreaHeight;
        }

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if(target_qodef_is_top_bar_enabled()) {
            $headerHeight += target_qodef_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['qodefLogoAreaHeight'] = 0;
        $globalVariables['qodefMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['qodefMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if(!in_array(target_qodef_get_meta_field_intersect('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            $perPageVars['qodefHeaderTransparencyHeight'] = $this->headerHeight - (target_qodef_get_top_bar_height() + $this->heightOfCompleteTransparency);
        }else{
            $perPageVars['qodefHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}