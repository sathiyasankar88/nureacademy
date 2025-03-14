<?php defined('ABSPATH') or die("No script kiddies please!");?>
<style>
<?php if($template_layout != "template14" && $template_layout != "template17"  && $template_layout != "template18"){ ?>
<?php if($bg_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a{
  background-color: <?php echo $bg_color;?>;
}
<?php  }  ?>
<?php if($bg_active_color != ''){ ?>
.etab-sp-custom-<?php echo $post_id;?>.everest-tab-main-wrapper#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap
 > ul.etab-title-tabs > li.etab-active-show > a{
   background-color: <?php echo $bg_active_color;?>;
 }
 .etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.everest-tab-main-wrapper > .etab-header-wrap > ul.etab-title-tabs > li > a:hover{
   background-color: <?php echo $bg_hover_color;?>;
  }
 <?php } ?>
 <?php } ?>

<?php if($font_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-icon-wrapper i{
  color: <?php echo $font_color;?>;
 }
<?php } ?>
<?php if($font_hover_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover .etab-title,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover .etab-icon-wrapper i,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li:hover  > a .etab-title-wrapper .etab-desc{
    color: <?php echo $font_hover_color;?>;
}
<?php } ?>
<?php if($desc_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a .etab-title-wrapper .etab-desc {
    color: <?php echo $desc_color;?>;
}
<?php } ?>
<?php if($template_layout != "template14" && $template_layout != "template20" && $template_layout != "template21"){ ?>
<?php if($bg_tab_content_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-content-wrap {
    background-color: <?php echo $bg_tab_content_color;?>;
}
<?php } 
}?>


 /*Template 1*/
 <?php if($template_layout == "template1"){ ?>
 <?php if($bg_active_color != ''){ ?>
.everest-tab-main-wrapper.etab-template1.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs {
    border-bottom: 6px solid <?php echo $bg_active_color;?>;
}
<?php }
} ?>
/*Template 2*/
 <?php if($template_layout == "template2"){ ?>
<?php if($bg_active_color != ''){ ?>
.everest-tab-main-wrapper.etab-template2.etab-horizontal.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:before, 
.everest-tab-main-wrapper.etab-template6.etab-horizontal.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:before {
      border-color: <?php echo $bg_active_color;?> transparent transparent !important;
} 
<?php } ?>
<?php if($header_bgcolor != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template2 > .etab-header-wrap,
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template10 > .etab-header-wrap {
    background-color: <?php echo $header_bgcolor;?>;
}
<?php } 
}?>

/* Template 4*/
<?php if($template_layout == "template4"){ 
if($bg_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template4 > .etab-header-wrap > ul.etab-title-tabs > li > a:before {
    background-color: <?php echo $bg_color;?>;
}
<?php }
} ?>
/* Template 6*/
 <?php if($template_layout == "template6"){ 
 if($bg_color != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template6.etab-horizontal > .etab-header-wrap {
  background-color: <?php echo $bg_color;?>;
}
<?php } 
}?>

/* Template 7*/
 <?php if($template_layout == "template7"){ ?> 
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template7 > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:after, 
.everest-tab-main-wrapper.etab-template7.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show > a:after {
   background: <?php echo $bg_hover_color;?>;
}
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template7 > .etab-header-wrap > ul.etab-title-tabs > li > a:after {
    background: <?php echo $bg_color;?>;
}
.everest-tab-main-wrapper.etab-template7.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-title-wrapper p,
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-title-wrapper p{
   background: <?php echo $bg_color;?>;  
}
 .everest-tab-main-wrapper.etab-template7.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-title-wrapper p:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-title-wrapper p:after{
 	  border-color: <?php echo $bg_color;?> transparent transparent;
 }
<?php  } ?>
/* Template 9*/
 <?php if($template_layout == "template9"){ ?> 
 .everest-tab-main-wrapper.etab-template9.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li .etab-icon-wrapper {
    border: 1px solid <?php echo $font_color;?>;  
}
/* Template 14*/
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template14 {
    background-color: <?php echo $bg_color;?>;
}
<?php  } ?>
/* Template 17*/
 <?php if($template_layout == "template17"){ 
 if($active_bordercolor != ''){ ?>
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template17 > .etab-header-wrap > ul.etab-title-tabs > li > a:after{
	    background-color:  <?php echo $active_bordercolor;?>;
}
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template17.etab-horizontal > .etab-header-wrap > ul.etab-title-tabs > li > a:before{
	    border-color:  <?php echo $active_bordercolor;?> transparent transparent;
}
<?php  }
} ?>

/* Template 18*/
 <?php if($template_layout == "template18"){ 
 	 if($active_bordercolor != ''){ ?> 
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template18 > .etab-header-wrap > ul.etab-title-tabs > li > a:after{
background-color: <?php echo $active_bordercolor;?>;
}
<?php  } 
}?>
 <?php if($template_layout == "template19"){ ?>
.everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:after{
    border-right: 1px solid <?php echo $bg_color;?>;
    border-top: 1px solid <?php echo $bg_color;?>;
    background: <?php echo $bg_color;?>;
}
.everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:after,
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show > a:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-vertical-top-right-position > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-top-right-position > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-bottom-right-position > .etab-header-wrap > ul.etab-title-tabs > li > a:hover:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-vertical-top-right-position > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show > a:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-top-right-position > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show > a:after, 
 .everest-tab-main-wrapper.etab-template19.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-bottom-right-position > .etab-header-wrap > ul.etab-title-tabs > li.etab-active-show > a:after{
    border-color: <?php echo $bg_active_color;?>;
    background:<?php echo $bg_active_color;?>;
}
<?php  } ?>
 <?php if($template_layout == "template14"){  	 
 	if($bg_tab_content_color != ''){ ?> 
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template14{
background-color:<?php echo $bg_tab_content_color;?>;
}
<?php  } 
}
?>

 <?php if($template_layout == "template20"){  	 
 	if($bg_tab_content_color != ''){ ?> 
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template20{
background-color:<?php echo $bg_tab_content_color;?>;
}
<?php  } 
$brightness = 0.5; // 50% brighter
$overlay_darker =$this->colourBrightness($bg_tab_content_color,$brightness);
if($bg_tab_content_color != ''){ ?> 

.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template20 > .etab-header-wrap {
    background-color: <?php echo $overlay_darker;?>;
}
<?php }
} ?>
 <?php if($template_layout == "template21"){  	 
 	if($bg_tab_content_color != ''){ ?> 
.everest-tab-main-wrapper.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?>.etab-template21{
background-color:<?php echo $bg_tab_content_color;?>;
}
<?php }
} ?>
<?php if($template_layout == "template3"){    
if($top_border_color != ''){ ?>
.everest-tab-main-wrapper.etab-template3.etab-sp-custom-<?php echo $post_id;?>#et-tab-random-<?php echo $random_num;?> > .etab-header-wrap > ul.etab-title-tabs > li > a:before{
    background-color: <?php echo $top_border_color;?>;
}
<?php }
} ?>
</style>