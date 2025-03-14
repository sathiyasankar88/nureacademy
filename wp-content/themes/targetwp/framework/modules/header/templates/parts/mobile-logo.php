<?php do_action( 'target_qodef_before_mobile_logo' ); ?>

    <div class="qodef-mobile-logo-wrapper">
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php target_qodef_inline_style( $logo_styles ); ?>>
            <img itemprop="image" src="<?php echo esc_url( $logo_image ); ?>" alt="<?php esc_attr_e( 'Mobile logo', 'targetwp' ); ?>"/>
        </a>
    </div>

<?php do_action( 'target_qodef_after_mobile_logo' ); ?>