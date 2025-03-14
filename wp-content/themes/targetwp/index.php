<?php
$target_qodef_blog_archive_pages_classes = target_qodef_blog_archive_pages_classes(target_qodef_get_default_blog_list());
?>
<?php get_header(); ?>
<?php target_qodef_get_title(); ?>
<div class="<?php echo esc_attr($target_qodef_blog_archive_pages_classes['holder']); ?>">
	<?php do_action('target_qodef_after_container_open'); ?>
	<div class="<?php echo esc_attr($target_qodef_blog_archive_pages_classes['inner']); ?>">
		<?php target_qodef_get_blog(target_qodef_get_default_blog_list()); ?>
	</div>
	<?php do_action('target_qodef_before_container_close'); ?>
</div>
<?php get_footer(); ?>
