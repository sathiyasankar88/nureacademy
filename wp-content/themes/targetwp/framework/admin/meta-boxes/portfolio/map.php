<?php

if(!function_exists('target_qodef_map_portfolio')) {
    function target_qodef_map_portfolio()
    {

        global $target_qodef_Framework;

        $qode_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $qode_pages[$page->ID] = $page->post_title;
        }

//Portfolio Images

        $qodePortfolioImages = new TargetQodefMetaBox("portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images');
        $target_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images", $qodePortfolioImages);

        $qode_portfolio_image_gallery = new TargetQodefMultipleImages("qode_portfolio-image-gallery", "Portfolio Images", "Choose your portfolio images");
        $qodePortfolioImages->addChild("qode_portfolio-image-gallery", $qode_portfolio_image_gallery);

//Portfolio Images/Videos 2

        $qodePortfolioImagesVideos2 = new TargetQodefMetaBox("portfolio-item", "Portfolio Images/Videos (single upload)");
        $target_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images_videos2", $qodePortfolioImagesVideos2);

        $qode_portfolio_images_videos2 = new TargetQodefImagesVideosFramework("Portfolio Images/Videos 2", "ThisIsDescription");
        $qodePortfolioImagesVideos2->addChild("qode_portfolio_images_videos2", $qode_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

        $qodeAdditionalSidebarItems = target_qodef_create_meta_box(
            array(
                'scope' => array('portfolio-item'),
                'title' => esc_html__('Additional Portfolio Sidebar Items', 'targetwp'),
                'name' => 'portfolio_properties'
            )
        );

        $qode_portfolio_properties = target_qodef_add_options_framework(
            array(
                'label' => esc_html__('Portfolio Properties', 'targetwp'),
                'name' => 'qode_portfolio_properties',
                'parent' => $qodeAdditionalSidebarItems
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_portfolio');

}