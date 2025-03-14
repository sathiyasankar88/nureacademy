<?php defined('ABSPATH') or die("No script kiddies please!");
$product_query = $this->get_products_category_wise($post_type,$product_type ,$category, $orderby,$order,$posts_per_page);
// $this->displayArr($product_query);
?>
<ul class="etab-product-lists-wrap etab-clearfix">
<?php if($product_query->have_posts()) { while($product_query->have_posts()) { 
	$product_query->the_post();
        ?>
          <li <?php post_class(); ?>>
          <div class="etab-recent-product-image-section etab-clearfix">
          <!-- show featured image -->
          <?php if($show_featureimage == 1){ ?>
          <div class="etab-top-section">
             <a href="<?php the_permalink(); ?>">
                <?php
                  if ( has_post_thumbnail() ) {
                     woocommerce_show_product_loop_sale_flash();
                      $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'medium');
                      if ( ! empty( $large_image_url[0] ) ) { 
                        echo "<img src='".esc_url( $large_image_url[0] )."' alt='".the_title_attribute( array( 'echo' => 0 ) )."'/>";
                      }else{  
                        woocommerce_show_product_loop_sale_flash();
                       echo "<img src='".ETAB_IMAGE_DIR."/thumbnail-default.jpg' alt='thumbnail' width='300' height='300'/>";
                     }
                    }else{   
                      woocommerce_show_product_loop_sale_flash();
                       echo "<img src='".ETAB_IMAGE_DIR."/thumbnail-default.jpg' width='300' height='300' alt='thumbnail'/>";
                     } ?>
              </a>
          </div>
          <?php } ?>
          <!-- left section end -->
          <div class="etab-bottom-section">
          <!-- show category -->
            <?php if($show_cat == 1){?>
           <div class="etab-category-wrap">
           <?php if($product_type == "category" && $category != 'all'){
              $term = get_term($category, 'product_cat' );
                 $name =  $term->name;?>
                 <span class="etab_cat_title"><?php echo $name; ?></span>
              <?php }else{ 
                   $prod_terms = get_the_terms(get_the_ID(), 'product_cat' );
                   if(isset($prod_terms) && !empty($prod_terms)){ ?>
                   <?php 
                   $count = count($prod_terms);
                    $i = 1;
                     foreach ($prod_terms as $key => $value) {
                      echo "<span class='etab_cat_title'>";
                      echo $value->name;
                      echo "</span>";
                      if($i < $count){
                        echo ',';
                      }
                     $i++; }?>
                    <?php  
                   } ?>
               
             <?php  } ?>
               </div>
               <?php
            }?>
            <a class="etab-product-title" href="<?php the_permalink(); ?>">
            <?php woocommerce_template_loop_product_title(); ?>
            </a>
            <?php 
            if($show_price == 1){ 
              // show price 
              woocommerce_template_loop_price();
              }
              if($show_rating == 1){ 
               // show rating 
              woocommerce_template_loop_rating();
              }

             if($cta_enable != 1 && $cta_product_label != ''){
                  echo "<a class='etab-prodlink' target='".$btn_target."' href='".get_the_permalink()."'>".esc_attr($cta_product_label)."</a>";
               } ?>

              <?php if($show_atc_btn == 1){?>
                <!-- show add to cart -->
              <?php woocommerce_template_loop_add_to_cart(); ?>
              <?php } ?>
            </div> <!-- right section end -->

            </div>
          </li>
        <?php
       } } wp_reset_query(); ?>                    
</ul>