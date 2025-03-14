<?php defined('ABSPATH') or die('No script kiddies please!!'); 
$column = (isset($item['cform']['column']) && $item['cform']['column'] != '')?esc_attr($item['cform']['column']) :'single_column';
$change_order = (isset($item['cform']['change_order']) && $item['cform']['change_order'] == true)?true :false;
$enable_cform = (isset($item['cform']['change_order']) && $item['cform']['change_order'] == true)?true :false;
$enable_cform = (isset($item['cform']['enable']) && $item['cform']['enable'] == true)?true :false;
$cfshortcode = (isset($item['cform']['shortcode']) && $item['cform']['shortcode'] != '')?$item['cform']['shortcode']:'';
$gmap_enable = (isset($item['gmap']['gmap_enable']) && $item['gmap']['gmap_enable'] == true)?true :false;
$latitude = (isset($item['gmap']['latitude']) && $item['gmap']['latitude'] != '')?$item['gmap']['latitude']:'';
$longitude = (isset($item['gmap']['longitude']) && $item['gmap']['longitude'] != '')?$item['gmap']['longitude']:'';
$zoom_level = (isset($item['gmap']['zoom_level']) && $item['gmap']['zoom_level'] != '')?$item['gmap']['zoom_level']:'';
?>
<div class="et_options_wrap et_contact_form_wrapper">
   <div class="et-field-wrap">
         <label><?php _e('Choose Column',ETAB_TD);?></label>
        <div class="etab-right-options"> 
         <select name="tab_items[<?php echo $key; ?>][cform][column]">                   
              <option value="single_column" <?php selected('single_column', $column); ?>>Single Column</option>   
              <option value="double_column" <?php selected('double_column', $column); ?>>Double Column</option>   
        </select>
        </div>
    </div>
     <div class="et-field-wrap">
         <label for="enable_change_order_<?php echo $key;?>"><?php _e('Change Order',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">   
                   <input type="checkbox" value="true" id="enable_change_order_<?php echo $key;?>" class="enable_change_order" name="tab_items[<?php echo $key; ?>][cform][change_order]" <?php if( $change_order ){echo 'checked';}?>>
                  <div class="etab-check round"></div>
                </label>
        </div>
         <p class="description">
                 <?php _e('Enable to change the order of showing contact form and google map.
                 In Default, contact form is shown on left section and google map on right section on tab content section.',ETAB_TD);?></p>
    </div>
  

    <h3 class="et_cform_options et-cformintegration">Contact Form Integration</h3>
    <div class="et-accordion et-contactform-accordion" style="display: none;">
    <div class="et-field-wrap">
         <label for="enable_cform_<?php echo $key;?>"><?php _e('Enable Contact Form',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">  
              <input type="checkbox" value="true" id="enable_cform_<?php echo $key;?>" class="enable_cform" name="tab_items[<?php echo $key; ?>][cform][enable]" <?php if( $enable_cform ){echo 'checked';}?>>
              <div class="etab-check round"></div>
            </label>
         </div>
    </div>
    <div class="et-field-wrap">
         <label><?php _e('Contact Form Shortcode',ETAB_TD);?></label>
         <div class="etab-right-options"> 
         <input type="text" value="<?php echo esc_attr($cfshortcode);?>" name="tab_items[<?php echo $key; ?>][cform][shortcode]" class="et-tab-text">
         </div>
    </div>
    </div>
    
    <h3 class="et_cform_options et-gmapintegration">Google Map Integration</h3>
    <div class="et-accordion et-gmap-accordion" style="display: none;">
    <div class="et-field-wrap">
         <p class="description">Note: For Google Map Integration, please do fill requried Google API Key  at first from our 
            plugin's below settings page. Please click below link and then click on tab "Social Settings" > fill Google Map Configuration > Google API Key.
         <a href="<?php echo $admin_url;?>edit.php?post_type=everest_tab&page=et-configure" target="_blank"><?php _e('Social Settings',ETAB_TD);?></a>
        </p>
        <label for="enable_gmap_<?php echo $key;?>"><?php _e('Enable Google Map',ETAB_TD);?></label>
        <div class="etab-right-options"> 
                <label class="etab-switch">  
               <input type="checkbox" value="true" id="enable_gmap_<?php echo $key;?>" name="tab_items[<?php echo $key; ?>][gmap][gmap_enable]" <?php if( $gmap_enable ){echo 'checked';}?>>
          <div class="etab-check round"></div>
            </label>
         </div>
    </div>
    <div class="et-field-wrap">
         <label><?php _e('Latitude',ETAB_TD);?></label>
         <div class="etab-right-options"> 
         <input type="text" class="et-tab-text" value="<?php echo esc_attr($latitude);?>" name="tab_items[<?php echo $key; ?>][gmap][latitude]">
         <p class="description"><a href="http://www.latlong.net/" target="_blank">Where can I get this?</a></p>
         </div>
    </div>
    <div class="et-field-wrap">
         <label><?php _e('Longitude',ETAB_TD);?></label>
         <div class="etab-right-options"> 
         <input type="text" class="et-tab-text" value="<?php echo esc_attr($longitude);?>" name="tab_items[<?php echo $key; ?>][gmap][longitude]">
         <p class="description"><a href="http://www.latlong.net/" target="_blank">Where can I get this?</a></p>
         </div>
    </div>
     <div class="et-field-wrap">
         <label><?php _e('Zoom Level',ETAB_TD);?></label>
         <div class="etab-right-options"> 
         <input type="text" class="et-tab-text" value="<?php echo esc_attr($zoom_level);?>" name="tab_items[<?php echo $key; ?>][gmap][zoom_level]">
         <p class="description"><?php _e('Please enter the zoom level for the map. Default zoom level is 10',ETAB_TD);?>
        </p>
        </div>
    </div>
    </div>


</div>