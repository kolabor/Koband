<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 


  /*****Logo***/
  $koband_main_logo = get_theme_mod('ko_band_main_logo');
  $koband_retina_main_logo = get_theme_mod('ko_band_retina_main_logo');
  $koband_footer_logo = get_theme_mod('ko_band_footer_logo');  
  $koband_retina_footer_logo = get_theme_mod('ko_band_retina_footer_logo'); 

  /****colors**/
  $koband_main_theme_color = get_theme_mod('ko_band_main_theme_color');  
  $koband_first_theme_color = get_theme_mod('ko_band_first_theme_color'); 
  $koband_second_theme_color = get_theme_mod('ko_band_second_theme_color');  
  $koband_backgorund_section_color = get_theme_mod('ko_band_background_section_color');


  /***Fonts***/
  $koband_theme_font_size = get_theme_mod( 'ko_band_theme_font_size' );
  $koband_theme_line_height = get_theme_mod( 'ko_band_theme_line_height' );
  $koband_general_font = get_theme_mod( 'ko_band_general_font_selector' );
  $koband_headding_font = get_theme_mod( 'ko_band_heading_font_selector' ); 

  /****Retina Favicon***/
  $koband_retina_favicon = get_theme_mod('ko_band_retina_favicon'); 

  /****Slider Section type****/
  $koband_slider_type = get_theme_mod('ko_band_home_page_slider_type'); 
  $koband_slider_video = get_theme_mod('ko_band_home_page_slider_videolink'); 
  $koband_slider_title = get_theme_mod('ko_band_home_page_slider_title');
  $koband_slider_subtitle = get_theme_mod('ko_band_home_page_slider_subtitle');  
  $koband_slider_buttontitle = get_theme_mod('ko_band_home_page_slider_buttontitle'); 
  $koband_slider_buttonlink = get_theme_mod('ko_band_home_page_slider_buttonlink');   

  /****Home page Modules ****/
  $koband_first_module = get_theme_mod('ko_band_first_render_modules'); 
  $koband_second_module = get_theme_mod('ko_band_second_render_modules');
  $koband_third_module = get_theme_mod('ko_band_third_render_modules');
  $koband_fourth_module = get_theme_mod('ko_band_fourth_render_modules');
  $koband_fifth_module = get_theme_mod('ko_band_fifth_render_modules');


  /***Social Media*****/
  $koband_social_media = get_theme_mod('ko_band_social_media_checkbox'); 
  $koband_facebook = get_theme_mod( 'ko_band_facebook_social_media' );
  $koband_twitter = get_theme_mod( 'ko_band_twitter_social_media' );
  $koband_insagram = get_theme_mod( 'ko_band_insagram_social_media' );
  $koband_googleplus = get_theme_mod( 'ko_band_googleplus_social_media' );
  $koband_youtube = get_theme_mod( 'ko_band_youtube_social_media' );
  $koband_spotify = get_theme_mod( 'ko_band_spotify_social_media' );
  $koband_soundcloud = get_theme_mod( 'ko_band_soundcloud_social_media' );
  $koband_bandcamp = get_theme_mod( 'ko_band_bandcamp_social_media' );
  $koband_apple = get_theme_mod( 'ko_band_apple_social_media' );

  /***The band sction Backgroud image**/
  $koband_theband_biography = get_theme_mod('ko_band_theband_biography');
  $koband_theband_image = get_theme_mod('ko_band_theband_images');

  /****Footer section****/
  $koband_footer_copyright = get_theme_mod('ko_band_footer_copyright');
  $koband_footer_search = get_theme_mod('ko_band_footer_search');




?>

#theband {
background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
 url("<?php echo $koband_theband_image; ?>") !important;
 background-repeat: no-repeat;
 background-size: cover;
 background-position: center;
}


@import url('https://fonts.googleapis.com/css?family=<?php echo $koband_theme_font_size; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $koband_general_font; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $koband_headding_font; ?>');




/* Menu item colors */

body
{

  font-family: <?php echo $general_font; ?> !important;
  font-size:  <?php echo $main_font_size; ?> !important;
  line-height:  <?php echo $main_line_height; ?> !important;
  
  color:  <?php echo $main_font_color; ?> !important; 


}

.section {
  background-color: <?php echo $koband_backgorund_section_color; ?> !important;

}

.first_color {
  color: <?php echo $koband_first_theme_color; ?> !important;
}

.bg_first_color {
  background-color: <?php echo $koband_first_theme_color; ?> !important; 
}
.bg_first_color:hover {
  background-color: <?php echo $koband_second_theme_color ?> !important;
}
.border_first_color {
  border-bottom-color: <?php echo $koband_first_theme_color; ?> !important;
}

.bg_second_color {
  background-color: <?php echo $koband_second_theme_color ?> !important;
}
.divTableRow:hover {
   background-color: <?php echo $koband_second_theme_color ?> !important;
   opacity: 1!important;
}

.main_font_color{
  color: <?php echo $koband_main_theme_color; ?> !important;
}

h1, h2, h3 
{
	
	font-family: <?php echo $headding_font; ?> !important;
	

}











