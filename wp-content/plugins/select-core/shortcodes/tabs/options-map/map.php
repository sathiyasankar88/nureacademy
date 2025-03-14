<?php

if(!function_exists('target_qodef_tabs_map')) {
    function target_qodef_tabs_map() {
		
        $panel = target_qodef_add_admin_panel(array(
            'title' => esc_html__('Tabs', 'select-core'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        target_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography', 'select-core'),
            'parent' => $panel
        ));

        $typography_group = target_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography', 'select-core'),
			'description' => esc_html__('Setup typography for tabs navigation', 'select-core'),
            'parent' => $panel
        ));

        $typography_row = target_qodef_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family', 'select-core'),
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'select-core'),
            'options'       => target_qodef_get_text_transform_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'select-core'),
            'options'       => target_qodef_get_font_style_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'select-core'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = target_qodef_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));		
		
        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'select-core'),
            'options'       => target_qodef_get_font_weight_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'textsimple',
            'name'          => 'tabs_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'select-core'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));
		
		//Initial Tab Color Styles
		
		target_qodef_add_admin_section_title(array(
            'name' => 'tab_color_section_title',
            'title' => esc_html__('Tab Navigation Color Styles', 'select-core'),
            'parent' => $panel
        ));
		$tabs_color_group = target_qodef_add_admin_group(array(
            'name' => 'tabs_color_group',
            'title' => esc_html__('Tab Navigation Color Styles', 'select-core'),
			'description' => esc_html__('Set color styles for tab navigation', 'select-core'),
            'parent' => $panel
        ));
		$tabs_color_row = target_qodef_add_admin_row(array(
            'name' => 'tabs_color_row',
            'next' => true,
            'parent' => $tabs_color_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color', 'select-core')
        ));
		target_qodef_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'select-core')
        ));
		
		//Active Tab Color Styles
		
		$active_tabs_color_group = target_qodef_add_admin_group(array(
            'name' => 'active_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles', 'select-core'),
			'description' => esc_html__('Set color styles for active and hover tabs', 'select-core'),
            'parent' => $panel
        ));
		$active_tabs_color_row = target_qodef_add_admin_row(array(
            'name' => 'active_tabs_color_row',
            'next' => true,
            'parent' => $active_tabs_color_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color', 'select-core')
        ));
		target_qodef_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'select-core')
        ));
        
    }

    add_action('target_qodef_options_elements_map', 'target_qodef_tabs_map');
}