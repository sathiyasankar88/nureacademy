<div class="qodef-elements-holder-item <?php echo esc_attr( $elements_holder_item_class ); ?>" <?php echo target_qodef_get_inline_attrs( $elements_holder_item_data ); ?> <?php echo target_qodef_get_inline_style( $elements_holder_item_style ); ?> <?php echo target_qodef_get_inline_attrs( $elements_holder_item_responsive_data ); ?>>
	<?php if ( $link != '' ) { ?>
        <a class="qodef-elements-holder-item-link" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>"></a>
	<?php } ?>
    <div class="qodef-elements-holder-item-inner">
        <div class="qodef-elements-holder-item-content <?php echo esc_attr( $elements_holder_item_content_class ); ?>" <?php echo target_qodef_get_inline_style( $elements_holder_item_content_style ); ?>>
			<?php echo do_shortcode( $content ); ?>
        </div>
    </div>
</div>