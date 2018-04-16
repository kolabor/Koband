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
		while( have_posts() ) : the_post();
			
				$post_id = get_the_ID();
 
 				$slide_video_link = get_theme_mod('ko_band_home_page_slider_videolink');
				$slide_video_title = get_theme_mod('ko_band_home_page_slider_title');
				$slide_video_subtitle = get_theme_mod('ko_band_home_page_slider_subtitle');
				$slide_video_buttonlink = get_theme_mod('ko_band_home_page_slider_buttonlink');
				$slide_video_buttontitle = get_theme_mod('ko_band_home_page_slider_buttontitle'); 

				$slide_video_link = 'https://www.youtube.com/embed/' . $slide_video_link ?>

	<?php endwhile; ?>
	<!--<div class="video-body">-->
		<div class="video-bg">
				<div class="iframe-wrapper">
						<iframe  src="<?php echo $slide_video_link;?>"></iframe>
				</div>		
		</div>
	<!--</div>	-->		
				<?php if(isset($slide_video_title[0])) 	{ echo  $slide_video_title; } ?>
				<?php if(isset($slide_video_subtitle[0])) 	{ echo  $slide_video_subtitle; } ?>
				<?php if(isset($slide_video_buttonlink[0])) 	{ echo  $slide_video_buttonlink; } ?>
				<?php if(isset($slide_video_buttontitle[0])) 	{ echo  $slide_video_buttontitle; } ?>
				
<?php endif;
?>