<?php
/*
Template Name: Blog: Masonry
*/
?>
<style>
	.qodef-vertical-align-containers{background:white;}
</style>
<?php get_header(); ?>
<?php target_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div style="background:white;" class="qodef-container">
		<?php do_action('target_qodef_after_container_open'); ?>
		<div style="background:white;" class="qodef-container-inner">
			<?php target_qodef_get_blog('masonry'); ?>
		</div>
		<?php do_action('target_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>