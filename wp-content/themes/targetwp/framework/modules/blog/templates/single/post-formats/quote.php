<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-text-holder">
                    <div class="qodef-post-mark">
                        <span aria-hidden="true" class="icon_quotations qodef-quote-mark"></span>
                    </div>
                    <div class="qodef-post-text-main">
                        <h5 class="qodef-post-title">
                            <a class="qodef-post-quote-value" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php echo esc_html($quote_text); ?>
                            </a>
                        </h5>
                        <span itemprop="name" class="qodef-post-author entry-title"><span class="qodef-separator"></span><?php the_title(); ?></span>
                        <div class="qodef-post-info">
                            <?php target_qodef_post_info(array('date' => 'no', 'author' => 'no', 'category' => 'no', 'comments' => 'no', 'share' => 'yes', 'like' => 'no')) ?>
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
        <?php do_action('target_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>