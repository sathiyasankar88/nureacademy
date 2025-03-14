<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ETab_Shortcode')) {

    /**
     * Frontend Review Shortcode
     */
    class ETab_Shortcode extends ETab_Library {

        function __construct() {
            add_shortcode('etabs', array($this, 'et_shortcode_generator'));
            add_shortcode('everest_tabs_wrap', array($this, 'fn_everest_tabs_wrap'));
            add_shortcode('everest_tab_title_wrap', array($this, 'show_etab_title_wrap'));
            add_shortcode('everest_tab', array($this, 'show_etab_sc'));
            add_shortcode('everest_tab_content_wrap', array($this, 'show_etab_content_wrap'));
            add_shortcode('everest_tab_content', array($this, 'show_etab_content'));
        }

        /*
         * Generating shortcode with post id
         */
       public function et_shortcode_generator($atts) {
        if(isset($atts['slug'])){
            //$id = $this->get_ID_by_slug($atts['slug']);
            $args = array(
                'post_type' => 'everest_tab',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'p' => $this->get_ID_by_slug($atts['slug'])
            );
            $everest_tab = new WP_Query($args);
            if ($everest_tab->have_posts()) {
                ob_start();
                include( ETAB_PATH . 'includes/frontend/etab-shortcode.php' );
                $return_data = ob_get_contents();
                ob_end_clean();
                wp_reset_query();
                if (isset($return_data)) {
                    return $return_data;
                } else {
                    return NULL;
                }
            } else {
                wp_reset_query();
                return null;
            }
           }
            
        }
        

          /*
         * Main Group Wrapper Shortcode [everest_tabs_wrap orientation="horizontal/vertical"][/everest_tabs_wrap]
         */
        public function fn_everest_tabs_wrap($atts, $content = null){
             extract(shortcode_atts(
                                array(
                    'orientation' => 'horizontal',
                    'template'  => 'template1',
                    'position' => '',
                    'icon_position' => 'left',
                    'column' => 6,
                    'trigger_event' => 'on_click', // on_click or on_hover
                                ), $atts, 'everest_tabs_wrap'));
             if($orientation == "horizontal"){
               if($position != ''){
                   $position_type = $position;
               }else{
                   $position_type = "top-left";
               }
             }else{
             //vertical
                if($position != ''){
                   $position_type = $position;
               }else{
                   $position_type = "vertical-top-left";
               }

             }
                $etab_tab_wrap = '<div class="everest-tab-main-wrapper etab-sc-main-wrapper etab-group-wrap etab-clearfix etab-colmn'.$column.' etab-'.$template.' etab-' . $orientation . ' etab-'.$position_type.'-position etab-icon-'.$icon_position.' etab-trigger-'.$trigger_event.'">';
                $etab_tab_wrap .= $this->etab_content_helper($content);
                $etab_tab_wrap .= '</div>';
                return $etab_tab_wrap;
        }
         
         /*
         * Tab Title  Shortcode [everest_tab id="tab1" title="Title1"][/everest_tab]
         */
         public function show_etab_sc($atts, $content = null) {
               extract(shortcode_atts(
                    array(
                     'title' => '',
                     'id' => '',
                     'icon' => '',
                     'active' => '0'
                    ), $atts, 'everest_tab'));
               if($active == 1){
                $active_class = "etab-active-show";
               }else{
                $active_class = "";
               }
               $et_tab =  '<li class="etab-label etab-prelink etab-title-btn '.$active_class.'" id="etab-' . $id . '">
                        <a href="javascript:void(0);" data-tabtype="component_type">';
                if($icon != ''){
                  $et_tab .= '<span class="etab-icon-wrapper etab-available-icons">
                               <i class="'.$icon.'"></i>
                              </span>';
                   }
                   $et_tab .= '<div class="etab-title-wrapper"><span class="etab-title">'.esc_attr($title).'</span></div></a></li>';
                $et_tab .= $this->etab_content_helper($content);
                $et_tab .= '</li>';

                return $et_tab;
        }

        /*
         * Tab Title Wrapper
         * Shortcode [everest_tab_title_wrap][/everest_tab_title_wrap]
         */
        public function show_etab_title_wrap($atts, $content = null){
              extract(shortcode_atts(
                    array(
                     'tab_id' => '',
                    ), $atts, 'everest_tab_title_wrap'));
                $etab_tab_twrap = '<div class="etab-header-wrap etab_clearfix"><ul class="etab-title-tabs" data-id="etab-'.$tab_id.'">';
                $etab_tab_twrap .= $this->etab_content_helper($content);
                $etab_tab_twrap .= '</ul></div>';
                return $etab_tab_twrap;
        }


        /*
         * Tab Content Wrapper
         * Shortcode [everest_tab_content_wrap][/everest_tab_content_wrap]
         */
        public function show_etab_content_wrap($atts, $content = null){
                $etab_tab_cwrap = '<div class="etab-content-wrap">';
                $etab_tab_cwrap .= $this->etab_content_helper($content);
                $etab_tab_cwrap .= '</div>';
                return $etab_tab_cwrap;
        }

         /*
         * Tab Title  Shortcode [everest_tab_content trigger="tab1"][/everest_tab_content]
         */
         public function show_etab_content($atts, $content = null) {
               extract(shortcode_atts(
                    array(
                     'trigger' => '',
                     'tab_id' => '',
                     'animation' => ''
                    ), $atts, 'everest_tab_content'));
               if($animation != ''){ 
                   $et_tab =  '<div class="etab-content-section animated etab-'.$tab_id.' etab-'.$trigger.'" data-animation="'.$animation.'">'; 
               }else{
                   $et_tab =  '<div class="etab-content-section etab-'.$tab_id.' etab-'.$trigger.'">';
               }
                $et_tab .= $this->etab_content_helper($content);
                $et_tab .= '</div>';

                return $et_tab;
        }
    }
    new ETab_Shortcode();
}