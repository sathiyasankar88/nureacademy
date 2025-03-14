<div class="qodef-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="qodef-progress-title-holder clearfix">
		<span class="qodef-progress-title" <?php target_qodef_inline_style($title_style); ?>><?php echo esc_attr($title)?></span>
		<span class="qodef-progress-number-wrapper" >
			<span class="qodef-progress-number">
				<span class="qodef-percent" <?php target_qodef_inline_style($digit_style); ?>>0</span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="qodef-progress-content-outer" <?php target_qodef_inline_style($bar_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="qodef-progress-content <?php echo esc_attr($bar_classes); ?>" <?php target_qodef_inline_style($active_bar_style); ?>></div>
	</div>
</div>	