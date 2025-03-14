<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-mark qodef-link-mark">
                    <span class="lnr lnr-link"></span>
                </div>
                <?php qodef_fn_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <span class="qodef-separator"></span>
            </div>
        </div>
        <a class="qodef-blog-masonry-gallery-link" href="<?php the_permalink(); ?>"></a>
    </div>
</article>