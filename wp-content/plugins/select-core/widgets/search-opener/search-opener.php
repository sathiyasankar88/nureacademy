<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Qode_Search_Opener
 */
class TargetQodefSearchOpener extends TargetQodefWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'qode_search_opener', // Base ID
            esc_html__('Select Search Opener', 'select-core') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)', 'select-core'),
                'description' => esc_html__('Define size for Search icon' , 'select-core')
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color', 'select-core'),
                'description' => esc_html__('Define color for Search icon' , 'select-core')
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color', 'select-core'),
                'description' => esc_html__('Define hover color for Search icon','select-core'),
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text', 'select-core'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'select-core'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes', 'select-core'),
                    'no'  => esc_html__('No', 'select-core')
                )
            ),
			array(
				'name'			=> 'close_icon_position',
				'type'			=> 'dropdown',
				'title'			=> esc_html__('Close icon stays on opener place', 'select-core'),
				'description'	=> esc_html__('Enable this option to set close icon on same position like opener icon', 'select-core'),
				'options'		=> array(
					'yes'	=> esc_html__('Yes', 'select-core'),
					'no'	=> esc_html__('No' , 'select-core')
				)
			)
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        $search_type_class = 'qodef-search-opener';
        $search_opener_styles = array();
	    $show_search_text = $instance['show_label'] == 'yes' || target_qodef_options()->getOptionValue('enable_search_icon_text')== 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }

        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
        }

        ?>

        <a <?php echo target_qodef_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
			<?php if ( $close_icon_on_same_position ) {
				echo target_qodef_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
            <?php target_qodef_inline_style($search_opener_styles); ?>
            <?php target_qodef_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php
            target_qodef_icon_collections()->getSearchIcon( target_qodef_options()->getOptionValue( 'search_icon_pack' ), false );
            ?>
            <?php if($show_search_text) { ?>
                <span class="qodef-search-icon-text"><?php esc_html_e('Search', 'select-core'); ?></span>
            <?php } ?>
        </a>
    <?php }
}