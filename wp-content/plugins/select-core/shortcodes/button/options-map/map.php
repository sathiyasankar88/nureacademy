<?php

if(!function_exists('target_qodef_button_map')) {
    function target_qodef_button_map() {
        $panel = target_qodef_add_admin_panel(array(
            'title' => esc_html__('Button', 'select-core'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        target_qodef_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography', 'select-core'),
            'parent' => $panel
        ));

        $typography_group = target_qodef_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography', 'select-core'),
            'description' => esc_html__('Setup typography for all button types', 'select-core'),
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
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family' , 'select-core')
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'select-core'),
            'options'       => target_qodef_get_text_transform_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'select-core'),
            'options'       => target_qodef_get_font_style_array()
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
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
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'select-core'),
            'options'       => target_qodef_get_font_weight_array()
        ));

        //Outline type options
        target_qodef_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types', 'select-core'),
            'parent' => $panel
        ));

        $outline_group = target_qodef_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type', 'select-core'),
            'description' => esc_html__('Setup outline button type', 'select-core'),
            'parent' => $panel
        ));

        $outline_row = target_qodef_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'select-core'),
            'description'   => ''
        ));

        $outline_row2 = target_qodef_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'select-core'),
            'description'   => ''
        ));

        //Solid type options
        $solid_group = target_qodef_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type', 'select-core'),
            'description' => esc_html__('Setup solid button type', 'select-core'),
            'parent' => $panel
        ));

        $solid_row = target_qodef_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'select-core'),
            'description'   => ''
        ));

        $solid_row2 = target_qodef_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color', 'select-core'),
            'description'   => ''
        ));

        //transparent type options

        $transparent_group = target_qodef_add_admin_group(array(
            'name' => 'transparent_group',
            'title' => esc_html__('Transparent Type', 'select-core'),
            'description' => esc_html__('Setup transparent button type', 'select-core'),
            'parent' => $panel
        ));

        $transparent_row = target_qodef_add_admin_row(array(
            'name' => 'transparent_row',
            'next' => true,
            'parent' => $transparent_group
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'select-core'),
            'description'   => ''
        ));

        target_qodef_add_admin_field(array(
            'parent'        => $transparent_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_transparent_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color', 'select-core'),
            'description'   => ''
        ));
    }

    add_action('target_qodef_options_elements_map', 'target_qodef_button_map');
}