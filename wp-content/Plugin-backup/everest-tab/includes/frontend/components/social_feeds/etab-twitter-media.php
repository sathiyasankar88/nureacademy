<?php defined('ABSPATH') or die("No script kiddies please!");
if ( isset( $tweet ->  extended_entities ) ) {
    ?>
    <div class="etab-tweet-media">
        <?php
        if ( count( $tweet ->  extended_entities -> media ) > 1 ) {
            $image_size = 'thumb';
        } else {
            $image_size = 'large';
        }

        // $this -> print_array( $tweet[ 'quoted_status' ][ 'extended_entities' ] );
        foreach ( $tweet ->  extended_entities -> media as $media ) {
            ?>
            <div class="etab-each-media etab-media-<?php echo $image_size; ?>">
                <a href="<?php echo esc_attr( $media -> media_url_https ); ?>"><img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>
            </div>
            <?php
            // $this -> print_array( $media );
        }
        ?>
    </div>
    <?php
} else if ( isset( $tweet -> retweeted_status -> extended_entities ) ) {
    ?>
    <div class="etab-tweet-media">
        <?php
        if ( count( $tweet -> extended_entities -> media ) > 1 ) {
            $image_size = 'thumb';
        } else {
            $image_size = 'large';
        }

        //$this->print_array($tweet['extended_entities']);
        foreach ( $tweet -> retweeted_status -> extended_entities -> media as $media ) {
            ?>
            <div class="etab-each-media etab-media-<?php echo $image_size; ?>">
                <a href="<?php echo esc_attr( $media -> media_url_https ); ?>"><img src="<?php echo esc_attr( $media -> media_url_https ) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
