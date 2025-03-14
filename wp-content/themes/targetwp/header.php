<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see target_qodef_header_meta() - hooked with 10
     * @see qode_user_scalable - hooked with 10
     */
    ?>
	<?php if (!target_qodef_is_ajax_request()) do_action('target_qodef_header_meta'); ?>

	<?php if (!target_qodef_is_ajax_request()) wp_head(); ?>
	<meta name="facebook-domain-verification" content="zj8iesbts0hh55j7a79ndd90mqtkz4" />
</head>
<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1099474567539927');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src=https://www.facebook.com/tr?id=1099474567539927&ev=PageView&noscript=1
/></noscript>
<!-- End Meta Pixel Code -->

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
<?php if (!target_qodef_is_ajax_request()) target_qodef_get_side_area(); ?>


<?php 
if((!target_qodef_is_ajax_request()) && target_qodef_options()->getOptionValue('smooth_page_transitions') == "yes") {
    $target_qodef_ajax_class = 'qodef-mimic-ajax';
?>
<div class="qodef-smooth-transition-loader <?php echo esc_attr($target_qodef_ajax_class); ?>">
    <div class="qodef-st-loader">
        <div class="qodef-st-loader1">
            <?php target_qodef_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="qodef-wrapper">
    <div class="qodef-wrapper-inner">
        <?php if (!target_qodef_is_ajax_request()) target_qodef_get_header(); ?>

        <?php if ((!target_qodef_is_ajax_request()) && target_qodef_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='qodef-back-to-top'  href='#'>
                <span class="qodef-icon-stack">
                     <?php
                        target_qodef_icon_collections()->getBackToTopIcon('linear_icons');
                    ?>
                </span>
                <span class="qodef-back-to-top-bgrnd"></span>
            </a>
        <?php } ?>
        <?php if (!target_qodef_is_ajax_request()) target_qodef_get_full_screen_menu(); ?>

        <div class="qodef-content" <?php target_qodef_content_elem_style_attr(); ?>>
            <?php if(target_qodef_is_ajax_enabled()) { ?>
            <div class="qodef-meta">
                <?php do_action('target_qodef_ajax_meta'); ?>
                <span id="qodef-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="qodef-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="qodef-content-inner">