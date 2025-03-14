<?php defined('ABSPATH') or die("No script kiddies please!");
$post_results = $this->get_post_details($post_type, $orderby,$order,$posts_per_page);
// $this->displayArr($post_results);
if($post_results->have_posts()) :?>
<ul class="etab-posts-wrapper etab-post-lists etab-clearfix">
<?php while ($post_results->have_posts()) : $post_results->the_post();
$posts_name = get_the_title();
$posts_id = get_the_ID();
$posts_permalink = get_the_permalink($posts_id);

?>
<li>
  <div class="etab-recent-post-row etab-clearfix">

	 <?php if($show_fimage){ ?>
	   <div class="etab_feature_image">
		<?php  if ( has_post_thumbnail() ) {
		      $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'large');
		      if ( ! empty( $large_image_url[0] ) ) { 
		        echo "<img src='".esc_url( $large_image_url[0] )."' alt='".the_title_attribute( array( 'echo' => 0 ) )."'/>";
		      }else{  
		       echo "<img src='".ETAB_IMAGE_DIR."/thumbnail-default.jpg' alt='thumbnail'/>";
		     }
		    }else{   
		       echo "<img src='".ETAB_IMAGE_DIR."/thumbnail-default.jpg' alt='thumbnail'/>";
		   } ?>
		 </div>
		<?php } ?>

	<div class="etab_rt-post-section">
	   <div class="etab-format-wrap etab-clearfix">
	    <?php if($show_date){?>
		  <span class="etab-calendarDate">
		  <?php if($date_format == "F j"){
		  	echo '<span class="etab-month">'.get_the_date( 'F' ).'</span>';
		  	echo '<span class="etab-day">'.get_the_date( 'j' ).'</span>';
		  }else if($date_format == "j F"){
		  	echo '<span class="etab-day">'.get_the_date( 'j' ).'</span>';
		  	echo '<span class="etab-month">'.get_the_date( 'F' ).'</span>';
		  }else if($date_format == "j F  Y"){
		  	echo '<span class="etab-day">'.get_the_date( 'j' ).'</span>';
		  	echo '<span class="etab-month">'.get_the_date( 'F' ).'</span>';
		  	echo '<span class="etab-year">'.get_the_date( 'Y' ).'</span>';
		  }else{
              echo get_the_date( $date_format );
		  } ?>		  	
		  </span>
		<?php } ?>
	   <?php if($show_comment_number){
		$comment_in_number = get_comments_number(get_the_ID());?>
	     <span class="etab-comment-number"><?php echo $comment_in_number;?></span>
	   <?php } ?>
	   </div>

	 <div class="etab-post-title-wrap etab-clearfix">
		<a class="etab-ptitle" title="<?php echo esc_attr($posts_name);?>" href="<?php echo esc_attr($posts_permalink);?>" target="<?php echo esc_attr($btn_target);?>"><?php echo esc_attr($posts_name);?>
		</a>
		<?php if($show_excerpt){
			$description = $this->etab_get_excerptbyid($posts_id,$excerpt_limit);?>
	          <div class="etab_post_content" data-id="<?php echo $posts_id;?>" data-limit="<?php echo $excerpt_limit;?>">
	             <?php echo $description;?>    
	          </div>	
	      <?php } ?>
	      <?php if($enable_btn == 1){ ?>
			<span class="etab-read-more-btn">
			<a title="<?php echo esc_attr($posts_name);?>" href="<?php echo esc_attr($posts_permalink);?>" target="<?php echo esc_attr($btn_target);?>">
					<?php echo esc_attr($btn_label);?>
			</a>
			</span>
	    <?php } ?>
    </div>



	</div>
<?php endwhile; ?>
</ul>
<?php
endif;