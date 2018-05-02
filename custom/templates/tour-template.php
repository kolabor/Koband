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
        <div class="container">
            <div class="row">
                <h1 class="first_color"><?php echo __('Tour', 'koband');?></h1>
            </div>
        </div>
    <div class="row">

    <?php
    $args_tour = array
    (		
	 	 'post_type' => 'tour',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => '10'
	);
    $tour_posts = new WP_Query( $args_tour );
    if ( $tour_posts->have_posts() ) : ?>
    <!--start loop-->
        <div class="divTable">
            <div class="divTableBody koband_post_tour">
                <div class="divTableRow">
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Date', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Country', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('City', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Address', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('ZipCode', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Venue', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Ticket status', 'koband');?></div>
                    <div class="divTableHeading border_first_color main_font_color"><?php echo __('Store', 'koband');?></div>
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
                    <div class="divTableRow ">
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_date[0])) { echo  $tour_date[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_country[0])) { echo  $tour_country[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_city[0]))  { echo  $tour_city[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_address[0]))	 { echo  $tour_address[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_zipcode[0]))	 { echo  $tour_zipcode[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_venuename[0]))  { echo  $tour_venuename[0]; } ?></div>
                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_ticket[0]))  { echo  $tour_ticket[0]; } ?></div>
                    	<div class="divTableCell btn-buy border_first_color main_font_color"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  $tour_ticketlink[0];?>"><?php echo __('Buy Here', 'koband');?></a><?php } ?></div>
                    </div>
                <?php endwhile;?> <!-- end of the loop.  -->
            </div>
        </div><!--divTable-->
    <?php endif;?>
    </div><!--row-->
        <div class="container text-center">
            <div class="row">
                <a class="btn-koband-load koband_load_tour bg_first_color" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <span class="koband-loading"><?php echo __('Loading...','koband');?></span>
                    <span class="text"><?php echo __('Load tour','koband');?></span></a>
                <a class="no-tour"><span class="tour-posts"><?php echo __('There are no more tours','koband');?></span></a>
            </div>
        </div><!--container-->
    </div><!--container-->
</div>