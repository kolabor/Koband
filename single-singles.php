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
		$post_id = get_the_ID(); 
  		$single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
		$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
		$single_detail = get_post_meta($post_id, "ko_band_singles_detail", false ); 
		$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>
	<div class="row single_page_row">
		<div class="container">
			<div class="row single_page_title album_single_page">
			<div class="col-sm-4 album_title main_font_color"><?php echo esc_html__('Single Name:', 'koband');?><br><?php the_title();?></div>	
			<div class="col-sm-4 album_title main_font_color"><?php echo esc_html__('Date:', 'koband');?><br> <span class="main_font_color"><?php if(isset($single_date[0])) 	{ echo  esc_attr($single_date[0]); } ?></span></div>
		     <div class="col-sm-4 album_title main_font_color"><?php echo esc_html__('Length:', 'koband');?><br><span class="main_font_color"><?php if(isset($single_length[0])) { echo  esc_attr($single_length[0]); } ?></span></div>
			</div>
		<div class="row single_page_title">
			<h1></h1>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="single_page_cover"><?php the_post_thumbnail(array(400,400));?></div>
			</div>

			<div class="col-sm-8">
				<div class="container">
					<div class="row album-head single-info">
						<div class="col-sm-4 border_first_color main_font_color"><?php echo esc_html__('Song Details', 'koband');?></div>
					</div>
					<div class="row song-list border_first_color  main_font_color">   
					      <?php foreach ($single_detail as  $value_single_detail) { ?>
					      <div class="col"><?php if(isset($value_single_detail)) {echo esc_attr($value_single_detail);} ?></div>
					      <?php } ?> 
				    </div>
				    <div class="row album-head single-info">
						<div class="col-sm-4 border_first_color main_font_color"><?php echo esc_html__('Song Lyrics', 'koband');?></div>
					</div>
					<div class="row song-list border_first_color lyrics-singles main_font_color">   
					      <div class="col"><?php the_content(); ?></div> 
				    </div>
					<div class="row album-head border_first_color main_font_color">
						<div class="col-sm-4"><?php echo esc_html__('Store Name', 'koband');?></div>
						<div class="col-sm-4"><?php echo esc_html__('Store Link', 'koband');?></div>
					</div>
				
				
				<?php if(isset($single_store[0])) { ?>
					<?php foreach ($single_store[0] as  $value_single_store) { ?>
					<div class="row song-list border_first_color main_font_color">
						<div class="col-sm-4 line "><?php if(isset($value_single_store['name'])) {echo esc_attr($value_single_store['name']);}?></div>
						<div class="col-sm-4 store_link btn-buy line"><a class="bg_first_color" href="<?php if(isset($value_song_store['link'])) {echo esc_url($value_song_store['link']);}?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html__('Buy Here', 'koband');?></a></div>
					</div>
				<?php } } ?>
				</div>	 

			</div> 
		</div>
		</div>
	</div>
		<?php endwhile;?>
	<?php  endif; ?>
</div>

<?php 
get_footer(); ?>