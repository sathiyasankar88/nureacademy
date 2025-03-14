<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-text-holder">
                    <div class="qodef-post-mark">
                        <span class="lnr lnr-link qodef-link-mark"></span>
                    </div>
                    <div class="qodef-post-text-main">
                        <h5>
                            <a href="<?php echo esc_url( get_post_meta( get_the_ID(), "qodef_post_link_link_meta", true ) ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <span itemprop="name" class="qodef-post-author entry-title"><span class="qodef-separator"></span> <?php the_author_meta( 'display_name' ); ?></span>
                        <div class="qodef-post-info">
							<?php target_qodef_post_info( array(
								'date'     => 'no',
								'author'   => 'no',
								'category' => 'no',
								'comments' => 'no',
								'share'    => 'yes',
								'like'     => 'no'
							) ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="qodef-post-single-content">
			<?php the_content(); ?>
        </div>
    </div>
    <div class="qodef-post-info-below clearfix">
		<?php do_action( 'target_qodef_before_blog_article_closed_tag' ); ?>
    </div>
</article>

