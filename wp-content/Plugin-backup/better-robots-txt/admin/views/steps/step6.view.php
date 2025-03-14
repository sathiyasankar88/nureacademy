<div class="rt-segment">

    <h3><?php echo __( 'STEP 6 - AVOID CRAWLER TRAPS CAUSING CRAWL BUDGET ISSUES:', 'better-robots-txt' ); ?></h3>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Stop crawling useless & toxic links', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
        <?php
            $image_html = '<div class="rt-tooltip-after"><img src="' . ROBOTS_PLUGIN_DIR . '/admin/assets/imgs/star-new4.png" alt="" /></div>';

            echo $renderer->twoPremium(
                'crawl_budget',
                'Allow',
                'Disable',
                '“Crawler traps” are a structural issue within a website that causes crawlers to find a virtually infinite number of irrelevant URLs. In theory, crawlers could get stuck in one part of a website and never finish crawling these irrelevant URLs. Crawler traps hurt crawl budget and cause duplicate content. More info: https://www.contentkingapp.com/academy/crawler-traps/',
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
                <?php echo $get_pro . " " . __( 'Avoid crawler traps', 'better-robots-txt' ); ?>
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>