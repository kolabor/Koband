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

get_header(); ?> <div class="theband"><h1>The Band Temp</h1>

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

<h1> Band Member name: <a href="<?php the_permalink();?>"><?php the_title();?><?php the_post_thumbnail(array(200,200));?><?php the_content();?></a></h1>


<?php
		 $theband_bio = get_post_meta( $post_id, 'ko_band_the_band_bio', false );
		 foreach ($theband_bio as $key => $value_bio) {
		 	?>
		 	<div class="ado">Role: 
		 	<?php
		 	print_r( $value_bio);
		 	# code...
		 	?> </div> <?php 
		 }

	 endwhile; // end of the loop. 
endif;

 
 ?></div>
 </div>