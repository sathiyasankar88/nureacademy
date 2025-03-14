<?php defined('ABSPATH') or die('No script kiddies please!!');?>
<div class="etab-tweet-actions-wrapper etab-tweet-actions">
    <a href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $tweet -> id_str; ?>" class="etab-tweet-reply etab-tweet-action-reply" target="_blank">
    <i class="fa fa-reply"></i>
    </a>
    <a href="https://twitter.com/intent/retweet?tweet_id=<?php echo $tweet -> id_str; ?>" class="etab-tweet-retweet etab-tweet-action-retweet" target="_blank">
    <i class="fa fa-retweet"></i>
    <span class="etab-count"><?php echo $this -> etab_abreviateTotalCount( $tweet -> retweet_count ); ?></span>
    </a>
    <a href="https://twitter.com/intent/favorite?tweet_id=<?php echo $tweet -> id_str; ?>" class="etab-tweet-fav etab-tweet-action-favourite" target="_blank">
    <i class="fa fa-star"></i>
    <span class="etab-count"><?php echo $this -> etab_abreviateTotalCount( $tweet -> favorite_count ); ?></span>
    </a>
</div>