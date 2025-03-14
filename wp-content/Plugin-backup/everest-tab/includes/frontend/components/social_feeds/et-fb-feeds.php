<?php defined('ABSPATH') or die("No script kiddies please!");
$show_btn = (isset($value['social_feeds']['fb']['show_btn']) && $value['social_feeds']['fb']['show_btn'] == 1)?1:0;
$btn_text = (isset($value['social_feeds']['fb']['btn_text']) && $value['social_feeds']['fb']['btn_text'] != '')?sanitize_text_field($value['social_feeds']['fb']['btn_text']):'';
$word_limit = (isset($value['social_feeds']['fb']['word_limit']) && $value['social_feeds']['fb']['word_limit'] != '')?sanitize_text_field($value['social_feeds']['fb']['word_limit']):'';
$btn_target = (isset($value['social_feeds']['fb']['btn_target']) && $value['social_feeds']['fb']['btn_target'] != '')?sanitize_text_field($value['social_feeds']['fb']['btn_target']):'';
 ?>
<div class="etab-facebook-feeds-wrapper">
 <?php
 for ( $count = 0; $count < $facebook_feeds; $count ++ ) {
    $createddate =  (isset( $results[ 'data' ][ $count ][ 'created_time' ]) && !empty( $results[ 'data' ][ $count ][ 'created_time' ]))? $results[ 'data' ][ $count ][ 'created_time' ]:'' ;
    $pdescription = (isset( $results[ 'data' ][ $count ][ 'message' ]) && !empty( $results[ 'data' ][ $count ][ 'message' ]))? $results[ 'data' ][ $count ][ 'message' ]:'' ;

    $pimage = (isset( $results[ 'data' ][ $count ][ 'full_picture' ]) && !empty( $results[ 'data' ][ $count ][ 'full_picture' ]))? $results[ 'data' ][ $count ][ 'full_picture' ]:'' ;
    $plink = (isset( $results[ 'data' ][ $count ][ 'link' ]) && !empty( $results[ 'data' ][ $count ][ 'link' ]))? $results[ 'data' ][ $count ][ 'link' ]:'' ;
    $plike = (isset( $results[ 'data' ][ $count ][ 'likes' ][ 'summary' ][ 'total_count' ]) && !empty( $results[ 'data' ][ $count ][ 'likes' ][ 'summary' ][ 'total_count' ]))? $results[ 'data' ][ $count ][ 'likes' ][ 'summary' ][ 'total_count' ]:'' ;
    $pcomment = (isset( $results[ 'data' ][ $count ][ 'comments' ][ 'summary' ][ 'total_count' ]) && !empty( $results[ 'data' ][ $count ][ 'comments' ][ 'summary' ][ 'total_count' ]))? $results[ 'data' ][ $count ][ 'comments' ][ 'summary' ][ 'total_count' ]:'' ;
    $pshare = (isset($results[ 'data' ][ $count ][ 'shares' ][ 'count' ]) && !empty($results[ 'data' ][ $count ][ 'shares' ][ 'count' ]))?$results[ 'data' ][ $count ][ 'shares' ][ 'count' ]:'' ;
    ?>
    <div class="etab-fbposts-main-container">
       <div class="etab-profile-image-section">
          <a href="<?php echo esc_url( $plink ); ?>">  
           <img src="<?php echo esc_attr( $pimage ); ?>" alt="Profile Image">
          </a>
       </div>
       <div class="etab-inner-content">
                    <div class="etab-meta-wrap">
                        <div class="etab-date-section">
                        <?php echo date( 'M j, Y', strtotime( $createddate ) ); ?>
                        </div>
                    </div>
                    <div class="etab-fb-content-section">
                      <?php if($word_limit != ''){
                              echo strip_tags(substr($pdescription, 0,$word_limit)) . '...';
                              }else{
                                echo esc_attr( $pdescription );
                              }
                        ?>
	                    <?php 
	                    if($show_btn == 1){?>
	                      <span class="etab-fb-read-btn">
	                      	<a href="<?php echo esc_url( $plink ); ?>" target="<?php echo esc_attr($btn_target);?>"><?php echo esc_attr($btn_text);?></a>
	                      </span>
	                    <?php }
	                    ?>
                    </div>
                    <?php if ($enable_like_count == '1' ) { ?>
                        <div class="etab-like-count">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            <?php echo esc_attr( $plike ); ?>
                        </div>
                   <?php }
                    if ($enable_cmmt_count == '1' ) {
                        ?>
                        <div class="etab-comment-count">
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                            <?php echo esc_attr( $pcomment ); ?>
                        </div>
                        <?php
                    }
                    if ($enable_share_count == '1' ) {
                        ?>
                        <div class="etab-share-count">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <?php echo esc_attr( $pshare ); ?>
                        </div>
                    <?php } ?>
                </div>

    </div>
 <?php    
 }?>
 </div>