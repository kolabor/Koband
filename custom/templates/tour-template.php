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




 if ( $tour_posts->have_posts() ) : 
 	//start loop
?>
<div class='tour_holder'>
<?php

	 while ( $tour_posts->have_posts() ) : $tour_posts->the_post(); 

		$post_id = get_the_ID();  ?>
			

		<?php 
			 //the_post_thumbnail(array(200,200));
         $tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
		 $tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
		 $tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
		 $tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
		 $tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
		 $tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
		 $tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
		 $tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false );
         ?>
            <div class="tour_row">
            	<a href="<?php the_permalink();?>"><?php the_title();?></a><br>
                <?php echo  $tour_date[0]; ?><br>
                <?php echo  $tour_country[0]; ?><br>
                <?php echo  $tour_city[0]; ?><br>
                <?php echo  $tour_address[0]; ?><br>
                <?php echo  $tour_zipcode[0]; ?><br>
                <?php echo  $tour_venuename[0]; ?><br>
                <?php echo  $tour_ticket[0]; ?><br>
                <?php echo  $tour_ticketlink[0]; ?><br>
            </div>
         <?php 
	 endwhile; // end of the loop. 
?>
</div>;

<?php
endif;

 
 ?>