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
<div id="Tour" class="section">
    <div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                <h1 class="first_color"><?php __('Tour', 'koband');?></h1>
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
    if ( $tour_posts->have_posts() ) : ?>
    <!--start loop-->
        <div class="divTable">
            <div class="divTableBody">
                <div class="divTableRow">
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Date', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Country', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('City', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Address', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('ZipCode', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Venue', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Ticket status', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php __('Store', 'koband');?></div>
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
                    <div class="divTableRow">
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_date[0])) { echo  $tour_date[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_country[0])) { echo  $tour_country[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_city[0]))  { echo  $tour_city[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_address[0]))	 { echo  $tour_address[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_zipcode[0]))	 { echo  $tour_zipcode[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_venuename[0]))  { echo  $tour_venuename[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_ticket[0]))  { echo  $tour_ticket[0]; } ?></div>
                    	<div class="divTableCell btn-buy border_first_color main_font_color"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  $tour_ticketlink[0];?>"><?php __('Buy Here', 'koband');?></a><?php } ?></div>
                    </div>
                <?php endwhile;?> <!-- end of the loop.  -->
            </div>
        </div><!--divTable-->
    <?php endif;?>
    </div><!--row-->
</div><!--container-->
</div>