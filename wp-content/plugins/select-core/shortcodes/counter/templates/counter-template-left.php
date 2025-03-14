<?php
/**
 *Boxed Counter shortcode template
 */
?>
<div class="qodef-counter-holder qodef-boxed-counter clearfix " <?php echo target_qodef_get_inline_style( $counter_holder_styles ); ?>>
    <div class="qodef-left-holder">
        <div class="qodef-counter-with-icon">
			<?php print wp_kses_post( $icon ); ?>
        </div>
        <span class="qodef-counter <?php echo esc_attr( $type ) ?>" <?php echo target_qodef_get_inline_style( $counter_styles ); ?>>
            <?php echo esc_attr( $digit ); ?>
        </span>
    </div>
    <div class="qodef-right-holder">
        <<?php echo esc_html( $title_tag ); ?> class="qodef-counter-title" <?php echo target_qodef_get_inline_style( $title_styles ); ?>>
		<?php echo esc_attr( $title ); ?>
    </<?php echo esc_html( $title_tag );; ?>>
	<?php if ( $text != "" ) { ?>
        <p class="qodef-counter-text" <?php echo target_qodef_get_inline_style( $text_styles ); ?>><?php echo esc_html( $text ); ?></p>
	<?php } ?>
</div>
</div>