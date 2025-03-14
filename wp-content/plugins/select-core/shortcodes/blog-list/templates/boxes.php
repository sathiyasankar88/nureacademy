<li class="qodef-blog-list-item">
	<div class="qodef-blog-list-item-inner">
        <?php if($show_image == 'yes') { ?>
		<div class="qodef-item-image clearfix">
			<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
				<div class="qodef-item-image-overlay"></div>
				<?php
                    echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>
        <?php } ?>
		<div class="qodef-item-text-holder">
            <?php if($show_date == 'yes' || $show_category == 'yes' || $show_author == 'yes') { ?>
                <div class="qodef-item-info-section qodef-section-top">
                    <?php target_qodef_post_info(
                        array(
                            'date' => $show_date,
                            'category' => $show_category,
							'author' => $show_author
                        ),
                        array(
                            'show_date_label' => false
                        )
                    ) ?>
                </div>
            <?php } ?>
			<<?php echo esc_html( $title_tag)?> itemprop="name" class="qodef-item-title entry-title">
				<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p itemprop="description" class="qodef-excerpt"><?php echo esc_html($excerpt)?>...</p>
			<?php } ?>
            <?php if($show_share == 'yes' || $show_read_more == 'yes') { ?>
                <div class="qodef-item-info-section qodef-section-bottom clearfix <?php echo esc_attr($info_bottom_class); ?>">
						<div class="qodef-section-bottom-left">
							<?php if($show_read_more == 'yes') { ?>
								<div class="qodef-section-button-holder">
									<?php target_qodef_read_more_button('', 'qodef-blog-list-button'); ?>
								</div>
							<?php } ?>
                        </div>
                    <?php if($show_share == 'yes') { ?>
                        <div class="qodef-section-bottom-right">
							<?php target_qodef_post_info(
								array(
									'share' => $show_share
								),
								array(
									'social_share_type' => 'list'
								)
							) ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

		</div>
	</div>	
</li>