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
		$post_id = get_the_ID(); 
		$album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
		$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
		$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
		$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false);?>
	<div class="row single_page_row">
		<div class="container">
			<div class="row single_page_title album_single_page">
				<div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Album Name:', 'koband');?><br> <?php the_title();?></div>	
				<div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color"><?php if(isset($album_date[0])) 	{ echo  esc_attr($album_date[0]); } ?></span></div>
			     <div class="col-sm-4 album_title_single main_font_color main_font"><?php echo esc_html__('Length:', 'koband');?><br> <span class="main_font_color"><?php if(isset($album_length[0])) { echo  esc_attr($album_length[0]); } ?></span></div>
			</div>
			<div class="row">
				<div class="col-sm-4 sng_alb_cvr">
					<div class="single_page_cover"><?php the_post_thumbnail(array(400,400));?></div>
				</div>
				<div class="col-sm-8 sng_alb_hld">
					<div class="container ">
						<div class="row album-info">
								<div class="col-sm-4 songs-head main_font_color  main_font"><?php echo esc_html__('Song Name', 'koband');?></div>
								<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Length', 'koband');?></div>
								<div class="col-sm-4 songs-head main_font_color main_font"><?php echo esc_html__('Song Details', 'koband');?></div>
						</div>
						<div class="row song-list main_font_color">			
							<?php foreach ($album_song_details[0] as  $value_song_details) { ?>
								<div class="col-sm-4 border_bottom line album_single_page_details main_font"><?php if(isset($value_song_details['name-details'])) {echo esc_attr($value_song_details['name-details']);}?></div>
								<div class="col-sm-4 border_bottom line album_single_page_details main_font"><?php if(isset($value_song_details['length'])) {echo esc_attr($value_song_details['length']);} ?></div>
								<div class="col-sm-4 border_bottom album_single_page_details main_font"><?php if(isset($value_song_details['detail'])) {echo esc_attr($value_song_details['detail']);} ?></div>		
								<?php } ?> 
						</div>
						<div class="row album-store border_first_color main_font_color main_font">
					<div class="col-sm-3 store sng_store"><?php echo esc_html__('Store Name', 'koband');?></div>
					<div class="col-sm-3 store sng_store st_link"><?php echo esc_html__('Store Link', 'koband');?></div>
				</div>
				
					<?php 
						foreach ($album_song_store[0] as  $value_song_store) { ?>
						<div class="col-sm-12 row song-list border_second_color main_font_color main_font">
						<div class="col-sm-3 store_name line"><?php if(isset($value_song_store['name-store'])) {echo esc_attr($value_song_store['name-store']);}?></div>
						<div class="col-sm-3 store_link border_color btn-buy line"><a class="first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div> </div>

						<?php } ?> 
					</div>
				</div> 
			</div><!--second row -->
		</div><!--second container -->
	</div><!--main row -->
	<?php endwhile; endif; ?>
</div> <!--main container -->

<?php get_footer(); ?>