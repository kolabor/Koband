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
	while ( have_posts() ) : the_post(); 
	
endwhile;
endif; wp_reset_postdata();
	 
	$mytour = new WP_Query(array(
		'post_type' => 'mytour',
		'post_staus'=> 'publish',
		'posts_per_page' => -1
	));

	while($mytour->have_posts()) : $mytour->the_post();

		the_post_thumbnail('thumbnail');
		the_title();

		$tourdate = DateTime::createFormFormat('Ymd', get_field('ko_band_tour_date'));
		echo $tourdate->format('Y'); 

		echo '<p> "Country":', the_field('ko_band_tour_country');
		the_field('ko_band_tour_city');
		the_field('ko_band_tour_address');
		the_field('ko_band_tour_zipCode');
		the_field('ko_band_tour_venue_name');

		echo "<pre>";
		print_r($mytour);
		echo "</pre>";

endwhile;

 
 ?>