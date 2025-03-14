<article class="<?php echo esc_attr( $item_classes ) ?>">

	<?php if ( has_post_thumbnail() ) { ?>
        <div class="qodef-masonry-gallery-image-holder">
            <div class="qodef-blur-holder-outer" style="background-image:url(<?php echo esc_url( $background_image_url ); ?>)"></div>
			<?php the_post_thumbnail( $item_thumb_size ); ?>
        </div>
	<?php } ?>
    <div class="qodef-masonry-gallery-item-outer">
        <div class="qodef-masonry-gallery-item-inner">
			<?php if ( $item_link !== '' ) { ?>
                <a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?>" class="qodef-mg-item-link"></a>
			<?php } ?>
            <div class="qodef-masonry-gallery-item-content">
                <<?php echo esc_html( $title_tag ); ?> class="qodef-masonry-gallery-item-title"><?php the_title() ?></<?php echo esc_html( $title_tag ); ?>>
            <span class="qodef-masonry-gallery-item-separator"></span>
            <p class="qodef-masonry-gallery-item-text"><?php echo esc_html( $item_text ); ?></p>
			<?php if ( $item_link !== '' ) { ?>
                <a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $item_link_target ); ?>" class="qodef-masonry-gallery-read-more"><?php echo esc_html__( 'Read More', 'qode_core' ); ?>
                    <span aria-hidden="true" class="arrow_carrot-right"></span></a>
			<?php } ?>
        </div>
    </div>
    </div>
</article>
