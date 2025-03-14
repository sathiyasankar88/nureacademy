 <?php defined('ABSPATH') or die('No script kiddies please!!'); 
 $product_type = array(
        'category' => __('Category', ETAB_TD),
        'latest_product' => __('Latest Product', ETAB_TD),
        'upsell_product' => __('UpSell Product', ETAB_TD),
        'feature_product' => __('Featured Product', ETAB_TD),
        'on_sale' => __('On Sale Product', ETAB_TD)
    );
 $set_product_type = (isset($item['recent_posts']['products']['product_type']) && $item['recent_posts']['products']['product_type'] != '')?esc_attr($item['recent_posts']['products']['product_type']):'category';
 $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 1
      );
  $woocommerce_categories = array();
  $woocommerce_categories_obj = get_categories($args);

  $woocommerce_categories['all'] = 'Select Product Category';
  foreach ($woocommerce_categories_obj as $category) {
    $woocommerce_categories[$category->term_id] = $category->name;
  }
   $product_list_category = (isset($item['recent_posts']['products']['category']) && $item['recent_posts']['products']['category'] != '')?esc_attr($item['recent_posts']['products']['category']):'';
 ?>
     <div class="et-field-wrap">
            <label><?php _e('Product Type',ETAB_TD);?></label>
            <div class="etab-right-options"> 
            <select name="tab_items[<?php echo $key;?>][recent_posts][products][product_type]">
                    <?php foreach ($product_type as $p_type => $type) { ?>
                        <option value="<?php echo $p_type; ?>" <?php selected($p_type, $set_product_type); ?>>
                        <?php echo $type; ?></option>
                    <?php } ?>
            </select>
            </div>
         </div>

          <div class="et-field-wrap">
            <label><?php _e('Select Product Category',ETAB_TD);?></label>
            <div class="etab-right-options"> 
            <select name="tab_items[<?php echo $key;?>][recent_posts][products][category]">
                    <?php 
                    foreach ($woocommerce_categories as $c_type => $ctype) { ?>
                        <option value="<?php echo $c_type; ?>" <?php selected($c_type, $product_list_category); ?>>
                        <?php echo $ctype; ?></option>
                    <?php } ?>
                </select>
            </div>
         </div>
      <?php 
$show_cat = (isset($item['recent_posts']['products']['show_cat']) && $item['recent_posts']['products']['show_cat'] == 1)?1:0;
$show_rating = (isset($item['recent_posts']['products']['show_rating']) && $item['recent_posts']['products']['show_rating'] == 1)?1:0;
$show_price = (isset($item['recent_posts']['products']['show_price']) && $item['recent_posts']['products']['show_price'] == 1)?1:0;
$show_atc_btn = (isset($item['recent_posts']['products']['show_atc_btn']) && $item['recent_posts']['products']['show_atc_btn'] == 1)?1:0;
 $show_fimage = (isset($item['recent_posts']['products']['show_featureimage']) && $item['recent_posts']['products']['show_featureimage'] == 1)?1:0;
  $cta_enable =  (isset($item['recent_posts']['products']['cta_enable']) && $item['recent_posts']['products']['cta_enable'] == 1)?1:0;
  $cta_product_label = (isset($item['recent_posts']['products']['cta_product_label']) && $item['recent_posts']['products']['cta_product_label'] != '')?esc_attr($item['recent_posts']['products']['cta_product_label']):'';

      ?>
       <div class="et-field-wrap">
            <label for="et_show_fimage_<?php echo $key;?>"><?php _e('Show Featured Image',ETAB_TD);?></label>
            <div class="etab-right-options"> 
                <label class="etab-switch">
                     <input type="checkbox" id="et_show_fimage_<?php echo $key;?>" class="et_show_fimage" name="tab_items[<?php echo $key;?>][recent_posts][products][show_featureimage]" value="1" <?php if( $show_fimage == 1 ){echo 'checked';}?>/>
                     <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable featured image.',ETAB_TD);?>               
                      </div>
                </div>
            </div>
         </div>
         <div class="et-field-wrap">
            <label for="et_show_cat_<?php echo $key;?>"><?php _e('Show Category',ETAB_TD);?></label>
             <div class="etab-right-options"> 
                <label class="etab-switch">
                 <input type="checkbox" id="et_show_cat_<?php echo $key;?>" class="et_show_cat" name="tab_items[<?php echo $key;?>][recent_posts][products][show_cat]" value="1" <?php if( $show_cat == 1 ){echo 'checked';}?>/> 
                   <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable category.',ETAB_TD);?>               
                      </div>
                </div>
            </div>
         </div>
         <div class="et-field-wrap">
            <label for="et_show_rating_<?php echo $key;?>"><?php _e('Show Rating',ETAB_TD);?></label>
             <div class="etab-right-options"> 
                <label class="etab-switch">
                 <input type="checkbox" id="et_show_rating_<?php echo $key;?>" class="et_show_rating" name="tab_items[<?php echo $key;?>][recent_posts][products][show_rating]" value="1" <?php if( $show_rating == 1 ){echo 'checked';}?>/> 
                  <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable rating.',ETAB_TD);?>               
                      </div>
                </div>
            </div>
         </div>
          <div class="et-field-wrap">
            <label for="et_show_price_<?php echo $key;?>"><?php _e('Show Price',ETAB_TD);?></label>
            <div class="etab-right-options"> 
                <label class="etab-switch">
            <input type="checkbox" id="et_show_price_<?php echo $key;?>" class="et_show_price" name="tab_items[<?php echo $key;?>][recent_posts][products][show_price]" value="1" <?php if( $show_price == 1 ){echo 'checked';}?>/> 
             <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable price.',ETAB_TD);?>               
                      </div>
                </div>
            </div>
         </div>
         <div class="et-field-wrap">
            <label for="et_show_atc_btn_<?php echo $key;?>"><?php _e('Show Add To Cart Button',ETAB_TD);?></label>
            <div class="etab-right-options"> 
                <label class="etab-switch">
                   <input type="checkbox" id="et_show_atc_btn_<?php echo $key;?>" class="et_show_atc_btn" name="tab_items[<?php echo $key;?>][recent_posts][products][show_atc_btn]" value="1" <?php if( $show_atc_btn == 1 ){echo 'checked';}?>/> 
                 <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable add to cart button.',ETAB_TD);?>               
                      </div>
                </div>
            </div>
         </div>
         <div class="et-field-wrap">
            <label for="et_product_cta_enable_<?php echo $key;?>"><?php _e('Enable Call To Action',ETAB_TD);?></label>
              <div class="etab-right-options"> 
                <label class="etab-switch">
                  <input id="et_product_cta_enable_<?php echo $key;?>" type="checkbox" name="tab_items[<?php echo $key;?>][recent_posts][products][cta_enable]" value="1" <?php if( $cta_enable == 1 ){echo 'checked';}?>/> 
                 <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable call to action button.',ETAB_TD);?>   
                      </div>
                </div>
            </div>
         </div>
          <div class="et-field-wrap">
            <label><?php _e('Call To Action Label',ETAB_TD);?></label>
             <div class="etab-right-options"> 
               <input type="text" class="et-tab-text" name="tab_items[<?php echo $key;?>][recent_posts][products][cta_product_label]" placeholder="Buy Now" value="<?php echo esc_attr($cta_product_label);?>"/> 
              </div>
         </div>
