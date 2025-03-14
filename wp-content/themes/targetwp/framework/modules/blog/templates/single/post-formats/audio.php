<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php target_qodef_get_module_template_part('templates/single/parts/image', 'blog'); ?>
		<?php target_qodef_get_module_template_part('templates/parts/audio', 'blog'); ?>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner clearfix">
                <div class="qodef-post-info qodef-section-top">
                    <?php target_qodef_post_info(array(
                        'date' => 'yes',
                        'category' => 'yes'
                    )) ?>
                </div>
                <?php target_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <div class="qodef-post-single-content">
                    <?php the_content(); ?>
                </div>
                <div class="qodef-post-info qodef-section-bottom clearfix <?php echo esc_attr($share_enabled); ?>">
                    <div class="qodef-section-bottom-left">
                        <?php target_qodef_post_info(
                            array(
                                'share' => 'yes'
                            )
                        ) ?>
                    </div>
                    <div class="qodef-section-bottom-right">
                        <?php target_qodef_post_info(array(
                            'author' => 'yes',
                            'comments' => 'yes',
                            'like' => 'yes'
                        )) ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <div class="qodef-post-info-below clearfix">
        <?php do_action('target_qodef_before_blog_article_closed_tag'); ?>
    </div>
</article>