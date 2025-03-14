<article class="<?php echo esc_attr($item_classes) ?>">
	<?php if (has_post_thumbnail()) { ?>
		<div class = "qodef-masonry-gallery-image-holder">
			<?php the_post_thumbnail($item_thumb_size); ?>
		</div>
	<?php } ?>
	<div class="qodef-masonry-gallery-item-outer">
		<div class="qodef-masonry-gallery-item-inner">
			<div class="qodef-masonry-gallery-item-content">
                <<?php echo esc_html($title_tag); ?> class="qodef-masonry-gallery-item-title"><?php the_title() ?></<?php echo esc_html($title_tag); ?>>
                <span class="qodef-masonry-gallery-item-separator"></span>
				<p class="qodef-masonry-gallery-item-text"><?php echo esc_html($item_text); ?></p>

				<?php if(!empty($item_button_label) && !empty($item_link)) : ?>
					<a href="<?php echo esc_url($item_link); ?>" class="qodef-btn qodef-btn-solid qodef-masonry-gallery-item-button" target="<?php echo esc_attr($item_link_target); ?>">
						<?php echo esc_attr($item_button_label); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>
