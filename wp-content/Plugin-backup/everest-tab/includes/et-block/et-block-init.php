<?php
/**
 * Handler for [et_guten_block] shortcode
 *
 * @param $atts
 *
 * @return string
 */
function et_block_handler($atts)
{
	$atts = shortcode_atts([
		'heading' => __('Everest Tab Title'),
		'heading_tag' => 'h2',
		'et_id' => '',
	], $atts, 'et_guten_block');

	return et_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'et_id' ]);
}

add_shortcode('et_guten_block', 'et_block_handler');

/**
 * Handler for post title block
 * @param $atts
 *
 * @return string
 */
function et_block_render_handler($atts)
{
	return et_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'et_id' ]);
}

/**
 * Output the post title wrapped in a heading
 *
 * @param int $et_id The post ID
 * @param string $heading Allows : h2,h3,h4 only
 *
 * @return string
 */
function et_block_renderer($heading,$heading_tag,$et_id)
{	
	$ret = '';
	if(!empty($heading)){
		$ret .= "<$heading_tag>$heading</$heading_tag>";
	}
	
	if($et_id!=null){
		$sht = "[etabs slug='$et_id']";
		$title = do_shortcode($sht);
		$ret .= "$title";
	}
	return $ret;
}

/**
 * Register block
 */
add_action('init', function () {
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = dirname(__FILE__);

	wp_enqueue_style( 'et-frontend-style', ETAB_CSS_DIR . '/et-style.css', false, ETAB_VERSION );
	wp_enqueue_style( 'et-block-editor', plugins_url('et-block.css', __FILE__), false, ETAB_VERSION );
	wp_enqueue_style('et-frontend-style', ETAB_CSS_DIR . 'et-style.css', false, ETAB_VERSION);
	wp_enqueue_style('et_fontawesome_style', ETAB_CSS_DIR . 'available_icons/font-awesome/font-awesome.min.css',false,ETAB_VERSION);
	wp_enqueue_style('et-animate-style', ETAB_CSS_DIR . 'animate.css', false, ETAB_VERSION);
	wp_enqueue_script('et-frontend-script', ETAB_FRONTEND_JS_DIR . 'et-frontend-script.js', array('jquery'), ETAB_VERSION);

	$index_js = 'et-block.js';
	wp_register_script(
		'et-block-script',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor'
		),
		filemtime("$dir/$index_js")
	);

	$et_logos_array = get_et_logos();
	wp_localize_script( 'et-block-script', 'ET_logos_array', $et_logos_array);

	register_block_type('et-display-block/et-widget', array(
		'editor_script' => 'et-block-script',
		'render_callback' => 'et_block_render_handler',
		'attributes' => [			
			'heading' => [
				'type' => 'string',
				'default' => __('Everest Tab Title')
			],
			'heading_tag' => [
				'type' => 'string',
				'default' => 'h2'
			],
			'et_id' => [
				'type' => 'string',
				'default' => ''
			],
		]
	));
});

function get_et_logos(){
	$args = array('post_type'=>'everest_tab',
		'post_status'=>'publish',
		'posts_per_page'=>'25'
	);
    // The Query
	$the_query = new WP_Query( $args );

	$everest_tab = array(array('value'=>'0','label'=>__('Select Tab')));

    // The Loop
	if ( $the_query->have_posts() ) {
		while($the_query->have_posts()){
			$the_query->the_post();
			global $post;
			$everest_tab[] = array('value'=>$post->post_name, 'label'=> get_the_title());
		}
	}

	return $everest_tab;
}