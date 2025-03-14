<div class="qodef-avs-device-frame">
    <div class="qodef-image-slides">
		<?php
		foreach ( $mobile_images as $mobile_image ) {
			echo wp_get_attachment_image( $mobile_image, 'full' );
		}
		?>
    </div>
    <img class="qodef-device" src="<?php echo esc_url( QODE_ASSETS_ROOT . '/img/avs-device.png' ); ?>" alt="<?php echo esc_attr__( "Advanced vertical slider frame", "targetwp" ); ?>"/>
</div>