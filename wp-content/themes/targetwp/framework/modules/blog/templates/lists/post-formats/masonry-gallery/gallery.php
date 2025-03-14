<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <?php target_qodef_get_module_template_part('templates/lists/parts/gallery', 'blog', '',array('image_size'=>$image_size)); ?>
        <div class="qodef-post-overlay"></div>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <?php qodef_fn_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <div class="qodef-post-info">
                    <?php target_qodef_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
                </div>
            </div>
        </div>
    </div>
</article>