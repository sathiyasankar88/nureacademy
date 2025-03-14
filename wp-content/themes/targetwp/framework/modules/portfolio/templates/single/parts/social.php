<?php if ( target_qodef_options()->getOptionValue( 'enable_social_share' ) == 'yes'
           && target_qodef_options()->getOptionValue( 'enable_social_share_on_portfolio-item' ) == 'yes'
           && target_qodef_core_installed() ) : ?>
    <div class="qodef-portfolio-social">
		<?php echo target_qodef_get_social_share_html() ?>
    </div>
<?php endif; ?>

