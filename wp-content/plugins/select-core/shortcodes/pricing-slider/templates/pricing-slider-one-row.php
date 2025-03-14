<div <?php target_qodef_class_attribute($pricing_slider_classes); ?> <?php echo target_qodef_get_inline_attrs($slider_data); ?>>
    <div class="qodef-pricing-slider-inner">
        <div class="qodef-pricing-slider-info-holder clearfix">
            <div class="qodef-pricing-slider-description-holder">
                <<?php echo esc_attr($title_tag); ?> class="qodef-pricing-slider-title">
                    <?php echo esc_html($title); ?>
                </<?php echo esc_attr($title_tag)?>>
                <div class="qodef-pricing-slider-description">
                    <?php echo esc_html($description); ?>
                </div>
            </div>
            <div class="qodef-pricing-slider-pricing">
                <span class="qodef-value"><?php echo esc_html($currency) ?></span>
                <span class="qodef-price"><?php echo esc_html("0")?></span>
                <span class="qodef-mark"><?php esc_html_e('/', 'select-core'); ?> <?php echo esc_html($price_period_info)?></span>
            </div>
            <?php
            if($show_button == "yes" && $button_text !== ''){ ?>
                <div class="qodef-pricing-slider-button">
                    <?php echo target_qodef_get_button_html(array(
                        'link' => $link,
                        'text' => $button_text
                    )); ?>
                </div>
            <?php } ?>
        </div>
        <div class="qodef-pricing-slider-bar-holder">
            <div class="qodef-pricing-slider-bar" style="width: 0">
                <span class="qodef-pricing-slider-drag">
                    <span class="qodef-pricing-slider-drag-inner"></span>
                    <span class="qodef-pricing-slider-value-holder">
                        <span class="qodef-pricing-slider-value">0 <?php echo esc_attr($unit_name) . 's'; ?></span>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>