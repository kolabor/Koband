<?php
/**
 * 
 *
 * Template Name: Tour
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?> <h1>Tour Temp</h1>
<?php



    $args_tour = array
    (		
	 	 'post_type' => 'tour',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $tour_posts = new WP_Query( $args_tour );
 $total = $tour_posts->found_posts; 

 if ( $tour_posts->have_posts() ) : 
 	//start loop
	 while ( $tour_posts->have_posts() ) : $tour_posts->the_post(); 

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php
	 endwhile; // end of the loop. 
endif;

 
 ?>