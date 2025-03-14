<?php

class TargetQodefSideAreaOpener extends TargetQodefWidget {
    public function __construct() {
        parent::__construct(
            'qodef_side_area_opener', // Base ID
            esc_html__('Select Side Area Opener', 'select-core') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'side_area_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color', 'select-core'),
				'description'	=> esc_html__('Define color for Side Area opener icon' , 'select-core')
			)
		);

    }


    public function widget($args, $instance) {
		
		$sidearea_icon_styles = array();

		if ( !empty($instance['side_area_opener_icon_color']) ) {
			$sidearea_icon_styles[] = 'background-color: ' . $instance['side_area_opener_icon_color'];
		}
		
		?>
        <a class="qodef-side-menu-button-opener" href="javascript:void(0)">
            <span class="qodef-side-area-lines">
            	<span class="qodef-side-area-arrow-top" <?php target_qodef_inline_style($sidearea_icon_styles) ?>></span>
            	<span class="qodef-side-area-arrow-bottom" <?php target_qodef_inline_style($sidearea_icon_styles) ?>></span>
            	<span class="qodef-side-area-line-1" <?php target_qodef_inline_style($sidearea_icon_styles) ?>></span>
            	<span class="qodef-side-area-line-2" <?php target_qodef_inline_style($sidearea_icon_styles) ?>></span>
            	<span class="qodef-side-area-line-3" <?php target_qodef_inline_style($sidearea_icon_styles) ?>></span>
            </span>
        </a>

    <?php }

}