<?php defined('ABSPATH') or die("No script kiddies please!"); 
$et_settings = get_option('et_settings');
// $this->displayArr($et_settings);
?>
<div class="et-settings-main-wrapper">
 <div class="et-header">
	<div class="et-header-section">
	<div class="et-left-wrap et-clearfix">
		<div class="et-plugin-logo">
	     <img src='<?php echo ETAB_IMAGE_DIR; ?>everest-tab-logo-backend.png' alt="plugin-logo" /> 
	    </div>
		<div class="et-settings-title">
	   <?php _e(' Configuration Settings', ETAB_TD); ?>
		</div>
	</div>
	</div>
 </div>
 <div class="et-container et-tab-container">
  <div class="etab_mainwrapper et-clearfix">

               <div class="et_second-wrapper"> 
                    <ul class="et-main-tabs et-tabs-left">
                        <li class="et-tab-link current">
                            <a class="et_tab_settings current" data-tab="social_settings" data-toggle="tab">
                                <span class="dashicons dashicons-share"></span>
                                <?php _e('Social Settings', ETAB_TD); ?>
                            </a>
                        </li>
                         <li class="et-tab-link">
                            <a class="et_tab_settings" data-tab="cache_settings" data-toggle="tab">
                                <span class="dashicons dashicons-update"></span>
                                <?php _e('Cache Settings', ETAB_TD); ?>
                            </a>
                        </li>
                          <li class="et-tab-link">
                            <a class="et_tab_settings" data-tab="shortcode_generator" data-toggle="tab">
                                <span class="dashicons dashicons-admin-tools"></span>
                                <?php _e('Shortcode Generator', ETAB_TD); ?>
                            </a>
                        </li>
                         <li class="et-tab-link">
                            <a class="et_tab_settings" data-tab="shortcode_details" data-toggle="tab">
                                <span class="dashicons dashicons-admin-page"></span>
                                <?php _e('About Shortcode', ETAB_TD); ?>
                            </a>
                        </li>
                      
                    </ul>
                </div>

                 <div class="et-content-wrapper">
                    <form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
                        <input type="hidden" name="action" value="et_save_settings">
                        <?php wp_nonce_field('et-nonce', 'et_nonce_setup'); ?>
                        <div class="et-tab-pane">
                            <div class="et-tab-main-content current" id="social_settings">
                             <?php include(ETAB_PATH.'includes/admin/pages/configuration_settings/et-social-settings.php'); ?> 
                            </div>
                             <div class="et-tab-main-content" id="cache_settings" style="display: none;">
                             <?php include(ETAB_PATH.'includes/admin/pages/configuration_settings/et-cache-settings.php'); ?>            
                            </div>
                               <div class="et-tab-main-content" id="shortcode_generator" style="display: none;">
                           <?php include(ETAB_PATH.'includes/admin/pages/configuration_settings/et-shortcode-generator.php'); ?>
                            </div>
                            <div class="et-tab-main-content" id="shortcode_details" style="display: none;">
                           <?php include(ETAB_PATH.'includes/admin/pages/configuration_settings/et-shortcode-usage.php'); ?>
                            </div>
                        </div>
                        <div class="et-field-wrapper et-form-actions-wrap">
                            <input type="submit" class="et-button-primary button button-primary" id="et-add-button" name="et_settings_submit" value="<?php _e('Save Changes', ETAB_TD); ?>">
                            <input type="submit" class="et-button-secondary button button-primary" id="et-restore-btn" name="et_restore_settings" value="<?php _e('Restore Default Settings', ETAB_TD); ?>">
                        </div>

                    </form>
                </div>

  </div>
 </div>

</div>
