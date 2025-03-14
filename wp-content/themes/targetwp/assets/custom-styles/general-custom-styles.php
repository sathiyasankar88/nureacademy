<?php
if(!function_exists('target_qodef_design_styles')) {
    /**
     * Generates general custom styles
     */
    function target_qodef_design_styles() {

        $preload_background_styles = array();

        if(target_qodef_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.target_qodef_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(QODE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo target_qodef_dynamic_css('.qodef-preload-background', $preload_background_styles);

		if (target_qodef_options()->getOptionValue('google_fonts')){
			$font_family = target_qodef_options()->getOptionValue('google_fonts');
			if(target_qodef_is_font_option_valid($font_family)) {
				echo target_qodef_dynamic_css('body', array('font-family' => target_qodef_get_font_option_val($font_family)));
			}
		}

        // First main color
        if(target_qodef_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.qodef-comment-holder .qodef-comment-text .comment-edit-link:hover',
                '.qodef-comment-holder .qodef-comment-text .comment-reply-link:hover',
                '.qodef-comment-holder .qodef-comment-text .replay:hover',
                '.comment-respond .comment-reply-title #cancel-comment-reply-link',
                '.comment-respond .logged-in-as a:hover',
                '.qodef-content .qodef-subscription-form .wpcf7-form-control.wpcf7-submit:hover',
                '.sidebar .qodef-subscription-form .wpcf7-form-control.wpcf7-submit:hover',
                '.woocommerce-page .qodef-subscription-form .wpcf7-form-control.wpcf7-submit:hover',
                '.dwls_search_results li a:hover',
                '.dwls_search_results li a:visited',
                '.dwls_search_results .search_footer a:hover',
                '.dwls_search_results .search_footer a:visited',
                '.qodef-main-menu ul li.qodef-active-item a',
                '.qodef-main-menu ul li:hover a',
                '.qodef-main-menu>ul>li.qodef-active-item>a',
                'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu>ul>li:hover>a',
                '.qodef-menu-area a span.qodef-featured-icon',
                '.qodef-sticky-nav a span.qodef-featured-icon',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle-click li.narrow .second .inner ul li.current_page_item a',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle-click .second .inner ul li a:hover',
                '.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
                '.qodef-mobile-header .qodef-mobile-nav a:hover',
                '.qodef-mobile-header .qodef-mobile-nav h4:hover',
                '.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
                '.qodef-title .qodef-title-holder .qodef-breadcrumbs a:hover',
                '.qodef-side-menu .widget_nav_menu li a:hover',
                '.qodef-side-menu .widget_nav_menu li:last-child:hover',
                'nav.qodef-fullscreen-menu ul li a:hover',
                '.qodef-search-opener:hover>i',
                '.qodef-search-cover .qodef-search-close a:hover',
                '.qodef-counter-holder.qodef-boxed-counter .qodef-left-holder .qodef-counter-with-icon i',
                '.qodef-icon-shortcode.circle .qodef-icon-element',
                '.qodef-icon-shortcode.square .qodef-icon-element',
                '.qodef-icon-shortcode .qodef-icon-element',
                '.qodef-ordered-list ol>li:before',
                '.qodef-unordered-list.qodef-line ul>li:before',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder-inner .font_elegant',
                '.qodef-icon-list-item .qodef-icon-list-icon-holder-inner i',
                '.qodef-testimonials-holder .qodef-tes-nav>.qodef-tes-nav-next:hover',
                '.qodef-testimonials-holder .qodef-tes-nav>.qodef-tes-nav-prev:hover',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon i',
                '.qodef-pie-chart-with-icon-holder .qodef-percentage-with-icon span',
                '.qodef-tabs .qodef-tabs-nav li a i',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-top>div a',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-post-info-author a:hover',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-blog-like:hover i:first-child',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-blog-like:hover span:first-child',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-bottom .qodef-post-info-comments-holder:hover span:first-child',
                '.qodef-dropcaps',
                '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder .owl-carousel .owl-nav .qodef-next-icon i',
                '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder .owl-carousel .owl-nav .qodef-prev-icon i',
                '.qodef-item-showcase .qodef-item .qodef-item-icon',
                '.qodef-service-table table tbody td .qodef-mark.qodef-checked',
                '.qodef-interactive-banner-holder .qodef-interactive-banner-icon',
                '.qodef-sidebar .widget ul li a:hover',
                '.qodef-sidebar .widget.widget_tag_cloud a:hover',
                '.qodef-sidebar .widget.widget_calendar td a',
                '.qodef-sidebar .widget.qodef-latest-posts-widget .qodef-blog-list-holder ul>li.qodef-blog-list-item .qodef-item-title a:hover',
                'footer .widget a:hover',
                'footer .widget.widget_qodef_twitter_widget a:hover',
                '.qodef-blog-holder article.sticky .qodef-post-title a',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-post-info-author a:hover',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover i:first-child',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-blog-like:hover span:first-child',
                '.qodef-blog-holder article .qodef-post-info.qodef-section-bottom .qodef-post-info-comments-holder:hover span:first-child',
                '.qodef-blog-holder article.format-link .qodef-post-mark .qodef-link-mark',
                '.qodef-blog-holder article.format-quote .qodef-post-mark .qodef-link-mark',
                '.qodef-blog-holder article.format-link .qodef-blog-share .qodef-social-share-holder.qodef-list li a:hover span',
                '.qodef-blog-holder article.format-quote .qodef-blog-share .qodef-social-share-holder.qodef-list li a:hover span',
                '.qodef-filter-blog-holder li.qodef-active',
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-post-info-author a:hover',
                '.qodef-blog-holder.qodef-blog-single article .qodef-post-info.qodef-section-bottom .qodef-blog-share .qodef-list ul li a:hover .qodef-social-network-icon',
                '.qodef-blog-holder.qodef-blog-single .qodef-blog-single-navigation .qodef-blog-single-nav-title .qodef-blog-navigation-info:hover',
                '.qodef-blog-holder.qodef-blog-single .qodef-author-description .qodef-author-social-holder a:hover span',
                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-minus:hover',
                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-plus:hover',
                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-minus:hover',
                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-plus:hover',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs>li.additional_information_tab:before',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs>li.description_tab:before',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs>li.reviews_tab:before',
                '.qodef-single-product-summary .product_meta>span a:hover',
                '.qodef-single-product-summary .qodef-woo-social-share-holder .qodef-list li a:hover span',
                'ul.products>.product .qodef-pl-text-wrapper .qodef-pl-categories-holder a:hover',
                'ul.products>.product .qodef-pl-text-wrapper .qodef-show-details-button:hover',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce-MyAccount-content mark',
                '.qodef-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
                '.widget.woocommerce.widget_rating_filter a:hover .star-rating',
                '.widget.woocommerce.widget_recent_reviews a:hover',
                '.widget.woocommerce.widget_product_tag_cloud a:hover',
                '.qodef-shopping-cart-dropdown .qodef-item-info-holder .remove:hover',
                '.qodef-side-menu #lang_sel ul ul a:hover span',
                'ul.products > .product .qodef-pl-text-wrapper .added_to_cart:hover',
                '.qodef-mobile-header .qodef-mobile-nav li.qodef-active-item > a',
                '.qodef-mobile-header .qodef-mobile-nav li ul.sub_menu li.current_page_item a',
                '.qodef-counter-holder .qodef-counter-with-icon i',
                '.qodef-counter-holder .qodef-counter-with-icon span',
                '.qodef-blog-list-holder.qodef-boxes .qodef-blog-list-item .qodef-section-top .qodef-date-value'
            );

            $color_important_selector = array(
                '.qodef-team.main-info-on-hover .qodef-team-social-holder .qodef-team-social-inner .qodef-team-social-wrapp .qodef-icon-shortcode:hover i',
                'ul.products>.product .qodef-pl-text-wrapper .add_to_cart_button:hover',
                'ul.products > .product .qodef-pl-text-wrapper .button:hover'

            );


            $background_color_selector = array(
                '.qodef-st-loader .pulse',
                '.qodef-st-loader .double_pulse .double-bounce1',
                '.qodef-st-loader .double_pulse .double-bounce2',
                '.qodef-st-loader .cube',
                '.qodef-st-loader .rotating_cubes .cube1',
                '.qodef-st-loader .rotating_cubes .cube2',
                '.qodef-st-loader .stripes>div',
                '.qodef-st-loader .wave>div',
                '.qodef-st-loader .two_rotating_circles .dot1',
                '.qodef-st-loader .two_rotating_circles .dot2',
                '.qodef-st-loader .five_rotating_circles .container1>div',
                '.qodef-st-loader .five_rotating_circles .container2>div',
                '.qodef-st-loader .five_rotating_circles .container3>div',
                '.qodef-st-loader .atom .ball-1:before',
                '.qodef-st-loader .atom .ball-2:before',
                '.qodef-st-loader .atom .ball-3:before',
                '.qodef-st-loader .atom .ball-4:before',
                '.qodef-st-loader .clock .ball:before',
                '.qodef-st-loader .mitosis .ball',
                '.qodef-st-loader .lines .line1',
                '.qodef-st-loader .lines .line2',
                '.qodef-st-loader .lines .line3',
                '.qodef-st-loader .lines .line4',
                '.qodef-st-loader .fussion .ball',
                '.qodef-st-loader .fussion .ball-1',
                '.qodef-st-loader .fussion .ball-2',
                '.qodef-st-loader .fussion .ball-3',
                '.qodef-st-loader .fussion .ball-4',
                '.qodef-st-loader .wave_circles .ball',
                '.qodef-st-loader .pulse_circles .ball',
                '.qodef-header-vertical .qodef-vertical-dropdown-toggle-click .second:after',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:before',
                '.qodef-header-vertical .qodef-vertical-menu>ul>li>a:after',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content.qodef-progress-gradient',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content.qodef-progress-solid',
                '.qodef-testimonials.owl-carousel .owl-dots .owl-dot.active span',
                '.qodef-testimonials.owl-carousel.light .owl-dots .owl-dot.active span',
                '.qodef-pie-chart-doughnut-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-pie-chart-pie-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
                '.qodef-tabs.qodef-horizontal-tab.qodef-tab-with-icon-above ul li a .qodef-icon-frame i',
                '.qodef-avs-fixed-content .qodef-avs-down-arrow',
                '.qodef-image-gallery .qodef-image-gallery-grid.qodef-image-gallery-overlay .qodef-gallery-image>a:after',
                '.qodef-dropcaps.qodef-circle',
                '.qodef-dropcaps.qodef-square',
                '.qodef-blog-share:hover .qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener',
                '.qodef-horizontal-timeline .qodef-events-wrapper .qodef-events .qodef-filling-line',
                '.no-touch .qodef-horizontal-timeline .qodef-events-wrapper .qodef-events a:hover .circle-outer',
                '.qodef-horizontal-timeline .qodef-events-wrapper .qodef-events a.selected .circle-outer',
                '.qodef-process-holder .qodef-process-item-holder .qodef-pi-icon-holder:before',
                '.qodef-blog-holder.qodef-blog-type-masonry-gallery article.format-quote',
                '.woocommerce-page .qodef-content a.added_to_cart:hover',
                '.woocommerce-page .qodef-content button[type=submit]:hover',
                '.woocommerce-page .qodef-content input[type=submit]:hover',
                'div.woocommerce a.added_to_cart:hover',
                'div.woocommerce a.button:hover',
                'div.woocommerce button[type=submit]:hover',
                'div.woocommerce input[type=submit]:hover',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs>li a:before',
                'ul.products>.product .qodef-pl-text-wrapper:after',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
                '.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-view-cart',
                '.qodef-drop-down .second .inner > ul > li.current-menu-item > a:before',
                '.qodef-drop-down .second .inner > ul > li.current-menu-parent > a:before',
                '.qodef-drop-down .second .inner ul li.sub ul li.current-menu-item > a:before'
            );


            $border_color_selector = array(
                '.qodef-st-loader .pulse_circles .ball',
                '.qodef-sidebar .widget.widget_tag_cloud a:hover',
                '.woocommerce-page .qodef-content button[type=submit]:hover',
                '.woocommerce-page .qodef-content input[type=submit]:hover',
                'div.woocommerce a.added_to_cart:hover',
                'div.woocommerce button[type=submit]:hover',
                'div.woocommerce input[type=submit]:hover',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
                '.widget.woocommerce.widget_product_tag_cloud a:hover'
            );

            $border_top_color_selector = array(
                '.qodef-main-menu .qodef-main-menu-line',
                '.qodef-testimonials.qodef-testimonials-cards .qodef-testimonial-content .qodef-testimonial-content-inner:after',
                '.qodef-blog-list-holder.qodef-boxes .qodef-blog-list-item .qodef-blog-list-item-inner:after',
                '.qodef-blog-list-holder.qodef-masonry .qodef-blog-list-item-inner:after',
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-post-text:after',
                '.qodef-content .qodef-subscription-form:after', 
                '.sidebar .qodef-subscription-form:after', 
                '.woocommerce-page .qodef-subscription-form:after'
            );

            $border_bottom_color_selector = array(
                '.qodef-testimonials.qodef-testimonials-cards.light .qodef-testimonial-separator',
                '.qodef-pricing-tables .qodef-price-table:before',
                '.qodef-pie-chart-with-icon-holder .qodef-pie-chart-text .qodef-pie-chart-separator-holder .qodef-pie-chart-separator',
                '.qodef-iwt .qodef-iwt-title-separator-holder .qodef-iwt-title-separator',
                '.qodef-sidebar .widget ul li a:hover'
            );

            $border_right_color_selector = array(
                '.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-active a',
                '.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-hover a'
            );


            $border_left_color_selector = array(
                '.qodef-drop-down .wide .qodef-wide-menu-line',
                '.qodef-drop-down .second .inner > ul .qodef-narrow-menu-line'
            );

            echo target_qodef_dynamic_css($color_selector, array('color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($color_important_selector, array('color' => target_qodef_options()->getOptionValue('first_color').'!important'));
            echo target_qodef_dynamic_css('::selection', array('background' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css('::-moz-selection', array('background' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($background_color_selector, array('background-color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($border_color_selector, array('border-color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($border_top_color_selector, array('border-top-color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($border_right_color_selector, array('border-right-color' => target_qodef_options()->getOptionValue('first_color')));
            echo target_qodef_dynamic_css($border_left_color_selector, array('border-left-color' => target_qodef_options()->getOptionValue('first_color')));
        }

        // Second main color
        if(target_qodef_options()->getOptionValue('second_color') !== "") {
            $color_selector = array(
                '.qodef-pagination li .qodef-pagination-arrow',
                '.qodef-pagination li.qodef-pagination-first-page',
                '.qodef-pagination li.qodef-pagination-last-page',
                '.qodef-side-menu .widget.widget_nav_menu ul li a:hover',
                '.qodef-portfolio-single-holder .qodef-portfolio-single-nav .qodef-portfolio-next .qodef-pagination-arrow',
                '.qodef-portfolio-single-holder .qodef-portfolio-single-nav .qodef-portfolio-prev .qodef-pagination-arrow',
                '.qodef-team .qodef-team-social-wrapp .qodef-icon-shortcode:hover .qodef-icon-element',
                '.qodef-blog-list-holder .qodef-item-info-section.qodef-section-top .qodef-post-info-date span',
                '.qodef-blog-list-holder.qodef-boxes .qodef-blog-list-item .qodef-item-info-section.qodef-section-bottom .qodef-blog-share .qodef-social-share-holder.qodef-list li:hover a span',
                '.qodef-masonry-gallery-holder .qodef-masonry-gallery-item.qodef-mg-standard .qodef-masonry-gallery-item-inner .qodef-masonry-gallery-read-more span',
                '.qodef-twitter-widget li .qodef-tweet-icon-holder .qodef-social-twitter',
                'footer .widget.widget_nav_menu ul li:before',
                'footer .widget.widget_text li:before',
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-post-info.qodef-section-top .qodef-post-info-category a',
                '.qodef-blog-holder.qodef-blog-type-standard article .qodef-section-bottom-left .qodef-list li:hover a span',
                '.woocommerce-pagination .page-numbers li a.next .qodef-pagination-arrow',
                '.woocommerce-pagination .page-numbers li a.prev .qodef-pagination-arrow',
                '.woocommerce-pagination .page-numbers li a.next:hover .qodef-pagination-text',
                '.woocommerce-pagination .page-numbers li a.prev:hover .qodef-pagination-text',
                '.woocommerce .star-rating span',
                '.qodef-top-bar #lang_sel .lang_sel_sel:after',
                '.qodef-top-bar #lang_sel ul ul a:hover',
                '.woocommerce .star-rating:before',
                '.qodef-btn.qodef-btn-transparent .qodef-btn-icon-element'

            );

            $color_important_selector = array(
                '.qodef-team.main-info-on-hover .qodef-team-social-holder .qodef-team-social-inner .qodef-team-social-wrapp .qodef-icon-shortcode:hover i'
            );

            $background_color_selector = array(
                '.qodef-booking-form .wpcf7-form-control.wpcf7-submit',
                '.qodef-portfolio-single-holder .qodef-portfolio-social-holder .qodef-portfolio-like a',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content.qodef-progress-gradient',
                '.qodef-tabs.qodef-horizontal-tab.qodef-tab-with-icon-above ul li a .qodef-icon-frame i',
                '.qodef-avs-fixed-content .qodef-avs-down-arrow',
                '.qodef-image-gallery .qodef-image-gallery-grid.qodef-image-gallery-overlay .qodef-gallery-image>a:after',
                '.qodef-portfolio-list-holder-outer .qodef-ptf-list-paging .qodef-ptf-list-load-more a',
                '.qodef-horizontal-timeline .qodef-events-wrapper .qodef-events .qodef-filling-line',
                '.qodef-masonry-gallery-holder .qodef-masonry-gallery-item.qodef-mg-simple .qodef-masonry-gallery-item-inner',
                '.qodef-process-holder .qodef-process-item-holder .qodef-pi-icon-holder:after',
                '.qodef-blog-holder.qodef-blog-type-masonry-gallery article.format-link',
                '.woocommerce .qodef-onsale',
                '.woocommerce .qodef-out-of-stock',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs>li a:before',
                'ul.products>.product .qodef-pl-text-wrapper:after'
            );


            $border_color_selector = array(
                '.qodef-portfolio-single-holder .qodef-portfolio-social-holder .qodef-portfolio-like a'
            );

            echo target_qodef_dynamic_css($color_selector, array('color' => target_qodef_options()->getOptionValue('second_color')));
            echo target_qodef_dynamic_css($color_important_selector, array('color' => target_qodef_options()->getOptionValue('second_color').'!important'));
            echo target_qodef_dynamic_css('::selection', array('background' => target_qodef_options()->getOptionValue('second_color')));
            echo target_qodef_dynamic_css('::-moz-selection', array('background' => target_qodef_options()->getOptionValue('second_color')));
            echo target_qodef_dynamic_css($background_color_selector, array('background-color' => target_qodef_options()->getOptionValue('second_color')));
            echo target_qodef_dynamic_css($border_color_selector, array('border-color' => target_qodef_options()->getOptionValue('second_color')));
        }


        if(target_qodef_options()->getOptionValue('first_color') !== "" || target_qodef_options()->getOptionValue('second_color') !== "") {
            $border_gradient_color_selector = array(
                '.qodef-cf7-default-wrapper',
                '.qodef-content .qodef-subscription-form .wpcf7-form-control.wpcf7-text,.sidebar .qodef-subscription-form .wpcf7-form-control.wpcf7-text,.woocommerce-page .qodef-subscription-form .wpcf7-form-control.wpcf7-text',
                '.qodef-newsletter-with-bottom-border .qodef-input-border .wpcf7-form-control.wpcf7-text',
                '.qodef-team.main-info-below-image .qodef-team-image span',
                '.qodef-top-border-enabled .qodef-top-bar',
                '.qodef-side-menu-slide-from-right .qodef-side-menu .widget.widget_search #searchform input[type=text]',
                '.qodef-team.main-info-below-image .qodef-team-info .qodef-separator',
                '.qodef-team.main-info-on-hover .qodef-team-social-holder .qodef-team-social-inner .qodef-team-title-holder .qodef-separator',
                '.qodef-counter-holder .qodef-counter-separator-holder .qodef-counter-separator',
                '.qodef-counter-holder.qodef-boxed-counter',
                '.countdown-amount:after',
                '.qodef-testimonials.qodef-testimonials-cards .qodef-testimonial-content .qodef-testimonial-content-inner',
                '.qodef-testimonials.qodef-testimonials-slider .qodef-testimonial-text-holder .qodef-testimonial-text-inner .qodef-separator',
                '.qodef-pricing-tables .qodef-price-table',
                '.qodef-tabs.qodef-horizontal-tab .qodef-tabs-nav li a:before',
                '.qodef-tabs.qodef-extended-tab .qodef-tab-container',
                '.qodef-tabs.qodef-extended-tab .qodef-tabs-nav li a:before',
                '.qodef-accordion-holder .qodef-accordion-content',
                '.qodef-accordion-holder .qodef-title-holder:not(.ui-accordion-header-active)',
                '.qodef-separator-holder.qodef-separator-gradient .qodef-separator',
                '.qodef-blog-list-holder.qodef-boxes .qodef-blog-list-item .qodef-item-text-holder',
                '.qodef-blog-list-holder.qodef-masonry .qodef-blog-list-masonry-item .qodef-item-text-holder',
                '.qodef-ptf-gallery .qodef-portfolio-list-holder article .qodef-item-text-holder .qodef-separator',
                '.qodef-ptf-gallery-space .qodef-portfolio-list-holder article .qodef-item-text-holder .qodef-separator',
                '.qodef-ptf-masonry .qodef-portfolio-list-holder article .qodef-item-text-holder .qodef-separator',
                '.qodef-ptf-pinterest .qodef-portfolio-list-holder article .qodef-item-text-holder .qodef-separator',
                '.qodef-horizontal-timeline .qodef-events-wrapper .qodef-events a .circle-outer',
                '.qodef-interactive-banner-holder .qodef-separator',
                '.qodef-service-table table tfoot tr td .border',
                '.qodef-sidebar .widget.widget_search #searchform input[type=text]',
                '.qodef-sidebar .widget.widget_search #searchform input[type=search]',
                '.qodef-blog-holder article.format-link .qodef-post-author .qodef-separator',
                '.qodef-blog-holder article.format-quote .qodef-post-author .qodef-separator',
                '.qodef-blog-holder.qodef-blog-type-masonry article .qodef-post-text',
                '.qodef-blog-holder.qodef-blog-type-masonry article.format-link .qodef-post-author .qodef-separator',
                '.qodef-blog-holder.qodef-blog-type-masonry article.format-quote .qodef-post-author .qodef-separator',
                '.qodef-woocommerce-page .woocommerce-ordering .select2-container .select2-choice'
            );

            $text_gradient_color_selector = array(
                '.qodef-tabs.qodef-horizontal-tab.qodef-tab-with-icon-above ul li a .qodef-icon-frame i',
                '.qodef-avs-fixed-content .qodef-avs-down-arrow'
            );

            $background_gradient_color_selector = array(
                '.qodef-process-holder .qodef-process-item-holder .qodef-pi-icon-holder:after'
            );

            $background_left_gradient_color_selector = array(
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content.qodef-progress-gradient',
                '.qodef-horizontal-timeline .qodef-events-wrapper .qodef-events .qodef-filling-line',
                '.qodef-masonry-gallery-holder .qodef-masonry-gallery-item.qodef-mg-standard .qodef-masonry-gallery-item-inner .qodef-masonry-gallery-item-separator',
                '.qodef-woo-single-page .woocommerce-tabs ul.tabs > li a:before',
                'ul.products > .product .qodef-pl-text-wrapper:after',
                '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                '.qodef-progress-bar .qodef-progress-content-outer .qodef-progress-content.qodef-progress-gradient',
                '.qodef-pricing-slider .qodef-pricing-slider-bar'
            );

            $background_bottom_gradient_color_selector = array(
                '.qodef-video-button .qodef-video-button-play .qodef-video-button-wrapper.video-button-gradient'
            );

            $background_deg_gradient_color_selector = array(
                '.qodef-image-gallery .qodef-image-gallery-grid.qodef-image-gallery-overlay .qodef-gallery-image > a:after',
                '#qodef-back-to-top .qodef-back-to-top-bgrnd'
            );


            $first_color = target_qodef_options()->getOptionValue('first_color') === "" ? '#1cbefc' : target_qodef_options()->getOptionValue('first_color');
            $second_color = target_qodef_options()->getOptionValue('second_color') === "" ? '#5ae4b3' : target_qodef_options()->getOptionValue('second_color');

            echo target_qodef_dynamic_css($border_gradient_color_selector, array(
                '-moz-border-image' => '-moz-linear-gradient(left, '.$first_color .' 0, '.$second_color.' 100%)',
                '-webkit-border-image' => '-webkit-linear-gradient(left, '.$first_color .' 0, '.$second_color.' 100%)',
                'border-image' => 'linear-gradient(to right, '.$first_color .' 0, '.$second_color.' 100%)',
                'border-image-slice' => '1',
            ));

            echo target_qodef_dynamic_css($text_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient('.$first_color .', '.$second_color.')',
                '-webkit-background-clip' => 'text',
                '-webkit-text-fill-color' => 'transparent',
            ));

            echo target_qodef_dynamic_css($background_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient('.$first_color.', '.$second_color.')',
                'background' => '-o-linear-gradient('.$first_color.', '.$second_color.')',
                'background' => '-moz-linear-gradient('.$first_color.', '.$second_color.')',
                'background' => 'linear-gradient('.$first_color.', '.$second_color.')',
            ));

            echo target_qodef_dynamic_css($background_left_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient(left, '.$first_color.', '.$second_color.')',
                'background' => '-o-linear-gradient(right, '.$first_color.', '.$second_color.')',
                'background' => '-moz-linear-gradient(right, '.$first_color.', '.$second_color.')',
                'background' => 'linear-gradient(to right, '.$first_color.', '.$second_color.')',
            ));

            echo target_qodef_dynamic_css($background_bottom_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient(bottom, '.$first_color.', '.$second_color.')',
                'background' => '-o-linear-gradient(bottom, '.$first_color.', '.$second_color.')',
                'background' => '-moz-linear-gradient(bottom, '.$first_color.', '.$second_color.')',
                'background' => 'linear-gradient(to top, '.$first_color.', '.$second_color.')',
            ));

            echo target_qodef_dynamic_css($background_deg_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient(-45deg, '.$first_color.', '.$second_color.')',
                'background' => '-o-linear-gradient(-45deg, '.$first_color.', '.$second_color.')',
                'background' => '-moz-linear-gradient(-45deg, '.$first_color.', '.$second_color.')',
                'background' => 'linear-gradient(-45deg, '.$first_color.', '.$second_color.')',
            ));

        }

		if (target_qodef_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
                '.qodef-content .qodef-content-inner > .qodef-container',
                '.qodef-content .qodef-content-inner > .qodef-full-width'
			);
			echo target_qodef_dynamic_css($background_color_selector, array('background-color' => target_qodef_options()->getOptionValue('page_background_color')));
		}

		if (target_qodef_options()->getOptionValue('selection_color')) {
			echo target_qodef_dynamic_css('::selection', array('background' => target_qodef_options()->getOptionValue('selection_color')));
			echo target_qodef_dynamic_css('::-moz-selection', array('background' => target_qodef_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (target_qodef_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = target_qodef_options()->getOptionValue('page_background_color_in_box');
		}

		if (target_qodef_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(target_qodef_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (target_qodef_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(target_qodef_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (target_qodef_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (target_qodef_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo target_qodef_dynamic_css('.qodef-boxed .qodef-wrapper', $boxed_background_style);
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_design_styles');
}

if (!function_exists('target_qodef_h1_styles')) {

    function target_qodef_h1_styles() {

        $h1_styles = array();

        if(target_qodef_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = target_qodef_options()->getOptionValue('h1_color');
        }
        if(target_qodef_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h1_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = target_qodef_options()->getOptionValue('h1_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = target_qodef_options()->getOptionValue('h1_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = target_qodef_options()->getOptionValue('h1_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo target_qodef_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h1_styles');
}

if (!function_exists('target_qodef_h2_styles')) {

    function target_qodef_h2_styles() {

        $h2_styles = array();

        if(target_qodef_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = target_qodef_options()->getOptionValue('h2_color');
        }
        if(target_qodef_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h2_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = target_qodef_options()->getOptionValue('h2_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = target_qodef_options()->getOptionValue('h2_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = target_qodef_options()->getOptionValue('h2_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo target_qodef_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h2_styles');
}

if (!function_exists('target_qodef_h3_styles')) {

    function target_qodef_h3_styles() {

        $h3_styles = array();

        if(target_qodef_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = target_qodef_options()->getOptionValue('h3_color');
        }
        if(target_qodef_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h3_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = target_qodef_options()->getOptionValue('h3_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = target_qodef_options()->getOptionValue('h3_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = target_qodef_options()->getOptionValue('h3_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo target_qodef_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h3_styles');
}

if (!function_exists('target_qodef_h4_styles')) {

    function target_qodef_h4_styles() {

        $h4_styles = array();

        if(target_qodef_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = target_qodef_options()->getOptionValue('h4_color');
        }
        if(target_qodef_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h4_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = target_qodef_options()->getOptionValue('h4_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = target_qodef_options()->getOptionValue('h4_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = target_qodef_options()->getOptionValue('h4_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo target_qodef_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h4_styles');
}

if (!function_exists('target_qodef_h5_styles')) {

    function target_qodef_h5_styles() {

        $h5_styles = array();

        if(target_qodef_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = target_qodef_options()->getOptionValue('h5_color');
        }
        if(target_qodef_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h5_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = target_qodef_options()->getOptionValue('h5_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = target_qodef_options()->getOptionValue('h5_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = target_qodef_options()->getOptionValue('h5_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo target_qodef_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h5_styles');
}

if (!function_exists('target_qodef_h6_styles')) {

    function target_qodef_h6_styles() {

        $h6_styles = array();

        if(target_qodef_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = target_qodef_options()->getOptionValue('h6_color');
        }
        if(target_qodef_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('h6_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = target_qodef_options()->getOptionValue('h6_texttransform');
        }
        if(target_qodef_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = target_qodef_options()->getOptionValue('h6_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = target_qodef_options()->getOptionValue('h6_fontweight');
        }
        if(target_qodef_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo target_qodef_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_h6_styles');
}

if (!function_exists('target_qodef_text_styles')) {

    function target_qodef_text_styles() {

        $text_styles = array();

        if(target_qodef_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = target_qodef_options()->getOptionValue('text_color');
        }
        if(target_qodef_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = target_qodef_get_formatted_font_family(target_qodef_options()->getOptionValue('text_google_fonts'));
        }
        if(target_qodef_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('text_fontsize')).'px';
        }
        if(target_qodef_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('text_lineheight')).'px';
        }
        if(target_qodef_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = target_qodef_options()->getOptionValue('text_texttransform');
        }
        if(target_qodef_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = target_qodef_options()->getOptionValue('text_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = target_qodef_options()->getOptionValue('text_fontweight');
        }
        if(target_qodef_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = target_qodef_filter_px(target_qodef_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo target_qodef_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_text_styles');
}

if (!function_exists('target_qodef_link_styles')) {

    function target_qodef_link_styles() {

        $link_styles = array();

        if(target_qodef_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = target_qodef_options()->getOptionValue('link_color');
        }
        if(target_qodef_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = target_qodef_options()->getOptionValue('link_fontstyle');
        }
        if(target_qodef_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = target_qodef_options()->getOptionValue('link_fontweight');
        }
        if(target_qodef_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = target_qodef_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo target_qodef_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_link_styles');
}

if (!function_exists('target_qodef_link_hover_styles')) {

    function target_qodef_link_hover_styles() {

        $link_hover_styles = array();

        if(target_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = target_qodef_options()->getOptionValue('link_hovercolor');
        }
        if(target_qodef_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = target_qodef_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo target_qodef_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(target_qodef_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = target_qodef_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo target_qodef_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_link_hover_styles');
}

if (!function_exists('target_qodef_smooth_page_transition_styles')) {

    function target_qodef_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(target_qodef_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = target_qodef_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array(
            '.qodef-smooth-transition-loader',
            '.qodef-st-loader .qodef-target .qodef-target-main:after',
            '.qodef-st-loader .qodef-target .qodef-target-inner:after'
        );

        if (!empty($loader_style)) {
            echo target_qodef_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(target_qodef_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = target_qodef_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.qodef-st-loader .pulse', 
            '.qodef-st-loader .double_pulse .double-bounce1', 
            '.qodef-st-loader .double_pulse .double-bounce2', 
            '.qodef-st-loader .cube', 
            '.qodef-st-loader .rotating_cubes .cube1', 
            '.qodef-st-loader .rotating_cubes .cube2', 
            '.qodef-st-loader .stripes > div', 
            '.qodef-st-loader .wave > div', 
            '.qodef-st-loader .two_rotating_circles .dot1', 
            '.qodef-st-loader .two_rotating_circles .dot2', 
            '.qodef-st-loader .five_rotating_circles .container1 > div', 
            '.qodef-st-loader .five_rotating_circles .container2 > div', 
            '.qodef-st-loader .five_rotating_circles .container3 > div', 
            '.qodef-st-loader .atom .ball-1:before', 
            '.qodef-st-loader .atom .ball-2:before', 
            '.qodef-st-loader .atom .ball-3:before', 
            '.qodef-st-loader .atom .ball-4:before', 
            '.qodef-st-loader .clock .ball:before', 
            '.qodef-st-loader .mitosis .ball', 
            '.qodef-st-loader .lines .line1', 
            '.qodef-st-loader .lines .line2', 
            '.qodef-st-loader .lines .line3', 
            '.qodef-st-loader .lines .line4', 
            '.qodef-st-loader .fussion .ball', 
            '.qodef-st-loader .fussion .ball-1', 
            '.qodef-st-loader .fussion .ball-2', 
            '.qodef-st-loader .fussion .ball-3', 
            '.qodef-st-loader .fussion .ball-4', 
            '.qodef-st-loader .wave_circles .ball', 
            '.qodef-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
            echo target_qodef_dynamic_css($spinner_selectors, $spinner_style);
        }

        if(target_qodef_options()->getOptionValue('smooth_pt_spinner_type') == 'target') {
            $first_gradient_color = array();
            $second_gradient_color = array();

            if(target_qodef_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
                $first_gradient_color = target_qodef_options()->getOptionValue('smooth_pt_spinner_color');
            }

            if(target_qodef_options()->getOptionValue('smooth_pt_spinner_add_color') !== '') {
                $second_gradient_color = target_qodef_options()->getOptionValue('smooth_pt_spinner_add_color');
            }

            $spinner_background_gradient_color_selector = array(
                '.qodef-st-loader .qodef-target .qodef-target-main',
                '.qodef-st-loader .qodef-target .qodef-target-inner',
            );

             echo target_qodef_dynamic_css($spinner_background_gradient_color_selector, array(
                'background' => '-webkit-linear-gradient('.$first_gradient_color.', '.$second_gradient_color.')',
                'background' => '-o-linear-gradient('.$first_gradient_color.', '.$second_gradient_color.')',
                'background' => '-moz-linear-gradient('.$first_gradient_color.', '.$second_gradient_color.')',
                'background' => 'linear-gradient('.$first_gradient_color.', '.$second_gradient_color.')',
            ));
        }
    }

    add_action('target_qodef_style_dynamic', 'target_qodef_smooth_page_transition_styles');
}