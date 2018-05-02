<?php
/**
 * The Template for displaying single posts for album
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>

<div class="container">
	<?php if (have_posts() ) : 
		while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID(); ?>
	<div class="row single_page_row">
		<div class="container">
		<div class="row single_page_title">
			<h1><?php echo __('Album Name:<br>', 'koband');?><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="single_page_cover"><?php the_post_thumbnail(array(400,400));?></div>
			</div>

			<div class="col-sm-8">
				<div class="row">
					<?php 
			        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
					$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
					$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
					$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
						
					<div class="col-sm-6 album_title main_font_color"><?php echo __('Date:<br>', 'koband');?> <span class="main_font_color"><?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?></span></div>
				     <div class="col-sm-6 album_title main_font_color"><?php echo __('Length:<br>', 'koband');?><span class="main_font_color"><?php if(isset($album_length[0])) { echo  $album_length[0]; } ?></span></div>
			
				</div>
				<div class="container">
					<div class="row album-info">
							<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Name', 'koband');?></div>
							<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Length', 'koband');?></div>
							<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Details', 'koband');?></div>
					</div>
					<div class="row song-list main_font_color">			
						<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
							<div class="col-sm-4 border_bottom line"><?php if(isset($value_song_details['name-details'])) {echo $value_song_details['name-details'];}?></div>
							<div class="col-sm-4 border_bottom line"><?php if(isset($value_song_details['length'])) {echo $value_song_details['length'];} ?></div>
							<div class="col-sm-4 border_bottom "><?php if(isset($value_song_details['detail'])) {echo $value_song_details['detail'];} ?></div>
								
							<?php } ?> 
					</div>
						<div class="col-sm-12 row album-head border_first_color main_font_color">
							<div class="col-sm-3"><?php echo __('Store Name', 'koband');?></div>
							<div class="col-sm-3"><?php echo __('Store Link', 'koband');?></div>
						</div>
				</div>
				
				<?php 
						foreach ($album_song_store[0] as  $value_song_store) { ?>
						<div class="col-sm-12 row song-list border_second_color main_font_color">
						<div class="col-sm-3 line"><?php if(isset($value_song_store['name-store'])) {echo $value_song_store['name-store'];}?></div>
						<div class="col-sm-3 btn-buy line"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a></div> </div>
					<?php } ?> 
			</div> 
		</div>
		</div>
	</div>
		<?php endwhile;?>
	<?php  endif; ?>
</div>

<?php 
get_footer(); ?>