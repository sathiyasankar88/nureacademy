<?php

if ( ! function_exists('target_qodef_like') ) {
	/**
	 * Returns TargetQodefLike instance
	 *
	 * @return TargetQodefLike
	 */
	function target_qodef_like() {
		return TargetQodefLike::get_instance();
	}

}

function target_qodef_get_like() {

	echo wp_kses(target_qodef_like()->add_like(), array(
        'span' => array(
            'class' => true,
            'aria-hidden' => true,
            'style' => true,
            'id' => true
        ),
        'i' => array(
            'class' => true,
            'style' => true,
            'id' => true
        ),
        'a' => array(
            'href'         => true,
            'class'        => true,
            'id'           => true,
            'title'        => true,
            'style'        => true,
            'data-post-id' => true
        ),
        'input' => array(
            'type'  => true,
            'name'  => true,
            'id'    => true,
            'value' => true
        )
	));
}

if ( ! function_exists('target_qodef_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function target_qodef_like_latest_posts() {
		return target_qodef_like()->add_like();
	}

}

if ( ! function_exists('target_qodef_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function target_qodef_like_portfolio_list($portfolio_project_id) {
		return target_qodef_like()->add_like_portfolio_list($portfolio_project_id);
	}

}