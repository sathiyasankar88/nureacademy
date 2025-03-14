<div class="rt-segment">

    <h2><?php echo esc_html__( 'STEP 3 - LOADING PERFORMANCE FOR WOOCOMMERCE:', "better-robots-txt" ); ?></h2>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Optimize store\'s crawlability', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
        <?php
            $image_html = '<div class="rt-tooltip-after"><img src="' . ROBOTS_PLUGIN_DIR . '/admin/assets/imgs/star-new3.png" alt="" /></div>';

            echo $renderer->twoPremium(
                'woocom_links',
                'Allow',
                'Disable',
                'Hide your backlinks from your competitors. Please check faq for more info.',
                $isPremium, 
                $image_html);
            ?>
        </div>
    </div>

    <?php if (!$isPremium) { ?>
    <div class="rt-row">
        <div class="rt-column col-3" style="padding: 1px 0;"></div>
        <div class="rt-column col-9" style="padding: 1px 0;">
            <div class="rt-alert rt-info" style="margin: 0;">
                <span class="closebtn">&times;</span> 
                <?php echo $get_pro . " " . __( 'Loading Performance for Woocommerce', 'better-robots-txt' ); ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>