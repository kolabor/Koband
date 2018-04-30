<?php
/**
 * 
 *
 * Koband Theme Tag
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
	<div id="content" role="main">
		<header class="archive-header">
		<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
		</h1>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->
		<div class="row author-rows">
		<?php
		/* Start the Loop */
		if (have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
                        <a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
                        <div class="card-body">
                            <div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php echo __('READ MORE →', 'koband');?></a></span>
                                    </div>
                                </div>
                        </div>
                    </div> 
					<?php //get_template_part( 'content', get_post_format() ); ?>
				</div>
				<!-- * Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 -->
			<?php endwhile; //koband_content_nav( 'nav-below' );?>
			<?php else : ?>
			<?php //get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div>
		<div class="row author-rows"> 
		<?php
		$tags = single_term_title("", false);
		$tagid = get_tags( $tags );
		$args_tags_tour = array
	    (		
	    	 'tags' => $tags,	
		 	 'post_type' => 'tour',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
		);
	    $tags_tour_posts = new WP_Query( $args_tags_tour );
	    if ( $tags_tour_posts->have_posts() ) : ?>
	    	<header class="archive-header">
		<h1 class="archive-title"><?php printf( __( 'Tag Tour Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
		</h1>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->
	    <!--start loop-->
	        <div class="divTable">
	            <div class="divTableBody koband_post_tour">
	                <div class="divTableRow">
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Date', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Country', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('City', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Address', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('ZipCode', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Venue', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Ticket status', 'koband');?></div>
	                    <div class="divTableHeading border_first_color bg_second_color main_font_color"><?php echo __('Store', 'koband');?></div>
	                </div>
	                      
	                <?php

	    	        while ( $tags_tour_posts->have_posts() ) : $tags_tour_posts->the_post(); 
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
	</div>
	</div><!-- #content -->
</div><!-- container -->
<?php get_footer(); ?>