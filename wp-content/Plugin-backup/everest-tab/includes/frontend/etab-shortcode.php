<?php defined('ABSPATH') or die("No script kiddies please!");
if(isset($atts['slug'])){
    $post_id =  $this->get_ID_by_slug($atts['slug']);
}else{
	$post_id = $id; // for visual composer compatible
}
$et_settings = get_option('et_settings', true);
/* Main Settings */
$msettings = get_post_meta($post_id, 'et_main_settings', true);
$tabsettings = get_post_meta($post_id, 'et_tab_settings', true);
$active_tab = get_post_meta($post_id, 'et_active_tab', true);
$tab_active = (isset($active_tab['active']) && $active_tab['active'] != '')?$active_tab['active']:'';
$orientation_type = (isset($msettings['general_settings']['orientation_type']) && $msettings['general_settings']['orientation_type'] != '')?$msettings['general_settings']['orientation_type']:'horizontal';
if(isset($atts['orientation']) && $atts['orientation'] != ''){
    $orientation = $atts['orientation'];
}else{
	$orientation =  $orientation_type;
}
if($orientation == "horizontal"){
	if($orientation_type == "horizontal"){
     $tab_position = (isset($msettings['general_settings']['tab_position']) && $msettings['general_settings']['tab_position'] != '')?$msettings['general_settings']['tab_position']:'top-left';
	}else{
    $tab_position = "top-left'";
	}

}else{
	if($orientation_type == "vertical"){
     $tab_position = (isset($msettings['general_settings']['tab_position']) && $msettings['general_settings']['tab_position'] != '')?$msettings['general_settings']['tab_position']:'vertical-top-left';
	}else{
    $tab_position = "vertical-top-left";
	}
}
$display_format = (isset($msettings['general_settings']['display_format_type']) && $msettings['general_settings']['display_format_type'] != '')?$msettings['general_settings']['display_format_type']:'show_both';
$tab_animations = (isset($msettings['general_settings']['tab_animations']) && $msettings['general_settings']['tab_animations'] != '')?$msettings['general_settings']['tab_animations']:'';
if($tab_animations != ''){
	$tabanimation_class = "animated";
}else{
	$tabanimation_class = '';
}
$etab_column = (isset($msettings['general_settings']['column']) && $msettings['general_settings']['column'] != '')?intval($msettings['general_settings']['column']):'6';
if(isset($atts['column']) && $atts['column'] != ''){
    $column = $atts['column'];
}else{
	$column =  $etab_column;
}
$enable_deeplinking = (isset($msettings['general_settings']['enable_deeplinking']) && $msettings['general_settings']['enable_deeplinking'] == true)? true :false;
$enable_accordion = (isset($msettings['general_settings']['enable_accordion']) && $msettings['general_settings']['enable_accordion'] == true)?true :false;
if($enable_accordion){
	$accordion_check_class = "etabpro-accordion-enable";
}else{
	$accordion_check_class = "etabpro-accordion-disable";
}
//display settings
$template  = (isset($msettings['display_settings']['template']) && $msettings['display_settings']['template'] != '')?$msettings['display_settings']['template']:'template1';
if(isset($atts['template']) && $atts['template'] != ''){
    $template_layout = $atts['template'];
}else{
   $template_layout =  $template;
}
$iconposition  = (isset($msettings['general_settings']['icon_position']) && $msettings['general_settings']['icon_position'] != '')?$msettings['general_settings']['icon_position']:'left';
if(isset($atts['icon_position']) && $atts['icon_position'] != ''){
    $icon_position = $atts['icon_position'];
}else{
   $icon_position =  $iconposition;
}
$enable_tab_bgimage =  (isset($msettings['general_settings']['enable_tab_bgimage']) && $msettings['general_settings']['enable_tab_bgimage'] == true)?true :false;
$bg_image_url = (isset($msettings['general_settings']['bg_image_url']) && $msettings['general_settings']['bg_image_url'] != '')?$msettings['general_settings']['bg_image_url']:'';
$trigger_type    = (isset($msettings['general_settings']['show_tab_on']) && $msettings['general_settings']['show_tab_on'] != '')?$msettings['general_settings']['show_tab_on']:'on_click';
if(isset($atts['event_trigger']) && $atts['event_trigger'] != ''){
    $tab_trigger_type = $atts['event_trigger'];
}else{
   $tab_trigger_type =  $trigger_type;
}
$random_num = rand(111111111, 999999999);

