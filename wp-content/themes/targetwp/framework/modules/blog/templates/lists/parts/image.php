<?php $size = (isset($image_size)) ? $image_size : 'full'; ?>
<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-post-image">
		<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail($size); ?>
		</a>
	</div>
<?php } ?>