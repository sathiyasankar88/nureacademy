<?php
defined('ABSPATH') or die('No script kiddies please!!');
$admin_url = admin_url();
$feed_type = (isset($item['social_feeds']['feed_type']) && $item['social_feeds']['feed_type'] != '') ? esc_attr($item['social_feeds']['feed_type']) : 'none';
$pageid = (isset($item['social_feeds']['fb']['pageid']) && $item['social_feeds']['fb']['pageid'] != '') ? esc_attr($item['social_feeds']['fb']['pageid']) : '';
$facebook_feeds = (isset($item['social_feeds']['fb']['facebook_feeds']) && $item['social_feeds']['fb']['facebook_feeds'] != '') ? esc_attr($item['social_feeds']['fb']['facebook_feeds']) : '';
$show_feeds_btn = (isset($item['social_feeds']['fb']['show_btn']) && $item['social_feeds']['fb']['show_btn'] == 1 ) ? 1 : 0;
$feeds_btn_text = (isset($item['social_feeds']['fb']['btn_text']) && $item['social_feeds']['fb']['btn_text'] != '') ? esc_attr($item['social_feeds']['fb']['btn_text']) : '';
$word_limit = (isset($item['social_feeds']['fb']['word_limit']) && $item['social_feeds']['fb']['word_limit'] != '') ? esc_attr($item['social_feeds']['fb']['word_limit']) : '';
$feeds_btn_target = (isset($item['social_feeds']['fb']['btn_target']) && $item['social_feeds']['fb']['btn_target'] != '') ? esc_attr($item['social_feeds']['fb']['btn_target']) : '';
$twitter_username = (isset($item['social_feeds']['twitter']['username']) && $item['social_feeds']['twitter']['username'] != '') ? esc_attr($item['social_feeds']['twitter']['username']) : '';
$twitter_feeds = (isset($item['social_feeds']['twitter']['twitter_feeds']) && $item['social_feeds']['twitter']['twitter_feeds'] != '') ? esc_attr($item['social_feeds']['twitter']['twitter_feeds']) : '';
$show_follow_btn = (isset($item['social_feeds']['twitter']['show_follow_btn']) && $item['social_feeds']['twitter']['show_follow_btn'] == true ) ? true : false;
$rss_url = (isset($item['social_feeds']['rss']['url']) && $item['social_feeds']['rss']['url'] != '') ? esc_url($item['social_feeds']['rss']['url']) : '';
$num_feeds = (isset($item['social_feeds']['rss']['num_feeds']) && $item['social_feeds']['rss']['num_feeds'] != '') ? intval($item['social_feeds']['rss']['num_feeds']) : '';
$rss_btn_target = (isset($item['social_feeds']['rss']['btn_target']) && $item['social_feeds']['rss']['btn_target'] != '') ? esc_attr($item['social_feeds']['rss']['btn_target']) : '_blank';
?>

