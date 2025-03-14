<?php defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('ETab_Admin_Menu')):
class ETab_Admin_Menu extends ETab_Library {
        
         /*
         * Executes function of construct with creation of post type
         *  @since 1.0.0
         */
        function __construct() {
            global $wp_version;
            add_action('admin_post_et_save_settings', array($this, 'etab_fn_save_settings'));
            add_action('init', array($this, 'et_register_posttype'));
            add_action('admin_menu', array($this, 'et_admin_menu'));
            add_action('add_meta_boxes',array( $this, 'fn_tab_main_settings'));
            add_action('save_post', array($this, 'et_msetup_meta_save'));
            add_action('add_meta_boxes',array( $this, 'fn_create_tab_settings'));
            add_action('save_post', array($this, 'et_tab_meta_save'));
            add_action('add_meta_boxes', array($this, 'et_shortcode_usage')); 
            add_action('widgets_init', array($this, 'et_widget_register'));
            add_action( 'media_buttons', array( $this,'media_tab_shortcode_buttons'));
            add_action( 'admin_footer', array( $this,'media_shortcode_popup' ));
            add_filter('manage_everest_tab_posts_columns', array($this,'etab_columns_head'));
            add_action('manage_everest_tab_posts_custom_column', array($this,'etab_columns_content'), 10, 2);
            add_action('admin_head-post-new.php', array($this, 'etab_posttype_admin_css'));
            add_action('admin_head-post.php', array($this, 'etab_posttype_admin_css'));
            add_filter('post_row_actions', array($this, 'etab_remove_row_actions'), 10, 1);
            add_filter('the_content', array($this, 'preview_etab'));
            add_action( 'admin_action_etab_duplicate_tab_as_draft',array($this, 'duplicate_tab_as_draft' ));
        }

        /*
        * Save Plugin Main Settings
        */
        public function etab_fn_save_settings(){
            if (isset($_POST['et_nonce_setup']) && wp_verify_nonce($_POST['et_nonce_setup'], 'et-nonce')) {
               if(isset($_POST['et_settings_submit'])){
                 $_POST = array_map( 'stripslashes_deep', $_POST );
                 $et_settings = $this->sanitize_array($_POST['et_settings']);
                 update_option('et_settings', $et_settings);
                 wp_redirect(admin_url('edit.php?post_type=everest_tab&page=et-configure&message=1'));
                exit();
               }else if(isset($_POST['egpr_restore_settings'])){
                   $etab_activate_obj = new ETab_Activation();
                   $default_settings = $etab_activate_obj->et_default_settings();
                   update_option('et_settings', $default_settings);
                   wp_redirect(admin_url('edit.php?post_type=everest_tab&page=et-configure&restore_message=1'));
                   exit();
               }else if(isset($_POST['et_clear_cache'])){
                   $args = array(
                        'post_type' => 'egprreviews',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );
                    $egpr_reviews =get_posts( $args );
                    if(isset($egpr_reviews) && !empty($egpr_reviews)){
                        foreach ($egpr_reviews as $key => $value) {
                           $RID =  $value->ID;
                           $egpr_meta_option = get_post_meta($RID , 'egpr_meta_option', true);
                           $place_id = (isset($egpr_meta_option['place_id']) && $egpr_meta_option['place_id'] != '')?$egpr_meta_option['place_id']:'';
                           $google_transient = 'google_' . md5($place_id); // set transient id
                           delete_transient($google_transient);
                        }
                    }
                      wp_redirect(admin_url('edit.php?post_type=egprreviews&page=egpr-configuration-settings&cache_message=1'));
                       exit();
               }
            } else {
                die('No script kiddies please!');
            }
        }

        /*
         * Register Post Type: everest-tab
        */
        public function et_register_posttype() {
            load_plugin_textdomain('everest-tab', false, basename(dirname(__FILE__)) . '/languages/');
            $labels = array(
                'name'               => _x( 'Everest Tab', 'post type general name', 'everest-tab' ),
                'singular_name'      => _x( 'Everest Tab', 'post type singular name', 'everest-tab' ),
                'menu_name'          => _x( 'Everest Tab', 'admin menu', 'everest-tab' ),
                'name_admin_bar'     => _x( 'Everest Tab', 'add new on admin bar', 'everest-tab' ),
                'add_new'            => _x( 'Add New Tab', 'Everest Tab', 'everest-tab' ),
                'add_new_item'       => __( 'Add New Tab', 'everest-tab' ),
                'new_item'           => __( 'New Everest Tab', 'everest-tab' ),
                'edit_item'          => __( 'Edit Tab', 'everest-tab' ),
                'view_item'          => __( 'View Tab', 'everest-tab' ),
                'all_items'          => __( 'All Tabs', 'everest-tab' ),
                'search_items'       => __( 'Search Tab', 'everest-tab' ),
                'parent_item_colon'  => __( 'Parent Tab:', 'everest-tab' ),
                'not_found'          => __( 'No Tab found.', 'everest-tab' ),
                'not_found_in_trash' => __( 'No Tab found in Trash.', 'everest-tab' )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => __( 'Description.', 'everest-tab' ),
                'public'             => false,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'menu_icon'          => 'dashicons-slides',
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'everest_tab' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title')
            );
            register_post_type('everest_tab', $args);
        }
        
