<?php # -*- coding: utf-8 -*-
/**
 * Plugin Name: T5 Page Feed
 * Description: Adds a feed for pages at <code>/feed/?post_type=page</code>.
 * Version:     2012.05.22
 * Author:      Thomas Scholz
 * Author URI:  http://toscho.de
 * License:     MIT
 * License URI: http://www.opensource.org/licenses/mit-license.php
 */
add_action( 'pre_get_posts', 't5_pages_in_feed' );

/**
 * Set post type to 'page' if it was requested.
 *
 * @param  object $query
 * @return void
 */
function t5_pages_in_feed( &$query )
{
	if ( isset ( $_GET['post_type'] ) && $_GET['post_type'] === 'page' && is_feed() )
	{
		$query->set( 'post_type', 'page' );
	}
}