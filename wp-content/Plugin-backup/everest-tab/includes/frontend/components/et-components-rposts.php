<?php defined('ABSPATH') or die("No script kiddies please!");
// echo "<pre>";
// print_r($value['recent_posts']);
$show_date = (isset($value['recent_posts']['show_date']) && $value['recent_posts']['show_date'] == true)?true:false;
$show_comment_number = (isset($value['recent_posts']['show_comment_number']) && $value['recent_posts']['show_comment_number'] == true)?true:false;
$show_excerpt = (isset($value['recent_posts']['show_excerpt']) && $value['recent_posts']['show_excerpt'] == true)?true:false;
$show_fimage = (isset($value['recent_posts']['show_fimage']) && $value['recent_posts']['show_fimage'] == true)?true:false;
$excerpt_limit = (isset($value['recent_posts']['excerpt_limit']) && $value['recent_posts']['excerpt_limit'] != '')?esc_attr($value['recent_posts']['excerpt_limit']):'20';
$date_format = (isset($value['recent_posts']['date_format']) && $value['recent_posts']['date_format'] != '')?esc_attr($value['recent_posts']['date_format']):'F j';
$post_type = (isset($value['recent_posts']['post_type']) && $value['recent_posts']['post_type'] != '')?$value['recent_posts']['post_type']:'';
$posts_per_page = (isset($value['recent_posts']['posts_per_page']) && $value['recent_posts']['posts_per_page'] != '')?$value['recent_posts']['posts_per_page']:'5';
$orderby = (isset($value['recent_posts']['orderby']) && $value['recent_posts']['orderby'] != '')?$value['recent_posts']['orderby']:'';
$order = (isset($value['recent_posts']['order']) && $value['recent_posts']['order'] != '')?$value['recent_posts']['order']:'asc';
$enable_btn = (isset($value['recent_posts']['cta_enable']) && $value['recent_posts']['cta_enable'] == 1)?1:0;
$btn_label = (isset($value['recent_posts']['btn_label']) && $value['recent_posts']['btn_label'] != '')?$value['recent_posts']['btn_label']:'';
$btn_target = (isset($value['recent_posts']['btn_target']) && $value['recent_posts']['btn_target'] != '')?$value['recent_posts']['btn_target']:'_blank';
// /products
$product_type = (isset($value['recent_posts']['products']['product_type']) && $value['recent_posts']['products']['product_type'] != '')?$value['recent_posts']['products']['product_type']:'category';
$category = (isset($value['recent_posts']['products']['category']) && $value['recent_posts']['products']['category'] != '')?$value['recent_posts']['products']['category']:'';
$show_featureimage = (isset($value['recent_posts']['products']['show_featureimage']) && $value['recent_posts']['products']['show_featureimage'] == 1)?1:0;
$show_cat = (isset($value['recent_posts']['products']['show_cat']) && $value['recent_posts']['products']['show_cat'] == 1)?1:0;
$show_price = (isset($value['recent_posts']['products']['show_price']) && $value['recent_posts']['products']['show_price'] == 1)?1:0;
$show_rating = (isset($value['recent_posts']['products']['show_rating']) && $value['recent_posts']['products']['show_rating'] == 1)?1:0;
$show_atc_btn = (isset($value['recent_posts']['products']['show_atc_btn']) && $value['recent_posts']['products']['show_atc_btn'] == 1)?1:0;
$cta_enable = (isset($value['recent_posts']['products']['cta_enable']) && $value['recent_posts']['products']['cta_enable'] == 1)?1:0;
$cta_product_label = (isset($value['recent_posts']['products']['cta_product_label']) && $value['recent_posts']['products']['cta_product_label'] != '')?$value['recent_posts']['products']['cta_product_label']:'';
?>
<div class="etab-recent-posts-content">
   <?php if($post_type == "product"){
     include(ETAB_PATH.'/includes/frontend/components/post_types/et-product-display.php');
   }else{
   	if($template_layout == "template20" || $template_layout == "template22"){
     include(ETAB_PATH.'/includes/frontend/components/post_types/et-post-display-templates.php');
   	}else{
   		include(ETAB_PATH.'/includes/frontend/components/post_types/et-post-display.php');
   	}
   } ?>
</div>