<?php target_qodef_get_module_template_part('templates/lists/parts/filter', 'blog'); ?>
<div class="<?php echo esc_attr($blog_classes)?>" <?php echo esc_attr($blog_data_params) ?>>
    <div class="qodef-blog-masonry-gallery-grid-sizer"></div>
    <div class="qodef-blog-masonry-gallery-grid-gutter"></div>
    <?php
    if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
        target_qodef_get_post_format_html($blog_type);
    endwhile;
    else:
        target_qodef_get_module_template_part('templates/parts/no-posts', 'blog');
    endif;
    ?>
</div>

<?php
    if(target_qodef_options()->getOptionValue('pagination') == 'yes') {
    $pagination_type = target_qodef_options()->getOptionValue('pagination_type');

    if(target_qodef_options()->getOptionValue('gallery_pagination_type') != '' ) {
        $pagination_type = target_qodef_options()->getOptionValue('gallery_pagination_type');
    }}

    if ($pagination_type == 'navigation') {
    ?>
    <div class="qodef-pagination">
        <ul>
            <li class='qodef-pagination-prev'><?php echo wp_kses_post(get_previous_posts_link('<i class="pagination_arrow arrow_carrot-left"></i>')); ?></li>
            <li class='qodef-pagination-next'><?php echo wp_kses_post(get_next_posts_link('<i class="pagination_arrow arrow_carrot-right"></i>', $blog_query->max_num_pages)); ?></li>
        </ul>
    </div>
    <?php
} else {
    target_qodef_pagination($blog_query->max_num_pages, $blog_page_range, $paged, 'masonry-gallery');
}