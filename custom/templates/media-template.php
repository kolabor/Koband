<?php
/**
 * 
 *
 * Template Name: Media
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
get_header();?>

 <h1>Media Temp</h1>

<?php



    $args_media = array
    (		
	 	 'post_type' => 'media',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $media_posts = new WP_Query( $args_media );
 $total = $media_posts->found_posts; 

 if ( $media_posts->have_posts() ) : 
 	//start loop
	 while ( $media_posts->have_posts() ) : $media_posts->the_post(); 

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_tittle();?></a>
		<?php
	 endwhile; // end of the loop. 
endif;

 
 ?>