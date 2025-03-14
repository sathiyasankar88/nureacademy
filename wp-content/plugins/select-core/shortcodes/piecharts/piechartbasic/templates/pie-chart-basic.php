<?php
/**
 * Pie Chart Basic Shortcode Template
 */
?>
<div class="qodef-pie-chart-holder">
	<div class="qodef-percentage" <?php echo target_qodef_get_inline_attrs($pie_chart_data); ?>>
        <span class="qodef-to-counter">
            <?php echo esc_html($percent ); ?>
        </span>
	</div>
	<div class="qodef-pie-chart-text" <?php target_qodef_inline_style($pie_chart_style); ?>>
        <<?php echo esc_attr($title_tag); ?> class="qodef-pie-title" <?php target_qodef_inline_style($title_style); ?>>
            <?php echo esc_html($title); ?>
        </<?php echo esc_attr($title_tag); ?>>
		<p <?php target_qodef_inline_style($text_style); ?>>
            <?php echo esc_html($text); ?>
        </p>
	</div>
</div>