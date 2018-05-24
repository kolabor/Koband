<?php
/**
 * 
 *
 * Template Name: Video Slider
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */?>

<?php 
    if (have_posts() ) : 
    /* starting loop */
	while( have_posts() ) : the_post();
		$post_id = get_the_ID();

		$slide_video_link = get_theme_mod('ko_band_home_page_slider_videolink');
		$slide_video_title = get_theme_mod('ko_band_home_page_slider_title');
		$slide_video_subtitle = get_theme_mod('ko_band_home_page_slider_subtitle');
		$slide_video_buttonlink = get_theme_mod('ko_band_home_page_slider_buttonlink');
		$slide_video_buttontitle = get_theme_mod('ko_band_home_page_slider_buttontitle');
		$slide_video_trim = $slide_video_subtitle;
		$slider_video_sub_trim = substr($slide_video_trim,0,200);

		/* Setting function to take only the data afer "v=" chars */
		
		$data = $slide_video_link;
		$slide_video_link = substr($data, strpos($data, "v=") + 2);
		$playlist_loop = substr($data, strrpos($data, "v=") + 2);
		$slide_video_link = 'https://www.youtube.com/embed/' . ($slide_video_link); 
		$video_loop = $slide_video_link . '?rel=0&autoplay=1&loop=1&mute=1&playlist=' . $playlist_loop ;
		str_replace(array("http://"), "", $video_loop);?>
	<?php endwhile; ?>
	<!--loop ends here-->
		<div class="video-bg">
				<div class="iframe-wrapper">
					<iframe  src="<?php echo esc_url($video_loop)?>" ></iframe>
				</div>		
		</div>		
		<div class="sl-content">
			    <h5 class="slider_title_text_color heading_font"><?php if(isset($slide_video_title[0])) { echo esc_attr($slide_video_title); } ?></h5>
			    <p class="slider_subtitle_text_color main_font"><?php if(isset($slider_video_sub_trim)) { echo esc_attr($slider_video_sub_trim); } ?></p>
			    <a class="btn btn-lg slider_button_text_color" href="<?php if(isset($slide_video_buttonlink[0])){echo esc_url($slide_video_buttonlink); } ?>">
			    <?php if(isset($slide_video_buttontitle[0])){ 
			   	echo esc_attr($slide_video_buttontitle); } ?></a>
		</div>
<?php endif;
?>