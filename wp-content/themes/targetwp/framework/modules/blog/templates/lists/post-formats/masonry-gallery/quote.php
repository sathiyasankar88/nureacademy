<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-mark qodef-quote-mark">
                    <span class="icon_quotations"></span>
                </div>
                <h3 class="qodef-post-title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "qodef_post_quote_text_meta", true)); ?></a>
                </h3>
                <span class="qodef-separator"></span>
                <span class="qodef-quote-author"><?php the_title(); ?></span>
            </div>
        </div>
        <a class="qodef-blog-masonry-gallery-link" href="<?php the_permalink(); ?>"></a>
    </div>
</article>