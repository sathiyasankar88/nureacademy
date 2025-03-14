<div class="qodef-device-marquee-holder">
    <div class="qodef-device-marquee <?php echo esc_attr( $shortcode_classes ); ?>">
		<?php if ( $background_image != '' ) { ?>
            <div class="qodef-background-images-holder">
                <img class="qodef-device-background-image" src="<?php echo wp_get_attachment_url( $background_image ); ?>"
                        alt="<?php esc_attr_e( 'Device marquee background', 'select-core' ); ?>"/>
				<?php if ( $infinite_scroll_effect ) { ?>
                    <img class="qodef-device-background-image qodef-aux-background-image" src="<?php echo wp_get_attachment_url( $background_image ); ?>"
                            alt="<?php esc_attr_e( 'Device marquee background', 'select-core' ); ?>"/>
				<?php } ?>
            </div>
		<?php } ?>
        <div class="qodef-screen-holder">
            <div class="qodef-screen">
                <img class="qodef-desktop-frame" src="<?php echo QODE_ASSETS_ROOT ?>/css/img/device_marquee_frame.png" alt="<?php esc_attr_e( 'Desktop frame', 'select-core' ); ?>"/>
                <div class="qodef-desktop-image">
					<?php if ( $link != '' ) { ?>
                        <a href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ) ?>"></a>
					<?php } ?>
                    <div class="qodef-bgrnd" style="background-image:url(<?php echo wp_get_attachment_url( $device_image ); ?>);"></div>
                </div>
            </div>
        </div>
    </div>
</div>