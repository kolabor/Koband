<?php
/**
 * 
 *
 * Template Name: Discography
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header();?> 
<div id="Discography" class="bg section">
	<div class="container">
	<h1>Discography</h1>		
	<?php

		$args_album = array (
				  	'post_type' => 'album',
				  	'post_staus'=> 'publish',
				 	'posts_per_page' => -1


					);
		$args_singles = array(
				  	'post_type' => 'singles',
				  	'post_staus'=> 'publish',
				 	'posts_per_page' => -1		  
		  
					);
/* 
================================================================================================================
												ALBUM SONG DETAILS
================================================================================================================
*/
	$album_posts = new WP_Query($args_album); ?>
	<h3><div class="albums-title"><?php _e('Albums', 'koband');?></div></h3>
    <?php if ($album_posts->have_posts() ) : 
	while( $album_posts->have_posts() ) : $album_posts->the_post();
		
	$post_id = get_the_ID();?>
	<div class="container">
		<div class="row album-head">
			<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
			<div class="col-sm-3"><?php _e('Album Name:<br>', 'koband');?><span><?php the_title();?></span></div>

	        <?php $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
			
			$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
			$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
			$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>

				
			<div class="col-sm-3"><?php _e('Date:<br>', 'koband');?> <span><?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?></span></div>
		    <div class="col-sm-3"><?php _e('Length:<br>', 'koband');?><span><?php if(isset($album_length[0])) { echo  $album_length[0]; } ?></span></div>
		    <div class="col-sm-1 album-up-down-buttons">
		    	<span class="btn btn-sm album-song">
			    	<a class="btn btn-sm show-album-song">&#8897;</a>
			    	<a class="btn btn-sm hide-album-song">&#8896;</a>
		    	</span>
		    </div>
		</div>        
		<div class="container album-songs-show-hide">
			<div class="row album-head">
				<div class="col-sm-4 songs-head"><?php _e('Song Name', 'koband');?></div>
				<div class="col-sm-4 songs-head"><?php _e('Song Length', 'koband');?></div>
				<div class="col-sm-4 songs-head"><?php _e('Song Details', 'koband');?></div>
			</div>
			<div class="row song-list">			
			<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
				<div class="col-sm-4"><?php if(isset($value_song_details['name-details'])) {echo $value_song_details['name-details'];}?></div>
				<div class="col-sm-4"><?php if(isset($value_song_details['length'])) {echo $value_song_details['length'];} ?></div>
				<div class="col-sm-4"><?php if(isset($value_song_details['detail'])) {echo $value_song_details['detail'];} ?></div>
					
				<?php } ?> 
			</div>
		
			<div class="row album-head">
				<div class="col-sm-6"><?php _e('Store Name', 'koband');?></div>
				<div class="col-sm-6"><?php _e('Store Link', 'koband');?></div>
			</div>
			<div class="row song-list">
				<?php 
					foreach ($album_song_store[0] as  $value_song_store) { ?>
					<div class="col-sm-6"><?php if(isset($value_song_store['name-store'])) {echo $value_song_store['name-store'];}?></div>
					<div class="col-sm-6 btn-buy"><a href="<?php if(isset($value_song_details['link'])) {echo $value_song_store['link'];}?>"><?php _e('Buy Here', 'koband');?></a></div> 
				<?php } ?> 
			</div>			
		</div>
	</div>
<?php endwhile; endif; ?> <!-- end of the loop. -->
<!-- 
================================================================================================================
												SINGLE SONG DETAILS
================================================================================================================
-->
		<?php $single_posts = new WP_Query($args_singles); ?>
		<h3><div class="single-title"><?php _e('Singles', 'koband');?></div></h3>
		<?php if ($single_posts->have_posts() ) :
			while ($single_posts->have_posts() ) : $single_posts->the_post();
			$post_id = get_the_ID(); ?>
			
			  		<?php 
			  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
					$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
					$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
		<div class="container">
			<div class="row album-head">
				<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
				<div class="col-sm-3"><?php _e('Name:<br>', 'koband');?><span><?php the_title();?></span></div>
				<div class="col-sm-3"><?php _e('Date:<br>', 'koband');?><span><?php if(isset($single_date[0])) 	{ echo  $single_date[0]; } ?></span></div>
			    <div class="col-sm-3"><?php _e('Length:<br>', 'koband');?><span><?php if(isset($single_length[0])) 	{ echo  $single_length[0]; } ?></span></div>
			   	<div class="col-sm-1 single-up-down-buttons">
			    	<span class="btn btn-sm single-song">
				    	<a class="btn btn-sm show-single-song">&#8897;</a>
				    	<a class="btn btn-sm hide-single-song">&#8896;</a>
			    	</span>
		   		</div>
			</div>
			<div class="container single-songs-show-hide">
				<div class="row album-head">
					<div class="col-sm-5"><?php _e('Store Name:', 'koband');?></div>
					<div class="col-sm-5"><?php _e('Buy:', 'koband');?></div>
				</div>
				<div class="row song-list">
				<?php foreach ($single_store[0] as  $value_single_store) { ?>
					<div class="col-sm-5"><?php if(isset($value_single_store['name'])) {echo $value_single_store['name'];}?></div>
					<div class="col-sm-6 btn-buy"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php _e('Buy Here', 'koband');?></a></div> 
				<?php } ?>
				</div>
			</div>	
		</div>
		<?php endwhile; endif; ?>

</div>
</div>