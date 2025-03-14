<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<div class="etab-rss-wrapper">
<?php
if (!empty($feed_results)) {
    foreach ($feed_results as $item) {
        $rss_description = $item->get_description();
        $title = $item->get_title();
        $date = $item->get_date();
        $content = strip_tags($rss_description);
        $link = $item->get_link();
        ?>
            <div class="etab-rss-inner-wrapper">
                <div class="etab-rss-sec-wrapper">
                    <div class="etab-rss-feed-title-wrapper">
                        <a href='<?php esc_attr_e($link); ?>' class="uab_temp_link" target="<?php esc_attr_e($link_target); ?>" title='<?php esc_html_e($title) ?>'>
        <?php esc_html_e($title); ?>	
                        </a>
                    </div>
                    <div class="uab-rss-feed-date-wrapper">
        <?php esc_html_e(date('M j, Y', strtotime($date))); ?>	
                    </div>
                    <div class="uab-rss-feed-description-wrapper">
                        <?php esc_html_e($content); ?>
                    </div>
                </div>
            </div>
        <?php
    }
} else {
    esc_html_e('Invalid/Empty RSS URL', ETAB_TD);
}
?>
</div>	