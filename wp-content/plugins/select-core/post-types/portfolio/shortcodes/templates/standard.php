<?php // This line is needed for mixItUp gutter ?>
    <article class="qodef-portfolio-item <?php if ( $portfolio_slider != 'yes' ) {
		print 'mix';
	} ?> <?php echo esc_attr( $categories ) ?>">
        <div class="qodef-portfolio-item-inner">
            <div class="qodef-item-image-holder">
                <a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $target ) ?>">
                    <div class="qodef-portfolio-item-overlay"></div>
                    <div class="qodef-blur-holder-outer" style="background-image:url(<?php echo esc_url( $background_image_url ); ?>)"></div>
					<?php
					echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
					?>
                </a>
				<?php echo wp_kses_post( $icon_html ); ?>
            </div>
            <div class="qodef-item-text-holder">
                <<?php echo esc_attr( $title_tag ) ?> class="qodef-item-title">
                <a href="<?php echo esc_url( $item_link ); ?>" target="<?php echo esc_attr( $target ) ?>">
					<?php echo esc_attr( get_the_title() ); ?>
                </a>
            </<?php echo esc_attr( $title_tag ) ?>>
			<?php
			echo target_qodef_get_module_part( $category_html );
			?>
        </div>
        </div>
    </article>
<?php // This line is needed for mixItUp gutter ?>