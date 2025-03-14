<div class="rt-segment">

    <h3><?php echo __( 'STEP 5 - IMAGE CRAWLABILITY BY SEARCH ENGINES:', 'better-robots-txt' ); ?></h3>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __( 'Allow/Disallow .Webp, .Png, .Jpg, .gif', 'better-robots-txt' ); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            echo $renderer->threePremium(
                'image_crawlability', 
                'Allow', 
                'Disallow', 
                'Disable',
                'Allow/disallow your images (.Webp, .Png, .Jpg, ...) from being crawled/indexed by search engines',
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
                <?php echo $get_pro . " " . __( 'Allow/Disallow .Webp, .Png, .Jpg, .gif feature', 'better-robots-txt' ); ?>
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>