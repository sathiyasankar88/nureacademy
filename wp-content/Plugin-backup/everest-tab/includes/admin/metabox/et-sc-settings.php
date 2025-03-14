<?php defined('ABSPATH') or die("No script kiddies please!"); 
?>
<div class="etab-sc-usage-wrapper">
     <ul class="etab-usage-tab-wrap">
        <li data-usage="tab-1" class="etab-usage-trigger etab-active">
            <?php _e( 'Shortcode', ETAB_TD ); ?>
        </li>
        <li data-usage="tab-2" class="etab-usage-trigger">
            <?php _e( 'Template Include', ETAB_TD ); ?>
        </li>
    </ul>
     <div class="etab-usage-post" data-usage-ref="tab-1">
        <p class="description">
                <?php _e('Copy &amp; paste the shortcode directly into any WordPress post or page.',ETAB_TD);?>
                </p>
        <div class="et-shortcode-page-wrap">
            <input type='text' id="sc" class='et-short-code' readonly='' value='[etabs slug="<?php echo $post->post_name; ?>"]' style='width: 100%;' onclick='select()' />
             <span class="et-copied-info" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ETAB_TD); ?></span>
        </div>
    </div>
    <div class="etab-usage-post" data-usage-ref="tab-2" style="display: none;">
        <p class="description"><?php _e('Copy &amp; paste this code into a template file to include the Everest Tabs within your theme.',ETAB_TD);?></p>
        <div class = "et-shortcode-theme-wrap">
            <textarea id="sc2" cols="37" rows="3" class='et-short-code2' readonly='readonly'>&lt;?php echo do_shortcode("[etabs slug=<?php echo $post->post_name; ?>]")?&gt;</textarea>
            <span class="et-copied-info2" style="display: none;"><?php _e('Shortcode copied to your clipboard.', ETAB_TD); ?></span>
        </div>
    </div>
</div>
