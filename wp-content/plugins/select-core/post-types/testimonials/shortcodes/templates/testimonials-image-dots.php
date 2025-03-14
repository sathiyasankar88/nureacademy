<div class="qodef-tes-image-nav">
	<?php if ( $query_results->have_posts() ):
		while ( $query_results->have_posts() ) : $query_results->the_post(); ?>
            <div class="qodef-tes-image-single">
                <span class="qodef-tes-image-holder">
                <?php echo get_the_post_thumbnail( get_the_ID() ) ?>
                </span>
            </div>
		<?php endwhile;
	else: ?>
        <span><?php esc_html_e( 'Sorry, no posts matched your criteria', 'select-core' ); ?></span>
	<?php endif;
	wp_reset_postdata(); ?>
</div>