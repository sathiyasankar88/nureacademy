<?php
if(!function_exists('target_qodef_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function target_qodef_accordions_map() {
		
       $panel = target_qodef_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'select-core'),
           'name'  => 'panel_accordions',
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
			'description' => esc_html__('Setup typography for accordions navigation', 'select-core'),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'select-core'),
       ));

       target_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'select-core'),
           'options'       => target_qodef_get_text_transform_array()
       ));

       target_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'select-core'),
           'options'       => target_qodef_get_font_style_array()
       ));

       target_qodef_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'select-core'),
           'options'       => target_qodef_get_font_weight_array()
       ));

       target_qodef_add_admin_field(array(
           'parent'        => $typography_row2,
           'type'          => 'textsimple',
           'name'          => 'accordions_font_size',
           'default_value' => '',
           'label'         => esc_html__('Font Size', 'select-core'),
           'args'          => array(
               'suffix' => 'px'
           )
       ));

		//Initial Accordion Color Styles
		
		target_qodef_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Accordions Color Styles', 'select-core'),
           'parent' => $panel
        ));
		
		$accordions_color_group = target_qodef_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Title Color Styles', 'select-core'),
			'description' => esc_html__('Set color styles for accordion title' , 'select-core'),
           'parent' => $panel
        ));
		$accordions_color_row = target_qodef_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title Color' , 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_background_color',
           'default_value' => '',
           'label'         => esc_html__('Title Background Color' , 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Color' , 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color', 'select-core')
        ));

       //Active Accordion Color Styles
		
		$active_accordions_color_group = target_qodef_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Title Color Styles', 'select-core'),
			'description' => esc_html__('Set color styles for active and hover accordions title', 'select-core'),
           'parent' => $panel
        ));
		$active_accordions_color_row = target_qodef_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_background_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Background Color', 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'select-core')
        ));
        target_qodef_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Background Color', 'select-core')
        ));

       //Content color styles

       $accordions_content_color_group = target_qodef_add_admin_group(array(
           'name' => 'accordions_content_color_group',
           'title' => esc_html__('Accordion Content Color Styles', 'select-core'),
           'description' => esc_html__('Set color styles for accordions content', 'select-core'),
           'parent' => $panel
       ));
       $accordions_content_color_row = target_qodef_add_admin_row(array(
           'name' => 'accordions_content_color_row',
           'next' => true,
           'parent' => $accordions_content_color_group
       ));
       target_qodef_add_admin_field(array(
           'parent'        => $accordions_content_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_content_background_color',
           'default_value' => '',
           'label'         => esc_html__('Content Background Color', 'select-core')
       ));
       target_qodef_add_admin_field(array(
           'parent'        => $accordions_content_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_content_color',
           'default_value' => '',
           'label'         => esc_html__('Content Text Color', 'select-core')
       ));
       
   }
   add_action('target_qodef_options_elements_map', 'target_qodef_accordions_map');
}