<?php
$icon_html = target_qodef_icon_collections()->renderIcon( $icon, $icon_pack, $params );

?>

<div class="qodef-interactive-banner-icon" <?php target_qodef_inline_style( $icon_style ); ?> data-color="<?php if ( $icon_color ) {
	echo esc_attr( $icon_color );
} ?>">
	<?php print wp_kses_post( $icon_html ); ?>
</div>
