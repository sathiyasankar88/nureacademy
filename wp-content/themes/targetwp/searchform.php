<?php
global $use_live_search;
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div><label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'targetwp' ); ?></label>
		<?php $tmp = ( $use_live_search ) ? '' : ' no-livesearch'; ?>
        <input class="<?php echo esc_attr( $tmp ); ?>" type="text" value="" placeholder="<?php esc_attr_e( 'Search', 'targetwp' ); ?>" name="s" id="s"/>
		<?php if ( $use_live_search ) { ?>
            <i class="lnr lnr-magnifier"></i>
		<?php } else { ?>
            <input type="submit" id="searchsubmit" value="&#xe86f;"/>
		<?php } ?>
    </div>
</form>