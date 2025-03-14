<?php

if(!function_exists('target_qodef_get_product_list_standard_filters')) {
    function target_qodef_get_product_list_standard_filters($params) {

        //Override product title with our own html
        remove_action('target_qodef_woo_pl_info_below_image', 'target_qodef_woocommerce_template_loop_product_title', 22);
        add_action('target_qodef_woo_pl_info_below_image', 'target_qodef_get_product_list_shortcode_title',22,1);
    }

    add_action( 'target_qodef_before_product_list_standard', 'target_qodef_get_product_list_standard_filters', 5, 1);
}

/**
 * Creates title with selected tag
 *
 * @param $params
 * @return string
 */

if(!function_exists('target_qodef_get_product_list_shortcode_title')) {
    function target_qodef_get_product_list_shortcode_title($params)
    {

        if ($params['title_tag'] != '') {
            $tag = $params['title_tag'];
        } else {
            $tag = 'h5';
        }

        the_title('<' . $tag . ' class="qodef-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
    }
}
