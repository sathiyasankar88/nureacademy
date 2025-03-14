<article class="qodef-portfolio-item <?php echo esc_attr( $article_masonry_size ) ?> <?php echo esc_attr( $categories ) ?>">
    <div class="qodef-portfolio-item-inner">
        <a class="qodef-portfolio-link" href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $target ) ?>"></a>
        <div class="qodef-item-image-holder">
            <div class="qodef-blur-holder-outer" style="background-image:url(<?php echo esc_url( $background_image_url ); ?>)"></div>
			<?php
			echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
			?>
        </div>
        <div class="qodef-item-text-overlay">
            <div class="qodef-item-text-overlay-inner">
                <div class="qodef-item-text-holder">
                    <<?php echo esc_attr( $title_tag ) ?> class="qodef-item-title">
					<?php echo esc_attr( get_the_title() ); ?>
                </<?php echo esc_attr( $title_tag ) ?>>
                <div class="qodef-separator"></div>
				<?php
				echo wp_kses_post( $icon_html );
				echo target_qodef_get_module_part( $category_html );
				?>
            </div>
        </div>
    </div>
    </div>
</article>