if($display_format == "show_icon_only"){
  $icon_position_class = '';
}else{
  $icon_position_class = 'etab-icon-'.$icon_position.'-position';
}
?>
<div class="everest-tab-main-wrapper etab-sc-main-wrapper etab-clearfix etab-colmn<?php echo $column;?> etab-group-wrap etab-sp-custom-<?php echo $post_id;?> etab-<?php echo esc_attr($template_layout);?>  <?php echo $accordion_check_class;?> etab_format_<?php echo $display_format; ?> etab-trigger-<?php echo esc_attr($tab_trigger_type);?> etab-<?php echo esc_attr($orientation);?> etab-<?php echo esc_attr($tab_position);?>-position <?php echo esc_attr($icon_position_class);?>" data-tab_trigger_type="<?php echo esc_attr($tab_trigger_type);?>" id="et-tab-random-<?php echo $random_num;?>" <?php if($template == "template14" && $enable_tab_bgimage && $bg_image_url != ''){ echo 'style="background-image: url('.$bg_image_url.');"'; } ?> data-accordion="<?php echo $enable_accordion;?>" >
 
 <?php if($tab_position == "top-left" || $tab_position == "top-center" || $tab_position == "top-right" || $tab_position == "top-compact" || $tab_position == "vertical-top-left" || $tab_position == "vertical-top-right"){ ?>
  <div class="etab-header-wrap">
	  <ul class="etab-title-tabs et-tab<?php echo $random_num;?> etab-clearfix" data-id="etab-<?php echo $random_num;?>" data-deeplinking="<?php echo $enable_deeplinking;?>" data-accordion="<?php echo $enable_accordion;?>">
	  <?php if(isset($tabsettings) && !empty($tabsettings)){
	  $i = 0; foreach ($tabsettings as $key => $value) {
	  $enable_desc = (isset($value['enable_desc']) && $value['enable_desc'] == true)?true:false;
	  $description = (isset($value['description']) && $value['description'] != '')?$value['description']:'';
	  $icon_type = (isset($value['icon_type']) && $value['icon_type'] != '')?$value['icon_type']:'';
	  $icon_code = (isset($value['icon']['code']) && $value['icon']['code'] != '')?$value['icon']['code']:'';
	  $icon_custom_url = (isset($value['icon']['url']) && $value['icon']['url'] != '')?$value['icon']['url']:'';
	  $icon_width = (isset($value['icon']['width']) && $value['icon']['width'] != '')?$value['icon']['width']:'';
	  $icon_height = (isset($value['icon']['height']) && $value['icon']['height'] != '')?$value['icon']['height']:'';
	  $components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
	  $custom_link_url = (isset($value['clink']['custom_link_url']) && $value['clink']['custom_link_url'] != '')?$value['clink']['custom_link_url']:'#';
	  $link_target = (isset($value['clink']['custom_link_target']) && $value['clink']['custom_link_target'] != '')?$value['clink']['custom_link_target']:'_self';
	  if($enable_deeplinking){
        $tlabel =  preg_replace('/\s+/', '', $value['tab_label']);
        $deep_attribute = "data-link='".$tlabel."'";
        $link_attribute = "href='#".$tlabel."'";
        $linktype = 'dlinkingtype';
	  }else{
	  	$deep_attribute = "";
	  	$linktype = 'tabtype';
	  	$link_attribute = 'href="javascript:void(0);"';
	  } 
	  if($components == "custom_link"){
       $comp_linktype = " etab-customlink ";
	  }else{
       $comp_linktype = " etab-prelink ";
	  }
	   ?>
	   	  <li class="etab-label<?php echo $comp_linktype;?><?php if($tab_active == $key) echo 'etab-active-show';?>" id="etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>" <?php echo $deep_attribute;?>>
	   	  <?php if($components == "custom_link"){?>
               <a class="etab-link-tag" href="<?php echo esc_url($custom_link_url);?>" target="<?php echo esc_attr($link_target);?>" data-tabtype="custom_link">
	   	 <?php  }else{ ?>
              <a class="etab-link-tag" data-linking="<?php echo $linktype;?>" <?php echo $link_attribute;?> data-tabtype="component_type">
	   	  <?php } ?>
	   	 
	   	  <?php if($icon_position != "right"){ 
	   	   if($display_format == "show_both" || $display_format == "show_icon_only"){ ?>
		       <?php if($icon_type == "available_icon"){
		   	  	if($icon_code != '' || $icon_code != 'dashicons|dashicons-blank' || $icon_code != 'fa|fa-blank' || $icon_code != "genericon|genericon-blank"){ ?>
	   	  	    <span class="etab-icon-wrapper etab-available-icons">
	   	  	      <i class="<?php echo str_replace('|', ' ', $icon_code);?>"></i>
	   	  	    </span>
	   	  	    <?php }
	   	  	    }else if($icon_type == "upload_own"){
	   	  	    	if($icon_custom_url != ''){ ?>
	   	  	    	<span class="etab-icon-wrapper etab-custom-image">
	                   <img src="<?php echo esc_url($icon_custom_url);?>" class="etab-title-icon" width="<?php echo esc_attr($icon_width);?>" height="<?php echo esc_attr($icon_height);?>"/>
	                </span>
	   	  	     <?php }
	   	  	     } ?>

	   	  <?php  } 
	   	  }?>

	   	  <?php if($display_format == "show_both" || $display_format == "show_title_only"){ ?>
	   	   <div class="etab-title-wrapper">
	              <span class="etab-title"><?php echo esc_attr($value['tab_label']);?></span>
	              <?php if($enable_desc){ ?>
	              <p class="etab-desc"><?php echo esc_attr($description);?></p>
	             <?php } ?>
	       </div>
	       <?php } ?>
	       <?php if($icon_position == "right"){ 
	   	   if($display_format == "show_both" || $display_format == "show_icon_only"){ ?>
		       <?php if($icon_type == "available_icon"){
		   	  	if($icon_code != '' || $icon_code != 'dashicons|dashicons-blank' || $icon_code != 'fa|fa-blank' || $icon_code != "genericon|genericon-blank"){ ?>
	   	  	    <span class="etab-icon-wrapper etab-available-icons">
	   	  	      <i class="<?php echo str_replace('|', ' ', $icon_code);?>"></i>
	   	  	    </span>
	   	  	    <?php }
	   	  	    }else if($icon_type == "upload_own"){
	   	  	    	if($icon_custom_url != ''){ ?>
	   	  	    	<span class="etab-icon-wrapper etab-custom-image">
	                   <img src="<?php echo esc_url($icon_custom_url);?>" class="etab-title-icon" width="<?php echo esc_attr($icon_width);?>" height="<?php echo esc_attr($icon_height);?>"/>
	                </span>
	   	  	     <?php }
	   	  	     } ?>

	   	  <?php  } 
	   	  }?>
	   	   </a>

			<?php if($enable_accordion){ 
                	if($tab_active == $key){
	  		$active_check = "1";
	  		}else{
           $active_check = "0";
	  		}?>
	  		 
    <div class="etab-content-section etab-<?php echo $random_num;?> <?php echo $tabanimation_class;?> <?php if($tab_active == $key) echo 'etab-active-content';?> etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>" data-animation="<?php echo esc_attr($tab_animations);?>" data-active="<?php echo $active_check;?>">
        <?php
           $components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
           switch ($components) {
           	case 'editor':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-editor.php');
           		break;
           	case 'recent_posts':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-rposts.php');
           		break;
           	case 'contact_form':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-cform.php');
           		break;
           	case 'social_feeds':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-socialfeeds.php');
           		break;
           	case 'shortcode':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-shortcode.php');
           		break;
           	default:
           		include(ETAB_PATH.'/includes/frontend/components/et-components-editor.php');
           		break;
           }
        ?> 
  	</div>


		    <?php } ?>
	       </li>
	   <?php $i++; } }?>
	  </ul>
  </div>
<?php } ?>
  <div class="etab-content-wrap" <?php if($template == "template15" && $enable_tab_bgimage && $bg_image_url != ''){ echo 'style="background-image: url('.$bg_image_url.');"'; } ?>>
  <?php if($template == "template15" && $enable_tab_bgimage && $bg_image_url != ''){ ?>
   <div class="etab-common-overlay" style="background-color: rgba(0,0,0,0.66);"></div>
   <?php } ?>
   <?php if(isset($tabsettings) && !empty($tabsettings)){
	  foreach ($tabsettings as $key => $value) { 
	  	if($tab_active == $key){
	  		$active_check = "1";
	  		}else{
           $active_check = "0";
	  		}?>
    <div class="etab-content-section etab-<?php echo $random_num;?> <?php if($tab_active == $key) echo 'etab-active-content';?> <?php echo $tabanimation_class;?> etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>" data-animation="<?php echo esc_attr($tab_animations);?>" data-active="<?php echo $active_check;?>">
        <?php
           $components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
           switch ($components) {
           	case 'editor':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-editor.php');
           		break;
           	case 'recent_posts':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-rposts.php');
           		break;
           	case 'contact_form':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-cform.php');
           		break;
           	case 'social_feeds':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-socialfeeds.php');
           		break;
           	case 'shortcode':
           		include(ETAB_PATH.'/includes/frontend/components/et-components-shortcode.php');
           		break;
           	default:
           		include(ETAB_PATH.'/includes/frontend/components/et-components-editor.php');
           		break;
           }
        ?> 
  	</div>
  	 <?php } }?>
  </div>
   <?php if($tab_position == "bottom-left" || $tab_position == "bottom-center" || $tab_position == "bottom-right" || $tab_position == "bottom-compact"){ ?>
  <div class="etab-header-wrap">
	  <ul class="etab-title-tabs et-tab<?php echo $random_num;?> etab-clearfix" data-id="etab-<?php echo $random_num;?>" data-deeplinking="<?php echo $enable_deeplinking;?>">
	  <?php if(isset($tabsettings) && !empty($tabsettings)){
	  $i = 0; foreach ($tabsettings as $key => $value) {
	  $enable_desc = (isset($value['enable_desc']) && $value['enable_desc'] == true)?true:false;
	  $description = (isset($value['description']) && $value['description'] != '')?$value['description']:'';
	  $icon_type = (isset($value['icon_type']) && $value['icon_type'] != '')?$value['icon_type']:'';
	  $icon_code = (isset($value['icon']['code']) && $value['icon']['code'] != '')?$value['icon']['code']:'';
	  $icon_custom_url = (isset($value['icon']['url']) && $value['icon']['url'] != '')?$value['icon']['url']:'';
	  $icon_width = (isset($value['icon']['width']) && $value['icon']['width'] != '')?$value['icon']['width']:'';
	  $icon_height = (isset($value['icon']['height']) && $value['icon']['height'] != '')?$value['icon']['height']:'';
	  $components = (isset($value['components']) && $value['components'] != '')?$value['components']:'';
	  $custom_link_url = (isset($value['clink']['custom_link_url']) && $value['clink']['custom_link_url'] != '')?$value['clink']['custom_link_url']:'#';
	  $link_target = (isset($value['clink']['custom_link_target']) && $value['clink']['custom_link_target'] != '')?$value['clink']['custom_link_target']:'_self';
	  if($enable_deeplinking){
	  	$tlabel =  preg_replace('/\s+/', '', $value['tab_label']);
        $deep_attribute = "data-link='".$tlabel."'";
        $link_attribute = 'href="'.$tlabel.'"';
	  }else{
	  	$deep_attribute = "";
	  	$link_attribute = 'href="javascript:void(0);"';
	  } 
	     if($components == "custom_link"){
	       $comp_linktype = " etab-customlink ";
		  }else{
	       $comp_linktype = " etab-prelink ";
		  }
	   ?>
	   	  <li class="etab-label<?php echo $comp_linktype;?><?php if($tab_active == $key) echo 'etab-active-show';?>" id="etab-<?php echo esc_attr($key);?>-<?php echo $random_num;?>" <?php echo $deep_attribute;?>>
	   	  <?php if($components == "custom_link"){?>
               <a href="<?php echo esc_url($custom_link_url);?>" target="<?php echo esc_attr($link_target);?>" data-tabtype="custom_link">
	   	 <?php  }else{ ?>
              <a <?php echo $link_attribute;?> data-tabtype="component_type">
	   	  <?php } ?>
	   	 
	   	  <?php if($icon_position != "bottom"){ 
	   	   if($display_format == "show_both" || $display_format == "show_icon_only"){ ?>
		       <?php if($icon_type == "available_icon"){
		   	  	if($icon_code != '' || $icon_code != 'dashicons|dashicons-blank' || $icon_code != 'fa|fa-blank' || $icon_code != "genericon|genericon-blank"){ ?>
	   	  	    <span class="etab-icon-wrapper etab-available-icons">
	   	  	      <i class="<?php echo str_replace('|', ' ', $icon_code);?>"></i>
	   	  	    </span>
	   	  	    <?php }
	   	  	    }else{ 
	   	  	    	if($icon_custom_url != ''){ ?>
	   	  	    	<span class="etab-icon-wrapper etab-custom-image">
	                   <img src="<?php echo esc_url($icon_custom_url);?>" class="etab-title-icon" width="<?php echo esc_attr($icon_width);?>" height="<?php echo esc_attr($icon_height);?>"/>
	                </span>
	   	  	     <?php }
	   	  	     } ?>

	   	  <?php  } 
	   	  }?>

	   	  <?php if($display_format == "show_both" || $display_format == "show_title_only"){ ?>
	   	   <div class="etab-title-wrapper">
	              <span class="etab-title"><?php echo esc_attr($value['tab_label']);?></span>
	              <?php if($enable_desc){ ?>
	              <p class="etab-desc"><?php echo esc_attr($description);?></p>
	             <?php } ?>
	       </div>
	       <?php } ?>
	       <?php if($icon_position == "bottom"){ 
	   	   if($display_format == "show_both" || $display_format == "show_icon_only"){ ?>
		       <?php if($icon_type == "available_icon"){
		   	   if($icon_code != '' || $icon_code != 'dashicons|dashicons-blank' || $icon_code != 'fa|fa-blank' || $icon_code != "genericon|genericon-blank"){ ?>
	   	  	    <span class="etab-icon-wrapper etab-available-icons">
	   	  	      <i class="<?php echo str_replace('|', ' ', $icon_code);?>"></i>
	   	  	    </span>
	   	  	    <?php }
	   	  	    }else{ 
	   	  	    	if($icon_custom_url != ''){ ?>
	   	  	    	<span class="etab-icon-wrapper etab-custom-image">
	                   <img src="<?php echo esc_url($icon_custom_url);?>" class="etab-title-icon" width="<?php echo esc_attr($icon_width);?>" height="<?php echo esc_attr($icon_height);?>"/>
	                </span>
	   	  	     <?php }
	   	  	     } ?>

	   	  <?php  } 
	   	  }?>
	   	   </a>
	       </li>
	   <?php $i++; } }?>
	  </ul>
  </div>
<?php } ?>
</div>
<?php
 // $this->displayArr($msettings['custom_settings']);