        /*
         * Admin Menu 
        */
        public function et_admin_menu() {
            add_submenu_page('edit.php?post_type=everest_tab', __('Settings', ETAB_TD), __('Settings', ETAB_TD), 'manage_options', 'et-configure', array($this, 'et_configure_callback'));
            add_submenu_page('edit.php?post_type=everest_tab', __('How To Use', ETAB_TD), __('How To Use', ETAB_TD), 'manage_options', 'et-howtouse', array($this, 'et_how_to_use_callback'));
            add_submenu_page('edit.php?post_type=everest_tab', __('More WordPress Stuff', ETAB_TD), __('More WordPress Stuff', ETAB_TD), 'manage_options', 'et-about-us', array($this, 'et_about_us_callback'));

        }

        /*
        * Configuration Settings Page
        */
        public function et_configure_callback(){
            include(ETAB_PATH. '/includes/admin/pages/et-configure.php');
        }

        /*
        * How to use Page
        */
        public function et_how_to_use_callback(){
            include(ETAB_PATH. '/includes/admin/pages/et-howtouse.php');
        }
        
        
        /*
        * About Us Page
        */
         public function et_about_us_callback(){
            include(ETAB_PATH. '/includes/admin/pages/et-aboutus.php');
        }

        /*
        * Main Tab General Settings Metabox
        */
        function fn_tab_main_settings(){
            add_meta_box('et_main_settings',__('Main Settings',ETAB_TD),array($this, 'render_main_settings_callback'),'everest_tab','normal','high');
        }
        
