<button type="submit" <?php target_qodef_inline_style($button_styles); ?> <?php target_qodef_class_attribute($button_classes); ?> <?php echo target_qodef_get_inline_attrs($button_data); ?> <?php echo target_qodef_get_inline_attrs($button_custom_attrs); ?>>
    <span class="qodef-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo target_qodef_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>
</button>