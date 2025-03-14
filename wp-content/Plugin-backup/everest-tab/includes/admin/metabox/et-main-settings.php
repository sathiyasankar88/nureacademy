<?php defined('ABSPATH') or die('No script kiddies please!!');
/* 
 * Main Settings Metabox
 */
global $post;
$postid = $post->ID;
$et_tab_animation_data = get_option('et_tab_animation_options');
//$this->displayArr($et_tab_animation_data);
$et_main_settings = get_post_meta($postid, 'et_main_settings', true);
$orientation    = (isset($et_main_settings['general_settings']['orientation_type']) && $et_main_settings['general_settings']['orientation_type'] != '')?$et_main_settings['general_settings']['orientation_type']:'horizontal';
$tab_position   = (isset($et_main_settings['general_settings']['tab_position']) && $et_main_settings['general_settings']['tab_position'] != '')?$et_main_settings['general_settings']['tab_position']:'';
$enable_animation =  (isset($et_main_settings['general_settings']['enable_animation']) && $et_main_settings['general_settings']['enable_animation'] == true)?true :false;
$tab_animations = (isset($et_main_settings['general_settings']['tab_animations']) && $et_main_settings['general_settings']['tab_animations'] != '')?$et_main_settings['general_settings']['tab_animations']:'';

$enable_tab_bgimage =  (isset($et_main_settings['general_settings']['enable_tab_bgimage']) && $et_main_settings['general_settings']['enable_tab_bgimage'] == true)?true :false;
$bg_image_url = (isset($et_main_settings['general_settings']['bg_image_url']) && $et_main_settings['general_settings']['bg_image_url'] != '')?$et_main_settings['general_settings']['bg_image_url']:'';
$enable_deeplinking =  (isset($et_main_settings['general_settings']['enable_deeplinking']) && $et_main_settings['general_settings']['enable_deeplinking'] == true)?true :false;
$enable_accordion = (isset($et_main_settings['general_settings']['enable_accordion']) && $et_main_settings['general_settings']['enable_accordion'] == true)?true :false;
//$enable_icon_animation =  (isset($et_main_settings['general_settings']['enable_icon_animation']) && $et_main_settings['general_settings']['enable_icon_animation'] == true)?true :false;
//$icon_animation =(isset($et_main_settings['general_settings']['icon_animation']) && $et_main_settings['general_settings']['icon_animation'] != '')?$et_main_settings['general_settings']['icon_animation']:'';
$icon_position  =(isset($et_main_settings['general_settings']['icon_position']) && $et_main_settings['general_settings']['icon_position'] != '')?$et_main_settings['general_settings']['icon_position']:'left';
$display_format = (isset($et_main_settings['general_settings']['display_format_type']) && $et_main_settings['general_settings']['display_format_type'] != '')?$et_main_settings['general_settings']['display_format_type']:'show_title_only';
$show_tab_on    = (isset($et_main_settings['general_settings']['show_tab_on']) && $et_main_settings['general_settings']['show_tab_on'] != '')?$et_main_settings['general_settings']['show_tab_on']:'on_click';
$column  = (isset($et_main_settings['general_settings']['column']) && $et_main_settings['general_settings']['column'] != '')?intval($et_main_settings['general_settings']['column']):'6';
//Display Settings
$template       = (isset($et_main_settings['display_settings']['template']) && $et_main_settings['display_settings']['template'] != '')?$et_main_settings['display_settings']['template']:'template1';
$enable_custom_option = (isset($et_main_settings['custom_settings']['enable_custom_option']) && $et_main_settings['custom_settings']['enable_custom_option'] == true)?true:false;
$bg_color       = (isset($et_main_settings['custom_settings']['bg_color']) && $et_main_settings['custom_settings']['bg_color'] != '')?$et_main_settings['custom_settings']['bg_color']:'';
$bg_hover_color       = (isset($et_main_settings['custom_settings']['bg_hover_color']) && $et_main_settings['custom_settings']['bg_hover_color'] != '')?$et_main_settings['custom_settings']['bg_hover_color']:'';
$bg_active_color = (isset($et_main_settings['custom_settings']['bg_active_color']) && $et_main_settings['custom_settings']['bg_active_color'] != '')?$et_main_settings['custom_settings']['bg_active_color']:'';
$bg_tab_content_color  = (isset($et_main_settings['custom_settings']['bg_tab_content_color']) && $et_main_settings['custom_settings']['bg_tab_content_color'] != '')?$et_main_settings['custom_settings']['bg_tab_content_color']:'';
$font_color       = (isset($et_main_settings['custom_settings']['font_color']) && $et_main_settings['custom_settings']['font_color'] != '')?$et_main_settings['custom_settings']['font_color']:'';
$desc_color       = (isset($et_main_settings['custom_settings']['desc_color']) && $et_main_settings['custom_settings']['desc_color'] != '')?$et_main_settings['custom_settings']['desc_color']:'';
$font_hover_color       = (isset($et_main_settings['custom_settings']['font_hover_color']) && $et_main_settings['custom_settings']['font_hover_color'] != '')?$et_main_settings['custom_settings']['font_hover_color']:'';
?>
<div class="et-setup-wrapper et-main-settings-wrapper">
    <div class="et-tab-header">
        <ul class="et-nav-tabs">
            <li class="et-tab et-active" data-id="et-general-selection"><?php _e('General Settings',ETAB_TD);?></li>
            <li class="et-tab" data-id="et-display-selection"><?php _e('Display Settings',ETAB_TD);?></li>
             <li class="et-tab" data-id="et-animation-selection"><?php _e('Animation Settings',ETAB_TD);?></li>
              <?php if($template == "template14" || $template == "template15"){
                 $show_class = "";
              }else{
                 $show_class = 'style="display: none;"';
                }?>
             <li class="et-tab etab-bg-image" data-id="et-background-image" <?php echo $show_class;?>><?php _e('Background Image',ETAB_TD);?></li>
             <li class="et-tab" data-id="et-custom-styling"><?php _e('Custom Styling',ETAB_TD);?></li>
            
        </ul>
    </div>
    <div class="et-tabs-content-wrap">
        <div class="et-tab-content et-tab-content-active" id="et-general-selection">
            <div class="et-tab-cbody">
                <div class="et-field-wrap">
                    <label><?php _e('Orientation Type',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][orientation_type]" id="et_orientation_type">
                        <option value="horizontal" <?php selected($orientation, 'horizontal'); ?>><?php _e('Horizontal',ETAB_TD);?></option>
                        <option value="vertical" <?php selected($orientation, 'vertical'); ?>><?php _e('Vertical',ETAB_TD);?></option>
                    </select>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Tabs Position',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][tab_position]" id="et_tab_position">
                        <option value="top-left" <?php selected($tab_position, 'top-left'); ?> data-type="horizontal"><?php _e('Top Left',ETAB_TD);?></option>
                        <option value="top-center" <?php selected($tab_position, 'top-center'); ?> data-type="horizontal"><?php _e('Top Center',ETAB_TD);?></option>
                        <option value="top-right" <?php selected($tab_position, 'top-right'); ?> data-type="horizontal"><?php _e('Top Right',ETAB_TD);?></option>
                        <option value="top-compact" <?php selected($tab_position, 'top-compact'); ?> data-type="horizontal"><?php _e('Top Compact',ETAB_TD);?></option>
                        <option value="bottom-left" <?php selected($tab_position, 'bottom-left'); ?> data-type="horizontal"><?php _e('Bottom Left',ETAB_TD);?></option>
                        <option value="bottom-center" <?php selected($tab_position, 'bottom-center'); ?> data-type="horizontal"><?php _e('Bottom Center',ETAB_TD);?></option>
                        <option value="bottom-right" <?php selected($tab_position, 'bottom-right'); ?> data-type="horizontal"><?php _e('Bottom Right',ETAB_TD);?></option>
                        <option value="bottom-compact" <?php selected($tab_position, 'bottom-compact'); ?> data-type="horizontal"><?php _e('Bottom Compact',ETAB_TD);?></option>
                        <option value="vertical-top-left" <?php selected($tab_position, 'vertical-top-left'); ?> data-type="vertical"><?php _e('Vertical Top Left',ETAB_TD);?></option>
                        <option value="vertical-top-right" <?php selected($tab_position, 'vertical-top-right'); ?> data-type="vertical"><?php _e('Vertical Top Right',ETAB_TD);?></option>   
                    </select>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Show Icon Position',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][icon_position]" id="et_icon_position">
                       <option value="left" <?php selected($icon_position, 'left'); ?>><?php _e('Left of Tab Title',ETAB_TD);?></option>
                        <option value="right" <?php selected($icon_position, 'right'); ?>><?php _e('Right of Tab Title',ETAB_TD);?></option>
                         <option value="top" <?php selected($icon_position, 'top'); ?>><?php _e('Top of Tab Title',ETAB_TD);?></option>
                         <!-- <option value="bottom" < ?php selected($icon_position, 'bottom'); ?>>< ?php _e('Bottom of Tab Title',ETAB_TD);?></option> -->
                    </select>
                    </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Tab Labels Display Format',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                      <div class="etab-display-format">
                          <input type="radio" id="et_show_title_only" name="et_main_settings[general_settings][display_format_type]" value="show_title_only" <?php if($display_format == "show_title_only") echo "checked";?>>
                           <label for="et_show_title_only"><?php _e('Show Tab title only',ETAB_TD);?></label>
                       </div>
                       <div class="etab-display-format">
                         <input type="radio" id="et_show_both" name="et_main_settings[general_settings][display_format_type]" value="show_both" <?php if($display_format == "show_both") echo "checked";?>> 
                          <label for="et_show_both"><?php _e('Show icon and title both',ETAB_TD);?></label>
                       </div>
                       <div class="etab-display-format">
                         <input type="radio" id="et_show_icon_only" name="et_main_settings[general_settings][display_format_type]" value="show_icon_only" <?php if($display_format == "show_icon_only") echo "checked";?>> 
                         <label for="et_show_icon_only"><?php _e('Show icon only',ETAB_TD);?></label>
                       </div>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Show Tab On',ETAB_TD);?></label>
                     <div class="etab-right-options"> 
                         <div class="etab-display-format">
                           <input type="radio" id="et_tab_on_click" name="et_main_settings[general_settings][show_tab_on]" value="on_click" <?php if($show_tab_on == "on_click") echo "checked";?>> 
                          <label for="et_tab_on_click"><?php _e('On Click',ETAB_TD);?></label>
                          </div>
                          <div class="etab-display-format">
                            <input type="radio" id="et_tab_on_hover" name="et_main_settings[general_settings][show_tab_on]" value="on_hover" <?php if($show_tab_on == "on_hover") echo "checked";?>>
                           <label for="et_tab_on_hover"><?php _e('On hover',ETAB_TD);?></label>
                        </div>
                    </div>
                    
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Width Column',ETAB_TD);?></label>
                   <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][column]">
                       <option value="1" <?php selected($column, 1); ?>>1 (15% Width)</option>
                       <option value="2" <?php selected($column, 2); ?>>2 (32% Width)</option>
                       <option value="3" <?php selected($column, 3); ?>>3 (50% Width)</option>
                       <option value="4" <?php selected($column, 4); ?>>4 (66% Width)</option>
                       <option value="5" <?php selected($column, 5); ?>>5 (83% Width)</option>
                       <option value="6" <?php selected($column, 6); ?>>6 (100% Width)</option>
                    </select>
                    <p class="description"><?php _e('Set Width Column for this tab as per your requirement.',ETAB_TD);?></p>
                    </div>
                </div>
                <div class="et-field-wrap">
                   <label for="enable_deeplinking"><?php _e('Enable Deeplinking',ETAB_TD);?></label>
                   <div class="etab-right-options"> 
                     <label class="etab-switch">
                     <input type="checkbox" value="true" id="enable_deeplinking" name="et_main_settings[general_settings][enable_deeplinking]" <?php if( $enable_deeplinking ){echo 'checked';}?>>
                     <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable Deeplinking.',ETAB_TD);?>               
                      </div>
                    </div>
                     <p class="description"><?php _e('Note: Enable and use deep-linking to create bookmarkable tabs and SEO-Friendly content.',ETAB_TD);?></p>
                   </div>
               </div>
                <div class="et-field-wrap">
                   <label for="enable_accordion"><?php _e('Enable Accordion For Responsive',ETAB_TD);?></label>
                   <div class="etab-right-options"> 
                     <label class="etab-switch">
                     <input type="checkbox" value="true" id="enable_accordion" name="et_main_settings[general_settings][enable_accordion]" <?php if( $enable_accordion ){echo 'checked';}?>>
                     <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable accordion for responsive.',ETAB_TD);?>               
                      </div>
                    </div>
                     <p class="description"><?php _e('Note: If this option is enabled, then on mobile version tab will work in accordion way.',ETAB_TD);?></p>
                   </div>
               </div>
          </div>
       </div>
        <div class="et-tab-content" id="et-display-selection" style="display:none;">
            <div class="et-tab-cbody">
               <div class="et-field-wrap">
                    <label><?php _e('Choose Template',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[display_settings][template]" id="et_template_type">
                        <?php for($i = 1; $i <= 22; $i++){?>
                            <option value="template<?php echo $i;?>" <?php selected($template, 'template'.$i); ?>><?php _e('Template '.$i,ETAB_TD);?></option>
                        <?php }?>
                    </select> 
                         <p class="description">
                <?php _e('Note: Background Image for tab is only for template 14 and template 15.',ETAB_TD);?>
              </p>
                    </div>
                </div>
                <div class="et_template_preview">
                    <?php for($i = 1; $i <= 22; $i++){
                        if($template != 'template'.$i){
                             $style = 'style="display:none;"';
                        }else{
                            $style = '';
                        }?>
                    <div class="et_listtemplate" id="<?php echo 'template'.$i;?>" <?php echo $style;?>>
                        <img src="<?php echo ETAB_IMAGE_DIR;?>tab_templates/template<?php echo $i;?>.png"/>
                    </div>
                    <?php }?>
                </div>
             </div>
        </div>
         <div class="et-tab-content et-tab-content-active" id="et-background-image" style="display: none;">
            <div class="et-tab-cbody">
                 <div class="et-field-wrap">
                   <label for="enable_tabbgimage"><?php _e('Enable Background Image',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                       <label class="etab-switch">
                       <input type="checkbox" value="true" id="enable_tabbgimage" name="et_main_settings[general_settings][enable_tab_bgimage]" <?php if( $enable_tab_bgimage ){echo 'checked';}?>>
                         <div class="etab-check round"></div>
                       </label>
                       <div class="etab-tooltip-description">
                        <div class="etab-description">
                         <?php _e('Please check to enable background image for tab content.',ETAB_TD);?>               
                        </div>
                      </div>
                 </div>
               </div>
               <div class="et-field-wrap">
                 <label for="enable_animation"><?php _e('Upload Background Image',ETAB_TD);?></label>
                   <div class="etab-right-options"> 
                        <input type="text" id='et-bgimage-url' name='et_main_settings[general_settings][bg_image_url]' class='et-bgimage-url et-tab-text' 
                               value='<?php if($bg_image_url != '' ){ echo esc_url($bg_image_url); } ?>' />
                        <input type="button" class='et-button et-upload-bgimage-btn' value='<?php _e('Upload Image', ETAB_TD); ?>' />
                    
                        <div class='et-bgpreview'>
                        <?php if($bg_image_url != ''){?>
                         <img src='<?php if($bg_image_url != '' ){ echo esc_url($bg_image_url); } ?>' />
                       <?php  }else{ ?>
                        <img src='<?php echo ETAB_IMAGE_DIR;?>thumbnail-default.jpg' alt='No Image Uploaded' />
                       <?php } ?>
                        </div>
                   </div>
               </div>
          </div>
       </div>
        <div class="et-tab-content" id="et-animation-selection" style="display:none;">
              <div class="et-field-wrap">
              <!-- class="etab-switch" -->
                 <label for="enable_animation"><?php _e('Enable Animation',ETAB_TD);?></label>
                  <div class="etab-right-options"> 
                     <label class="etab-switch">
                     <input type="checkbox" value="true" id="enable_animation" name="et_main_settings[general_settings][enable_animation]" <?php if( $enable_animation ){echo 'checked';}?>>
                       <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable tab content animation.',ETAB_TD);?>               
                      </div>
                    </div>
                 </div>
               </div>
                <div class="et-field-wrap">
                    <label><?php _e('Tabs Animation',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                    <select name="et_main_settings[general_settings][tab_animations]" id="et_tab_animations">
                        <?php 
                        if(isset($et_tab_animation_data) && !empty($et_tab_animation_data)){
                        foreach ($et_tab_animation_data as $key => $kvalue){
                           ?>
                        <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                         <?php 
                           if(is_array($kvalue)){
                               foreach ($kvalue as $k => $v){ ?>
                               <option value="<?php echo esc_attr($v);?>" <?php selected($tab_animations, $v); ?>><?php echo esc_attr(ucwords($v));?></option>
                             <?php
                               }
                           } 
                          ?>
                        </optgroup>
                    <?php } } ?>
                    </select>
                    <p class="description"><?php _e('Set tab animation for tab content',ETAB_TD);?></p>
                    </div>
                </div>
        </div>
        <div class="et-tab-content" id="et-custom-styling" style="display:none;">
             <div class="et-tab-cbody">
               <div class="et-field-wrap">
                 <label for="enable_custom_option"><?php _e('Enable Custom Styling',ETAB_TD);?></label>
                  <div class="etab-right-options"> 
                     <label class="etab-switch">
                     <input type="checkbox" value="true" id="enable_custom_option" name="et_main_settings[custom_settings][enable_custom_option]" <?php if( $enable_custom_option ){echo 'checked';}?>>
                       <div class="etab-check round"></div>
                     </label>
                     <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Enable below custom styling for this tab.',ETAB_TD);?>               
                      </div>
                    </div>
                 </div>
               </div>
               <div class="etab-custom-style" id="etab-template14-disable">
                  <div class="et-field-wrap">
                      <label><?php _e('Tab Background color',ETAB_TD);?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_color);?>"/>
                      </div>
                  </div>                
                  <div class="et-field-wrap">
                      <label><?php _e('Tab Hover Background color',ETAB_TD);?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_hover_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_hover_color);?>"/>
                       </div>
                  </div>
                  <div class="et-field-wrap">
                      <label><?php _e('Active Tab Background color',ETAB_TD);?></label>
                      <div class="etab-right-options"> 
                       <input type="text" name="et_main_settings[custom_settings][bg_active_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_active_color);?>"/>
                       </div>
                  </div>
              </div>

                <div class="et-field-wrap">
                    <label><?php _e('Tab Title Font color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][font_color]" class="et-color-picker" value="<?php echo esc_attr($font_color);?>"/>
                    </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Tab Title Font Hover Color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][font_hover_color]" class="et-color-picker" value="<?php echo esc_attr($font_hover_color);?>"/>
                   </div>
                </div>
                 <div class="et-field-wrap">
                    <label><?php _e('Tab Description color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][desc_color]" class="et-color-picker" value="<?php echo esc_attr($desc_color);?>"/>
                    </div>
                </div>
                <div class="et-field-wrap">
                    <label><?php _e('Tab Content Background color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][bg_tab_content_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($bg_tab_content_color);?>"/>
                     </div>
                </div>
                <!-- For header template 2 -->
                <?php 
                $header_bgcolor  = (isset($et_main_settings['custom_settings']['header_bgcolor']) && $et_main_settings['custom_settings']['header_bgcolor'] != '')?$et_main_settings['custom_settings']['header_bgcolor']:'';
                $active_bordercolor  = (isset($et_main_settings['custom_settings']['active_bordercolor']) && $et_main_settings['custom_settings']['active_bordercolor'] != '')?$et_main_settings['custom_settings']['active_bordercolor']:'';
                   $top_border_color  = (isset($et_main_settings['custom_settings']['top_border_color']) && $et_main_settings['custom_settings']['top_border_color'] != '')?$et_main_settings['custom_settings']['top_border_color']:'';
                ?>
                <div class="et-field-wrap etab-template-wise" id="etab-template2-option">
                    <label><?php _e('Tab Header Background Color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][header_bgcolor]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($header_bgcolor);?>"/>
                     <p class="description">Only for Template 2, Template 10</p>
                     </div>
                </div>
                  <div class="et-field-wrap etab-template-wise" id="etab-template3-option">
                    <label><?php _e('Top Border Color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][top_border_color]" class="et-color-picker" data-alpha="true" value="<?php echo esc_attr($top_border_color);?>"/>
                     <p class="description"><?php _e('Only for Template 3',ETAB_TD);?></p>
                     </div>
                </div>

                  <div class="et-field-wrap etab-template-wise" id="etab-template17-option">
                    <label><?php _e('Active Border Color',ETAB_TD);?></label>
                    <div class="etab-right-options"> 
                     <input type="text" name="et_main_settings[custom_settings][active_bordercolor]" class="et-color-picker" value="<?php echo esc_attr($active_bordercolor);?>"/>
                     <p class="description">Only for Template 17,18</p>
                     </div>
                </div>

             </div>
        </div>
    </div>
</div>
