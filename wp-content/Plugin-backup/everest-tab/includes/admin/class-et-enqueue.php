<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETab_Enqueue') ) {
    class ETab_Enqueue extends ETab_Library{
        /**
         * Enqueue all the necessary JS and CSS
         *
         * since @1.0.0
         */
        function __construct() {
            add_action('admin_enqueue_scripts', array($this, 'et_admin_load_scripts')); 
            add_action('wp_enqueue_scripts', array($this, 'register_frontend_assets'), 10000); 
        }
        /*
         * Load Admin Scripts
        */
        public function et_admin_load_scripts($hook){
            $screen = get_current_screen();
            if ($hook == 'post-new.php' || $hook == 'edit.php' || $hook == 'post.php' || $hook == 'everest_tab_page_et-configure' || $hook == 'everest_tab_page_et-about-us' || $hook == 'everest_tab_page_et-howtouse') {
                if (isset($screen->post_type) && $screen->post_type == "everest_tab") {
                    $this->et_admin_styles();
                    $this->et_admin_scripts();
                  }
            }     
        }
       public function et_admin_styles(){
              wp_register_style( 'et-icon-picker', ETAB_CSS_DIR.'icon-picker.css', false, ETAB_VERSION );
              wp_enqueue_style('et-icon-picker');
              
              wp_enqueue_style( 'dashicons' );
              wp_enqueue_style('et-backend-style', ETAB_CSS_DIR . 'et-admin-style.css', false, ETAB_VERSION);
              wp_enqueue_style('et_fontawesome_style', ETAB_CSS_DIR . 'available_icons/font-awesome/font-awesome.min.css',false,ETAB_VERSION);
              wp_enqueue_style('et-genericons', ETAB_CSS_DIR . 'available_icons/genericons.css', true , ETAB_VERSION);
              wp_enqueue_style('et-flaticons', ETAB_CSS_DIR . 'available_icons/flaticons/flaticon.css', true , ETAB_VERSION);
              wp_enqueue_style('et-icomoon', ETAB_CSS_DIR.'available_icons/icomoon/icomoon.css', array(), ETAB_VERSION);
              wp_enqueue_style('et-linecon', ETAB_CSS_DIR.'available_icons/linecon/linecon.css', array(), ETAB_VERSION);
        }

       public function et_admin_scripts(){
            //wp_enqueue_script('wp-color-picker');
           wp_enqueue_style('wp-color-picker');
           wp_enqueue_media();
           wp_enqueue_script( 'et_color_alpha', ETAB_ADMIN_JS_DIR . 'wp-color-picker-alpha.js',array('wp-color-picker') ,false, ETAB_VERSION );
            wp_register_script('et_icon_picker', ETAB_ADMIN_JS_DIR.'icon-picker.js', array('jquery'), ETAB_VERSION, true );
            wp_enqueue_script('et-admin-script', ETAB_ADMIN_JS_DIR . 'et-admin-script.js', array('jquery', 'wp-color-picker', 'jquery-ui-sortable','et_icon_picker'), ETAB_VERSION);
            $admin_ajax_nonce = wp_create_nonce('et-admin-ajax-nonce');
            $admin_ajax_object = array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'ajax_nonce' => $admin_ajax_nonce,
                'delete_confirm' => __('Are you sure you want to delete this tab?',ETAB_TD),
                'clear_cache_msg' => __('Cache Cleared Successfully.',ETAB_TD),
            );
            wp_localize_script('et-admin-script', 'et_admin_params', $admin_ajax_object);
            

        }

       public function register_frontend_assets() {
         $et_settings = get_option('et_settings', true);
         $gmap_apikey = (isset($et_settings['social']['gmap']['api_key']) && $et_settings['social']['gmap']['api_key'] != '')?sanitize_text_field($et_settings['social']['gmap']['api_key']):'';
         if($this->check_is_woocommerce_activated()){
              $wooenabled = "true";
        }else{
             $wooenabled = "false";
        }

         wp_register_script( 'etab_google_map', 'https://maps.googleapis.com/maps/api/js?key=' . $gmap_apikey, array( 'jquery' ) );
         wp_enqueue_script( 'etab_google_map' );
         wp_enqueue_style('et-frontend-style', ETAB_CSS_DIR . 'et-style.css', false, ETAB_VERSION);
         wp_enqueue_style('et_fontawesome_style', ETAB_CSS_DIR . 'available_icons/font-awesome/font-awesome.min.css',false,ETAB_VERSION);
          wp_enqueue_style( 'dashicons' );
          wp_enqueue_style('et-icomoon', ETAB_CSS_DIR.'available_icons/icomoon/icomoon.css', array(), ETAB_VERSION);
          wp_enqueue_style('et-genericons', ETAB_CSS_DIR . 'available_icons/genericons.css', true , ETAB_VERSION);
          wp_enqueue_style('et-flaticons', ETAB_CSS_DIR . 'available_icons/flaticons/flaticon.css', true , ETAB_VERSION);
          wp_enqueue_style('et-linecon', ETAB_CSS_DIR.'available_icons/linecon/linecon.css', array(), ETAB_VERSION);
         wp_enqueue_style('et-animate-style', ETAB_CSS_DIR . 'animate.css', false, ETAB_VERSION);
         
         wp_enqueue_script('et-frontend-script', ETAB_FRONTEND_JS_DIR . 'et-frontend-script.js', array('jquery'), ETAB_VERSION);
            wp_localize_script('et-frontend-script', 'etab_params', array(
          'check_woocommerce_enabled'   => $wooenabled,
          ));
          
      }
    }
    new ETab_Enqueue();
}