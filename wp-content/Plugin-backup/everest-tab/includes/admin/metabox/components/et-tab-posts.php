<?php defined('ABSPATH') or die('No script kiddies please!!'); 
$show_date = (isset($item['recent_posts']['show_date']) && $item['recent_posts']['show_date'] == true)?true:false;
$show_comment_number = (isset($item['recent_posts']['show_comment_number']) && $item['recent_posts']['show_comment_number'] == true)?true:false;
$show_excerpt = (isset($item['recent_posts']['show_excerpt']) && $item['recent_posts']['show_excerpt'] == true)?true:false;
$show_fimage = (isset($item['recent_posts']['show_fimage']) && $item['recent_posts']['show_fimage'] == true)?true:false;
$excerpt_limit = (isset($item['recent_posts']['excerpt_limit']) && $item['recent_posts']['excerpt_limit'] != '')?$item['recent_posts']['excerpt_limit']:'';
$posts_per_page = (isset($item['recent_posts']['posts_per_page']) && $item['recent_posts']['posts_per_page'] != '')?$item['recent_posts']['posts_per_page']:'';
$post_type = (isset($item['recent_posts']['post_type']) && $item['recent_posts']['post_type'] != '')?esc_attr($item['recent_posts']['post_type']):'post';
$orderby = (isset($item['recent_posts']['orderby']) && $item['recent_posts']['orderby'] != '')?esc_attr($item['recent_posts']['orderby']):'';
$date_format = (isset($item['recent_posts']['date_format']) && $item['recent_posts']['date_format'] != '')?esc_attr($item['recent_posts']['date_format']):'';
$order = (isset($item['recent_posts']['order']) && $item['recent_posts']['order'] != '')?esc_attr($item['recent_posts']['order']):'';
$cta_enable = (isset($item['recent_posts']['cta_enable']) && $item['recent_posts']['cta_enable'] == 1)?1:0;
$btn_label = (isset($item['recent_posts']['btn_label']) && $item['recent_posts']['btn_label'] != '')?esc_attr($item['recent_posts']['btn_label']):'';
$btn_target = (isset($item['recent_posts']['btn_target']) && $item['recent_posts']['btn_target'] != '')?esc_attr($item['recent_posts']['btn_target']):'_blank';
$post_types =  $this->et_registered_post_types();
$product_orderby = (isset($item['recent_posts']['products']['orderby']) && $item['recent_posts']['products']['orderby'] != '')?esc_attr($item['recent_posts']['products']['orderby']):'ID';
//$ptitle_color = (isset($item['recent_posts']['products']['ptitle_color']) && $item['recent_posts']['products']['ptitle_color'] != '')?esc_attr($item['recent_posts']['products']['ptitle_color']):'';
//$ptitle_hcolor = (isset($item['recent_posts']['products']['ptitle_hcolor']) && $item['recent_posts']['products']['ptitle_hcolor'] != '')?esc_attr($item['recent_posts']['products']['ptitle_hcolor']):'';
?>
<div class="et_options_wrap et_recent_posts_wrapper">
   <div class="et-field-wrap">
        <label><?php _e('Choose Posts Type',ETAB_TD);?></label>
         <div class="etab-right-options"> 
         <select name="tab_items[<?php echo $key; ?>][recent_posts][post_type]" class="et_change_posts_type">                   
                   <?php if(isset($post_types) && !empty($post_types)){
                    foreach ($post_types as $k => $v) {
                      ?>
                       <option value="<?php echo $v;?>" <?php selected($v, $post_type); ?>><?php echo ucfirst($v);?></option>
                      <?php 
                    }
                   } ?>

        </select>
        </div>
    </div>
  <div class="et-recent-posts-comp-wrap" <?php if($post_type == 'product') echo "style='display:none;'"; ?>>
    <div class="et-field-wrap">
        <label for="et_cta_enable_<?php echo $key;?>"><?php _e('Enable Call To Action',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                     <label class="etab-switch">
         <input type="checkbox" id="et_cta_enable_<?php echo $key;?>" class="et_show_ctaction" name="tab_items[<?php echo $key;?>][recent_posts][cta_enable]" value="1" <?php if( $cta_enable == 1 ){echo 'checked';}?>/> 
         <div class="etab-check round"></div>
         </label>
           <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to enable call to action button.',ETAB_TD);?>               
                      </div>
           </div>
         </div>
     </div>
     <div class="et_show_call_to_action_options" <?php if($cta_enable == 1) echo ""; else echo "style='display:none;'";?>>
       <div class="et-field-wrap">
          <label><?php _e('Button Label',ETAB_TD);?></label>
           <div class="etab-right-options"> 
            <input type="text" class="et-tab-text" name="tab_items[<?php echo $key;?>][recent_posts][btn_label]" value="<?php echo esc_attr($btn_label);?>" placeholder="<?php _e('Read More',ETAB_TD);?>"/>
           </div>
       </div>
     </div>
      <div class="et-field-wrap">
          <label for="etab_show_fimage_<?php echo $key;?>"><?php _e('Show Feature Image',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">   
                   <input type="checkbox" class="etab-show_fimage-options" id="etab_show_fimage_<?php echo $key;?>" name="tab_items[<?php echo $key;?>][recent_posts][show_fimage]" value="true" <?php checked($show_fimage,true);?>/>
                   <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to show feature image.',ETAB_TD);?>   
                      </div>
                </div>
            </div>
         </div>
        <div class="et-field-wrap">
          <label for="etab_show_excerpt_<?php echo $key;?>"><?php _e('Show Excerpt',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">   
                   <input type="checkbox" class="etab-comment_number-options" id="etab_show_excerpt_<?php echo $key;?>" name="tab_items[<?php echo $key;?>][recent_posts][show_excerpt]" value="true" <?php checked($show_excerpt,true);?>/>
                   <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to show excerpt.',ETAB_TD);?>   
                      </div>
                </div>
            </div>
         </div>
       <div class="et-field-wrap">
          <label><?php _e('Excerpt Limit',ETAB_TD);?></label>
           <div class="etab-right-options"> 
            <input type="number" class="et-tab-text" name="tab_items[<?php echo $key;?>][recent_posts][excerpt_limit]" value="<?php echo esc_attr($excerpt_limit);?>" placeholder="<?php _e('20',ETAB_TD);?>"/>
           </div>
       </div>
         <div class="et-field-wrap">
        <label for="etab_show_comment_number_<?php echo $key;?>"><?php _e('Show Comment Number',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">   
                   <input type="checkbox" class="etab-comment_number-options" id="etab_show_comment_number_<?php echo $key;?>" name="tab_items[<?php echo $key;?>][recent_posts][show_comment_number]" value="true" <?php checked($show_comment_number,true);?>/>
                   <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to show comment number.',ETAB_TD);?>   
                      </div>
                </div>
            </div>
    </div>
    </div>

   <!-- Woocommerce products options -->
    <div class="et-products-comp-wrap" <?php if($post_type != "product") echo 'style="display: none;"';?>>
       <?php include(ETAB_PATH.'/includes/admin/metabox/components/et-tab-wooproducts.php'); ?>
   </div>
  
   <div class="etab-separation-wrap">
     <div class="et-field-wrap">
        <label><?php _e('Posts Per Page',ETAB_TD);?></label>
         <div class="etab-right-options"> 
        <input type="number" class="et-tab-text" name="tab_items[<?php echo $key;?>][recent_posts][posts_per_page]" value="<?php echo esc_attr($posts_per_page);?>"/>
        </div>
    </div>
    <div class="et-field-wrap">
        <label for="etab_show_date_<?php echo $key;?>"><?php _e('Show Date',ETAB_TD);?></label>
         <div class="etab-right-options"> 
                <label class="etab-switch">   
                   <input type="checkbox" class="etab-showdate-options" id="etab_show_date_<?php echo $key;?>" name="tab_items[<?php echo $key;?>][recent_posts][show_date]" value="true" <?php checked($show_date,true);?>/>
                   <div class="etab-check round"></div>
                </label>
                <div class="etab-tooltip-description">
                      <div class="etab-description">
                       <?php _e('Please check to show date.',ETAB_TD);?>   
                      </div>
                </div>
            </div>
    </div>
    <div class="et-field-wrap etab-show-date-wrapper" <?php if( !$show_date ) echo 'style="display: none;"';?>>
        <label><?php _e('Date Format',ETAB_TD);?></label>
        <div class="etab-right-options"> 
          <select name="tab_items[<?php echo $key;?>][recent_posts][date_format]">
                <option value="F j" <?php selected('F j', $date_format); ?>>March 06</option>
                <option value="j F" <?php selected('j F', $date_format); ?>>6th March</option>
                <option value="j F  Y" <?php selected('j F  Y', $date_format); ?>>6 March 2017</option>
                <option value="Y/m/d" <?php selected('Y/m/d', $date_format); ?>>2010/11/06</option>
                <option value="d.m.Y" <?php selected('d.m.Y', $date_format); ?>>11.1.2017</option>
          </select>
        </div>
    </div>
   <!--  <div class="et-field-wrap">
        <label>< ?php _e('Title Font Color',ETAB_TD);?></label>
        <div class="etab-right-options"> 
        <input type="text" name="tab_items[<?php echo $key;?>][recent_posts][ptitle_color]" class="et-color-picker" value="<?php echo esc_attr($ptitle_color);?>"/>
        </div>
    </div>
    <div class="et-field-wrap">
        <label>< ?php _e('Title Font Hover Color',ETAB_TD);?></label>
         <div class="etab-right-options"> 
        <input type="text" name="tab_items[<?php echo $key;?>][recent_posts][ptitle_hcolor]" class="et-color-picker" value="<?php echo esc_attr($ptitle_hcolor);?>"/>
        </div>
    </div> -->
    <div class="et-field-wrap">
        <label><?php _e('Order By',ETAB_TD);?></label>
         <div class="etab-right-options"> 
        <select name="tab_items[<?php echo $key;?>][recent_posts][orderby]">
          <option value="id" <?php selected('ID', $orderby); ?>>ID</option>
          <option value="title" <?php selected('title', $orderby); ?>>Title</option>
          <option value="name" <?php selected('name', $orderby); ?>>Name</option>
          <option value="date" <?php selected('date', $orderby); ?>>Date</option>
          <option value="rand" <?php selected('rand', $orderby); ?>>Random Number</option>
          <option value="menu_order" <?php selected('menu_order', $orderby); ?>>Menu Order</option>
          <option value="author" <?php selected('author', $orderby); ?>>Author</option>
        </select>
        </div>
     </div>
      <div class="et-field-wrap">
        <label><?php _e('Order',ETAB_TD);?></label>
         <div class="etab-right-options"> 
        <select name="tab_items[<?php echo $key;?>][recent_posts][order]">
              <option value="asc" <?php selected('asc', $order); ?>><?php _e('Ascending Order',ETAB_TD);?></option>
              <option value="desc" <?php selected('desc', $order); ?>><?php _e('Descending Order',ETAB_TD);?></option>  
        </select>
        </div>
     </div>
     <div class="et-field-wrap">
          <label><?php _e('Button Target',ETAB_TD);?></label>
           <div class="etab-right-options"> 
            <select name="tab_items[<?php echo $key;?>][recent_posts][btn_target]">
               <option value="_blank"  <?php selected('_blank', $btn_target); ?>><?php _e('_blank',ETAB_TD);?></option>
               <option value="_self"  <?php selected('_self', $btn_target); ?>><?php _e('_self',ETAB_TD);?></option>
               <option value="_parent" <?php selected('_parent', $btn_target); ?>><?php _e('_parent',ETAB_TD);?></option>
               <option value="_top"  <?php selected('_top', $btn_target); ?>><?php _e('_top',ETAB_TD);?></option>
              </select>
              </div>
       </div>
  </div>
</div>