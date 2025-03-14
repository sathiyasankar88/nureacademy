<?php

//Footer

if(!function_exists('target_qodef_map_footer')) {
    function target_qodef_map_footer()
    {

        $footer_meta_box = target_qodef_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Footer', 'targetwp'),
                'name' => 'footer_meta'
            )
        );

        target_qodef_create_meta_box_field(
            array(
                'name' => 'qodef_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'targetwp'),
                'description' =>esc_html__( 'Enabling this option will hide footer on this page', 'targetwp'),
                'parent' => $footer_meta_box,
            )
        );
    }
    add_action('target_qodef_meta_boxes_map', 'target_qodef_map_footer');

}