$enable_custom_option = (isset($msettings['custom_settings']['enable_custom_option']) && $msettings['custom_settings']['enable_custom_option'] == true)?true:false;
$bg_color = (isset($msettings['custom_settings']['bg_color']) && $msettings['custom_settings']['bg_color'] != '')?$msettings['custom_settings']['bg_color']:'';
$bg_hover_color = (isset($msettings['custom_settings']['bg_hover_color']) && $msettings['custom_settings']['bg_hover_color'] != '')?$msettings['custom_settings']['bg_hover_color']:'';
$bg_active_color = (isset($msettings['custom_settings']['bg_active_color']) && $msettings['custom_settings']['bg_active_color'] != '')?$msettings['custom_settings']['bg_active_color']:'';
$font_color = (isset($msettings['custom_settings']['font_color']) && $msettings['custom_settings']['font_color'] != '')?$msettings['custom_settings']['font_color']:'';
$desc_color = (isset($msettings['custom_settings']['desc_color']) && $msettings['custom_settings']['desc_color'] != '')?$msettings['custom_settings']['desc_color']:'';
$font_hover_color = (isset($msettings['custom_settings']['font_hover_color']) && $msettings['custom_settings']['font_hover_color'] != '')?$msettings['custom_settings']['font_hover_color']:'';
$bg_tab_content_color = (isset($msettings['custom_settings']['bg_tab_content_color']) && $msettings['custom_settings']['bg_tab_content_color'] != '')?$msettings['custom_settings']['bg_tab_content_color']:'';
//header for template2,template10
$header_bgcolor = (isset($msettings['custom_settings']['header_bgcolor']) && $msettings['custom_settings']['header_bgcolor'] != '')?$msettings['custom_settings']['header_bgcolor']:'';
//header for template17
$active_bordercolor = (isset($msettings['custom_settings']['active_bordercolor']) && $msettings['custom_settings']['active_bordercolor'] != '')?$msettings['custom_settings']['active_bordercolor']:'';
//to border for template 3
$top_border_color = (isset($msettings['custom_settings']['top_border_color']) && $msettings['custom_settings']['top_border_color'] != '')?esc_attr($msettings['custom_settings']['top_border_color']):'';
if($enable_custom_option == "true" || $enable_custom_option != ''){
include(ETAB_PATH.'/includes/frontend/etab-custom-css.php');	
}
?>


