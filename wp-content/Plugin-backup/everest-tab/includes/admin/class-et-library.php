<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETab_Library') ) {
    class ETab_Library {
        /**
         * Prints array in pre format
         *
         * @since 1.0.0
         *
         * @param array $array
         */
       public function displayArr($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }
        
        /**
         * Function to generate random number
         * @param  integer $length Length of the random number to be generated
         * @return mixed Returns the mixed value of number and alphabets
         */
        public function generateRandomIndex($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        /**
         * Query WooCommerce activation check
        */
        public function check_is_woocommerce_activated() {
          return class_exists( 'woocommerce' ) ? true : false;
        }
                
        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'text' : 'html';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                    return wp_kses_post(stripslashes_deep($value));
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

         /*
         * Returns all the registered post types only
         */
        public static function et_registered_post_types() {
           $post_types = get_post_types();
           unset($post_types['attachment']);
           unset($post_types['product_variation']);
           unset($post_types['shop_order']);
           unset($post_types['shop_order_refund']);
           unset($post_types['shop_coupon']);
           unset($post_types['shop_webhook']);
           unset($post_types['wp1slider']);
           unset($post_types['everest_tab']);
           unset($post_types['tabs']);
           unset($post_types['revision']);
           unset($post_types['nav_menu_item']);
           unset($post_types['wp-types-group']);
           unset($post_types['wp-types-user-group']);
           unset($post_types['customize_changeset']);
           unset($post_types['wpcf7_contact_form']);
           unset($post_types['custom_css']);
           unset($post_types['page']);
           unset($post_types['post_tag']);
           unset($post_types['vc4_templates']);
           unset($post_types['vc_grid_item']);
           return $post_types;
       }
      
       /*
       * Get all Posts Data
       */
       public function get_post_details($post, $order_by,$order,$postsperpage){
        $arguments = array(
                'post_type'      =>  array( 'post', 'post_type'),
                'post_status'    =>  array( 'publish' ),
                'orderby'        =>  $order_by,
                'order'          =>  $order,
                'posts_per_page' =>  $postsperpage
        );
        $query = new WP_Query( $arguments );
        return $query;
       }
      
      /*
      * Get all products by category or upsell products, latest products,onsale products
      */
      public function get_products_category_wise($post_type,$product_type,$category, $orderby,$order,$posts_per_page){
        if($product_type == 'category'){
           if($category == "all"){
                 $product_args = array(
                 'post_type' => $post_type,
                 'posts_per_page' => $posts_per_page
                );
                  }else{
                 $product_args = array(
                     'post_type' => $post_type,
                     'tax_query' => array(
                         array('taxonomy'  => 'product_cat',
                          'field'     => 'id', 
                          'terms'     => $category                                                                 
                         )
                     ),
                     'posts_per_page' => $posts_per_page
                 );
           }
          }else if($product_type == 'latest_product'){
            if($category == "all"){
                  $product_args = array(
                       'post_type' => $post_type,
                       'posts_per_page' => $posts_per_page,
                       'orderby' => $orderby,
                       'order' => $order
                   );
                 }else{
                 $product_args = array(
                     'post_type' => $post_type,                
                        'tax_query' => array(
                         array('taxonomy'  => 'product_cat',
                          'field'     => 'id', 
                          'terms'     => $category                                                                 
                         )
                     ),
                     'posts_per_page' => $posts_per_page,
                     'orderby' => $orderby,
                     'order' => $order
                 );
               }
            } elseif($product_type == 'feature_product'){
               if($category == "all"){
                  $product_args = array(
                       'post_type' => $post_type, 
                       'meta_key'         => '_featured',  
                       'meta_value'       => 'yes',
                       'posts_per_page' => $posts_per_page,
                       'orderby' => $orderby,
                       'order' => $order
                   );
                 }else{
                 $product_args = array(
                     'post_type'        =>  $post_type, 
                     'meta_key'         => '_featured',  
                     'meta_value'       => 'yes',
                        'tax_query' => array(
                         array('taxonomy'  => 'product_cat',
                          'field'     => 'id', 
                          'terms'     => $category                                                                 
                         )
                     ),
                     'posts_per_page'   => $posts_per_page,
                      'orderby' => $orderby,
                      'order' => $order  
                 );
               }
         } elseif($product_type == 'upsell_product'){
              if($category == "all"){
                  $product_args = array(
                       'post_type' => 'product',
                       'meta_key'          => 'total_sales',
                       'orderby'           => 'meta_value_num',
                       'posts_per_page' => $posts_per_page,
                       'order' => $order
                   );
                 }else{
                 $product_args = array(
                     'post_type'         => 'product',
                     'meta_key'          => 'total_sales',
                     'orderby'           => 'meta_value_num',
                        'tax_query' => array(
                         array('taxonomy'  => 'product_cat',
                          'field'     => 'id', 
                          'terms'     => $category                                                                 
                         )
                     ),
                     'posts_per_page'    => $posts_per_page,
                     'order' => $order
                 );
               }
             }
         
             elseif($product_type == 'on_sale'){
               if($category == "all"){
                  $product_args = array(
                       'post_type' => 'product',
                       'meta_key'          => 'total_sales',
                       'orderby'           => 'meta_value_num',
                       'posts_per_page' => $posts_per_page,
                       'order' => $order,
                    'meta_query'     => array(
                     'relation' => 'OR',
                     array( // Simple products type
                         'key'           => '_sale_price',
                         'value'         => 0,
                         'compare'       => '>',
                         'type'          => 'numeric'
                     ),
                     array( // Variable products type
                         'key'           => '_min_variation_sale_price',
                         'value'         => 0,
                         'compare'       => '>',
                         'type'          => 'numeric'
                     )
                 ));
                
                 }else{
                 $product_args = array(
                 'post_type'      => 'product',
                 'posts_per_page'    => $posts_per_page,
                 'orderby' => $orderby,
                 'order' => $order,
                  'tax_query' => array(
                         array('taxonomy'  => 'product_cat',
                          'field'     => 'id', 
                          'terms'     => $category                                                                 
                         )
                     ),
                 'meta_query'     => array(
                     'relation' => 'OR',
                     array( // Simple products type
                         'key'           => '_sale_price',
                         'value'         => 0,
                         'compare'       => '>',
                         'type'          => 'numeric'
                     ),
                     array( // Variable products type
                         'key'           => '_min_variation_sale_price',
                         'value'         => 0,
                         'compare'       => '>',
                         'type'          => 'numeric'
                     )
                 ));
               }
             }
          $product_query = new WP_Query($product_args);
          return $product_query;

       }//end

       /*
       * Fetch Facebook Page Details
       */
       public function fetch_social_media_details($pageid ,$access_token, $facebook_feeds){
         $fetch_story_url = "https://graph.facebook.com/v10.0/$pageid/posts?fields=full_picture,picture,permalink_url,message,shares,likes.limit(0).summary(true),comments.limit(0).summary(true),created_time&limit=$facebook_feeds&access_token=$access_token";
           $json = file_get_contents( $fetch_story_url );
           $story = json_decode( $json, true, 512, JSON_BIGINT_AS_STRING );
           return $story;
       }

       /*public function fetch_social_media_details2($pageid ,$access_token, $facebook_feeds){
         $fetch_story_url = "https://graph.facebook.com/v2.10/$pageid/posts?fields=full_picture,picture,link,message,shares,likes.limit(0).summary(true),comments.limit(0).summary(true),created_time&limit=$facebook_feeds&access_token=$access_token";
         $access_token = wp_remote_get( $fetch_story_url, array( 'timeout' => 60 ) );

        if ( is_wp_error( $access_token ) || ( isset( $access_token['response']['code'] ) && 200 != $access_token['response']['code'] ) ) {
            return '';
        } else {
            return json_decode( $access_token['body'],true );
        }

       }*/
      
      /*
      * Connection with Twitter Oauth
      */
       public function get_oauth_connection($cons_key, $cons_secret, $oauth_token, $oauth_token_secret){
          $public_connection = new ETAB_TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
          return $public_connection;
          }

      /*
      * Get Twitter User's details
      */
      public function get_specific_twitter_tweets($username,$limit,$key,$consumer_key, $consumer_secret, $access_token, $access_token_secret){
          $oauth_connection = $this->get_oauth_connection($consumer_key, $consumer_secret, $access_token, $access_token_secret);
          $tweets = $oauth_connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$username."&count=".$limit);
          return $tweets;
        }

        public function get_elapsed_time( $date ){
              $current_date = strtotime( date( 'h:i A M d Y' ) );
              $tweet_date = strtotime( $date );
              $total_seconds = $current_date - $tweet_date;
              $seconds = $total_seconds % 60;
              $total_minutes = $total_seconds / 60;
              $minutes = $total_minutes % 60;
              $total_hours = $total_minutes / 60;
              $hours = $total_hours % 24;
              $total_days = $total_hours / 24;
              $days = $total_days % 365;
              $years = $total_days / 365;

              if ( $years >= 1 ) {
                  if ( $years == 1 ) {
                      $date = $years . __( ' year ago', ETAB_TD );
                  } else {
                      $date = $years . __( ' year ago', ETAB_TD );
                  }
              } elseif ( $days >= 1 ) {
                  if ( $days == 1 ) {
                      $date = $days . __( ' day ago', ETAB_TD );
                  } else {
                      $date = $days . __( ' days ago', ETAB_TD );
                  }
              } elseif ( $hours >= 1 ) {
                  if ( $hours == 1 ) {
                      $date = $hours . __( ' hour ago', ETAB_TD );
                  } else {
                      $date = $hours . __( ' hours ago', ETAB_TD );
                  }
              } elseif ( $minutes > 1 ) {
                  $date = $minutes . __( ' minutes ago', ETAB_TD );
              } else {
                  $date = __( "1 minute ago", ETAB_TD );
              }
              return $date;
        }

        public function etab_makeClickableLinks( $s ){
            return preg_replace( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.-]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $s );
        }

         /**
         * Returns abreviated count format
         * @param integer $value
         * @return string
         */
        function etab_abreviateTotalCount( $value ){

            $abbreviations = array( 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '' );

            foreach ( $abbreviations as $exponent => $abbreviation ) {

                if ( $value >= pow( 10, $exponent ) ) {

                    return round( floatval( $value / pow( 10, $exponent ) ), 1 ) . $abbreviation;
                }
            }
        }

       function etab_content_helper($content, $paragraph_tag = false, $br_tag = false) {
        return $this->etab_paragraph_br_fix(do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag);
       }

        function etab_paragraph_br_fix($content, $paragraph_tag = false, $br_tag = false) {
          $content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);

          $content = preg_replace('#<br \/>#', '', $content);

          if ($paragraph_tag)
              $content = preg_replace('#<p>|</p>#', '', $content);

          return trim($content);
       }
      
       
       public function return_cache_period() {
           //please set the integer value in seconds
     return 2;
       }
       
       /*
        * Get RSS Feeds
        * @rss url
        */
       public function get_rss_feed($feed_url, $num_feeds){
            // Get a rss feed object from the specified feed source.
            add_filter('wp_feed_cache_transient_lifetime', array($this, 'return_cache_period'));
            $rss = fetch_feed($feed_url);
            remove_filter('wp_feed_cache_transient_lifetime', array($this, 'return_cache_period'));
            if (!is_wp_error($rss)) {
             // Figure out how many total items there are, but limit it to number specified
                    $maxitems = $rss->get_item_quantity($num_feeds);
                    $rss_items = $rss->get_items(0, $maxitems);
                    return $rss_items;
            } else {
                    return false;
            }
       }

          public static function etab_get_excerptbyid($post_id,$post_length){
            $the_post = get_post($post_id); //Gets post ID
            $the_excerpt = $the_post->post_excerpt; //Gets post_content to be used as a basis for the excerpt
            if($the_excerpt == ''){
              $the_excerpt = $the_post->post_content; 
            }
            $excerpt_length = $post_length; //Sets excerpt length by word count
            $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
            $words = explode(' ', $the_excerpt, $excerpt_length + 1);
            if(count($words) > $excerpt_length) :
            array_pop($words);
            array_push($words, '');
            $the_excerpt = implode(' ', $words);
            endif;
            $the_excerpt =  $the_excerpt;
            return $the_excerpt;
         }

         //SLUG TO ID
         public static function get_ID_by_slug($post_slug) {
          $posts = get_posts(array('name' => $post_slug, 'post_type' => 'everest_tab'));
           return $posts[0]->ID;
          }

          /*
       * Get Lighter Color From Darker Color Using Color Code
       */
     public static function colourBrightness($hex, $percent) {
                // Work out if hash given
                $hash = '';
                if (stristr($hex,'#')) {
                    $hex = str_replace('#','',$hex);
                    $hash = '#';
                }
                /// HEX TO RGB
                $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
                //// CALCULATE 
                for ($i=0; $i<3; $i++) {
                    // See if brighter or darker
                    if ($percent > 0) {
                        // Lighter
                        $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
                    } else {
                        // Darker
                        $positivePercent = $percent - ($percent*2);
                        $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
                    }
                    // In case rounding up causes us to go to 256
                    if ($rgb[$i] > 255) {
                        $rgb[$i] = 255;
                    }
                }
                //// RBG to Hex
                $hex = '';
                for($i=0; $i < 3; $i++) {
                    // Convert the decimal digit to hex
                    $hexDigit = dechex($rgb[$i]);
                    // Add a leading zero if necessary
                    if(strlen($hexDigit) == 1) {
                    $hexDigit = "0" . $hexDigit;
                    }
                    // Append to the hex string
                    $hex .= $hexDigit;
                }
                return $hash.$hex;
            }
    }
}