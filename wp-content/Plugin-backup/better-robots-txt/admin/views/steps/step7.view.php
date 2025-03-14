<div class="rt-segment">
    <h3><?php echo __( 'STEP 7 - IDENTIFY WHICH SOCIAL MEDIA SHOULD CRAWL (OR NOT) YOUR CONTENT:', 'better-robots-txt' ); ?></h3>

    <?php $social_media_platforms = [
        [
            'name' => 'facebook_bot',
            'label' => __('Facebook, Instagram, Whatsapp', 'better-robots-txt'),
            'tooltip' => __('Allow/Disallow FACEBOOK/INSTAGRAM/WHATSAPP Social Media Crawling', 'better-robots-txt'),
        ],
        [
            'name' => 'twitter_bot',
            'label' => __('Twitter', 'better-robots-txt'),
            'tooltip' => __('Allow/Disallow Twitter Social Media Crawling', 'better-robots-txt'),
        ],
        [
            'name' => 'linkedin_bot',
            'label' => __('Linkedin', 'better-robots-txt'),
            'tooltip' => __('Allow/Disallow Linkedin Social Media Crawling', 'better-robots-txt'),
        ],
        [
            'name' => 'pinterest_bot',
            'label' => __('Pinterest', 'better-robots-txt'),
            'tooltip' => __('Allow/Disallow Pinterest Social Media Crawling', 'better-robots-txt'),
        ],
    ];

    foreach ($social_media_platforms as $platform) {
        $name = $platform['name'];
        $label = $platform['label'];
        $tooltip = $platform['tooltip'];
        ?>
        <div class="rt-row">
            <div class="rt-column col-3">
                <span class="rt-label"><?php echo $label; ?></span>
            </div>
            <div class="rt-column col-9">
                <?php
                echo $renderer->threePremium(
                    $name,
                    'Allow',
                    'Disallow',
                    'Disable',
                    $tooltip,
                    $isPremium
                );
                ?>
            </div>
        </div>
        <?php
    } ?>

    <?php if (!$isPremium) { ?>
        <div class="rt-row">
            <div class="rt-column col-3" style="padding: 1px 0;"></div>
            <div class="rt-column col-9" style="padding: 1px 0;">
                <div class="rt-alert rt-info" style="margin: 0;">
                    <span class="closebtn">&times;</span> 
                    <?php echo $get_pro . " " . __( 'Social Media Crawl Features', 'better-robots-txt' ); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>