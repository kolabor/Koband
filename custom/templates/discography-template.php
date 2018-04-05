<?php
/**
 * 
 *
 * Template Name: Discography
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header();?> <h1>Discography Temp</h1>

<?php



    $args_album = array
    (		
	 	 'post_type' => 'album',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $album_posts = new WP_Query( $args_album );
 $total_album = $album_posts->found_posts; 

 if ( $album_posts->have_posts() ) : 
 	//start loop
	 while ( $album_posts->have_posts() ) : $album_posts->the_post(); 

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php
	 endwhile; // end of the loop. 
endif;


 $args_singles = array
    (		
	 	 'post_type' => 'singles',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $singles_posts = new WP_Query( $args_singles );
 $total_singles = $singles_posts->found_posts; 

 if ( $singles_posts->have_posts() ) : 
 	//start loop
	 while ( $singles_posts->have_posts() ) : $singles_posts->the_post(); 

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php
	 endwhile; // end of the loop. 
endif;
 
 
?>



