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
get_header('noscroll'); ?>
<div class="container tag_page search-holder">
	<header class="archive-header">
		<h4 class="archive-title"><?php printf( esc_html__( 'Tag News Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
		</h4>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo esc_html( tag_description()); ?></div>
			<?php endif; ?>
	</header><!-- .archive-header -->
	<div class="row author-rows">
		<?php
		$tags = single_term_title("", false);
		$tagid = get_tags( $tags );
		$args_tags_news = array(
	    	 'tag_slug__in' => $tags,			
		 	 'post_type' => 'post',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => 3,
				 
		);
		$news_tags_posts = new WP_Query($args_tags_news);
		if ( $news_tags_posts->have_posts() ) : ?>
			<!-- start loop --> 										
				<?php while ( $news_tags_posts->have_posts() ) : $news_tags_posts->the_post(); ?>
					<div class="col-md-4">
						<div class="card mb-4 box-shadow">
							<div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4 ); ?></a></h2></div>
							<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(220, 180)); ?></a>
							<div class="card-body">
								<div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php echo esc_html__('READ MORE →', 'koband');?></a>
											</span>
										</div>
									</div>
							</div>
						</div>
					</div>	
				<?php endwhile; ?>	
					<!-- loop ends here -->
		<?php endif; ?>
	</div>
	<div class="row author-rows"> 
		<?php
		$tags = single_term_title("", false);
		$tagid = get_tags( $tags );
		$args_tags_tour = array
	    (		
	    	 'tag_slug__in' => $tags,	
		 	 'post_type' => 'tour',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
		);
	    $tags_tour_posts = new WP_Query( $args_tags_tour );
	    	if ( $tags_tour_posts->have_posts() ) : ?>
	   			<header class="archive-header">
					<h4 class="archive-title"><?php printf( esc_html__( 'Tag Tour Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
					</h4>
				<?php if ( tag_description() ) : // Show an optional tag description ?>
						<div class="archive-meta"><?php echo esc_html(tag_description()); ?></div>
				<?php endif; ?>
				</header><!-- .archive-header -->
			    <!--start loop-->
	        	<div class="divTable">
          			<div class="divTableBody koband_post_tour">
             		    <div class="divTableRow">
                  		 	<div class="divTableHeading border_first_color main_font_color"><?php echo esc_html__('Date', 'koband');?></div>
                    		<div class="divTableHeading border_first_color main_font_color"><?php echo esc_html__('Location', 'koband');?></div>
                   			<div class="divTableHeading border_first_color main_font_color"><?php echo esc_html__('Venue', 'koband');?></div>
                  			<div class="divTableHeading border_first_color main_font_color"><?php echo esc_html__('Ticket', 'koband');?></div>
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
                    		<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_date[0])) { echo esc_attr($tour_date[0]); } ?></div>
                    		<div class="divTableCell border_first_color main_font_color main_font"><?php if(isset($tour_country[0])) { echo esc_attr($tour_country[0]); } ?> / <?php if(isset($tour_city[0]))  { echo esc_attr($tour_city[0]); } ?></div>
                    		<div class="divTableCell border_first_color main_font_color"><a class="first_color venue_name main_font" href="<?php the_permalink();?>" target="_blank" ><?php if(isset($tour_venuename[0]))  { echo esc_attr($tour_venuename[0]); } ?></a></div>
                    		<div class="divTableCell border_first_color main_font_color ticket main_font"><?php if($tour_ticket[0] == 'avaliable'){ ?>

		                        <?php if(isset($tour_ticketlink[0])) {?>
		                        	<a href="<?php echo  esc_url($tour_ticketlink[0]);?>"><span class="btn_tour onsale_btn border_color main_font"><?php echo esc_html__('On Sale', 'koband');?></span></a><?php } ?>

		                     	<?php }elseif ($tour_ticket[0] == 'soldout') { ?>
		                          	<span class="btn_tour soldout_btn border_color main_font"><?php echo esc_html__('Sold Out', 'koband');?></span>
                   				<?php  } ?>
                        	</div>
                    	
                    	</div>
               			<?php endwhile;?> <!-- end of the loop.  -->
           			</div>
        		</div><!--divTable-->
	  		<?php endif;?>
	</div>
	<div class="row author-rows">
		<?php
		$args_tags_album = array(
			'tag_slug__in' => $tags,
		  	'post_type' => 'album',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1
			);
		$args_tags_singles = array(
		  	'tag_slug__in' => $tags,
		  	'post_type' => 'singles',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1		  
  			); 
	
		$tags_album_posts = new WP_Query($args_tags_album); ?>
	   	<?php if ($tags_album_posts->have_posts() ) : ?>
	   		<header class="archive-header">
				<h4 class="archive-title"><?php printf( esc_html__( 'Tag Album Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
				</h4>
				<?php if ( tag_description() ) : // Show an optional tag description ?>
					<div class="archive-meta"><?php echo esc_html(tag_description()); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->
		<?php while( $tags_album_posts->have_posts() ) : $tags_album_posts->the_post();
				$post_id = get_the_ID();?>
				
		<div class="container">
			<div class="row album-head border_first_color main_font_color">
				<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank" ><?php the_post_thumbnail(array(70,70));?></a></div>
				<div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Album Name:', 'koband');?><br> <a href="<?php the_permalink();?>" target="_blank" ><span class="main_font_color"><?php the_title();?></span></a></div>

		        <?php 
		        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
				$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
				$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
				$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false);
				?>
					
				<div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color"><?php if(isset($album_date[0])) { echo esc_attr($album_date[0]); } ?></span></div>
			    <div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Length:', 'koband');?><br> <span class="main_font_color"><?php if(isset($album_length[0])) { echo esc_attr($album_length[0]); } ?></span></div>
			    <div class="col-sm-1 album-up-down-buttons">
			    	<span class="btn btn-sm album-song">
				    	<a class="btn btn-sm show-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
				    	<a class="btn btn-sm hide-album-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
			    	</span>
			    </div>
			</div><!-- container -->        
			<div class="container album-songs-show-hide bg">
				<!-- Labels -->
				<div class="row album-info">
					<div class="col-sm-4 songs-head main_font_color"><?php echo esc_html__('Song Name', 'koband');?></div>
					<div class="col-sm-4 songs-head main_font_color"><?php echo esc_html__('Song Length', 'koband');?></div>
					<div class="col-sm-4 songs-head main_font_color"><?php echo esc_html__('Song Details', 'koband');?></div>
				</div>
				<div class="row song-list main_font_color">			
				<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
					<div class="col-sm-4 song_info border_bottom line"><?php if(isset($value_song_details['name-details'])) {echo esc_attr($value_song_details['name-details']);}?></div>
					<div class="col-sm-4 song_info border_bottom line"><?php if(isset($value_song_details['length'])) {echo esc_attr($value_song_details['length']);} ?></div>
					<div class="col-sm-4 song_info border_bottom "><?php if(isset($value_song_details['detail'])) {echo esc_attr($value_song_details['detail']);} ?></div>
				<?php } ?> 
				</div>
				<!-- Labels -->
				<div class="row album-store border_first_color main_font_color">
					<div class="col-sm-5 store"><?php echo esc_html__('Store Name', 'koband');?></div>
					<div class="col-sm-5 store st_link"><?php echo esc_html__('Store Link', 'koband');?></div>
				</div>
				<?php 
					foreach ($album_song_store[0] as  $value_song_store) { ?>
					<div class=" row song-list border_second_color main_font_color">
					<div class="col-sm-5 store_name line"><?php if(isset($value_song_store['name-store'])) {echo esc_attr($value_song_store['name-store']);}?></div>
					<div class="col-sm-6 store_link border_color btn-buy line"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> </div>
				<?php } ?> 
							
			</div><!-- container album-songs-show-hide -->
		</div><!-- container -->
		<?php endwhile; endif; ?> <!-- end of the loop. -->
	</div>
	<div class="row author-rows">
		<?php $tags_single_posts = new WP_Query($args_tags_singles); ?>
			<?php if ($tags_single_posts->have_posts() ) : ?>
				<header class="archive-header">
					<h4 class="archive-title"><?php printf( esc_html__( 'Tag Single Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
					</h4>
						<?php if ( tag_description() ) : // Show an optional tag description ?>
							<div class="archive-meta"><?php echo esc_html(tag_description()); ?></div>
						<?php endif; ?>
				</header><!-- .archive-header -->
			<?php while ($tags_single_posts->have_posts() ) : $tags_single_posts->the_post();
				$post_id = get_the_ID(); ?>
			
				<?php 
		  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
				$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
				$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
				$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); 
				?>
			<div class="container">
				<div class="row album-head border_first_color">
					<div class="col-sm-1 cover_img"><a href="<?php the_permalink();?>" target="_blank"><?php the_post_thumbnail(array(70,70));?></a></div>
					<div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Name:', 'koband');?><br> <a href="<?php the_permalink();?>" target="_blank"><span class="main_font_color"><?php the_title();?></span></a></div>
					<div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color"><?php if(isset($single_date[0])) 	{ echo esc_attr($single_date[0]); } ?></span></div>
					<div class="col-sm-3 album_title main_font_color"><?php echo esc_html__('Length:', 'koband');?><br> <span class="main_font_color"><?php if(isset($single_length[0])) 	{ echo esc_attr($single_length[0]); } ?></span></div>

					<div class="col-sm-1 single-up-down-buttons">
						<span class="btn btn-sm single-song">
					    	<a class="btn btn-sm show-single-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Down.png"/></a>
					    	<a class="btn btn-sm hide-single-song first_color"><img src="<?php echo esc_url(get_template_directory_uri()); ?>//img/Arrow-Up.png"/></a>
				    	</span>
					</div>
				</div>
				<div class="container single-songs-show-hide bg">
					<div class="row album-head border_first_color">
						<div class="col-sm-4 songs-head main_font_color"><?php echo esc_html__('Song Details', 'koband');?></div>
						</div>
						<div class="row song-list border_second_color  main_font_color">			
							<?php foreach ($single_detail as  $value_single_detail) { ?>
								<div class="col"><?php if(isset($value_single_detail)) {echo esc_attr($value_single_detail);} ?></div>
							<?php } ?> 
						</div></br>

					<div class="row album-head border_first_color main_font_color">
						<div class="col-sm-5 store"><?php echo esc_html__('Store Name:', 'koband');?></div>
						<div class="col-sm-5 store"><?php echo esc_html__('Store Link:', 'koband');?></div>
					</div>
					<div class="row song-list-sinlge border_second_color main_font_color">
					<?php if(isset($single_store[0])) { ?>
						<?php foreach ($single_store[0] as  $value_single_store) { ?>

						<div class="col-sm-5 store_name line"><?php if(isset($value_single_store['name'])) {echo esc_attr($value_single_store['name']);}?></div>
						<div class="col-sm-6 store_link border_color btn-buy line font_size"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> 
						<?php } } ?>
					</div>
				</div><!-- container single-songs-show-hide -->	
			</div><!-- container -->
		<?php endwhile; endif; ?>
	</div>
	<div class="row author-rows">
		<?php
	    $args_tags_media = array(
	    	 'tag_slug__in' => $tags,	
		 	 'post_type' => 'media',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => -1,
		);
	    $tags_media_posts = new WP_Query($args_tags_media);
	    	if ($tags_media_posts->have_posts() ) : ?>
	 			<!-- start loop -->
	 		<header class="archive-header">
				<h4 class="archive-title"><?php printf( esc_html__( 'Tag Media Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
				</h4>
				<?php if ( tag_description() ) : // Show an optional tag description ?>
					<div class="archive-meta"><?php echo esc_html(tag_description()); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header --> 
		<?php while ( $tags_media_posts->have_posts() ) : $tags_media_posts->the_post();
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
</div><!-- container -->
<?php get_footer();?>

