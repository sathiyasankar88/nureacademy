<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<style>
.everest_tab_active .thickbox-loading #TB_title{
    background-color: #19a499;
    border-color: #19a499;
    padding: 5px;
}
.everest_tab_active #TB_ajaxContent {
    max-width: 500px!important;
    max-height:  500px;
    padding-top: 14px !important;
    text-align: left;
}
.everest_tab_active .form-group{
  margin-bottom: 6px;
}
.everest_tab_active span.tb-close-icon,
.everest_tab_active #TB_closeWindowButton:hover .tb-close-icon, 
.everest_tab_active #TB_closeWindowButton:focus .tb-close-icon {
    color: #fff;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.everest_tab_active div#TB_ajaxWindowTitle {
    color: #fff;
    font-size: 18px;
}
.everest_tab_active label.control-label {
    width: 40%;
    float: left;
}
.everest_tab_active .form-group input,
.everest_tab_active .form-group select {
    min-width:180px;
}
</style>
<script>
/*
 * Random number generator
*/
var j,k;
 function create_randomString(len, charSet) {
        charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var randomString = '';
        for (var i = 0; i < len; i++) {
            var randomPoz = Math.floor(Math.random() * charSet.length);
            randomString += charSet.substring(randomPoz,randomPoz+1);
        }
        return randomString;
 }
function insert_tabsc_editor() {
         var total_tab = jQuery('#etab_total_tab').val();
         var template = (jQuery(".etab_templates option:selected").val() != '')?jQuery(".etab_templates option:selected").val() :'template1';
         var orientation = (jQuery(".etab_orientation option:selected").val() != '')?jQuery(".etab_orientation option:selected").val() :'horizontal';
         var column = (jQuery(".etab_column option:selected").val() != '')?jQuery(".etab_column option:selected").val() :'6';
         var animation = (jQuery(".et_tab_animations option:selected").val() != '')?jQuery(".et_tab_animations option:selected").val() :'';
         if(orientation == "horizontal"){
            var position = (jQuery(".etab_position option:selected").val() != '')?jQuery(".etab_position option:selected").val() :'top-left';
           }else{
             var position = (jQuery(".etab_position option:selected").val() != '')?jQuery(".etab_position option:selected").val() :'vertical-top-left';
          }
          var icon_position = (jQuery(".etab_icon_position option:selected").val() != '')?jQuery(".etab_icon_position option:selected").val() :'left';
          var event_trigger = (jQuery(".etab_event_trigger option:selected").val() != '')?jQuery(".etab_event_trigger option:selected").val() :'left';
          var random_string = create_randomString(10);
          var etab = "[everest_tabs_wrap orientation='"+orientation+"' template='"+template+"' column='"+column+"' position='"+position+"' icon_position='"+icon_position+"' trigger_event='"+event_trigger+"']";
          etab += "<br />[everest_tab_title_wrap tab_id='etab-"+random_string+"']<br />";
      for (j = 1; j<=total_tab; j++) {
        if(j == 1){
          etab += "[everest_tab id='tab"+j+random_string+"' title='Title"+j+"' active='1'][/everest_tab]<br />";
        }else{
          etab += "[everest_tab id='tab"+j+random_string+"' title='Title"+j+"'][/everest_tab]<br />";
        }
      }
      etab += "[/everest_tab_title_wrap]<br /><br />[everest_tab_content_wrap]<br />";
      for (k = 1; k<=total_tab;k++) {
       if(animation != ''){
            etab += "[everest_tab_content trigger='tab"+k+random_string+"' tab_id='etab-"+random_string+"' animation='"+animation+"'] Content"+k+" [/everest_tab_content]<br />";
       }else{
            etab += "[everest_tab_content trigger='tab"+k+random_string+"' tab_id='etab-"+random_string+"'] Content"+k+" [/everest_tab_content]<br />";
       }
      }
      etab += "[/everest_tab_content_wrap]";
      etab += "<br />[/everest_tabs_wrap]";  
      window.send_to_editor(etab);
}
(function ($) {
  $(document).ready(function () {
       $('body').addClass('everest_tab_active');
      $(".etab_orientation").change(function() {
        if ($(this).data('options') === undefined) {
          /*Taking an array of all options-2 and kind of embedding it on the select1*/
          $(this).data('options', $('#etab_tabposition option').clone());
        }
        var datatype = $(this).val();
        var options = $(this).data('options').filter('[data-type=' + datatype + ']');
        $('#etab_tabposition').html(options);
      });

});
}(jQuery));
</script>
<div id="etab_shortcode_button" style="display:none;">
    <div class="etab-doin-shortcode">
        <p class="description"><?php _e('Generate Custom Tab Shortcode.','everest-tab');?></p>
            <div class="form-group">
              <label class="control-label"><?php _e('Template','everest-tab');?></label>
              <div class="etab-section2">
              <select class="etab_templates">
                <?php for($i = 1; $i <= 22; $i++){?>
                            <option value="template<?php echo $i;?>"><?php _e('Template '.$i,ETAB_TD);?></option>
               <?php }?>
              </select>
              </div>
        </div>
        <div class="form-group">
              <label class="control-label"><?php _e('Orientation','everest-tab');?></label>
              <div class="etab-section2">
              <select class="etab_orientation">
                 <option value="horizontal">Horizontal</option>
                <option value="vertical">Vertical</option>
              </select>
              </div>
        </div> 
 
        <div class="form-group">
             <label class="control-label"><?php _e('Tabs Position',ETAB_TD);?></label>
                    <div class="etab-section2">
                    <select id="etab_tabposition" class="etab_position">
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
                    </div>
        </div>
        
        <div class="form-group">
              <label class="control-label"><?php _e('No of Tab','everest-tab');?></label>
              <div class="etab-section2">
              <input type="number" class="etab_total_tab" id="etab_total_tab" value="" />
              </div>
        </div> 
         <div class="form-group">
              <label class="control-label"><?php _e('Event Trigger Type','everest-tab');?></label>
                <div class="etab-section2">
                <select class="etab_event_trigger">
                      <option value="on_click">On Click</option>
                      <option value="on_hover">On Hover</option>
              </select>
              </div>
        </div> 
           <div class="form-group">
              <label class="control-label"><?php _e('Tab Column','everest-tab');?></label>
                <div class="etab-section2">
                <select class="etab_column">
                       <option value="6">6 (100% Width)</option>
                       <option value="5">5 (83% Width)</option>
                       <option value="4">4 (66% Width)</option>
                       <option value="3">3 (50% Width)</option>
                       <option value="2">2 (32% Width)</option>
                       <option value="1">1 (15% Width)</option>     
              </select>
              </div>
        </div> 
         <div class="form-group">
              <label class="control-label"><?php _e('Icon Position','everest-tab');?></label>
                <div class="etab-section2">
                <select class="etab_icon_position">
                      <option value="left">Left of Tab Title</option>
                      <option value="right">Right of Tab Title</option>
                      <option value="top">Top of Tab Title</option>
              </select>
              </div>
        </div> 
         <div class="form-group">
              <label class="control-label"><?php _e('Tab Content Animation','everest-tab');?></label>
                 <div class="etab-section2">
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
                    </div>
        </div> 
        <div style="padding:15px 0;">
            <input type="button" class="button-primary" value="Insert Tab Shortcode" onclick="insert_tabsc_editor();"/>&nbsp;&nbsp;&nbsp;
            <a class="button" href="#" onclick="tb_remove();
                            return false;"><?php _e('Cancel','everest-tab');?></a>
        </div>
    </div>
</div>
