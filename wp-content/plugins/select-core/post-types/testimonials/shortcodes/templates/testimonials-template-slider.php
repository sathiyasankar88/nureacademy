<div id="qodef-testimonials<?php echo esc_attr($current_id) ?>" class="qodef-testimonial-content">
	<div class="qodef-testimonial-content-inner">
		<div class="qodef-testimonial-text-holder">
			<div class="qodef-testimonial-text-inner qodef-grid">
				<p class="qodef-testimonial-text"><?php echo trim($text) ?></p>
                <div class="qodef-separator"></div>
				<?php if ($show_author == "yes") { ?>
					<div class = "qodef-testimonial-author">
						<p class="qodef-testimonial-author-text"><?php echo esc_attr($author)?>
							<?php if($show_position == "yes" && $job !== ''){ ?>
								<span class="qodef-testimonials-job"><?php echo esc_attr($job)?></span>
							<?php }?>
						</p>	
					</div>
				<?php } ?>
			</div>
		</div>
	</div>	
</div>
