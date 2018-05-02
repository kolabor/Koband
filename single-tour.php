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
<div class="container" style="padding-top: 150px !important;">
	<?php if (have_posts() ) : 
		while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID();
		$tour_date = get_post_meta( $post_id, 'ko_band_tour_date', false );
		$tour_country = get_post_meta($post_id, "ko_band_tour_country", false );
		$tour_city = get_post_meta($post_id, "ko_band_tour_city", false );
		$tour_address = get_post_meta($post_id, "ko_band_tour_address", false );
		$tour_zipcode = get_post_meta($post_id,  "ko_band_tour_zipCode", false );
		$tour_venuename = get_post_meta($post_id,  "ko_band_tour_venue_name", false );
		$tour_ticket = get_post_meta($post_id,  "ko_band_tour_ticket", false );
		$tour_ticketlink = get_post_meta($post_id, "ko_band_tour_ticket_link", false );
        ?>
	<div class="row">
		<div class="row">
			<h2>Title</h2>
		</div>
		<div class="row">
			<div class="col-sm-4"><?php the_content() ?></div>
			 <div class="col-sm-8">
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
            </div>
        </div><!--divTable-->

			 </div>
		</div>

	</div>
<?php endwhile; endif; ?>
</div>

<?php 
get_footer(); ?>