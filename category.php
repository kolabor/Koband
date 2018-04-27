<?php
/**
 * 
 *
 * Koband Theme Category
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<div class="container search-holder">
	<div class="row">
		<header class="archive-header">
			<h1 class="archive-title">
				<?php printf( __( 'Posts of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h1>
		</header>
	</div>
	<div class="row">
		<?php
		// Show an optional term description.
		$term_description = term_description();
		if (! empty( $term_description) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
		endif; ?>
		<?php if (have_posts() ) : ?>
		<!--start loop --> 
			<?php while ( have_posts() ) : the_post(); ?>
	            <div class="col-md-4">
	                <div class="card mb-4 box-shadow">
	                    <div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
	                    <a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
	                    <div class="card-body">
	                        <div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
	                            <div class="d-flex justify-content-between align-items-center">
	                                <div class="btn-group">
	                                    <span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php _e('READ MORE →', 'koband');?></a></span>
	                                </div>
	                            </div>
	                    </div>
	                </div> 
				</div>
        	<?php endwhile; ?>
		<?php endif; ?> 
	</div>
	<div class="row"> <?php
		$args_tour1 = array
    (		
    	 'category_name' => 'fisniki teston',	
	 	 'post_type' => 'tour',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1,
	);
    $tour_posts1 = new WP_Query( $args_tour1 );
    if ( $tour_posts1->have_posts() ) : ?>
    <!--start loop-->
        <div class="divTable">
            <div class="divTableBody koband_post_tour">
                <div class="divTableRow">
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Date', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Country', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('City', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Address', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('ZipCode', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Venue', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Ticket status', 'koband');?></div>
                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php _e('Store', 'koband');?></div>
                </div>
                      
                <?php

    	        while ( $tour_posts1->have_posts() ) : $tour_posts1->the_post(); 
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
                    	<div class="divTableCell btn-buy border_first_color main_font_color"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  $tour_ticketlink[0];?>"><?php _e('Buy Here', 'koband');?></a><?php } ?></div>
                    </div>
                <?php endwhile;?> <!-- end of the loop.  -->
            </div>
        </div><!--divTable-->
    <?php endif;?>

	</div>
</div>
<?php get_footer(); ?>
