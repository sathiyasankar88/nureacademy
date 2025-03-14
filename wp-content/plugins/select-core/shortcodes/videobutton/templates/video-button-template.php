<?php
/**
 * Video Button shortcode template
 */
?>

<div class="qodef-video-button <?php echo esc_attr($skin); ?>">
	<a itemprop="image" class="qodef-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto" <?php echo target_qodef_inline_style($button_style);?>>
		<span class="qodef-video-button-wrapper <?php echo esc_attr($video_class); ?>" <?php echo target_qodef_inline_style($background_color);?>></span>
		<span class="fa fa-play"></span>
	</a>
	<?php if ($title !== ''){?>
		<<?php echo esc_attr($title_tag);?> class="qodef-video-button-title">
			<?php echo esc_html($title); ?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
</div>