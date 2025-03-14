<?php do_action('target_qodef_before_page_header'); ?>

<header class="qodef-page-header">
    <?php if($show_fixed_wrapper) : ?>
        <div class="qodef-fixed-wrapper">
    <?php endif; ?>
    <div class="qodef-menu-area" <?php target_qodef_inline_style($menu_styles); ?>>
        <?php if($menu_area_in_grid) : ?>
            <div class="qodef-grid">
        <?php endif; ?>
			<?php do_action( 'target_qodef_after_header_menu_area_html_open' )?>
            <div class="qodef-vertical-align-containers" <?php target_qodef_inline_style($menu_area_grid_background_color); ?>>
                <div class="qodef-position-left">
                    <div class="qodef-position-left-inner">
                        <?php if(!$hide_logo) {
                            target_qodef_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right">
                    <div class="qodef-position-right-inner">
                        <?php target_qodef_get_main_menu(); ?>
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
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        target_qodef_get_sticky_header();
    } ?>
</header>

<?php do_action('target_qodef_after_page_header'); ?>

