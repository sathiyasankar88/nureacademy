<div class="qodef-tabs <?php echo esc_attr($tab_class); ?> <?php echo esc_attr($tab_title_layout); ?> clearfix">
    <?php if($tab_class === 'qodef-extended-tab'){?>
    <div class="qodef-extended-tab-container">
   <?php } ?>
    <ul class="qodef-tabs-nav">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<a href="#tab-<?php echo sanitize_title($tab_title)?>">
					<?php if($tab_class === 'qodef-vertical-tab' && ($tab_title_layout === 'qodef-tab-with-icon' || $tab_title_layout === 'qodef-tab-only-icon' || $tab_title_layout === 'qodef-tab-with-icon-above')) { ?>
						<span class="qodef-icon-frame"></span>
					<?php } ?>

					<?php if($tab_class !== 'qodef-vertical-tab' && ($tab_title_layout === 'qodef-tab-with-icon' || $tab_title_layout === 'qodef-tab-only-icon' || $tab_title_layout === 'qodef-tab-with-icon-above')) { ?>
						<span class="qodef-icon-frame"></span>
					<?php } ?>

					<?php if($tab_title !== '' && $tab_title_layout !== 'qodef-tab-only-icon') { ?>
						<span class="qodef-tab-text-after-icon">
							<?php echo esc_attr($tab_title)?>
						</span>
					<?php } ?>

				</a>
			 </li>
		<?php } ?>
	</ul>
    <?php if($tab_class === 'qodef-extended-tab'){?>
    </div>
    <?php } ?>
	<?php echo do_shortcode($content); ?>
</div>