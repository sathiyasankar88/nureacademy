<div class="rt-segment">
    <h2><?php echo esc_html__('STEP 2 - PROTECT YOUR DATA:', 'better-robots-txt'); ?></h2>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Spam Backlink Blocker', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
        <?php
            $image_html = '<div class="rt-tooltip-after"><img src="' . ROBOTS_PLUGIN_DIR . '/admin/assets/imgs/star-new1.png" alt="" /></div>';

            echo $renderer->twoPremium(
                'feed_protector', 
                'Allow', 'Disable', 
                'Avoid spammer robots from generating unwilling backlinks with your website',
                $isPremium, 
                $image_html);
            ?>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Bad bot blocker', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            $image_html = '<div class="rt-tooltip-after"><img src="' . ROBOTS_PLUGIN_DIR . '/admin/assets/imgs/star-new2.png" alt="" /></div>';

            echo $renderer->twoPremium('bad_bots', 
            'Allow', 
            'Disable', 
            'Activate to block top malicious web scrapers (bad bots). Please check faq for more info.',
            $isPremium, 
            $image_html);
            ?>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Backlink Protector', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            $extra_text = $isPremium ? '' : '<span style="margin-left: 10px;">' . __("(recommended by our users)", "better-robots-txt") . '</span>';

            echo $renderer->twoPremium('backlinks_pro', 
            'Allow', 
            'Disable', 
            'Hide your backlinks from your competitors. Please check faq for more info.',
            $isPremium, 
            $extra_text);
            ?>

            <div class="rt_backlinks_bots" <?php if ( $options::get('backlinks_pro') && $options::get('backlinks_pro') == "allow" ) { echo 'style="display: inline;"'; } else { echo 'style="display: none;"';} ?>>
                <br />
                <select id="backlinks_bots" name="backlinks_bots[]" style="width: 100%;" multiple="multiple">
                </select>

                <div class="rt-alert rt-warning" style="font-size: 11px;">
                    <span class="closebtn">&times;</span>
                    <?php echo __( "Note: By default, all bots will be disabled to protect backlinks but you can exclude the bots you don't want to disable.", 'better-robots-txt' ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('Bad Bots recommended by ChatGPT', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            $extra_text = '<span style="margin-left: 10px;">' . __("AI recommended setting by ChatGPT-4", "better-robots-txt") . '</span>';
            
            echo $renderer->twoPremium(
                'bad_bots_chatgpt', 
                'Allow', 
                'Disable', 
                'Activate to block malicious web scrapers (bad bots) recommended by ChatGPT-4', 
                $isPremium, 
                $extra_text);
            ?>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __('ChatGPT Bot Blocker', 'better-robots-txt'); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            $extra_text = '<span style="margin-left: 10px;">' . __("Block ChatGPT Bot from scrapping and copying your content.", "better-robots-txt") . '</span>';

            echo $renderer->twoPremium(
                'block_chatgpt_bot', 
                'Allow', 
                'Disable', 
                'Avoid AI, ChatGPT, from crawling, scrapping and copying your content.',
                $isPremium, 
                $extra_text);
            ?>
        </div>
    </div>

    <?php if (!$isPremium) { ?>
    <div class="rt-row">
        <div class="rt-column col-3" style="padding: 1px 0;"></div>
        <div class="rt-column col-9" style="padding: 1px 0;">
            <div class="rt-alert rt-info" style="margin: 0;">
                <span class="closebtn">&times;</span> 
                <?php echo $get_pro . " " . __( 'all "Protect Your Data" features', 'better-robots-txt' ); ?>
            </div>
        </div>
    </div>
    <?php } ?>

</div>