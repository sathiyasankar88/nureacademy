<?php defined('ABSPATH') or die('No script kiddies please!');
/*
  Plugin Name: Everest Tabs
  Plugin URI:  https://accesspressthemes.com/wordpress-plugins/everest-tab/
  Description: Multiple Tab Creation | Shortcode Integration | Order Tab With Drag & Drop Functionality | Fully Responsive
  Version:     1.1.8
  Author:      AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License:     GPLv2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: everest-tab
 */
if (!class_exists('ETab_Class')) {
    class ETab_Class{
        function __construct() {
            $this->et_settings = get_option('et_settings');
            $this->define_constants();
            $this->include_tab_files();
        }
        /**
         * Define Everest Tab Constants.
         */
        public function define_constants() {
          $this->define('ETAB_TITLE', 'Everest Tabs');
          $this->define('ETAB_VERSION', '1.1.8');
          $this->define('ETAB_TD', 'everest-tab');
          $this->define('ETAB_IMAGE_DIR', plugin_dir_url(__FILE__) . 'assets/images/');
          $this->define('ETAB_ADMIN_JS_DIR', plugin_dir_url(__FILE__) . 'assets/js/admin/');
          $this->define('ETAB_FRONTEND_JS_DIR', plugin_dir_url(__FILE__) . 'assets/js/frontend/');
          $this->define('ETAB_CSS_DIR', plugin_dir_url(__FILE__) . 'assets/css/');
          $this->define('ETAB_PATH', plugin_dir_path(__FILE__));
          $this->define('ETAB_URL', plugin_dir_url(__FILE__));
        }
         /**
           * Define constant if not already set.
          */
          public function define( $name, $value ) {
            if ( ! defined( $name ) ) {
              define( $name, $value );
            }
          }
         /**
         * Includes all the necessary files
         */
        public function include_tab_files(){
            include(ETAB_PATH . 'includes/admin/class-et-library.php');
            include(ETAB_PATH . 'includes/admin/class-et-activation.php');
            include(ETAB_PATH . 'includes/admin/class-et-enqueue.php');
            include(ETAB_PATH . 'includes/admin/class-et-register-widget.php');
            include(ETAB_PATH . 'includes/admin/class-et-register-post-types.php');
            include(ETAB_PATH . 'includes/admin/class-et-admin-ajax.php');
            include(ETAB_PATH . 'includes/admin/class-et-shortcode-generator.php');
            include(ETAB_PATH . 'includes/twitteroauth/twitteroauth.php');
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
              include(ETAB_PATH . 'includes/admin/class-et-vc-elements.php');
            }
            include(ETAB_PATH . '/includes/et-block/et-block-init.php');

        }
    }
    $etab_object = new ETab_Class();
}
