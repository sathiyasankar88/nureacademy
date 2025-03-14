<div class="rt-segment">
    <h3><?php echo __( 'STEP 8 - APP-ADS.TXT & ADS.TXT CRAWLABILITY (authorized sellers for ad revenue)', 'better-robots-txt' ); ?></h3>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __( 'Allow Ads.txt', 'better-robots-txt' ); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            echo $renderer->threePremium(
                'ads-txt', 
                'Allow', 
                'Disallow', 
                'Disable',
                'Authorized Digital Sellers for Web, or ads.txt, is an IAB initiative to improve transparency in programmatic advertising. You can create your own ads.txt files to identify who is authorized to sell your inventory. The files are publicly available and crawlable by exchanges, Supply-Side Platforms (SSP), and other buyers and third-party vendors.',
                $isPremium
            );
            ?>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3">
            <span class="rt-label"><?php echo __( 'Allow App-ads.txt', 'better-robots-txt' ); ?></span>
        </div>
        <div class="rt-column col-9">
            <?php
            echo $renderer->threePremium(
                'app-ads-txt', 
                'Allow', 
                'Disallow', 
                'Disable',
                'Authorized Sellers for Apps, or app-ads.txt, is an extension to the Authorized Digital Sellers standard. It expands compatibility to support ads shown in mobile apps.',
                $isPremium
            );
            ?>
        </div>
    </div>

    <div class="rt-row">
        <div class="rt-column col-3" style="padding: 1px 0;"></div>
        <div class="rt-column col-9" style="padding: 1px 0;">

            <div class="rt-alert rt-success" style="margin-top: 10px;">
                <?php echo sprintf( wp_kses( __( 'Click <a href="%s" target="_blank">HERE</a> to Install <a href="%2s" target="_blank">App-ads.txt & Ads.txt Manager</a> to capture more ad revenue.', 'better-robots-txt' ), array( 
                    'a' => array( 
                        'href' => array(), 
                        'target' => array(), 
                    ), 
                    'a' => array( 
                        'href' => array(), 
                        'target' => array(), 
                    ),
            ) ), esc_url( "https://wordpress.org/plugins/app-ads-txt" ), esc_url( "https://wordpress.org/plugins/app-ads-txt" ) ); ?>
            </div>
            <?php if (!$isPremium) { ?>
            <div class="rt-alert rt-info" style="margin: 0;">
                <span class="closebtn">&times;</span> 
                <?php echo $get_pro . " " . __( 'Ads.txt & App-ads.txt Crawlability Features', 'better-robots-txt' ); ?>
            </div>
            <?php } ?>
        </div>
    </div>

</div>