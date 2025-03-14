<?php do_action( 'target_qodef_before_site_logo' ); ?>

    <div class="qodef-logo-wrapper">
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php target_qodef_inline_style( $logo_styles ); ?>>
            <img itemprop="image" class="qodef-normal-logo" src="<?php echo esc_url( $logo_image ); ?>" alt="<?php esc_attr_e( 'logo', 'targetwp' ); ?>"/>
			<?php if ( ! empty( $logo_image_dark ) ) { ?>
                <img itemprop="image" class="qodef-dark-logo" src="<?php echo esc_url( $logo_image_dark ); ?>" alt="<?php esc_attr_e( 'dark logo', 'targetwp' ); ?>o"/><?php } ?>
			<?php if ( ! empty( $logo_image_light ) ) { ?>
                <img itemprop="image" class="qodef-light-logo" src="<?php echo esc_url( $logo_image_light ); ?>" alt="<?php esc_attr_e( 'light logo', 'targetwp' ); ?>"/><?php } ?>
			<?php if ( ! empty( $logo_image_fullscreen ) ) { ?>
                <img itemprop="image" class="qodef-fullscreen-logo" src="<?php echo esc_url( $logo_image_fullscreen ); ?>" alt="<?php esc_attr_e( 'fullscreen logo', 'targetwp' ); ?>"/><?php } ?>
        </a>
    </div>

<?php do_action( 'target_qodef_after_site_logo' ); ?>