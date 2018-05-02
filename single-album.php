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

<div class="contenier">
	<?php if (have_posts() ) : 
		while ( have_posts() ) : the_post(); 
		$post_id = get_the_ID(); ?>
	<div class="row">
		<div class="row">
			<h2><?php echo __('Album Name:<br>', 'koband');?><?php the_title();?></h2>
		</div>
		<div class="row">
			<div class="col-sm-4"><?php the_post_thumbnail(array(400,400));?></div>
			<div class="col-sm-8"><?php 
		        $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
				$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
				$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
				$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
					
				<?php echo __('Date:<br>', 'koband');?><?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?>
			    <?php echo __('Length:<br>', 'koband');?><?php if(isset($album_length[0])) { echo  $album_length[0]; } ?>
			
			
					<?php echo __('Song Name', 'koband');?>
					<?php echo __('Song Length', 'koband');?>
					<?php echo __('Song Details', 'koband');?>
							
				<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
					<?php if(isset($value_song_details['name-details'])) {echo $value_song_details['name-details'];}?>
					<?php if(isset($value_song_details['length'])) {echo $value_song_details['length'];} ?>
					<?php if(isset($value_song_details['detail'])) {echo $value_song_details['detail'];} ?>
						
					<?php } ?> 
				
				
					<?php echo __('Store Name', 'koband');?>
					<?php echo __('Store Link', 'koband');?>
				
				
					<?php 
						foreach ($album_song_store[0] as  $value_song_store) { ?>
						
						<?php if(isset($value_song_store['name-store'])) {echo $value_song_store['name-store'];}?>
						<a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a>
					<?php } ?>
			</div> 
		</div>
	</div>
		<?php endwhile;?>
	<?php  endif; ?>
</div>

<?php 
get_footer(); ?>