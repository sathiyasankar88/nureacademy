<?php defined('ABSPATH') or die("No script kiddies please!"); 
 // $this->displayArr($tw_feeds);
 if(isset($tw_feeds) && is_array( $tw_feeds ) && !empty($tw_feeds)):?>
 <div class="etab-twitter-feeds-container">
  <?php if($show_follow_btn){  ?>

     <div class="etab-social-header ">
       <div class="etab-social-follow">
	<a href="https://twitter.com/<?php echo $twitter_username;?>" target="_blank" class="etab-follow-link">
		<div class="etab-follow-btn">
			<span id="etab-click-flw" class="label">Follow <?php echo $twitter_username;?></span>
		</div>
	</a>	
        </div>
     </div>
   <?php } ?>
<div class="etab-tweets-wrap-lists etab-clearfix">
<?php foreach ( $tw_feeds as $tweet ) {
   $created_date = $tweet->created_at;
   ?>
   <div class="etab-single-tweet-wrapper">
		    <div class="etab-image-container">
		       <div class="etab-image">
		         <?php include(ETAB_PATH . 'includes/frontend/components/social_feeds/etab-twitter-media.php'); ?>
		       </div>
		    </div>
		    <div class="etab-tweets-inner-content">
		           <div class="etab-top-section">
                     <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/" class="etab-tweet-name" target="_blank"><img src="<?php echo str_replace('http://','https://',$tweet->user->profile_image_url); ?>" height="50px" width="50px"/>&nbsp;&nbsp;@<?php echo $tweet->user->name; ?></a>
		    	      <span class="etab-tweet-date etab-timestamp">- <?php echo $this -> get_elapsed_time( $created_date ); ?></span>
                     </div>
                     <div class="etab-tweets-content">
                       <?php if ( $tweet -> text ) {
                                    $the_tweet = $tweet -> text;

                                    $the_tweet = $this -> etab_makeClickableLinks( $the_tweet );
                                    // i. User_mentions must link to the mentioned user's profile.
                                    if ( is_array( $tweet -> entities -> user_mentions ) ) {
                                        foreach ( $tweet -> entities -> user_mentions as $key => $user_mention ) {
                                            $the_tweet = preg_replace(
                                                    '/@' . $user_mention -> screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention -> screen_name . '" target="_blank">@' . $user_mention -> screen_name . '</a>', $the_tweet );
                                        }
                                    }

                                    // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                                    if ( is_array( $tweet -> entities -> hashtags ) ) {
                                        foreach ( $tweet -> entities -> hashtags as $hashtag ) {
                                            $the_tweet = str_replace( ' #' . $hashtag -> text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag -> text . '&src=hash" target="_blank">#' . $hashtag -> text . '</a> ', $the_tweet );
                                        }
                                    }

                                    echo $the_tweet . ' ';
                                    ?>
                                    <!--Tweet Action -->
                                    <?php
                                    include(ETAB_PATH . 'includes/frontend/components/social_feeds/etab-twitter-action.php');?>
                                    <!--Tweet Action -->

                                </div><!--tweet content-->

                                <?php
                            } else {
                                ?>

                                <p><a href="http://twitter.com/'<?php echo $$twitter_username; ?> " target="_blank"><?php _e( 'Click here to read ' . $$twitter_username . '\'S Twitter feed', ETAB_TD ); ?></a></p>
                                <?php
                            }
                            ?>
                     </div>
    </div>
   <?php 
 } ?>
 </div>
</div>
<?php
 endif;