<div class="et_social_feeds_wrapper">
    <div class="et-field-wrap">
        <label><?php _e('Social Feeds Type', ETAB_TD); ?></label>
        <div class="etab-right-options"> 
        <select name="tab_items[<?php echo $key; ?>][social_feeds][feed_type]" class="et-social-feeds-type" id="et-feeds-<?php echo $key; ?>">   
            <option value="none">Select Feeds Type</option>
            <option value="facebook-feeds" <?php selected('facebook-feeds', $feed_type); ?>><?php _e('Facebook Feeds', ETAB_TD); ?></option>
            <option value="twitter-feeds" <?php selected('twitter-feeds', $feed_type); ?>><?php _e('Twitter Feeds', ETAB_TD); ?></option>    
            <option value="rss-feeds" <?php selected('rss-feeds', $feed_type); ?>><?php _e('RSS Feeds', ETAB_TD); ?></option>    
        </select>
        </div>
    </div>
    <div class="et-fb-feeds-type-wrap" <?php if ($feed_type != "facebook-feeds") echo 'style="display:none;"'; ?>>
        <p class="description">Note: For Facebook Feeds, please do fill requried API Key for facebook at first to get all facebook feeds
            from our plugin's below settings page. Please click below link and then click on tab "Social Settings" > fill Facebook Feeds Configuration Keys.
         <a href="<?php echo $admin_url;?>edit.php?post_type=everest_tab&page=et-configure" target="_blank"><?php _e('Social Settings',ETAB_TD);?></a>
        </p>
        <div class="et-field-wrap">
            <label><?php _e('Facebook Page ID', ETAB_TD); ?></label>
            <div class="etab-right-options">
              <input type="text" class="et-tab-text et-text-field regular-text" name="tab_items[<?php echo $key; ?>][social_feeds][fb][pageid]" value="<?php echo esc_attr($pageid); ?>">
            <p class="description"><?php _e('Note: You can get your Profile/Page ID from', ETAB_TD); ?>
                <a href="http://findmyfbid.in/" target="_blank">http://findmyfbid.in/</a></p>
           </div>
        </div>
        <div class="et-field-wrap">
            <label><?php _e('Number of Feeds', ETAB_TD); ?></label>
           <div class="etab-right-options"> 
            <input type="number" class="et-tab-text" id="no_of_feeds" name="tab_items[<?php echo $key; ?>][social_feeds][fb][facebook_feeds]" value="<?php echo esc_attr($facebook_feeds); ?>">
            <p class="description"><?php _e('Please enter the number of feeds to be fetched. Default number of feeds is 5.', ETAB_TD); ?></p>
            </div>
        </div>
        <div class="et-field-wrap">
            <label for="show-feeds-btn<?php echo $key;?>"><?php _e('Show Button', ETAB_TD); ?></label>
            <div class="etab-right-options"> 
                     <label class="etab-switch">
                       <input id="show-feeds-btn<?php echo $key;?>" type="checkbox" class="et-text-field etab-show-feeds-btn" name="tab_items[<?php echo $key; ?>][social_feeds][fb][show_btn]" value="1" <?php checked($show_feeds_btn, true); ?>>
                          <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable to show read more button',ETAB_TD);?>               
                      </div>
                    </div>
             </div>
        </div>
        <div class="et-field-wrap etab-show-feeds" <?php if ($show_feeds_btn != 1) echo 'style="display:none;"'; ?>>
            <label><?php _e('Button Text', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
               <input type="text" class="et-tab-text et-text-field regular-text" name="tab_items[<?php echo $key; ?>][social_feeds][fb][btn_text]" value="<?php echo esc_attr($feeds_btn_text); ?>">
             </div>
        </div>
        <div class="et-field-wrap">
            <label><?php _e('Button Target', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
                   <select name="tab_items[<?php echo $key; ?>][social_feeds][fb][btn_target]">
                        <option value="_blank"  <?php selected('_blank', $feeds_btn_target); ?>><?php _e('_blank', ETAB_TD); ?></option>
                        <option value="_self"  <?php selected('_self', $feeds_btn_target); ?>><?php _e('_self', ETAB_TD); ?></option>
                        <option value="_parent" <?php selected('_parent', $feeds_btn_target); ?>><?php _e('_parent', ETAB_TD); ?></option>
                        <option value="_top"  <?php selected('_top', $feeds_btn_target); ?>><?php _e('_top', ETAB_TD); ?></option>
                   </select>
            </div>
        </div>
         <div class="et-field-wrap">
            <label><?php _e('Description Limit', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
               <input type="number" class="et-tab-text et-text-field regular-text" name="tab_items[<?php echo $key; ?>][social_feeds][fb][word_limit]" value="<?php echo esc_attr($word_limit); ?>">
             </div>
        </div>
    </div>
    <div class="et-twitter-feeds-type-wrap" <?php if ($feed_type != "twitter-feeds") echo 'style="display:none;"'; ?>>
         <p class="description">Note: For Twitter Feeds, please do fill requried API Key for twitter at first to get all twitter feeds
            from our plugin's below settings page. Please click below link and then click on tab "Social Settings" > fill Twitter Feeds Configuration Keys.
         <a href="<?php echo $admin_url;?>edit.php?post_type=everest_tab&page=et-configure" target="_blank"><?php _e('Social Settings',ETAB_TD);?></a>
        </p>
        <div class="et-field-wrap">
            <label><?php _e('Twitter Username', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
              <input type="text" name="tab_items[<?php echo $key; ?>][social_feeds][twitter][username]" value="<?php echo esc_attr($twitter_username); ?>" placeholder="@accesspressthemes" class="et-tab-text">
              <p class="description"><?php _e('Please enter the username of twitter account from which the feeds need to be fetched. For example:@accesspressthemes', ETAB_TD); ?></p>
              </div>
        </div>
        <div class="et-field-wrap">
            <label><?php _e('Number of Feeds', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
            <input type="number" name="tab_items[<?php echo $key; ?>][social_feeds][twitter][twitter_feeds]" value="<?php echo esc_attr($twitter_feeds); ?>" class="et-tab-text">
            <p class="description"><?php _e('Please enter the number of feeds to be fetched.Default number of feeds is 5.', ETAB_TD); ?></p>
            </div>
        </div>
        <div class="et-field-wrap">
            <label for="show_twitter_fbtn<?php echo $key;?>"><?php _e('Display Twitter Follow Button', ETAB_TD); ?></label>
             <div class="etab-right-options"> 
               <label class="etab-switch">
                 <input type="checkbox" id="show_twitter_fbtn<?php echo $key;?>" class="et-text-field etab-show_follow_btn" name="tab_items[<?php echo $key; ?>][social_feeds][twitter][show_follow_btn]" value="true" <?php checked($show_follow_btn, true); ?>>
                 <div class="etab-check round"></div>
               </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable to show follow us button.',ETAB_TD);?>               
                      </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="et-rss-feeds-type-wrap" <?php if ($feed_type != "rss-feeds") echo 'style="display:none;"'; ?>>
        <div class="et-field-wrap">
            <label><?php _e('RSS Valid URL', ETAB_TD); ?></label>
            <div class="etab-right-options"> 
            <input type="text" class="et-tab-text" name="tab_items[<?php echo $key; ?>][social_feeds][rss][url]" value="<?php echo esc_url($rss_url); ?>">
            <p class="description"><?php _e('Please fill valid rss url link.', ETAB_TD); ?></p>
            </div>
        </div>
        <div class="et-field-wrap">
            <label><?php _e('No of Feeds', ETAB_TD); ?></label>
            <div class="etab-right-options"> 
            <input type="number" min="0" class="et-tab-text" name="tab_items[<?php echo $key; ?>][social_feeds][rss][num_feeds]" value="<?php echo intval($num_feeds); ?>">
            <p class="description"><?php _e('Set number of feeds to display.Default is set to 5 if left empty.', ETAB_TD); ?></p>
            </div>
        </div>
        <div class="et-field-wrap">
            <label><?php _e('Link Target', ETAB_TD); ?></label>
            <div class="etab-right-options"> 
            <select name="tab_items[<?php echo $key; ?>][social_feeds][rss][btn_target]">
                <option value="_blank"  <?php selected('_blank', $rss_btn_target); ?>><?php _e('_blank', ETAB_TD); ?></option>
                <option value="_self"  <?php selected('_self', $rss_btn_target); ?>><?php _e('_self', ETAB_TD); ?></option>
                <option value="_parent" <?php selected('_parent', $rss_btn_target); ?>><?php _e('_parent', ETAB_TD); ?></option>
                <option value="_top"  <?php selected('_top', $rss_btn_target); ?>><?php _e('_top', ETAB_TD); ?></option>
            </select>
            </div>
        </div>

    </div>
</div>