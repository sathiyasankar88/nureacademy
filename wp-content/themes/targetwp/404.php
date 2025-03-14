<?php get_header(); ?>

	<?php target_qodef_get_title(); ?>

	<div class="qodef-container">
	<?php do_action('target_qodef_after_container_open'); ?>
		<div class="qodef-container-inner qodef-404-page">
			<div class="qodef-page-not-found">
				<h2>
					<?php if(target_qodef_options()->getOptionValue('404_title')){
						echo esc_html(target_qodef_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking is not found', 'targetwp');
					} ?>
				</h2>
				<h4>
					<?php if(target_qodef_options()->getOptionValue('404_text')){
						echo esc_html(target_qodef_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'targetwp');
					} ?>
				</h4>
				<?php
					$target_qodef_params = array();
					if (target_qodef_options()->getOptionValue('404_back_to_home')){
						$target_qodef_params['text'] = target_qodef_options()->getOptionValue('404_back_to_home');
					}
					else{
						$target_qodef_params['text'] = esc_html__("Back to Home Page","targetwp");
					}
					$target_qodef_params['link'] = esc_url(home_url('/'));
					$target_qodef_params['target'] = '_self';
				echo target_qodef_execute_shortcode('qodef_button',$target_qodef_params);?>
			</div>
		</div>
		<?php do_action('target_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>