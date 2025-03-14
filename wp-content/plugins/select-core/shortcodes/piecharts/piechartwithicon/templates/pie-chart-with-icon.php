<div class="qodef-pie-chart-with-icon-holder">
    <div class="qodef-percentage-with-icon" <?php echo target_qodef_get_inline_attrs( $pie_chart_data ); ?>>
		<?php print wp_kses_post( $icon ); ?>
    </div>
    <div class="qodef-pie-chart-text" <?php target_qodef_inline_style( $pie_chart_style ) ?>>
        <<?php echo esc_html( $title_tag ) ?> class="qodef-pie-title" <?php target_qodef_inline_style( $title_style ); ?>>
		<?php echo esc_html( $title ); ?>
    </<?php echo esc_html( $title_tag ) ?>>
    <div class="qodef-pie-chart-separator-holder">
        <span class="qodef-pie-chart-separator"></span>
    </div>
    <p <?php target_qodef_inline_style( $text_style ); ?>>
		<?php echo esc_html( $text ); ?>
    </p>
</div>
</div>