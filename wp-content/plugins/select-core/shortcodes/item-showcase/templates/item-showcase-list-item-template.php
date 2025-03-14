<?php
$icon_html = target_qodef_icon_collections()->renderIcon( $icon, $icon_pack, $params );
?>
<div class="qodef-item <?php echo esc_attr( $item_showcase_list_item_class );
if ( empty( $icon ) ) {
	echo esc_attr( ' qodef-item-no-icon' );
} ?>">
	<?php if ( ! empty( $icon ) ) { ?>
        <div class="qodef-item-icon">
			<?php
			print wp_kses_post( $icon_html );
			?>
        </div>
	<?php } ?>
    <div class="qodef-item-content">


		<?php if ( $item_title != '' ) { ?>
            <div class="qodef-showcase-title-holder">
				<?php if ( $item_link != '' ) { ?>
                <a href="<?php echo esc_url( $item_link ) ?>">
					<?php } ?>
                    <h5 class="qodef-showcase-title"><?php echo esc_attr( $item_title ) ?></h5>
					<?php if ( $item_link != '' ) { ?>
                </a>
			<?php } ?>
            </div>

		<?php }
		if ( $item_text != '' ) { ?>
            <div class="qodef-showcase-text-holder">
                <p class="qodef-showcase-text"><?php echo esc_attr( $item_text ) ?></p>
            </div>
		<?php } ?>
    </div>
    <div class="item-showcase-border"></div>
</div>
