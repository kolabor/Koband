<?php
/**
 * 
 *
 * Template Name: The Band
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?> <h1>The Band Temp</h1>

<?php


    $args_theband = array
    (		
	 	 'post_type' => 'theband',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $theband_posts = new WP_Query( $args_theband );
 $total = $theband_posts->found_posts; 

 if ( $theband_posts->have_posts() ) : 
 	//start loop
	 while ( $theband_posts->have_posts() ) : $theband_posts->the_post(); 

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php
	 endwhile; // end of the loop. 
endif;

 
 ?>