<?php 
/*

============================
	KOBAND AJAX FUNCTIONS
============================


*/

/* 
===============================================
 Load more News with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_more', 'koband_load_more' );
add_action( 'wp_ajax_koband_load_more', 'koband_load_more' );

function koband_load_more(){
	
	$paged = $_POST["page"]+1;
	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 3,

	));

	if ( $query->have_posts() ) {?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<div class="col-md-4">
									<div class="card mb-4 box-shadow">
										<div class="news-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
										<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
										<div class="card-body">
											<div id="card-text"><?php the_excerpt(); ?></div>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<span class="btn btn-sm btn-outline-secondary"><a class="read_more" href="<?php the_permalink();?>"><?php _e('READ MORE', 'koband'); ?></a></span>
													</div>
												</div>
										</div>
									</div>
								</div>	
		<?php endwhile; ?>
	<?php }

	else 
	{
       echo "end";
	}

	wp_reset_postdata();

	die();

}

/* 
===============================================
 Load more Media with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_media', 'koband_load_media' );
add_action( 'wp_ajax_koband_load_media', 'koband_load_media' );

function koband_load_media(){
	
	$paged = $_POST["page"]+2;
	$gallery = new WP_Query( array(
		'post_type' => 'media',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 4,

	));

	if ( $gallery->have_posts() ) { ?>
		<?php while ( $gallery->have_posts() ) : $gallery->the_post();?>
			<div class="cmix category-1 col-lg-3 col-md-4 col-sm-6 single-filter-content content-1">
				<a class="gallery-img" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(230,230)); ?></a><br>
					<div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
						<div class="media-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
						<!--<div class="d-flex justify-content-between align-items-center">-->
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-outline-secondary"><a class="go_to_gallery" href="<?php the_permalink();?>"><?php _e('Go to Gallery -->', 'koband'); ?></a></button>
							</div>
					<!--</div>-->
				</div>
			</div>
		<?php endwhile; ?>
	<?php } 
	else 
	{
       echo "end-media";
	}

	wp_reset_postdata();

	die();

}

/* 
===============================================
 Load more Tour with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_tour', 'koband_load_tour' );
add_action( 'wp_ajax_koband_load_tour', 'koband_load_tour' );

function koband_load_tour(){
	
	$paged = $_POST["page"]+2;
	$tour = new WP_Query( array(
		'post_type' => 'tour',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 5,

	));

	if ( $tour->have_posts() ) { ?>
        <?php while ( $tour->have_posts() ) : $tour->the_post();
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
            <div class="divTableRow">
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
	<?php }  
	else 
	{
       echo "end-tour";
	}

	wp_reset_postdata();

	die();

}


 ?>