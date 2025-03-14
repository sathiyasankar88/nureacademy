<?php defined('ABSPATH') or die('No script kiddies please!!');
$admin_url = admin_url();
$enable_sc = (isset($et_settings['enable_sc']) && $et_settings['enable_sc'] == 1) ? 1 : 0;
?>
<div class="etab-main-wrap et-shortcode-settings">
<p class="description"> <?php _e('Note: Please check to enable the shortcode settings to display Everest Shortcode Button for wp editor on post,page and Generate Custom Tab Shortcode.', ETAB_TD); ?></p>
    <table>
        <tbody> 
            <tr>
                <td class="et-label-option">
                    <label for="enable_sc">
                        <h4><?php _e('Enable Shortcode Settings', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                    <label class="etab-switch">
                        <input type="checkbox" name="et_settings[enable_sc]" id="enable_sc" value="1" <?php checked($enable_sc, 1); ?>>
                        <div class="etab-check round"></div>
                    </label>
                    <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable Everest Tab Shortcode Generator on post,page editor page.',ETAB_TD);?>               
                      </div>
                    </div>
                </td>
            </tr> 

            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Template', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                      <select class="etab_templates">
                        <?php for($i = 1; $i <= 22; $i++){?>
                                    <option value="template<?php echo $i;?>"><?php _e('Template '.$i,ETAB_TD);?></option>
                       <?php }?>
                      </select>
                </td>
            </tr> 
            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Orientation', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                       <select class="etaborientation">
                         <option value="horizontal">Horizontal</option>
                        <option value="vertical">Vertical</option>
                      </select>
                </td>
            </tr>
            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Tabs Position', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                   <select id="etab_tabpositionn" class="etab_position">
                        <option value="top-left" data-type="horizontal"><?php _e('Top Left',ETAB_TD);?></option>
                        <option value="top-center" data-type="horizontal"><?php _e('Top Center',ETAB_TD);?></option>
                        <option value="top-right" data-type="horizontal"><?php _e('Top Right',ETAB_TD);?></option>
                        <option value="top-compact" data-type="horizontal"><?php _e('Top Compact',ETAB_TD);?></option>
                        <option value="bottom-left" data-type="horizontal"><?php _e('Bottom Left',ETAB_TD);?></option>
                        <option value="bottom-center" data-type="horizontal"><?php _e('Bottom Center',ETAB_TD);?></option>
                        <option value="bottom-right" data-type="horizontal"><?php _e('Bottom Right',ETAB_TD);?></option>
                        <option value="bottom-compact" data-type="horizontal"><?php _e('Bottom Compact',ETAB_TD);?></option>
                        <option value="vertical-top-left" data-type="vertical"><?php _e('Vertical Top Left',ETAB_TD);?></option>
                        <option value="vertical-top-right" data-type="vertical"><?php _e('Vertical Top Right',ETAB_TD);?></option>   
                    </select>
                </td>
            </tr>
           <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('No of Tab', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                 <input type="number" class="etab_total_tab" id="etab_total_tab" value="" />
                </td>
            </tr>
            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Event Trigger Type', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                  <select class="etab_event_trigger">
                      <option value="on_click">On Click</option>
                      <option value="on_hover">On Hover</option>
              </select>
                </td>
            </tr>
             <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Tab Column', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                  <select class="etab_column">
                       <option value="6">6 (100% Width)</option>
                       <option value="5">5 (83% Width)</option>
                       <option value="4">4 (66% Width)</option>
                       <option value="3">3 (50% Width)</option>
                       <option value="2">2 (32% Width)</option>
                       <option value="1">1 (15% Width)</option>     
                    </select>
                </td>
            </tr>
            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Icon Position', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                   <select class="etab_icon_position">
                      <option value="left">Left of Tab Title</option>
                      <option value="right">Right of Tab Title</option>
                      <option value="top">Top of Tab Title</option>
                   </select>
                </td>
            </tr>
            <tr>
                <td class="et-label-option">
                    <label>
                        <h4><?php _e('Tab Content Animation', ETAB_TD); ?></h4>
                    </label>
                </td>
                <td class="et-option-value">
                    <select class="et_tab_animations">
                     <option value="">Choose Animation</option>
                        <?php 
                        $et_tab_animation_data = get_option('et_tab_animation_options');
                        if(isset($et_tab_animation_data) && !empty($et_tab_animation_data)){
                        foreach ($et_tab_animation_data as $key => $kvalue){
                           ?>
                        <optgroup label="<?php echo ucwords(str_replace("_", " ", $key));?>">
                         <?php 
                           if(is_array($kvalue)){
                               foreach ($kvalue as $k => $v){ ?>
                               <option value="<?php echo esc_attr($v);?>"><?php echo esc_attr(ucwords($v));?></option>
                             <?php
                               }
                           } 
                          ?>
                        </optgroup>
                    <?php } } ?>
                    </select>
                </td>
            </tr>


        </tbody>
    </table>
    <div>
    <input type="button" class="button-primary" class="etab-gsc" value="Insert Tab Shortcode" onclick="insert_gsc_editor();"/>
    </div>
    <div>
        <h4><?php _e('Generated Shortcode', ETAB_TD); ?></h4>
     <textarea class="etab-generated-shortcode" rows="8" cols="120"></textarea>
               <p class="description">Copy the above generated shortcode in your page/post editor section to
               display simple tab with your content using shortcode.</p>
    </div>
    
</div>