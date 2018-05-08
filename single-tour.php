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
<div class="container tour_single_page_container">
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
    <div class="row single_page_row">
    	<div class="col-sm-5"><h3><?php echo esc_html__('Location :', 'koband');?></h3></div>
    	<div class="col-sm-7 tour_location_label"><h3><?php echo esc_html__('Tour Details :', 'koband');?></h3></div>
    </div>
	<div class="row">
		<div class="col-sm-4 the_tour_map">
			<div class="single_page_cover"><?php the_content() ?></div>
		</div>
		<div class="col-sm-8">
		 	<div class="container">
			 	<div class="row tour_single_page_row">
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Date', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_country[0])) { echo  esc_attr($tour_country[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Country', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_city[0]))  { echo  esc_attr($tour_city[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('City', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_address[0]))	 { echo  esc_attr($tour_address[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Address', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_zipcode[0]))	 { echo  esc_attr($tour_zipcode[0]); } ?></div>
                </div>
                <div class="row tour_single_page_row">
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('ZipCode', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_venuename[0]))  { echo  esc_attr($tour_venuename[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Venue', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_ticket[0]))  { echo  esc_attr($tour_ticket[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Ticket status', 'koband');?></div>
                	<div class="col-sm-6 main_font_color album-info"><?php if(isset($tour_date[0])) { echo  esc_attr($tour_date[0]); } ?></div>
                    <div class="col-sm-6 main_font_color album-info"><?php echo esc_html__('Store', 'koband');?></div>
                	<div class="col-sm-6 btn-buy  main_font_color album-info"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  esc_url($tour_ticketlink[0]);?>"><?php echo esc_html__('Buy Here', 'koband');?></a><?php } ?></div>
              	</div>
            </div><!-- container -->
		</div><!-- col-sm-8 -->
	</div><!-- row -->		
<?php endwhile; endif; ?>
</div><!-- container -->

<?php 
get_footer(); ?>
