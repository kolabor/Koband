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

get_header('noscroll'); ?>
<div class="container search-holder">
	<div class="row">
		<header class="archive-header">
			<h1 class="archive-title">
				<?php printf( __( 'Posts of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h1>
		</header>
	</div>
	<div class="row author-rows">
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
	                    <div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4 ); ?></a></h2></div>
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
				</div>
        	<?php endwhile; ?>
		<?php endif; ?> 
	</div>
	<div class="row author-rows"> 
		<?php
		$category = single_term_title("", false);
		$catid = get_cat_ID( $category );
		$args_category_tour = array
	    (		
	    	 'category_name' => $category,	
		 	 'post_type' => 'tour',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
		);
	    $category_tour_posts = new WP_Query( $args_category_tour );
	    if ( $category_tour_posts->have_posts() ) : ?>
	    	<header class="archive-header">
				<h1 class="archive-title">
					<?php printf( __( 'Tours of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h1>
			</header>
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

	    	        while ( $category_tour_posts->have_posts() ) : $category_tour_posts->the_post(); 
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
	                    	<div class="divTableCell border_first_color main_font_color"><a href="<?php the_permalink();?>" target="_blank" ><?php if(isset($tour_venuename[0]))  { echo  $tour_venuename[0]; } ?></a></div>
	                    	<div class="divTableCell border_first_color main_font_color"><?php if(isset($tour_ticket[0]))  { echo  $tour_ticket[0]; } ?></div>
	                    	<div class="divTableCell btn-buy border_first_color main_font_color"><?php if(isset($tour_ticketlink[0])) {?> <a href="<?php echo  $tour_ticketlink[0];?>"><?php echo __('Buy Here', 'koband');?></a><?php } ?></div>
	                    </div>
	                <?php endwhile;?> <!-- end of the loop.  -->
	            </div>
	        </div><!--divTable-->
	    <?php endif;?>
	</div>
	<div class="row author-rows">
		<?php

		$args_category_album = array(
			'category_name' => $category,
		  	'post_type' => 'album',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1


			);
		$args_category_singles = array(
		  	'category_name' => $category,
		  	'post_type' => 'singles',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1		  
  
			); 
		$category_album_posts = new WP_Query($args_category_album); ?>
	   	<?php if ($category_album_posts->have_posts() ) : ?>
	   		<header class="archive-header">
				<h1 class="archive-title">
					<?php printf( __( 'Albums of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h1>
			</header>
			<?php while( $category_album_posts->have_posts() ) : $category_album_posts->the_post();
				
					$post_id = get_the_ID();?>
				
		<div class="container">
			<div class="row album-head border_first_color main_font_color">
				<div class="col-sm-1"><a href="<?php the_permalink();?>" target="_blank" ><?php the_post_thumbnail(array(70,70));?></a></div>
					<div class="col-sm-3 main_font_color"><?php echo __('Album Name:<br>', 'koband');?><a href="<?php the_permalink();?>" target="_blank" ><span class="main_font_color"><?php the_title();?></span></a></div>

			        <?php 
			        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
					$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
					$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
					$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
						
					<div class="col-sm-3 main_font_color"><?php echo __('Date:<br>', 'koband');?> <span class="main_font_color"><?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?></span></div>
				    <div class="col-sm-3 main_font_color"><?php echo __('Length:<br>', 'koband');?><span class="main_font_color"><?php if(isset($album_length[0])) { echo  $album_length[0]; } ?></span></div>
				    <div class="col-sm-1 album-up-down-buttons">
				    	<span class="btn btn-sm album-song">
					    	<a class="btn btn-sm show-album-song first_color"><i class="fas fa-caret-down"></i></a>
					    	<a class="btn btn-sm hide-album-song first_color"><i class="fas fa-caret-up"></i></a>
				    	</span>
				    </div>
				</div><!-- container -->        
				<div class="container album-songs-show-hide">
					<!-- Labels -->
					<div class="row album-head border_first_color">
						<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Name', 'koband');?></div>
						<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Length', 'koband');?></div>
						<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Details', 'koband');?></div>
					</div>
					<div class="row song-list border_first_color main_font_color">			
					<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
						<div class="col-sm-4"><?php if(isset($value_song_details['name-details'])) {echo $value_song_details['name-details'];}?></div>
						<div class="col-sm-4"><?php if(isset($value_song_details['length'])) {echo $value_song_details['length'];} ?></div>
						<div class="col-sm-4"><?php if(isset($value_song_details['detail'])) {echo $value_song_details['detail'];} ?></div>
							
						<?php } ?> 
					</div>
					<!-- Labels -->
					<div class="row album-head border_first_color main_font_color">
						<div class="col-sm-6"><?php echo __('Store Name', 'koband');?></div>
						<div class="col-sm-6"><?php echo __('Store Link', 'koband');?></div>
					</div>
					<div class="row song-list main_font_color">
						<?php 
							foreach ($album_song_store[0] as  $value_song_store) { ?>
							<div class="col-sm-6"><?php if(isset($value_song_store['name-store'])) {echo $value_song_store['name-store'];}?></div>
							<div class="col-sm-6 btn-buy"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a></div> 
						<?php } ?> 
					</div>			
				</div><!-- container album-songs-show-hide -->
			
			</div><!-- container -->
		<?php endwhile; endif; ?> <!-- end of the loop. -->
	</div>
	<div class="row author-rows">
		<?php $category_single_posts = new WP_Query($args_category_singles); ?>
		<?php if ($category_single_posts->have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php printf( __( 'Singles of category: %s', 'koband'),
					single_cat_title( '', false )); ?>
				</h1>
			</header>
			<?php while ($category_single_posts->have_posts() ) : $category_single_posts->the_post();
				$post_id = get_the_ID(); ?>
			
				<?php 
		  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
				$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
				$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
				$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
					
			<div class="container">
				<div class="row album-head border_first_color">
					<div class="col-sm-1"><a href="<?php the_permalink();?>" target="_blank" ><?php the_post_thumbnail(array(70,70));?></a></div>
						<div class="col-sm-3 main_font_color"><?php echo __('Name:<br>', 'koband');?><a href="<?php the_permalink();?>" target="_blank" ><span class="main_font_color"><?php the_title();?></span></a></div>
						<div class="col-sm-3 main_font_color"><?php echo __('Date:<br>', 'koband');?><span class="main_font_color"><?php if(isset($single_date[0])) 	{ echo  $single_date[0]; } ?></span></div>
						<div class="col-sm-3 main_font_color"><?php echo __('Length:<br>', 'koband');?><span class="main_font_color"><?php if(isset($single_length[0])) 	{ echo  $single_length[0]; } ?></span></div>

					<div class="col-sm-1 single-up-down-buttons">
						<span class="btn btn-sm single-song">
					    	<a class="btn btn-sm show-single-song first_color"><i class="fas fa-caret-down"></i></a>
					    	<a class="btn btn-sm hide-single-song first_color"><i class="fas fa-caret-up"></i></a>
				    	</span>
					</div>
				</div>
			<div class="container single-songs-show-hide">
				<div class="row album-head border_first_color">
					<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Details', 'koband');?></div>
				</div>
				<div class="row song-list border_first_color main_font_color">			
				<?php foreach ($single_detail as  $value_single_detail) { ?>
					<div class="col"><?php if(isset($value_single_detail)) {echo $value_single_detail;} ?></div>
				<?php } ?> 
				</div>

				<div class="row album-head border_first_color main_font_color">
					<div class="col-sm-5"><?php echo __('Store Name:', 'koband');?></div>
					<div class="col-sm-5"><?php echo __('Store Link:', 'koband');?></div>
				</div>
				<div class="row song-list border_first_color main_font_color">
					<?php if(isset($single_store[0])) { ?>
						<?php foreach ($single_store[0] as  $value_single_store) { ?>
						<div class="col-sm-5"><?php if(isset($value_single_store['name'])) {echo $value_single_store['name'];}?></div>
						<div class="col-sm-6 btn-buy"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a></div> 
					<?php } } ?>
				</div>
			</div><!-- container single-songs-show-hide -->	
			</div><!-- container -->
		<?php endwhile; endif; ?>
	</div>
	<div class="row author-rows">
		<?php
	    $args_category_media = array(
	    	 'category_name' => $category,		
		 	 'post_type' => 'media',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
			 
		);
	    $category_media_posts = new WP_Query($args_category_media);
	    if ($category_media_posts->have_posts() ) : ?>
	 	<!-- start loop -->
	 	<header class="archive-header">
			<h1 class="archive-title">
				<?php printf( __( 'Media of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h1>
		</header> 
			<?php 
			while ( $category_media_posts->have_posts() ) : $category_media_posts->the_post();
			$post_id = get_the_ID(); ?>
				<div class="col-lg-3 img-holder col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				      <a href="<?php the_permalink();?>"><?php the_post_thumbnail('gallery_thumb');?></a>
			            <div class="overlay">
			                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>

								<a class="info" href="<?php the_permalink();?>"><i class="fas fa-link"></i></a>

			            </div>
				    </div>
				</div>
			<?php endwhile;?>
		<!-- loop ends here -->	
   		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
