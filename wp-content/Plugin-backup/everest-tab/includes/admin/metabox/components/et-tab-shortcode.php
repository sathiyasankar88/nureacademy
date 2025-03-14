<?php defined('ABSPATH') or die('No script kiddies please!!'); 
$ex_shortcode = (isset($item['ex_shortcode']) && $item['ex_shortcode'] != '')?$item['ex_shortcode']:'';
?>
<div class="et_options_wrap et_external_sc_wrapper">
     <div class="et-field-wrap">
        <label><?php _e('External Shortcode',ETAB_TD);?></label>
         <div class="etab-right-options"> 
        <input type="text" name="tab_items[<?php echo $key;?>][ex_shortcode]" class="et-tab-sc et-tab-text" value="<?php echo esc_attr($ex_shortcode);?>"/>
        <p class="description"><?php _e('Fill any custom external shortcode here.',ETAB_TD);?></p>
        </div>
     </div>
</div>