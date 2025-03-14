<?php

if ( ! function_exists( 'target_qodef_woocommerce_products_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function target_qodef_woocommerce_products_per_page() {

		$products_per_page = 12;

		if ( target_qodef_options()->getOptionValue( 'qodef_woo_products_per_page' ) ) {
			$products_per_page = target_qodef_options()->getOptionValue( 'qodef_woo_products_per_page' );
		}
		if ( isset( $_GET['woo-products-count'] ) && $_GET['woo-products-count'] === 'view-all' ) {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function target_qodef_woocommerce_related_products_args( $args ) {

		if ( target_qodef_options()->getOptionValue( 'qodef_woo_product_list_columns' ) ) {

			$related = target_qodef_options()->getOptionValue( 'qodef_woo_product_list_columns' );
			switch ( $related ) {
				case 'qodef-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'qodef-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function target_qodef_woocommerce_template_loop_product_title() {

		$tag = target_qodef_options()->getOptionValue( 'qodef_products_list_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h5';
		}
		the_title( '<' . $tag . ' class="qodef-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>' );
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_template_loop_product_view_btn' ) ) {
	/**
	 *
	 */
	function target_qodef_woocommerce_template_loop_product_view_btn() {
		global $product;

		print '<a class="qodef-show-details-button" href="' . get_permalink( $product->get_id() ) . '"><span class="lnr lnr-magnifier"></span>' . esc_html__( "Details", "targetwp" ) . '</a>';

	}
}

if ( ! function_exists( 'target_qodef_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function target_qodef_woocommerce_template_single_title() {

		$tag = target_qodef_options()->getOptionValue( 'qodef_single_product_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h1';
		}
		the_title( '<' . $tag . '  itemprop="name" class="qodef-single-product-title">', '</' . $tag . '>' );
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function target_qodef_woocommerce_sale_flash() {

		return '<span class="qodef-onsale">' . esc_html__( 'Sale!', 'targetwp' ) . '</span>';
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_product_out_of_stock' ) ) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function target_qodef_woocommerce_product_out_of_stock() {

		global $product;

		if ( ! $product->is_in_stock() ) {
			print '<span class="qodef-out-of-stock">' . esc_html__( 'Out of stock!', 'targetwp' ) . '</span>';
		}
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_shop_loop_categories' ) ) {
	/**
	 * Function that prints html with product categories
	 */
	function target_qodef_woocommerce_shop_loop_categories() {

		global $product;

		$html = '<div class="qodef-pl-categories-holder">';
		$html .= wc_get_product_category_list( $product->get_id(), ', ' );
		$html .= '</div>';

		print target_qodef_get_module_part( $html );
	}
}


if ( ! function_exists( 'target_qodef_get_woocommerce_pagination' ) ) {
	/**
	 * Function that returns args for woocommerce pagination
	 */
	function target_qodef_get_woocommerce_pagination() {
		global $wp_query;
		$navigation = array(
			'base'      => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'    => '',
			'add_args'  => false,
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<span class="qodef-pagination-arrow lnr lnr-chevron-left"></span><span class="qodef-pagination-text">' . esc_html__( "Previous Page", 'targetwp' ) . '</span>',
			'next_text' => '<span class="qodef-pagination-text">' . esc_html__( "Next Page", 'targetwp' ) . '</span><span class="qodef-pagination-arrow lnr lnr-chevron-right"></span>',
			'type'      => 'list',
			'end_size'  => 3,
			'mid_size'  => 3
		);

		return $navigation;
	}
}

if ( ! function_exists( 'target_qodef_woocommerce_product_add_to_cart_text' ) ) {

	function target_qodef_woocommerce_product_add_to_cart_text() {
		global $product;
		$product_type = $product->get_type();
		if ( $product->is_purchasable() && $product->is_in_stock() ) {
			switch ( $product_type ) {
				case 'external':
					return esc_html__( 'Buy product', 'targetwp' );
					break;

				case 'variable':
					return esc_html__( 'Options', 'targetwp' );
					break;
				default:
					return esc_html__( 'Add to cart', 'targetwp' );
			}
		} else if ( $product->is_in_stock() && $product_type === 'grouped' ) {
			return esc_html__( 'Products', 'targetwp' );
		} else {
			return esc_html__( 'Read more', 'targetwp' );
		}

	}

	add_filter( 'woocommerce_product_add_to_cart_text', 'target_qodef_woocommerce_product_add_to_cart_text' );
}

if ( ! function_exists( 'target_qodef_woo_view_all_pagination_additional_tag_before' ) ) {
	function target_qodef_woo_view_all_pagination_additional_tag_before() {

		print '<div class="qodef-woo-pagination-holder"><div class="qodef-woo-pagination-inner">';
	}
}

if ( ! function_exists( 'target_qodef_woo_view_all_pagination_additional_tag_after' ) ) {
	function target_qodef_woo_view_all_pagination_additional_tag_after() {

		print '</div></div>';
	}
}

if ( ! function_exists( 'target_qodef_single_product_content_additional_tag_before' ) ) {
	function target_qodef_single_product_content_additional_tag_before() {

		print '<div class="qodef-single-product-content">';
	}
}

if ( ! function_exists( 'target_qodef_single_product_content_additional_tag_after' ) ) {
	function target_qodef_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'target_qodef_single_product_summary_additional_tag_before' ) ) {
	function target_qodef_single_product_summary_additional_tag_before() {

		print '<div class="qodef-single-product-summary">';
	}
}

if ( ! function_exists( 'target_qodef_single_product_summary_additional_tag_after' ) ) {
	function target_qodef_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'target_qodef_pl_holder_additional_tag_before' ) ) {
	function target_qodef_pl_holder_additional_tag_before() {

		print '<div class="qodef-pl-main-holder">';
	}
}

if ( ! function_exists( 'target_qodef_pl_holder_additional_tag_after' ) ) {
	function target_qodef_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'target_qodef_pl_image_additional_tag_before' ) ) {
	function target_qodef_pl_image_additional_tag_before() {

		print '<div class="qodef-product-holder"><div class="qodef-pl-image">';
	}
}

if ( ! function_exists( 'target_qodef_pl_image_additional_tag_after' ) ) {
	function target_qodef_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if ( ! function_exists( 'target_qodef_pl_text_wrapper_additional_tag_before' ) ) {
	function target_qodef_pl_text_wrapper_additional_tag_before() {

		print '<div class="qodef-pl-text-wrapper">';
	}
}

if ( ! function_exists( 'target_qodef_pl_text_wrapper_additional_tag_after' ) ) {
	function target_qodef_pl_text_wrapper_additional_tag_after() {

		print '</div></div>';
	}
}

if ( ! function_exists( 'target_qodef_pl_rating_additional_tag_before' ) ) {
	function target_qodef_pl_rating_additional_tag_before() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if ( $rating_html !== '' ) {
				print '<div class="qodef-pl-rating-holder">';
			}
		}
	}
}

if ( ! function_exists( 'target_qodef_pl_rating_additional_tag_after' ) ) {
	function target_qodef_pl_rating_additional_tag_after() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if ( $rating_html !== '' ) {
				print '</div>';
			}
		}
	}
}


if ( ! function_exists( 'target_qodef_pl_original_image_tag_before' ) ) {
	function target_qodef_pl_original_image_tag_before() {

		print '<span class="qodef-original-image">';
	}
}

if ( ! function_exists( 'target_qodef_pl_original_image_tag_after' ) ) {
	function target_qodef_pl_original_image_tag_after() {

		print '</span>';
	}
}

