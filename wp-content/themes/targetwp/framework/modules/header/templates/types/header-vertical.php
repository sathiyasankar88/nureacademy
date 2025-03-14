<?php do_action('target_qodef_before_page_header'); ?>
<aside class="qodef-vertical-menu-area">
    <div class="qodef-vertical-menu-area-inner">
        <div class="qodef-vertical-area-background" <?php target_qodef_inline_style(array($vertical_header_background_color,$vertical_header_opacity,$vertical_background_image)); ?>></div>
        <?php if(!$hide_logo) {
            target_qodef_get_logo();
        } ?>
        <div class="qodef-vertical-navigation-holder" >
            <?php target_qodef_get_vertical_main_menu(); ?>
        </div>
        <div class="qodef-vertical-area-widget-holder">
            <div class="qodef-vertical-area-widget-holder-inner">
            <?php
            if(get_post_meta($page_id, 'qodef_disable_header_widget_area_meta', 'true') !== 'yes') {
                if(is_active_sidebar('qodef-header-widget-area') && get_post_meta($page_id, 'qodef_custom_header_sidebar_meta', true) === '') {
                    dynamic_sidebar('qodef-header-widget-area');
                } else if (get_post_meta($page_id, 'qodef_custom_header_sidebar_meta', true) !== '') {
                    $sidebar = get_post_meta($page_id, 'qodef_custom_header_sidebar_meta', true);
                    if (is_active_sidebar($sidebar)) {
                        dynamic_sidebar($sidebar);
                    }
                }
            }
            ?>
            </div>
        </div>
    </div>
</aside>

<?php do_action('target_qodef_after_page_header'); ?>