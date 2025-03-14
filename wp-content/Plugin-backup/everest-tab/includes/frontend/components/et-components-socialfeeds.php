<?php
defined('ABSPATH') or die("No script kiddies please!");
$etab_options = get_option('et_settings', true);
// $this->displayArr($etab_options);
// $this->displayArr($value['social_feeds']);
$access_token = (isset($etab_options['etab_fb_access_token']) && $etab_options['etab_fb_access_token'] != '') ? sanitize_text_field($etab_options['etab_fb_access_token']) : '';
$enable_like_count = (isset($etab_options['social']['facebook']['enable_like_count']) && $etab_options['social']['facebook']['enable_like_count'] == 1) ? 1 : 0;
$enable_cmmt_count = (isset($etab_options['social']['facebook']['enable_cmmt_count']) && $etab_options['social']['facebook']['enable_cmmt_count'] == 1) ? 1 : 0;
$enable_share_count = (isset($etab_options['social']['facebook']['enable_share_count']) && $etab_options['social']['facebook']['enable_share_count'] == 1) ? 1 : 0;
$cache_enable = (isset($etab_options['cache_enable']) && $etab_options['cache_enable'] == 1) ? 1 : 0;
$cache_period = (isset($etab_options['cache_period']) && $etab_options['cache_period'] != '') ? intval($etab_options['cache_period']) : 24;
$feed_type = (isset($value['social_feeds']['feed_type']) && $value['social_feeds']['feed_type'] != '') ? sanitize_text_field($value['social_feeds']['feed_type']) : '';
if ($feed_type != '') {
    ?>
    <div class="etab-social-feeds-wrapper etab-clearfix">
        <?php
        if ($feed_type == "facebook-feeds") {
            $pageid = (isset($etab_options['etab_fb_profile_id']) && $etab_options['etab_fb_profile_id'] != '') ? sanitize_text_field($etab_options['etab_fb_profile_id']) : '';
            $facebook_feeds = (isset($value['social_feeds']['fb']['facebook_feeds']) && $value['social_feeds']['fb']['facebook_feeds'] != '') ? sanitize_text_field(intval($value['social_feeds']['fb']['facebook_feeds'])) : '5';
            $facebook_posts = get_transient('etab_fbfeeds_<?php echo esc_attr($key);?>');
            if (false === $facebook_posts) {
                $fbresults = $this->fetch_social_media_details($pageid, $access_token, $facebook_feeds);
                $results = $fbresults;
                if ($cache_enable) {
                    $cache_period = $cache_period;
                } else {
                    $cache_period = 1;
                }
                $cache_period = intval($cache_period) * 60 * 60;
                $cache_period = ($cache_period < 1) ? 3600 : $cache_period;
                set_transient('etab_fbfeeds_<?php echo esc_attr($key);?>', $results, $cache_period);
            } else {
                $results = $facebook_posts;
            }
            include(ETAB_PATH . '/includes/frontend/components/social_feeds/et-fb-feeds.php');
        } else if($feed_type == "twitter-feeds"){
            $consumer_key = (isset($etab_options['social']['twitter']['consumer_key']) && $etab_options['social']['twitter']['consumer_key'] != '') ? sanitize_text_field($etab_options['social']['twitter']['consumer_key']) : '';
            $consumer_secret = (isset($etab_options['social']['twitter']['consumer_secret']) && $etab_options['social']['twitter']['consumer_secret'] != '') ? sanitize_text_field($etab_options['social']['twitter']['consumer_secret']) : '';
            $twitter_access_token = (isset($etab_options['social']['twitter']['twitter_access_token']) && $etab_options['social']['twitter']['twitter_access_token'] != '') ? sanitize_text_field($etab_options['social']['twitter']['twitter_access_token']) : '';
            $access_token_secret = (isset($etab_options['social']['twitter']['access_token_secret']) && $etab_options['social']['twitter']['access_token_secret'] != '') ? sanitize_text_field($etab_options['social']['twitter']['access_token_secret']) : '';
            $twitter_username = (isset($value['social_feeds']['twitter']['username']) && $value['social_feeds']['twitter']['username'] != '') ? esc_attr($value['social_feeds']['twitter']['username']) : '';
            $twitter_feeds = (isset($value['social_feeds']['twitter']['twitter_feeds']) && $value['social_feeds']['twitter']['twitter_feeds'] != '') ? sanitize_text_field($value['social_feeds']['twitter']['twitter_feeds']) : '5';
            $show_follow_btn = (isset($value['social_feeds']['twitter']['show_follow_btn']) && $value['social_feeds']['twitter']['show_follow_btn'] == true) ? true : false;
            $twitterfeeds_posts = get_transient('etab_twitterfeeds_<?php echo esc_attr($key);?>');
            if (false === $twitterfeeds_posts) {
                $tw_feeds = $this->get_specific_twitter_tweets($twitter_username, $twitter_feeds, $random_num, $consumer_key, $consumer_secret, $twitter_access_token, $access_token_secret);
                if ($cache_enable) {
                    $cache_period = $cache_period;
                } else {
                    $cache_period = 1;
                }
                $cache_period = intval($cache_period) * 60;
                $cache_period = ($cache_period < 1) ? 3600 : $cache_period;
                set_transient('etab_twitterfeeds_<?php echo esc_attr($key);?>', $tw_feeds, $cache_period);
            } else {
                $tw_feeds = $twitterfeeds_posts;
            }
            include(ETAB_PATH . '/includes/frontend/components/social_feeds/et-twitter-feeds.php');
        }else{
            //rss feeds
            $rss_url = (isset($value['social_feeds']['rss']['url']) && $value['social_feeds']['rss']['url'] != '') ? esc_url($value['social_feeds']['rss']['url']) : '';
            $total_feeds = (isset($value['social_feeds']['rss']['num_feeds']) && $value['social_feeds']['rss']['num_feeds'] != '') ? intval($value['social_feeds']['rss']['num_feeds']) : '5';
            $rss_btn_target = (isset($value['social_feeds']['rss']['btn_target']) && $value['social_feeds']['rss']['btn_target'] != '') ? esc_attr($value['social_feeds']['rss']['btn_target']) : '_blank';
            $feed_results = $this->get_rss_feed($rss_url, $total_feeds);
            include(ETAB_PATH . '/includes/frontend/components/social_feeds/et-rss-feeds.php');
        }
        ?>
    </div>
<?php
}