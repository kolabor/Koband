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
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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


		             <?php if ($slider_type == "video") 
		             {
                        

                        ?>
<!--                        <iframe align="center" width="100%" height="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1"></iframe> 
                        <iframe align="center" width="100%" height="100%" src="https://youtu.be/kpiR041g_K0" frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe> -->
                        <?php
		            
		             }
		             else if($slider_type == "image") 
		             	{
		             		$url = wp_get_attachment_url( get_post_thumbnail_id() );
		             		?><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">

		             <?php } ?>
		            
            	
            	<?php //if(isset($slider_button_title[0])) 	{ echo  $slider_button_title[0]; } ?><br>
            	<?php //if(isset($slider_button_link[0])) 	{ echo  $slider_button_link[0]; } ?><br>

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
            

    
