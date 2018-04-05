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


		$post_id = get_the_ID();
/*$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
	echo "</pre>";*/

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		<?php
		 the_post_thumbnail(array(200,200));

		 $theband_bio = get_post_meta( $post_id, 'ko_band_the_band_bio', false );
		 foreach ($theband_bio as $key => $value_bio) {

		 	print_r( $value_bio);
		 	# code...
		 }
	 endwhile; // end of the loop. 
endif;

 
 ?>