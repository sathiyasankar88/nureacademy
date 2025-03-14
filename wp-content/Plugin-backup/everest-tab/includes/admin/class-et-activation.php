<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
if ( !class_exists( 'ETab_Activation' ) ) {

    class ETab_Activation extends ETab_Library{
 
        /**
         * Executes all the tasks on plugin activation
         * 
         * @since 1.0.0
         */
        function __construct() {   
            register_activation_hook( ETAB_PATH . 'everest-tab.php' , array($this, 'etab_activation'));
        }

         public function etab_activation() {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            if (is_plugin_active('everest-tab-lite/everest-tab-lite.php')) {
                wp_die(__('You need to deactivate Everest Tab Lite Plugin in order to activate Everest Tabs premium plugin.Please deactivate free one.', ETAB_TD));
            }
            /*
            * Load Default Settings
            */
            if (!get_option('et_settings')) {
               $et_settings = $this->et_default_settings();
               update_option('et_settings', $et_settings);
            }
            
          if (!get_option('et_tab_animation_options')) {
               $et_tab_animation_options = $this->et_tab_animation_data();
               update_option('et_tab_animation_options', $et_tab_animation_options);
           }
            
            
        }
        
        public function et_default_settings() {
            $et_settings = array(
                'social' => array(
                    'facebook' =>  
                       array(
                        'access_token' => '',
                        'facebook_feeds' => '5',
                        'enable_like_count' => '0',
                        'enable_cmmt_count' => '0',
                        'enable_share_count' => '0',
                        ),
                       'twitter' =>  
                       array(
                        'consumer_key' => '',
                        'consumer_secret' => '',
                        'twitter_access_token' => '',
                        'access_token_secret' => '',
                        'username' => '',
                        'twitter_feeds' => '5'
                        ),
                       'gmap' =>  
                       array(
                        'api_key' => ''
                        ),
                    ),
                'cache_enable' => 1,
                'cache_period' => '24',
                'enable_sc' => 1
                );
            return $et_settings;
        }
        
        public function et_tab_animation_data() {
            $et_tab_animation_data = array(
                'fading_entrances' => array('fadeIn','fadeInLeft','fadeInRight','fadeInUp','fadeInDown'),
                'bouncing_entrances' => array('bounce','bounceInLeft','bounceInRight','bounceInUp','bounceInDown'),
                'flippers' => array('flip','flipInX','flipInY'),
                'lightspeed' => array('lightSpeedIn'),
                'sliding_entrances' => array('slideInUp','slideInDown','slideInLeft','slideInRight'),
                'zoom_entrances' => array('zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp'),
                'attention_seekers' => array('flash','pulse'),
            );
            return $et_tab_animation_data;
        }

    }

    new ETab_Activation();
}
