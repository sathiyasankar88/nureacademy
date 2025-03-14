<?php defined('ABSPATH') or die('No script kiddies please!!');
//facebook
$access_token = (isset($et_settings['etab_fb_access_token']) && $et_settings['etab_fb_access_token'] != '')?$et_settings['etab_fb_access_token']:'';
$enable_like_count = (isset($et_settings['social']['facebook']['enable_like_count']) && $et_settings['social']['facebook']['enable_like_count'] == 1)?1:0;
$enable_cmmt_count = (isset($et_settings['social']['facebook']['enable_cmmt_count']) && $et_settings['social']['facebook']['enable_cmmt_count'] == 1)?1:0;
$enable_share_count = (isset($et_settings['social']['facebook']['enable_share_count']) && $et_settings['social']['facebook']['enable_share_count'] == 1)?1:0;
//twitter
$consumer_key = (isset($et_settings['social']['twitter']['consumer_key']) && $et_settings['social']['twitter']['consumer_key'] != '')?$et_settings['social']['twitter']['consumer_key']:'';
$consumer_secret = (isset($et_settings['social']['twitter']['consumer_secret']) && $et_settings['social']['twitter']['consumer_secret'] != '')?$et_settings['social']['twitter']['consumer_secret']:'';
$twitter_access_token = (isset($et_settings['social']['twitter']['twitter_access_token']) && $et_settings['social']['twitter']['twitter_access_token'] != '')?$et_settings['social']['twitter']['twitter_access_token']:'';
$access_token_secret = (isset($et_settings['social']['twitter']['access_token_secret']) && $et_settings['social']['twitter']['access_token_secret'] != '')?$et_settings['social']['twitter']['access_token_secret']:'';
//google map
$api_key = (isset($et_settings['social']['gmap']['api_key']) && $et_settings['social']['gmap']['api_key'] != '')?$et_settings['social']['gmap']['api_key']:'';
?>
<div class="etab-main-wrap et-social-wrappr et-facebook-settings">
<?php if (isset($_GET['restore_message'])) { ?>
    <div class="notice notice-success etab-message">
        <p><?php _e('Restored Default Settings Successfully.', ETAB_TD); ?></p>
    </div>
<?php } ?>
<?php if (isset($_GET['message'])) { ?>
    <div class="notice notice-success etab-message">
        <p><?php _e('Settings Saved Successfully.', ETAB_TD); ?></p>
    </div>
<?php } ?>                  
<h3><?php _e('Facebook Feeds Configuration',ETAB_TD);?></h3>
<table id="etab-fetch-facebook-wrap">
    <tbody> 
         <tr>
            <td class="et-label-option">
                <label>
                    <h4><?php _e('Get page access token',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                <button type="button" class="button-primary fb-access-button" id="etab_fb_connect">Login and get access token</button>
                <div class="etab-fb-pages"></div>
            </td>
         </tr>
         <tr>
            <td class ="et-label-option">
                <label>
                    <h4><?php _e( 'Facebook Page Name', ETAB_TD ); ?></h4>
                </label>
            </td>
            <td class="et-option-value">
                <input type="text" class="etab-fb-profile-name" name="et_settings[etab_fb_profile_name]" value="<?php
                if ( isset( $et_settings[ 'etab_fb_profile_name' ] ) ) {
                    echo esc_attr( $et_settings[ 'etab_fb_profile_name' ] );
                }
                ?>" >
                <p class="description">
                    <?php echo _e( 'You can use another public page name too.', ETAB_TD ); ?>
                </p>
            </td>
         </tr>
         <tr>
            <td class ="et-label-option">
                <label>
                    <h4><?php _e( 'Facebook Page ID', ETAB_TD ); ?></h4>
                </label>
             </td>
            <td class="et-option-value">
                <input type="text" class="etab-fb-profile-id" name="et_settings[etab_fb_profile_id]" value="<?php
                if ( isset( $et_settings[ 'etab_fb_profile_id' ] ) ) {
                    echo esc_attr( $et_settings[ 'etab_fb_profile_id' ] );
                }
                ?>" >
                <p class="description"><a href="https://findmyfbid.in/" target="_blank"><?php echo _e( 'Get your Facebook ID here', ETAB_TD ); ?></a></p>
                <p class="description">
                    <?php echo _e( 'You can use another public page id too.', ETAB_TD ); ?>
                </p>
            </td>
         </tr>
         <tr>
             <td class ="et-label-option">
                 <label>
                     <h4>
                         <?php _e( 'Facebook Page Access Token', ETAB_TD ); ?>      
                     </h4>
                  </label>
             </td>
             <td class="et-option-value">
                 <input type="text" class="etab-fb-access-token" name="et_settings[etab_fb_access_token]" value="<?php
                 if ( isset( $et_settings[ 'etab_fb_access_token' ] ) ) {
                     echo esc_attr( $et_settings[ 'etab_fb_access_token' ] );
                 }
                 ?>" >
             </td>
         </tr>
         <p class="description"><?php _e('Note: Create Facebook APP ID and get app secret key from link.',ETAB_TD);?>
         <a href="https://developers.facebook.com/" target="_blank"> https://developers.facebook.com/</a></p>
<!--          <tr>
            <td class="et-label-option">
                <label>
                    <h4><?php _e('Access Token Key',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][facebook][access_token]" value="<?php echo esc_attr($access_token); ?>">
            </td>
        </tr>  -->
        <tr>
           <td class="et-label-option">
                <label for="like_count">
                    <h4><?php _e('Like Count',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
            <label class="etab-switch">
                 <input type="checkbox" id="like_count" name="et_settings[social][facebook][enable_like_count]" value="1" <?php
                    if ( $enable_like_count ) {
                        checked($enable_like_count,1);
                    }
                ?>>
                 <div class="etab-check round"></div>
             </label>
             <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable to show count of like.',ETAB_TD);?>               
                      </div>
             </div>
            </td>
        </tr> 
        <tr>
           <td class="et-label-option">
                <label for="comment_count">
                    <h4><?php _e('Comment Count',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                <label class="etab-switch">
                 <input type="checkbox" id="comment_count" name="et_settings[social][facebook][enable_cmmt_count]" value="1" <?php
                    if ( $enable_cmmt_count ) {
                        checked($enable_cmmt_count,1);
                    }
                ?>>
                 <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable to show comment count.',ETAB_TD);?>               
                      </div>
                </div>
            </td>
        </tr> 
         <tr>
           <td class="et-label-option">
                <label for="share_count">
                    <h4><?php _e('Share Count',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
             <label class="etab-switch">
                 <input type="checkbox" id="share_count" name="et_settings[social][facebook][enable_share_count]" value="1" <?php
                    if ( $enable_share_count ) {
                        checked($enable_share_count,1);
                    }
                ?>>
                 <div class="etab-check round"></div>
                </label>
                 <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable to show count of share.',ETAB_TD);?>               
                      </div>
                </div>
            </td>
        </tr> 
    </tbody>
    <img src="<?php echo ETAB_IMAGE_DIR . 'pinterest.png' ?>" onload="etabFbinit()" style="display:none;">
</table>
</div>
<div class="et-social-wrappr et-twitter-settings">
<h3><?php _e('Twitter Feeds Configuration',ETAB_TD);?></h3>
<p class="description"><?php _e('Note: Please create an app on Twitter through this link:',ETAB_TD);?>
<a href="https://dev.twitter.com/apps" target="_blank"> https://dev.twitter.com/apps</a>
<?php _e(' and get below information.',ETAB_TD);?></p>
<table>
    <tbody> 
         <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Consumer Key',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][twitter][consumer_key]" value="<?php echo esc_attr($consumer_key); ?>">
            </td>
        </tr> 
         <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Consumer Secret',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][twitter][consumer_secret]" value="<?php echo esc_attr($consumer_secret); ?>">
            </td>
        </tr> 
         <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Access Token',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][twitter][twitter_access_token]" value="<?php echo esc_attr($twitter_access_token); ?>">
            </td>
        </tr> 
         <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Access Token Secret',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][twitter][access_token_secret]" value="<?php echo esc_attr($access_token_secret); ?>">
            </td>
        </tr> 
    </tbody>
</table>
</div>
<div class="et-social-wrappr et-gmap-settings">
<h3><?php _e('Google Map Configuration',ETAB_TD);?></h3>
<p class="description"><?php _e('Please get your api key from',ETAB_TD);?> <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank"> https://developers.google.com/maps/documentation/javascript/get-api-key </a><?php _e('here. Map may not display if key is not entered.',ETAB_TD);?></p>
<table>
    <tbody> 
         <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Google Map API Key',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="text" name="et_settings[social][gmap][api_key]" value="<?php echo esc_attr($api_key); ?>">
            </td>
        </tr> 
    </tbody>
</table>
</div>