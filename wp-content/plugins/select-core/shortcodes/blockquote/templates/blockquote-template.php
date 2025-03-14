<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="qodef-blockquote-shortcode" <?php target_qodef_inline_style($blockquote_style); ?> >
	<span class='icon_quotations_holder'>
		<span aria-hidden="true" class='icon_quotations'></span>
	</span>
	<<?php echo esc_attr($blockquote_title_tag); ?> class="qodef-blockquote-text" <?php target_qodef_inline_style($blockquote_title_style); ?>>
	<span><?php echo esc_attr($text); ?></span>
	</<?php echo esc_attr($blockquote_title_tag);?>>
</blockquote>

