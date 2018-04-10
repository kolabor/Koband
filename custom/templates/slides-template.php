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

 $slider_posts = new WP_Query($args_slider);

    if ($slider_posts->have_posts() ) : 
 
	while( $slider_posts->have_posts() ) : $slider_posts->the_post();
		
	$post_id = get_the_ID();
	the_post_thumbnail('full');
        $slider_video = get_post_meta( $post_id, 'ko_band_slides_video', false );
		$slider_title = get_post_meta($post_id, "ko_band_slides_title", false );
		$slider_subtitle = get_post_meta($post_id, "ko_band_slides_subtitle", false );
		$slider_button_title = get_post_meta($post_id, "ko_band_slides_button_title", false );
		$slider_button_link = get_post_meta($post_id,  "ko_band_slides_button_link", false );
	?>
	
            	<?php if(isset($slider_video[0])) 		 	{ echo  $slider_video[0]; } ?><br>
            	<?php if(isset($slider_title[0])) 	 		{ echo  $slider_title[0]; } ?><br>
            	<?php if(isset($slider_subtitle[0])) 		{ echo  $slider_subtitle[0]; } ?><br>
            	<?php if(isset($slider_button_title[0])) 	{ echo  $slider_button_title[0]; } ?><br>
            	<?php if(isset($slider_button_link[0])) 	{ echo  $slider_button_link[0]; } ?><br>

	
<?php
 endwhile;
endif;
?>
