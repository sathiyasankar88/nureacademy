<?php
$icon_html = target_qodef_icon_collections()->renderIcon( $icon, $icon_pack, $params );
?>
<div class="qodef-icon-list-item">
    <div class="qodef-icon-list-icon-holder">
        <div class="qodef-icon-list-icon-holder-inner clearfix">
			<?php
			print wp_kses_post( $icon_html );
			?>
        </div>
    </div>
    <p class="qodef-icon-list-text" <?php echo target_qodef_get_inline_style( $title_style ) ?> > <?php echo esc_attr( $title ) ?></p>
</div>