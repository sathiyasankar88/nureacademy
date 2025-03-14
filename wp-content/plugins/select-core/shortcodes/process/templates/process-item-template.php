<?php
$icon_html = target_qodef_icon_collections()->renderIcon( $icon, $icon_pack, $params );
?>
<div <?php target_qodef_class_attribute( $item_classes ); ?>>
    <div class="qodef-pi-holder-inner">
		<?php if ( ! empty( $icon ) ) : ?>
            <div class="qodef-pi-icon-holder" <?php target_qodef_inline_style( $background_color ) ?>>
                <span class="qodef-pi-icon">
                <?php
                print wp_kses_post( $icon_html );
                ?>
                </span>
				<?php if ( ! empty( $number ) ) : ?>
                    <span class="qodef-pi-number">
                    <?php echo esc_html( $number ); ?>
                </span>
				<?php endif; ?>
            </div>
		<?php endif; ?>
        <div class="qodef-pi-content-holder">
			<?php if ( ! empty( $title ) ) : ?>
                <div class="qodef-pi-title-holder">
                    <h5 class="qodef-pi-title" <?php target_qodef_inline_style( $title_color ) ?>><?php echo esc_html( $title ); ?></h5>
                </div>
			<?php endif; ?>

			<?php if ( ! empty( $text ) ) : ?>
                <div class="qodef-pi-text-holder">
                    <p <?php target_qodef_inline_style( $text_color ) ?>><?php echo esc_html( $text ); ?></p>
                </div>
			<?php endif; ?>
        </div>
    </div>
</div>