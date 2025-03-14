<div class="rt-segment">
    <h2><?php echo esc_html__('STEP 1 - IDENTIFY WHICH SEARCH ENGINES SHOULD CRAWL (OR NOT) YOUR WEBSITE:', "better-robots-txt"); ?></h2>
    <?php foreach ($agents as $key => $bot) { ?>
        <div class="rt-row">
            <div class="rt-column col-3">
                <?php echo "<span class='rt-label'>" . esc_html($bot['name']) . "</span>"; ?>
            </div>
            <div class="rt-column col-9">
                <?php
                echo $renderer->three(
                    $bot['slug'], 
                    'Allow', 
                    'Disallow', 
                    'Disable',
                    sprintf(__('Allows %1$s %2$s to index => %3$s', 'better-robots-txt'), $bot['name'], $bot['define'], $bot['path'])
                );
                ?>
            </div>
        </div>
    <?php } ?>
    
    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __( 'Baidu/Sogou/Soso/Youdao - Chinese search engines', 'better-robots-txt' ); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            echo $renderer->threePremium(
                'chinese_bot', 
                'Allow', 
                'Disallow', 
                'Disable',
                'Baidu, Soso, Youdao, Sogou search engines',
                $isPremium
            );
            ?>
        </div>
    </div>

    <?php if (!$isPremium) { ?>
    <div class="rt-row">
        <div class="rt-column col-3" style="padding: 1px 0;"></div>
        <div class="rt-column col-9" style="padding: 1px 0;">
            <div class="rt-alert rt-info" style="margin: 0;">
                <span class="closebtn">&times;</span> 
                <?php echo $get_pro . " " . __( 'Popular Chinese search engines feature', 'better-robots-txt' ); ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
