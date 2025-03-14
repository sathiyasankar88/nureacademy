<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ETab_VC_Elements')) {

    /**
     * Visual Composer Create Elements For Tab Widget
     * Example: http://www.wpelixir.com/how-to-create-new-element-in-visual-composer/
     */
    class ETab_VC_Elements extends ETab_Library {

        function __construct() {
            add_action( 'vc_before_init', array($this,'etab_vc_integrate_widget' ));
            add_shortcode( 'etabs', array( $this, 'etab_vc_widget_html' ) );
        }


       public function etab_vc_integrate_widget() {
        // Require new custom Element
            $args = array(
                        'post_type' => 'everest_tab',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC', 
                        'orderby' => 'id'
                    );
                    $posts = get_posts($args);
              if (!empty($posts)) {
                foreach ($posts as $post) {
                    $etab_post_types[$post->post_title] = $post->ID;
                }
            }else{
                $etab_post_types[ __( 'No Tab Data found.', ETAB_TD ) ] = '';
            }

          vc_map( array(
            'name' => 'Everest Tab Widget',
            'base' => 'etabs',
            'description' => esc_html__( 'Advanced Tab For WordPress', ETAB_TD ),
            'category' => 'Everest Tab',
            'icon' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', ETAB_TD ),
                    'param_name' => 'title',
                    'holder' => 'h3'
                ),
              array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Everest Tab', ETAB_TD ),
                    'param_name' => 'id',
                    'class' => 'etab-lists',
                    'save_always' => true,
                    'value' => $etab_post_types,
                    'description' => esc_html__( 'Select any tab post type to add it to your post or page.', ETAB_TD ),
                )
            )
          ) );
        

      
        }

        // Element HTML
        public function etab_vc_widget_html($atts){
             // Params extraction
            extract(
                shortcode_atts(
                    array(
                        'title'   => '',
                        'id' => '',
                    ), 
                    $atts
                )
            );
            ob_start();
            include( ETAB_PATH . '/includes/frontend/etab-shortcode.php' );
            $everest_tab = ob_get_contents();
            ob_end_clean();
            return $everest_tab;
         } 
    }

    new ETab_VC_Elements();
}