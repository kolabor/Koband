<?php
/**
 * The Template for displaying single posts for singles
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
			<h1><?php echo __('Single Name:<br>', 'koband');?><?php the_title();?></h1>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="single_page_cover"><?php the_post_thumbnail(array(400,400));?></div>
			</div>

			<div class="col-sm-8">
				<div class="row">
					<?php 
			  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
					$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
					$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
					$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
						
					<div class="col-sm-6 album_title main_font_color"><?php echo __('Date:<br>', 'koband');?> <span class="main_font_color"><?php if(isset($single_date[0])) 	{ echo  $single_date[0]; } ?></span></div>
				     <div class="col-sm-6 album_title main_font_color"><?php echo __('Length:<br>', 'koband');?><span class="main_font_color"><?php if(isset($single_length[0])) { echo  $single_length[0]; } ?></span></div>
			
				</div>
				<div class="container">
					<div class="row single-info">
							<div class="col-sm-4 songs-head main_font_color"><?php echo __('Song Lyrics', 'koband');?></div>
					</div>
					<div class="row song-list border_second_color  main_font_color">			
						<?php foreach ($single_detail as  $value_single_detail) { ?>
							<div class="col"><?php if(isset($value_single_detail)) {echo $value_single_detail;} ?></div>
						<?php } ?> 
						</div>
							<div class="col-sm-12 row album-head border_first_color main_font_color">
							<div class="col-sm-3"><?php echo __('Store Name', 'koband');?></div>
							<div class="col-sm-3"><?php echo __('Store Link', 'koband');?></div>
						</div>
				</div>
				
				<?php if(isset($single_store[0])) { ?>
					<?php foreach ($single_store[0] as  $value_single_store) { ?>
						<div class="col-sm-5 line"><?php if(isset($value_single_store['name'])) {echo $value_single_store['name'];}?></div>
						<div class="col-sm-6 btn-buy line"><a href="<?php if(isset($value_song_store['link'])) {echo $value_song_store['link'];}?>"><?php echo __('Buy Here', 'koband');?></a></div> 
				<?php } } ?>

			</div> 
		</div>
		</div>
	</div>
		<?php endwhile;?>
	<?php  endif; ?>
</div>

<?php 
get_footer(); ?>