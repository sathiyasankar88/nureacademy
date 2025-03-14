<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
    <div class="qodef-container">
        <div class="qodef-container-inner clearfix">
			<?php } ?>
            <div class="qodef-form-holder-outer">
                <div class="qodef-form-holder">
                    <div class="qodef-form-holder-inner">
                        <input type="text" placeholder="<?php esc_attr_e( 'Search', 'targetwp' ); ?>" name="s" class="qode_search_field no-livesearch" autocomplete="off"/>
                        <div class="qodef-search-close">
                            <a href="javascript:void(0)">
								<?php print wp_kses_post( $search_icon_close ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			<?php if ( $search_in_grid ) { ?>
        </div>
    </div>
<?php } ?>
</form>