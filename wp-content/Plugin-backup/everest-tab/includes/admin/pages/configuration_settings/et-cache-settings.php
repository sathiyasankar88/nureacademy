<?php defined('ABSPATH') or die('No script kiddies please!!');
$cache_enable = (isset($et_settings['cache_enable']) && $et_settings['cache_enable'] == 1)?1:0;
$cache_period = (isset($et_settings['cache_period']) && $et_settings['cache_period'] != '')?intval($et_settings['cache_period']):'';
?>
<div class="etab-main-wrap et-cache-settings">
<p class="description"> <?php _e('Note: Please check to enable the cache options.', ETAB_TD); ?></p>
<table>
    <tbody> 
         <tr>
            <td class="et-label-option">
                <label for="enable_cache">
                    <h4><?php _e('Enable Cache',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
              <label class="etab-switch">
                 <input type="checkbox" name="et_settings[cache_enable]" id="enable_cache" value="1" class="check_cache_field" <?php checked($cache_enable,1);?>>
                 <div class="etab-check round"></div>
             </label>
              <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable cache.',ETAB_TD);?>               
                      </div>
              </div>
            </td>
        </tr> 
        <tr>
           <td class="et-label-option">
                <label>
                    <h4><?php _e('Cache Period',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
                 <input type="number" name="et_settings[cache_period]" value="<?php echo intval($cache_period); ?>" placeholder="24">
                   <p class="description"><?php _e('Please enter the time in hours in which the google places reviews should be updated. Default is 24 hours. The minimum cache period you can setup is 1 hour.', ETAB_TD); ?>
            </td>
        </tr> 
         <tr>
            <td class="et-label-option">
                <label>
                    <h4><?php _e('Delete Cache',ETAB_TD);?></h4>
                </label>
            </td>
            <td class="et-option-value">
            <input type="button" class="et-button-secondary button button-primary" onclick="return confirm('<?php _e('Are you sure you want to clear cache to fetch new social media data?', ETAB_TD); ?>')" name="et-clear-cache-btn" id="et-clear-cache-btn" value="<?php _e('Clear Cache', ETAB_TD); ?>">
             <img src="<?php echo ETAB_IMAGE_DIR ?>/ajaxloader.gif" class="etab-ajax-loader" width="20" height="20" style="display:none;"/>
             <span class="etab-reset-messages" id="etab-reset-message"></span>
            </td>
        </tr> 
    </tbody>
</table>
</div>