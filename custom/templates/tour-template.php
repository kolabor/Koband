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


if ( have_posts() ) : 
 	//start loop

	 while ( $tour_posts->have_posts() ) : $tour_posts->the_post(); 

		$post_id = get_the_ID();
/*$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
	echo "</pre>";*/

		//$post_id = get_the_ID() ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
			

		<?php 
			 the_post_thumbnail(array(200,200));

		 $tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
		 foreach ($tour_date as $key => $value_date) {

		 	print_r( $value_date);
		 	# code...
		 }

		  $tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
		   foreach ($tour_country as $key => $value_country) {

		 	print_r( $value_country);
		 	# code...
		 }

		  $tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
		  foreach ($tour_city as $key => $value_city) {

		 	print_r( $value_city);
		 	# code...
		 }	

		 $tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
		 foreach ($tour_address as $key => $value_address) {

		 	print_r( $value_address);
		 	# code...
		 }

		 $tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
		 foreach ($tour_zipcode as $key => $value_zipcode) {

		 	print_r( $value_zipcode);
		 	# code...
		 }

		 $tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
		 foreach ($tour_venuename as $key => $value_venuename) {

		 	print_r( $value_venuename);
		 	# code...
		 }
		 $tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
		 foreach ($tour_ticket as $key => $value_ticket) {

		 	print_r( $value_ticket);
		 	# code...
		 }

		 $tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false );
		 foreach ($tour_ticketlink as $key => $value_ticketlink) {

		 	print_r( $value_ticketlink);
		 	# code...
		 }

	
	 endwhile; // end of the loop. 
endif;


 
 ?>