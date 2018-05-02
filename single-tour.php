<?php
/**
 * The Template for displaying single posts for tour
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>
<?php
if (have_posts() ) : 
	
 	//start loop ?>
<div class='tour_holder'>
	<?php  while ( have_posts() ) : the_post(); 
	$post_id = get_the_ID(); ?>
	<div id="tour"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(1024,800)); ?></a>
		<div class="container">
		<h1><div id="single-tour-title"><?php the_title();?></div></h1>
			<div class="row">
				<div class="col-sm">
					<small><?php the_category();?><?php the_time( get_option( 'date_format' ) ); ?>
						<div class="news-details-tag"><?php the_tags(); ?></div>
					</small>
					<div id="single-tour-content"><?php the_content(); ?></div>
				</div>
			</div>
	<?php 
	$single_tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
	$single_tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
	$single_tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
	$single_tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
	$single_tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
	$single_tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
	$single_tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
	$single_tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false ); ?>
			
			<?php 
				if (isset($single_tour_address[0])){
				foreach ($single_tour_address[0] as  $value_single_tour_address) { ?>
				<div class="col-md-12">
					<div class="row">
						<div class="tour">