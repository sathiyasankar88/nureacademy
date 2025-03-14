<?php

class TargetQodefFullScreenMenuOpener extends TargetQodefWidget {
    public function __construct() {
        parent::__construct(
            'qodef_full_screen_menu_opener', // Base ID
            esc_html__('Select Full Screen Menu Opener', 'select-core') // Name
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color', 'select-core'),
				'description'	=> esc_html__('Define color for Side Area opener icon', 'select-core')
			)
		);

	}

    public function widget($args, $instance) {

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}

		?>
        <a class="qodef-fullscreen-menu-opener" href="javascript:void(0)">
        	<span class="qodef-fullscreen-menu-lines">
        		<span class="qodef-fullscreen-menu-arrow-top" <?php target_qodef_inline_style($fullscreen_icon_styles) ?>></span>
        		<span class="qodef-fullscreen-menu-arrow-bottom" <?php target_qodef_inline_style($fullscreen_icon_styles) ?>></span>
        		<span class="qodef-fullscreen-menu-line-1" <?php target_qodef_inline_style($fullscreen_icon_styles) ?>></span>
        		<span class="qodef-fullscreen-menu-line-2" <?php target_qodef_inline_style($fullscreen_icon_styles) ?>></span>
        		<span class="qodef-fullscreen-menu-line-3" <?php target_qodef_inline_style($fullscreen_icon_styles) ?>></span>
        	</span>
        </a>
    <?php }

}