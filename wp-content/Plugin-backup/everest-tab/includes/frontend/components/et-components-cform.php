<?php defined('ABSPATH') or die("No script kiddies please!");
$column = (isset($value['cform']['column']) && $value['cform']['column'] != '')?esc_attr($value['cform']['column']):'single_column';
$cform_shortcode = (isset($value['cform']['shortcode']) && $value['cform']['shortcode'] != '')?$value['cform']['shortcode']:'';
$change_order = (isset($value['cform']['change_order']) && $value['cform']['change_order'] == true)?true:false;
$cform_enable = (isset($value['cform']['enable']) && $value['cform']['enable'] == true)?true:false;
$gmap_enable = (isset($value['gmap']['gmap_enable']) && $value['gmap']['gmap_enable'] == true)?true:false;
$latitude = (isset($value['gmap']['latitude']) && $value['gmap']['latitude'] != '')?$value['gmap']['latitude']:'';
$longitude = (isset($value['gmap']['longitude']) && $value['gmap']['longitude'] != '')?$value['gmap']['longitude']:'';
$zoom_level = (isset($value['gmap']['zoom_level']) && $value['gmap']['zoom_level'] != '')?$value['gmap']['zoom_level']:'10';
?>
<div class="etab-cform-main-container etab-<?php echo $column;?> etab-clearfix">
   <?php if($change_order){
      if($gmap_enable){ ?>
     <div class="etab-gmap-wrapper">
         <div class="etab-google-map" id="etab-google-map-<?php echo $key;?>-<?php echo $random_num;?>" data-latitude="<?php echo esc_attr($latitude); ?>" data-longitude="<?php echo esc_attr($longitude); ?>" data-zoomlevel="<?php echo esc_attr($zoom_level)?>"></div>
     </div>
     <?php }
      if($cform_enable){ ?>
     <div class="etab-contact-form-wrapper">
        <?php echo do_shortcode( $cform_shortcode );?>
     </div>
     <?php }
    }else{
       if($cform_enable){ ?>
     <div class="etab-contact-form-wrapper">
        <?php echo do_shortcode( $cform_shortcode );?>
     </div>
     <?php }?>
     <?php if($gmap_enable){ ?>
     <div class="etab-gmap-wrapper">
         <div class="etab-google-map" id="etab-google-map-<?php echo $key;?>-<?php echo $random_num;?>" data-latitude="<?php echo esc_attr($latitude); ?>" data-longitude="<?php echo esc_attr($longitude); ?>" data-zoomlevel="<?php echo esc_attr($zoom_level)?>"></div>
     </div>
     <?php }
    }?>
</div>