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

get_header(); ?> 
<div id="Tour" class="container section">
    <div class="row">

        <div class="container">
            <div class="row">
                <h1>Tour</h1>
            </div>
        </div>
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
<div class="divTable">
    <div class="divTableBody">
               
                                <div class="divTableRow">
                                <div class="divTableHeading"><?php _e('Date', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('Country', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('City', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('Address', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('ZipCode', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('Venue', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('Ticket status', 'koband');?></div>
                                <div class="divTableHeading"><?php _e('Store', 'koband');?></div>
                                </div>
                  
<?php

	 while ( $tour_posts->have_posts() ) : $tour_posts->the_post(); 

		$post_id = get_the_ID();  

		the_post_thumbnail(array(200,200));
        $tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
		$tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
		$tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
		$tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
		$tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
		$tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
		$tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
		$tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false );
        ?>
            
            	<!--<a href="<?php the_permalink();?>"><?php the_title();?></a><br>-->
                
                <div class="divTableRow">
            	<div class="divTableCell"><?php if(isset($tour_date[0])) { echo  $tour_date[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_country[0])) { echo  $tour_country[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_city[0]))  { echo  $tour_city[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_address[0]))	 { echo  $tour_address[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_zipcode[0]))	 { echo  $tour_zipcode[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_venuename[0]))  { echo  $tour_venuename[0]; } ?></div>
            	<div class="divTableCell"><?php if(isset($tour_ticket[0]))  { echo  $tour_ticket[0]; } ?></div>
            	<div class="divTableCell btn-buy"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  $tour_ticketlink[0];?>"><?php _e('Buy Here', 'koband');?></a><?php } ?></div>
                </div>
            
            
    <?php endwhile;?> <!-- end of the loop.  -->
</div>
<?php endif;?>
</div>
</div>
</div>