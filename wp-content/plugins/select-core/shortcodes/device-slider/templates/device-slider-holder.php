<div class="qodef-device-slider-holder">

	<div class="qodef-device-slider-phone"></div>

	<div class="qodef-device-slider" data-autoplay="<?php echo esc_attr($autoplay_timeout)?>">

		<?php foreach ($images as $image) { ?>
			<div class="qodef-device-slide clearfix">
				<?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
			</div>
		<?php } ?>

	</div>
</div>
