<article class="<?php echo esc_attr( $item_classes ) ?>">

	<?php if ( has_post_thumbnail() ) { ?>
        <div class="qodef-masonry-gallery-image-holder">
			<?php the_post_thumbnail( $item_thumb_size ); ?>
        </div>
	<?php } ?>
    <div class="qodef-masonry-gallery-item-outer">
        <div class="qodef-masonry-gallery-item-inner">
			<?php if ( $item_link !== '' ) { ?>
                <a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?>" class="qodef-mg-item-link"></a>
			<?php } ?>
            <div class="qodef-masonry-gallery-item-content">
                <span class="qodef-masonry-gallery-item-icon"><?php print wp_kses_post( $icon_html ); ?></span>
                <<?php echo esc_html( $title_tag ); ?> class="qodef-masonry-gallery-item-title"><?php the_title() ?>
            </<?php echo esc_html( $title_tag ); ?>>
            <p class="qodef-masonry-gallery-item-text"><?php echo esc_html( $item_text ); ?></p>
        </div>
    </div>
    </div>
</article>
