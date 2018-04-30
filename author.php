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
	<header class="author-header"> <?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
	    <h1><?php echo __('Posts by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
			<?php if (get_the_author_meta('description')) : ?>
				<div class="author-description"><?php the_author_meta('description'); ?></div>
			<?php endif; ?>
	</header>
	<div class="row author-rows">
		<?php
		global $current_user;                     
	    $args_author = array(
	    	'author' =>  $current_user->ID,		
		 	'post_type' => 'post',   
			'post_staus'=> 'publish',
			'posts_per_page' => -1,
			 
		); 
	    $args_author_media = array(
	    	'author' =>  $current_user->ID,		
		 	'post_type' => 'media',   
			'post_staus'=> 'publish',
			'posts_per_page' => -1,
			 
		);
		$args_author_album = array (
			'author' =>  $current_user->ID,
			'post_type' => 'album',
			'post_staus'=> 'publish',
			'posts_per_page' => -1,


		);
		$args_author_singles = array(
		  	'author' =>  $current_user->ID,
			'post_type' => 'singles',
			'post_staus'=> 'publish',
			'posts_per_page' => -1,		  
		);
		$args_author_tour = array(	
			'author' =>  $current_user->ID,
		 	'post_type' => 'tour',   
			'post_staus'=> 'publish',
			'posts_per_page' => -1,
		);
		$current_user_posts = get_posts( $args );
		$total = count($current_user_posts); 
		$author_posts = new WP_Query($args_author);
		if ($author_posts->have_posts() ) : ?>
				<!--start loop --> 
			<?php while ( $author_posts->have_posts() ) : $author_posts->the_post(); ?>
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
				</div>
        	<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="row author-rows">
		<?php $author_media = new WP_Query($args_author_media); 
		if ($author_media->have_posts() ) : ?>
		<header class="author-header"> <?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
	    <h1><?php echo __('Media Posted by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
			<?php if (get_the_author_meta('description')) : ?>
				<div class="author-description"><?php the_author_meta('description'); ?></div>
			<?php endif; ?>
		</header>
		 	<!-- start loop --> 
				<?php 
				while ( $author_media->have_posts() ) : $author_media->the_post();
				$post_id = get_the_ID(); ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					    <div class="hovereffect">
					      <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php the_post_thumbnail(array(230,230)); ?>"></a>
				            <div class="overlay">
				                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
									<a class="info" first_color" href="<?php the_permalink();?>"><?php echo __('Go to Gallery', 'koband'); ?></a>
				            </div>
					    </div>
					</div>
				<?php endwhile;?>
			<!-- loop ends here -->	
	   	<?php endif;?>
	</div>
	<div class="row author-rows">
	   	<?php $author_album_posts = new WP_Query($args_author_album); ?>

	
	   	<?php if ($author_album_posts->have_posts() ) : ?>
	   	<header class="author-header"> <?php
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
		    <h1><?php echo __('Albums Posted by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
				<?php if (get_the_author_meta('description')) : ?>
					<div class="author-description"><?php the_author_meta('description'); ?></div>
				<?php endif; ?>
		</header>
		<?php while( $author_album_posts->have_posts() ) : $author_album_posts->the_post();
		$post_id = get_the_ID();?>
		<div class="container">
			<div class="row album-head border_first_color main_font_color">
				<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
					<div class="col-sm-3 main_font_color"><?php _e('Album Name:<br>', 'koband');?><span class="main_font_color"><?php the_title();?></span></div>

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
					<div class="row song-list border_first_color bg_second_color main_font_color">			
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
		<?php endwhile;?>
				<!-- loop ends here -->	
		<?php endif; ?>
	</div>
	<div class="row author-rows">
		<?php $author_single_posts = new WP_Query($args_author_singles); ?>
		<?php if ($author_single_posts->have_posts() ) : ?>
		<header class="author-header"> <?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
	    <h1><?php echo __('Singles Posted by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
			<?php if (get_the_author_meta('description')) : ?>
				<div class="author-description"><?php the_author_meta('description'); ?></div>
			<?php endif; ?>
		</header>
		<?php while ($author_single_posts->have_posts() ) : $author_single_posts->the_post();
			$post_id = get_the_ID(); 
		  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
				$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
				$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
				$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
					
			<div class="container">
				<div class="row album-head border_first_color">
					<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
						<div class="col-sm-3 main_font_color"><?php echo __('Name:<br>', 'koband');?><span class="main_font_color"><?php the_title();?></span></div>
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
				<div class="row song-list border_first_color bg_second_color main_font_color">			
				<?php foreach ($single_detail as  $value_single_detail) { ?>
					<div class="col"><?php if(isset($value_single_detail)) {echo $value_single_detail;} ?></div>
				<?php } ?> 
				</div>

				<div class="row album-head border_first_color main_font_color">
					<div class="col-sm-5"><?php echo __('Store Name:', 'koband');?></div>
					<div class="col-sm-5"><?php echo __('Store Link:', 'koband');?></div>
				</div>
				<div class="row song-list border_first_color bg_second_color main_font_color">
					<?php if(isset($single_store[0])) { ?>
						<?php foreach ($single_store[0] as  $value_single_store) { ?>
						<div class="col-sm-5"><?php if(isset($value_single_store['name'])) {echo $value_single_store['name'];}?></div>
						<div class="col-sm-6 btn-buy"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a></div> 
					<?php } } ?>
				</div>
			</div><!-- container single-songs-show-hide -->	
			</div><!-- container -->		
		<?php endwhile;?>
				<!-- loop ends here -->	
		<?php endif; ?>
	</div>
	<div class="row author-rows">	
		<?php $author_tour_posts = new WP_Query( $args_author_tour );
    	if ( $author_tour_posts->have_posts() ) : ?>
    	<header class="author-header"> <?php
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
	    <h1><?php echo __('Tours Posted by ', 'koband');?><?php echo $curauth->nickname; ?>:</h1>
			<?php if (get_the_author_meta('description')) : ?>
				<div class="author-description"><?php the_author_meta('description'); ?></div>
			<?php endif; ?>
		</header>
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

    	        while ( $author_tour_posts->have_posts() ) : $author_tour_posts->the_post(); 
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
    	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>