        function render_main_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'et_main_setup_nonce');
            include(ETAB_PATH.'/includes/admin/metabox/et-main-settings.php');
            
        }
       
        /*
        * Save Main Settings Data 
        */
        public function et_msetup_meta_save( $post_id ){
            
            if (isset($_POST['et_main_settings'])) {
                $et_main_settings = $this->sanitize_array($_POST['et_main_settings']);
                update_post_meta($post_id, 'et_main_settings',$et_main_settings);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['et_main_setup_nonce']) && wp_verify_nonce($_POST['et_main_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }
        
        /*
        * Create Tab Settings Metabox
        */
        function fn_create_tab_settings(){
            add_meta_box('et_tab_settings',__('Tab Settings',ETAB_TD),array($this, 'render_tab_settings_callback'),'everest_tab','normal','high');
        }
        
        function render_tab_settings_callback( $post ){
             // Add nonce for security and authentication.
            wp_nonce_field(basename(__FILE__),'et_tab_setup_nonce');
            include(ETAB_PATH.'includes/admin/metabox/et-tab-settings.php');
            
        }

         /*
        * Save Main Settings Data 
        */
        public function et_tab_meta_save( $post_id ){
            // echo "<pre>";
            // print_r($_POST['tab_items']);
            // exit();
            if (isset($_POST['tab_items'])) {
                $et_tab_settings = $this->sanitize_array($_POST['tab_items']);
                update_post_meta($post_id, 'et_tab_settings',$et_tab_settings);
            }
             if (isset($_POST['et_active_tab'])) {
                $et_active_tab = $this->sanitize_array($_POST['et_active_tab']);
                update_post_meta($post_id, 'et_active_tab',$et_active_tab);
            }
            return;
            // Checks save status
            $is_autosave = wp_is_post_autosave($post_id);
            $is_revision = wp_is_post_revision($post_id);
            $is_valid_nonce = ( isset($_POST['et_tab_setup_nonce']) && wp_verify_nonce($_POST['et_tab_setup_nonce'], basename(__FILE__)) ) ? 'true' : 'false';
            // Exits script depending on save status
            if ($is_autosave || $is_revision || !$is_valid_nonce) {
                return;
            }
        }

         /*
        * Shortcode Usage Metabox
        */
        function et_shortcode_usage(){
            add_meta_box('et_sc_settings',__('Shortcode Usage',ETAB_TD),array($this, 'render_sc_usage_callback'),'everest_tab','side','default');
        }
        
        function render_sc_usage_callback( $post ){
            wp_nonce_field(basename(__FILE__),'et_tab_sc_nonce');
            include(ETAB_PATH.'includes/admin/metabox/et-sc-settings.php');
        }

        /*
        * Create Everest Tab Widget
        */
        public function et_widget_register(){
            register_widget('Everest_Tab_Widget');
        }


        /*
        * Add New Block for everest tab shortcode
        */
      /*   public function et_gutenberg_assets(){
          wp_enqueue_script(
            'everest-tab-block-editor',
            plugins_url( 'assets/js/admin/block.js', __FILE__ ),
            array( 'wp-blocks', 'wp-element' , 'wp-components'),ETAB_VERSION,
              true
         );

            wp_localize_script(
              'everest-tab-block-editor',
              'SUBlocktabEditorL10n',
              array( 'insertTabShortcode' => __( 'Everest Tab Shortcode',ETAB_TD ) )
            );

          // wp_localize_script(
              'everest-tab-block-editor',
              'SUBlockEditorTabSettings',
              array( 'supportedtabBlocks' => get_option( 'su_option_supported_blocks', array() ) )
            );

        }*/

      /* public function random_image_enqueue_block_editor_assets() {
            wp_enqueue_script(
                'random-image-block',
               ETAB_ADMIN_JS_DIR.'block.js',
                array( 'wp-blocks', 'wp-element' )
            );
        }*/

        public function media_tab_shortcode_buttons(){
          $et_settings = get_option('et_settings',true);
          $enable_sc = (isset($et_settings['enable_sc']) && $et_settings['enable_sc'] == 1) ? 1 : 0;
          if( $enable_sc == 1){ 
          ?>
            <style>
            #TB_window {
               max-width:500px;
               max-height: 450px;
               left: 50%;
               position: fixed;
               text-align: center;
               top: 50% !important;
               margin:0 !important;
               transform:translate(-50%,-50%);
               -webkit-transform:translate(-50%,-50%);
               -moz-transform:translate(-50%,-50%);
                }
            #TB_ajaxContent {
            max-width: 350px;
            text-align: center;
            padding: 10px 20px;
            }
           </style>
            <a href = "#TB_inline?width=500&height=450&inlineId=etab_shortcode_button" class = "button thickbox wp_doin_media_link" id = "add_popup_tab_shortcode" title = "Everest Tab Shortcode"><?php _e('Everest Tab Shortcode',ETAB_TD);?></a>
          <?php }
        }

        public function media_shortcode_popup(){
            include(ETAB_PATH.'includes/admin/metabox/et-tab-shortcode.php');
        }
        
        /*
        * Add custom column to everest tab post type
        */
        public function etab_columns_head($defaults){
             $defaults['shortcodes'] = __('Shortcodes', ETAB_TD);
             $defaults['template'] = __('Template Include', ETAB_TD);
              unset($defaults['date']);   // remove it from the columns list
              $defaults['date'] = __('Date', ETAB_TD);
              return $defaults;
        }
        
         /*
         * Added content to custom column to Everest Tab posttype
         */
        public function etab_columns_content( $column, $post_ID ){
            if ($column == 'shortcodes') {
                $id = $post_ID;
                $post = get_post($id); 
                $slug = $post->post_name;
                if($slug != ''){ ?>
                <textarea class="egpr-shortcode-display-value" style="resize: none;" rows="2" cols="40" readonly="readonly">[etabs slug="<?php echo $slug; ?>"]</textarea>
                <span class="et-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ETAB_TD); ?></span>
               <?php  }else{
                  echo 'Posts not published yet.';
               }    
                }
            if ($column == 'template') {
                $id = $post_ID;
                $post = get_post($id); 
                $slug = $post->post_name;
                 if($slug != ''){ ?>
                <textarea class="egpr-shortcode-display-value" style="resize: none;" rows="2" cols="45" readonly="readonly">&lt;?php echo do_shortcode("[etabs slug='<?php echo $slug; ?>']"); ?&gt;</textarea>
                <span class="et-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ETAB_TD); ?></span>
                <?php }else{
                   echo 'Posts not published yet.';
                  }
            }
        }
        
        public function etab_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                'everest_tab'
            );
            if (in_array($post_type, $post_types))
                echo '<style type="text/css"> #view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }
        
         public function etab_remove_row_actions($actions) {
            if (get_post_type() == 'everest_tab') {
                $post_id = get_the_ID();
               // choose the post type where you want to hide the button
                unset($actions['view']); // this hides the VIEW button on your edit post screen
                unset($actions['inline hide-if-no-js']);
                if (current_user_can('edit_posts')) {
                 $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=etab_duplicate_tab_as_draft&post=' . $post_id, basename(__FILE__), 'etab_duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
                //$actions['etab-copy'] = '<a href="javascript:void(0);" data-tabid="'.$post_id .'">Duplicate</a>';
               }
            }
            return $actions;
        }
        
        /*
         * Change the default “preview” button for everest_tab post type
        */
      /*  public function etab_change_post_link( $link ){
             if ( get_post_type() == 'everest_tab' ) {
               $post_status = get_post_status();
               if ( $post_status != 'auto-draft' ) {
                   $post_id = get_the_ID();
                   $nonce = wp_create_nonce('etab_nonce');
                   $link = site_url( '?tab_preview=true&_wpnonce='.$nonce.'&tab_id=' . $post_id );
                   return $link;
               }
           }else{
               return $link;
           }
        }*/
        
         /* public function etab_change_link($post_url,$post) {
          if ( get_post_type() == 'everest_tab' ) {
              $nonce = wp_create_nonce('etab_nonce');
              return site_url( '?tab_preview=true&_wpnonce='.$nonce.'&tab_id=' . $post->ID );
            }else{
                return $post_url;
            }
        }*/
        
          /* public function etab_preview_redirect(){
          if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'etab_nonce' ) ) {
             if ( isset( $_GET[ 'tab_preview' ], $_GET[ 'tab_id' ] ) && $_GET[ 'tab_preview' ] && is_user_logged_in() ) {
               include(ETAB_PATH.'/includes/frontend/etab-preview.php');
               die();
           }
           }
        }*/
         
         /*
         * Display Backend Preview on single page itself with shortcode load
         */
        public function preview_etab($content) {
            global $post;
            if ( is_singular( 'everest_tab' ) ) {
                if (isset($_GET['preview_id']) && is_user_logged_in()) {
                    $etab_post_id = intval($_GET['preview_id']);
                    $post = get_post($etab_post_id); 
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }if (isset($_GET['p']) && is_user_logged_in()) {
                    $etab_post_id = intval($_GET['p']);
                    $post = get_post($etab_post_id); 
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }else{
                    $slug = $post->post_name;
                    return do_shortcode("[etabs slug='$slug']");
                }
            }else {
                return $content;
            }
        }  

      /*
      * Function creates post duplicate as a draft and redirects then to the edit post screen
      */
      public function duplicate_tab_as_draft(){
        global $wpdb;
                if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'etab_duplicate_tab_as_draft' == $_REQUEST['action'] ) ) ) {
                    wp_die('No post to duplicate has been supplied!');
                }
             
                /*
                 * Nonce verification
                 */
                if ( !isset( $_GET['etab_duplicate_nonce'] ) || !wp_verify_nonce( $_GET['etab_duplicate_nonce'], basename( __FILE__ ) ) )
                    return;
             
                /*
                 * get the original post id
                 */
                $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
                /*
                 * and all the original post data then
                 */
                $post = get_post( $post_id );
             
                /*
                 * if you don't want current user to be the new post author,
                 * then change next couple of lines to this: $new_post_author = $post->post_author;
                 */
                $current_user = wp_get_current_user();
                $new_post_author = $current_user->ID;
             
                /*
                 * if post data exists, create the post duplicate
                 */
                if (isset( $post ) && $post != null) {
             
                    /*
                     * new post data array
                     */
                    $args = array(
                        'comment_status' => $post->comment_status,
                        'ping_status'    => $post->ping_status,
                        'post_author'    => $new_post_author,
                        'post_content'   => $post->post_content,
                        'post_excerpt'   => $post->post_excerpt,
                        'post_name'      => $post->post_name,
                        'post_parent'    => $post->post_parent,
                        'post_password'  => $post->post_password,
                        'post_status'    => 'draft',
                        'post_title'     => $post->post_title,
                        'post_type'      => $post->post_type,
                        'to_ping'        => $post->to_ping,
                        'menu_order'     => $post->menu_order
                    );
             
                    /*
                     * insert the post by wp_insert_post() function
                     */
                    $new_post_id = wp_insert_post( $args );
             
                    /*
                     * get all current post terms ad set them to the new post draft
                     */
                    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
                    foreach ($taxonomies as $taxonomy) {
                        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
                    }
             
                    /*
                     * duplicate all post meta just in two SQL queries
                     */
                    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
                    if (count($post_meta_infos)!=0) {
                        $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                        foreach ($post_meta_infos as $meta_info) {
                            $meta_key = $meta_info->meta_key;
                            if( $meta_key == '_wp_old_slug' ) continue;
                            $meta_value = addslashes($meta_info->meta_value);
                            $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                        }
                        $sql_query.= implode(" UNION ALL ", $sql_query_sel);
                        $wpdb->query($sql_query);
                    }
             
             
                    /*
                     * finally, redirect to the edit post screen for the new draft
                     */
                    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
                    exit;
                } else {
                    wp_die('Post creation failed, could not find original post: ' . $post_id);
                }
      }
}
new ETab_Admin_Menu();  
endif;