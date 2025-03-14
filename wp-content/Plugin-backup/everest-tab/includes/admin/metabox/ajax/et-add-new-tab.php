<?php defined('ABSPATH') or die("No script kiddies please!");
if(isset($key)){ $key = $key; }else{ $key = $this->generateRandomIndex();}
$et_active_tab = get_post_meta($postid, 'et_active_tab', true);
$tab_active = (isset($et_active_tab['active']) && $et_active_tab['active'] != '')?$et_active_tab['active']:'';
if($tab_active == '' && $count == '1'){
  $tab_active = $key;
}
$tab_label = (isset($item['tab_label']) && $item['tab_label'] != '')?$item['tab_label']:'';
$enable_desc = (isset($item['enable_desc']) && $item['enable_desc'] == true)?true:false;
$tab_desc = (isset($item['description']) && $item['description'] != '')?$item['description']:'';
$tab_icon_type = (isset($item['icon_type']) && $item['icon_type'] != '')?$item['icon_type']:'';
$icon_code = (isset($item['icon']['code']) && $item['icon']['code'] != '')?$item['icon']['code']:'';
$icon_url = (isset($item['icon']['url']) && $item['icon']['url'] != '')?$item['icon']['url']:'';
$icon_width = (isset($item['icon']['width']) && $item['icon']['width'] != '')?$item['icon']['width']:'';
$icon_height = (isset($item['icon']['height']) && $item['icon']['height'] != '')?$item['icon']['height']:'';
$tab_components_type = (isset($item['components']) && $item['components'] != '')?esc_attr($item['components']):'editor';
?>
<div class="et-each-tab-column">
    <div class="et-tab-item-inner">
        <div class="et-item-header clearfix">
            <div class='et-item-header-title' data-count="<?php echo $count;?>">
              <span class="etab_title_text_disp"><?php 
                 if (isset($tab_label) && $tab_label != '') {
                        echo esc_attr($tab_label);
                    } else {
                        _e('Tab '.$count, 'everest-tab-lite'); 
                    }
                  $count++;
              ?></span>
            </div>
            <div class='et-item-functions'>
                    <span class='et-tab-active' title="Active this tab first.">
                    <label><input type="radio" name="et_active_tab[active]" value="<?php echo $key;?>" <?php if(isset($tab_active) && $tab_active == $key) { echo ' checked="checked"'; } ?>><?php _e('Active',ETAB_TD);?></label></span>
                    <span class='et-tab-sort' title="Sort" ><i class="fa fa-arrows-alt"></i></span>
                    <span class='et-tab-delete' title="Delete" data-confirm="<?php _e('Are you sure you want to delete this item?', ETAB_TD ); ?>"><i class="fa fa-trash"></i></span>
                    <span class='et-tab-hide-show'><i class="fa fa-caret-down"></i></span>
            </div>
	</div>
        <div class='et-tab-item-options clearfix' style='display:none;'>
            <div class="et-tab-cbody">
                <div class="et-field-wrap">
                    <label><?php _e('Tab Label',ETAB_TD);?></label>
                    <input type="text" name="tab_items[<?php echo $key;?>][tab_label]" class="et-tab-text et-tab-title" value="<?php echo esc_attr($tab_label);?>"/>
                </div>
                <div class="et-field-wrap">
                    <label for="enable_desc_<?php echo $key;?>"><?php _e('Enable Description',ETAB_TD);?></label>
                  <div class="etab-right-options"> 
                   <label class="etab-switch">
                    <input type="checkbox" class="etab-show-description" value="true" id="enable_desc_<?php echo $key;?>" name="tab_items[<?php echo $key; ?>][enable_desc]" <?php if( $enable_desc ){echo 'checked';}?>>
                    <div class="etab-check round"></div>
                     </label>
                      <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable description.',ETAB_TD);?>               
                      </div>
                    </div>
                     </div>
                </div>
                <div class="et-field-wrap etab-enable-description-options" <?php if( !$enable_desc ) echo 'style="display: none;"';?>>
                    <label><?php _e('Short Description',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <textarea name="tab_items[<?php echo $key;?>][description]" rows="2" cols="50"><?php echo esc_attr($tab_desc);?></textarea>
                    </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Choose Icon Type',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="tab_items[<?php echo $key;?>][icon_type]" class="et-tab_icon-type">
                        <option><?php _e('None',ETAB_TD);?></option>
                        <option value="available_icon" <?php selected($tab_icon_type, 'available_icon'); ?>><?php _e('Available Icon',ETAB_TD);?></option>
                        <option value="upload_own" <?php selected($tab_icon_type, 'upload_own'); ?>><?php _e('Upload Own Icon',ETAB_TD);?></option>
                    </select>
                    </div>
                 </div>
                <div class="et_selection_icontype_wrapper">
                    <div class="et_available_icon" <?php if($tab_icon_type == 'available_icon' ){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
                        <div class="et-field-wrap">
                            <label for="et-icon_<?php echo $key; ?>"><?php _e('Available Icon',ETAB_TD);?></label>
                            <div class="etab-right-options"> 
                            <input class="et-icon-picker" type="hidden" id="et-icon_<?php echo $key; ?>"
                             name='tab_items[<?php echo $key; ?>][icon][code]' 
                             value='<?php if($icon_code != '' ){ echo esc_attr($icon_code); } ?>' />
			                       <div data-target="#et-icon_<?php echo $key; ?>" class="et-button icon-picker <?php if ($icon_code !='') { $v = explode('|', $icon_code); echo $v[0] . ' ' . $v[1]; } ?> "><?php _e( 'Select Icon', ETAB_TD); ?></div>
                             </div>
                        </div>
                    </div>
                    <div class="et_upload_own_icon" <?php if($tab_icon_type == 'upload_own' ){ ?> style="display:block;" <?php }else{ ?> style="display:none;" <?php } ?>>
                        <div class="et-field-wrap">
                            <label for="et-upload_icon_<?php echo $key; ?>"><?php _e('Upload Own Icon',ETAB_TD);?></label>
                            <div class="etab-right-options"> 
                            <input type="text" id='et-image-url_<?php echo $key; ?>' name='tab_items[<?php echo $key; ?>][icon][url]' class='et-image-url et-tab-text' 
                                   value='<?php if($icon_url != '' ){ echo esc_url($icon_url); } ?>' />
			                      <input type="button" class='et-button et-upload-icon-btn' value='<?php _e('Upload Icon', ETAB_TD); ?>' />
                        
                            <div class='et-iconpreview'>
                              <?php if($icon_url != ''){
                                  $iconurl = $icon_url;
                              }else{
                                  $iconurl =  ETAB_IMAGE_DIR.'thumbnail-default.jpg';
                              }?>
                             <img src='<?php echo esc_url($iconurl); ?>'/>
                            </div>
                            </div>
                        </div>
                        <div class="et-field-wrap">
                           <label for="et-icon-width_<?php echo $key; ?>"><?php _e( 'Width/Height (px) ', ETAB_TD ); ?></label>
			                   <div class="etab-right-options"> 
                          <input type="number" id='ec-image-width_<?php echo $key; ?>' name='tab_items[<?php echo $key; ?>][icon][width]' placeholder='<?php _e('Width', ETAB_TD); ?>' value='<?php if($icon_width != '' ){ echo esc_attr($icon_width); } ?>' />
		                        <input type="number" id='ec-image-height_<?php echo $key; ?>' name='tab_items[<?php echo $key; ?>][icon][height]' placeholder='<?php _e('Height', ETAB_TD); ?>' value='<?php if($icon_height != '' ){ echo esc_attr($icon_height ); } ?>' />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="et-field-wrap">
                     <label><?php _e('Choose Components',ETAB_TD);?></label>
                     <div class="etab-right-options"> 
                     <select name="tab_items[<?php echo $key;?>][components]" class="et-tab_components-type" id="etcomp_<?php echo $key;?>">
                        <option value="editor" <?php selected($tab_components_type, 'editor'); ?>><?php _e('WYSIWYG Editor',ETAB_TD);?></option>
                        <option value="custom_link" <?php selected($tab_components_type, 'custom_link'); ?>><?php _e('Custom Link Tab',ETAB_TD);?></option>
                        <option value="recent_posts" <?php selected($tab_components_type, 'recent_posts'); ?>><?php _e('Recent Posts',ETAB_TD);?></option>
                        <option value="social_feeds" <?php selected($tab_components_type, 'social_feeds'); ?>><?php _e('Social Feeds',ETAB_TD);?></option>
                        <option value="contact_form" <?php selected($tab_components_type, 'contact_form'); ?>><?php _e('Contact Form & Google Map',ETAB_TD);?></option>
                        <option value="shortcode" <?php selected($tab_components_type, 'shortcode'); ?>><?php _e('External Shortcode',ETAB_TD);?></option>
                    </select>
                    </div>
                </div>
                <div class="et_compontents_wrapper">
                    <div class="et_tab_comp et_editor" id="wpeditor_<?php echo $key;?>" <?php if($tab_components_type == "editor") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-editor.php'); ?>
                    </div>
                    <div class="et_tab_comp" id="clink_<?php echo $key;?>" <?php if($tab_components_type == "custom_link") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-clink.php'); ?>
                    </div>
                    <div class="et_tab_comp" id="recent_posts_<?php echo $key;?>" <?php if($tab_components_type == "recent_posts") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-posts.php'); ?>
                    </div>
                    <div class="et_tab_comp" id="social_feeds_<?php echo $key;?>" <?php if($tab_components_type == "social_feeds") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-feeds.php'); ?>
                    </div>
                    <div class="et_tab_comp" id="contact_form_<?php echo $key;?>" <?php if($tab_components_type == "contact_form") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-cform.php'); ?>
                    </div>
                    <div class="et_tab_comp" id="shortcode_<?php echo $key;?>" <?php if($tab_components_type == "shortcode") echo ''; else echo 'style="display:none;"';?>>
                      <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-shortcode.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>