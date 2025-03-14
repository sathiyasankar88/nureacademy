<?php
/**
 * Old shortcode.
 *
 * @link http://shapedplugin.com
 * @since 2.0.0
 *
 * @package wp-expand-tabs-free
 * @subpackage wp-expand-tabs-free/deprecated
 */

define( 'TR_EASY_TABS_PRO', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );

/**
 * Old Shortcode css and js file enqueue.
 */
function tr_easy_tabs_files() {
	wp_register_script( 'tr-easy-tabs-pro-main-js', TR_EASY_TABS_PRO . 'js/jquery.pwstabs-1.1.3.min.js', array( 'jquery' ), 1.0, true );
	wp_register_style( 'tr-easy-tabs-pro-main-css', TR_EASY_TABS_PRO . 'css/jquery.pwstabs.css', '1.0.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'tr_easy_tabs_files' );

/**
 * Old Shortcode main function.
 *
 * @param array $atts The attributes of the shortcode.
 * @param null  $content The shortcode content.
 * @return statement
 */
function tr_easy_tabs_pro_wrapper( $atts, $content = null ) {

	// @codingStandardsIgnoreLine
	extract( 
		shortcode_atts(
			array(
				'id'         => '',
				'background' => '#46B3E6',
				'color'      => '#fff',
				'border'     => '#f1f1f1',
				'effect'     => 'scale',
				'open'       => 1,
				'width'      => '100%',
				'position'   => 'horizontal',
				'hposition'  => 'top',
				'vposition'  => 'left',
				'rtl'        => 'false',
			),
			$atts
		)
	);
	wp_enqueue_script( 'tr-easy-tabs-pro-main-js' );
	wp_enqueue_style( 'tr-easy-tabs-pro-main-css' );
	return '
        <script>
            jQuery(document).ready(function($){
                $("#tr-easy-tabs-wrapper' . $id . ' .tr-easy-tabs-activate").pwstabs({
                    effect: "' . $effect . '", 
                    defaultTab: ' . $open . ',    
                    containerWidth: "' . $width . '",
                    tabsPosition: "' . $position . '",   
                    horizontalPosition: "' . $hposition . '",
                    verticalPosition: "' . $vposition . '",     
                    rtl: ' . $rtl . ' 
                });
            });
        </script>
        <style>
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a:before, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a {background-color:' . $background . '}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active:before, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active {background-color:#fff;color:#333}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a {color:' . $color . '}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_list {border-color:' . $border . '}
		</style>
        <div id="tr-easy-tabs-wrapper' . $id . '" class="tr-easy-tabs-wrapper">
        <div class="tr-easy-tabs-activate">
            ' . do_shortcode( $content ) . '
        </div>
        </div>
    ';
}
add_shortcode( 'tr_tabs', 'tr_easy_tabs_pro_wrapper' );

/**
 * Tr easy tabs pro items function.
 *
 * @param array $atts The attributes of the shortcode.
 * @param null  $content The shortcode content.
 * @return statement
 */
function tr_easy_tabs_pro_items( $atts, $content = null ) {

	// @codingStandardsIgnoreLine
	extract(
		shortcode_atts(
			array(
				'id'    => '',
				'title' => '',
			),
			$atts
		)
	);
	wp_enqueue_script( 'tr-easy-tabs-pro-main-js' );
	wp_enqueue_style( 'tr-easy-tabs-pro-main-css' );
	return '
  <div data-pws-tab="tab' . $id . '" data-pws-tab-name="' . $title . '">
    ' . do_shortcode( $content ) . '
  </div>    
    ';
}
add_shortcode( 'ir_item', 'tr_easy_tabs_pro_items' );

/**
 * Tr easy tabs pro items shortcode function.
 *
 * @param array $atts The attributes of the shortcode.
 * @return statement
 */
function tr_easy_tabs_pro_items_shortcode( $atts ) {
	// @codingStandardsIgnoreLine
	extract(
		shortcode_atts(
			array(
				'id'         => '01',
				'items'      => '5',
				'category'   => '',
				'background' => '#46B3E6',
				'color'      => '#fff',
				'border'     => '#f1f1f1',
				'effect'     => 'scale',
				'open'       => 1,
				'width'      => '100%',
				'position'   => 'horizontal',
				'hposition'  => 'top',
				'vposition'  => 'left',
				'rtl'        => 'false',
			),
			$atts
		)
	);

	$q = new WP_Query(
		array(
			'posts_per_page' => $items,
			'post_type'      => 'tr-tabs-pro',
			'tab_pro_cat'    => $category,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		)
	);
	wp_enqueue_script( 'tr-easy-tabs-pro-main-js' );
	wp_enqueue_style( 'tr-easy-tabs-pro-main-css' );
	$list = '
        <script>
            jQuery(document).ready(function($){
                $("#tr-easy-tabs-wrapper' . $id . ' .tr-easy-tabs-activate").pwstabs({
                    effect: "' . $effect . '", 
                    defaultTab: ' . $open . ',    
                    containerWidth: "' . $width . '",
                    tabsPosition: "' . $position . '",   
                    horizontalPosition: "' . $hposition . '",
                    verticalPosition: "' . $vposition . '",     
                    rtl: ' . $rtl . ' 
                });
            });
        </script>  
        <style>
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a:before, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a {background-color:' . $background . '}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active:before, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active {background-color:#fff;color:#333}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a {color:' . $color . '}
            #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_container ul.pws_tabs_controll li a.pws_tab_active, #tr-easy-tabs-wrapper' . $id . ' div.pws_tabs_list {border-color:' . $border . '}
		</style>
		<div id="tr-easy-tabs-wrapper' . $id . '" class="tr-easy-tabs-wrapper">
        <div class="tr-easy-tabs-activate">
	';
	while ( $q->have_posts() ) :
		$q->the_post();
		$idd           = get_the_ID();
		$content_main  = do_shortcode( get_the_content() );
		$content_autop = wpautop( trim( $content_main ) );

		$list .= '
          <div data-pws-tab="tab' . $idd . '" data-pws-tab-name="' . do_shortcode( get_the_title() ) . '">
            ' . do_shortcode( $content_autop ) . '
          </div>  
		';

	endwhile;
	$list .= '</div></div>';

	wp_reset_postdata();
	return $list;
}
add_shortcode( 'tabs', 'tr_easy_tabs_pro_items_shortcode' );
