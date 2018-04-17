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
<div id="Discography" class="container">
	<h1>Discography Temp</h1>
		
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
	<h3><div id="albums-title"><?php _e('Albums', 'koband');?></div></h3>
    <?php if ($album_posts->have_posts() ) : 
	while( $album_posts->have_posts() ) : $album_posts->the_post();
		
	$post_id = get_the_ID();?>
	<div class="container">
		<div class="row">
			<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
			<div class="col-sm-3"><?php _e('Name:', 'koband');?><?php the_title();?></div>

	        <?php $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
			
			$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
			$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
			$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>

				
			<div class="col-sm-3"><?php _e('Date:', 'koband');?><?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?></div>
		    <div class="col-sm-3"><?php _e('Length:', 'koband');?><?php if(isset($album_length[0])) { echo  $album_length[0]; } ?></div>
		    <div class="col-sm-1 ">
		    	<span class="btn btn-sm album-song">
			    	<a class="btn btn-sm show-album-song">&#8897;</a>
			    	<a class="btn btn-sm hide-album-song">&#8896;</a>
		    	</span>
		    </div>
		</div>        
		<div class="container album-songs-show-hide">
			<div class="row">
				<div class="col-sm-4 name"><?php _e('Song Name', 'koband');?></div>
				<div class="col-sm-4"><?php _e('Song Length', 'koband');?></div>
				<div class="col-sm-4"><?php _e('Song Details', 'koband');?></div>
			</div>
			<div class="row" style="background-color: #d6d6d6; border-bottom: 1px solid #000;">			
			<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
				<div class="col-sm-4"><?php echo $value_song_details['name-details']; ?></div>
				<div class="col-sm-4"><?php echo $value_song_details['length']; ?></div>
				<div class="col-sm-4"><?php echo $value_song_details['detail']; ?></div>
					
				<?php } ?> 
			</div>
		
			<div class="row">
				<div class="col-sm-6"><?php _e('Store Name', 'koband');?></div>
				<div class="col-sm-6"><?php _e('Store Link', 'koband');?></div>
			</div>
			<div class="row">
				<?php 
					foreach ($album_song_store[0] as  $value_song_store) { ?>
					<div class="col-sm-6"><?php echo $value_song_store['name-store']; ?></div>
					<div class="col-sm-6"><?php echo $value_song_store['link']; ?>"</div> 
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
		<h3><div id="single-title"><?php _e('Singles', 'koband');?></div></h3>
		<?php if ($single_posts->have_posts() ) :
			while ($single_posts->have_posts() ) : $single_posts->the_post();
			$post_id = get_the_ID(); ?>
			
			  		<?php 
			  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
					$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
					$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-1"><?php the_post_thumbnail(array(70,70));?></div>
				<div class="col-sm-3"><?php _e('Name:', 'koband');?><?php the_title();?></div>
				<div class="col-sm-3"><?php _e('Date:', 'koband');?><?php if(isset($single_date[0])) 	{ echo  $single_date[0]; } ?></div>
			    <div class="col-sm-3"><?php _e('Length:', 'koband');?><?php if(isset($single_length[0])) 	{ echo  $single_length[0]; } ?></div>
			   	<div class="col-sm-1 ">
			    	<span class="btn btn-sm single-song">
				    	<a class="btn btn-sm show-single-song">&#8897;</a>
				    	<a class="btn btn-sm hide-single-song">&#8896;</a>
			    	</span>
		   		</div>
			</div>
			<div class="container single-songs-show-hide">
				<div class="row">
					<div class="col-sm-5"><?php _e('Store Name', 'koband');?></div>
					<div class="col-sm-5"><?php _e('Store Link', 'koband');?></div>
				</div>
				<div class="row">
				<?php foreach ($single_store[0] as  $value_single_store) { ?>
					<div class="col-sm-5"><?php echo $value_single_store['name']; ?></div>
					<div class="col-sm-5"><?php echo $value_single_store['link']; ?></div>
				<?php } ?>
				</div>
			</div>	
		</div>
		<?php endwhile; endif; ?>

</div>