<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php target_qodef_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
		<div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-info qodef-section-top">
                    <?php target_qodef_post_info(
                        array(
                            'category' => 'yes',
                            'date' => 'yes'
                        ),
                        array(
                            'show_date_label' => false
                        )
                    ) ?>
                </div>
                <?php target_qodef_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <?php
                    target_qodef_excerpt($excerpt_length);
                    $args_pages = array(
                        'before'           => '<div class="qodef-single-links-pages"><div class="qodef-single-links-pages-inner">',
                        'after'            => '</div></div>',
                        'link_before'      => '<span>'. esc_html__('Post Page Link: ', 'targetwp'),
                        'link_after'       => '</span>',
                        'pagelink'         => '%'
                    );

                    wp_link_pages($args_pages);
                ?>
                <div class="qodef-post-info qodef-section-bottom clearfix <?php echo esc_attr($share_enabled); ?>">
                    <div class="qodef-section-bottom-left">
                        <?php target_qodef_post_info(
                            array(
                                'share' => 'yes'
                            ),
                            array(
                                'social_share_type' => 'list'
                            )
                        ) ?>
                    </div>
                    <div class="qodef-section-bottom-right">
                        <?php target_qodef_post_info(array(
                            'comments' => 'yes',
                            'like' => 'yes'
                        )) ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
</article>