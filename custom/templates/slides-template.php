<?php
/**
 * 
 *
 * Template Name: Slides
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */?>

 <?php 

 $args_slider = array (
		  	'post_type' => 'slides',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1

			);

 $slider_posts = new WP_Query($args_slider);?>




            <!-- Wrapper for slides -->
            
 	<?php
    if ($slider_posts->have_posts() ) : ?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   <ol class="carousel-indicators">
        	<?php if ($slider_posts->have_posts() ) : while( $slider_posts->have_posts() ) : $slider_posts->the_post(); ?>

        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $slider_posts->current_post; ?>" class="active"></li>
        <?php endwhile; endif; ?>
    </ol>
    <div class="carousel-inner">
    <?php 
    $i = 0;


	while( $slider_posts->have_posts() ) : $slider_posts->the_post(); $i++;
	?>


	<?php
	$post_id = get_the_ID();?>

					
                <?php
	
		$slider_type = get_post_meta( $post_id, 'ko_band_slides_check', true);
        $slider_video = get_post_meta( $post_id, 'ko_band_slides_video', false );
		$slider_title = get_post_meta($post_id, "ko_band_slides_title", false );
		$slider_subtitle = get_post_meta($post_id, "ko_band_slides_subtitle", false );
		$slider_button_title = get_post_meta($post_id, "ko_band_slides_button_title", false );
		$slider_button_link = get_post_meta($post_id,  "ko_band_slides_button_link", false );
	?>

			  <?php if ( $i == 1 ): ?>
		        <div class="carousel-item active">
		      <?php else: ?>
		        <div class="carousel-item">
		      <?php endif; ?>
		      	<?php	$url = wp_get_attachment_url( get_post_thumbnail_id() );
		             		?><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
		             		
		             		<div class="sl-content">
								    <h5><?php if(isset($slider_title[0])) 	{ echo  $slider_title[0]; } ?></h5>
								    <p><?php if(isset($slider_subtitle[0])) 	{ echo  $slider_subtitle[0]; } ?></p>
								    <a class="btn btn-primary btn-lg" href="<?php if(isset($slider_button_link[0])) 	{ echo  $slider_button_link[0]; } ?>"><?php if(isset($slider_button_title[0])) 	{ echo  $slider_button_title[0]; } ?></a>
						  </div>

		      			<?php
							$slide_video = get_theme_mod('ko_band_slides_video');
							$slide_image = get_theme_mod('ko_band_slides_image');

						?>

		            <!-- <?php if ($slider_type == "video") 
		             {
                        ?>
                        <iframe align="center" width="100%" height="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1"></iframe> 
                        
                        <?php
                        if(isset($slide_video[0])) {echo $slide_video[0];}
		         	 }
		             else if($slider_type == "image") 
		             {
		             		$url = wp_get_attachment_url( get_post_thumbnail_id() );
		             		?><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">

		             <?php } 
		           		  if(isset($slide_image[0])) {echo $slide_image[0];}
		             ?>

		             		<div class="carousel-caption d-none d-md-block">
								    <h5>...</h5>
								    <p>...</p>
						  </div>

		             <?php } ?>-->

		            
            	
            	<br>
            	<br>
            	<br>
            	<br>

                  </div>
<?php

 endwhile; ?>
 </div>
 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 <?php
endif; wp_reset_query();
?>

<div class="container">
<!-- Controls -->
            

    
