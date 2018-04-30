<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 


  
  /*****Main Logo***/
  $koband_main_logo = get_theme_mod('ko_band_main_logo');
  $koband_retina_main_logo = get_theme_mod('ko_band_retina_main_logo');

   /****Theme colors**/
  $koband_main_font_color = get_theme_mod('ko_band_main_font_color'); 
  $koband_first_theme_color = get_theme_mod('ko_band_first_theme_color'); 
  $koband_second_theme_color = get_theme_mod('ko_band_second_theme_color');  
  
  /***Home page Module Color****/
  $koband_first_module_color = get_theme_mod('ko_band_background_first_section_color'); 
  $koband_second_module_color = get_theme_mod('ko_band_background_second_section_color');
  $koband_third_module_color = get_theme_mod('ko_band_background_third_section_color');
  $koband_fourth_module_color = get_theme_mod('ko_band_background_fourth_section_color');
  $koband_fifth_module_color = get_theme_mod('ko_band_background_fifth_section_color');


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

  $koband_slider_box_background = get_theme_mod('ko_band_home_page_box_background');

  /****Home page Modules ****/
  $koband_first_module = get_theme_mod('ko_band_first_render_modules'); 
  $koband_second_module = get_theme_mod('ko_band_second_render_modules');
  $koband_third_module = get_theme_mod('ko_band_third_render_modules');
  $koband_fourth_module = get_theme_mod('ko_band_fourth_render_modules');
  $koband_fifth_module = get_theme_mod('ko_band_fifth_render_modules');


  /***Home page Module Color****/
  $koband_news_background_color = get_theme_mod('ko_band_background_news_section_color'); 
  $koband_tour_background_color = get_theme_mod('ko_band_background_tour_section_color');
  $koband_discography_background_color = get_theme_mod('ko_band_background_discography_section_color'); 
  $koband_gallery_background_color = get_theme_mod('ko_band_background_gallery_section_color');


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
  $koband_theband_image = get_theme_mod('ko_band_theband_sectin_background_image');

   /**Footer Logo**/
  $koband_footer_logo = get_theme_mod('ko_band_footer_logo');  
  $koband_retina_footer_logo = get_theme_mod('ko_band_retina_footer_logo'); 

  /****Footer section****/
  $koband_footer_copyright = get_theme_mod('ko_band_footer_copyright');
  $koband_footer_search = get_theme_mod('ko_band_footer_search');
  $koband_footer_background_color = get_theme_mod('ko_band_footer_section_background_color');

  /*****Slider Check Background******/
  $koband_check_slider_background = get_theme_mod('ko_band_home_page_box_background');

?>

#theband {
background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
 url("<?php echo $koband_theband_image; ?>") !important;
 background-repeat: no-repeat;
 background-size: cover;
 background-position: center;
}


@import url('https://fonts.googleapis.com/css?family=<?php echo $koband_general_font; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $koband_headding_font; ?>');





/* Menu item colors */
.home, .single, .page, .default
{
  
  font-size:  <?php echo $koband_theme_font_size; ?> !important;
  line-height:  <?php echo $koband_theme_line_height; ?> !important;

  color: <?php echo $koband_main_font_color; ?> !important;

}

.home h1, .home h2 .home h3, .home h4, .single h1, .single h2 .single h3, .single h4, .page h1, .page h2 .page h3, .page h4,
{
  font-family: <?php echo $koband_headding_font; ?> !important;

  color: <?php echo $koband_main_font_color;?> !important;

  font-size:  <?php echo $koband_theme_font_size; ?> !important;
}

#News {
  background-color: <?php echo  $koband_news_background_color; ?> !important;
}

#Tour {
  background-color: <?php echo  $koband_tour_background_color; ?> !important;
}

#Discography {
  background-color: <?php echo  $koband_discography_background_color; ?> !important;
}
#Media {
background-color: <?php echo  $koband_gallery_background_color; ?> !important;
}



.first_color {
  color: <?php echo $koband_first_theme_color; ?> !important;
}
.social-icons a .first_color:hover {
  color: <?php echo $koband_second_theme_color; ?> !important;
}
.first_color a {
  color: <?php echo $koband_first_theme_color;?> !important;
}
.bg_first_color {
  background-color: <?php echo $koband_first_theme_color; ?> !important; 
}
.bg_first_color:hover {
  background-color: <?php echo $koband_second_theme_color; ?> !important;
  color: <?php echo $koband_first_theme_color; ?> !important;
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

  color: color: <?php echo $koband_main_font_color; ?> !important;  

}

.font-line_height {
  font-size:  <?php echo $koband_theme_font_size; ?> !important;
  line-height:  <?php echo $koband_theme_line_height; ?> !important;
}

.read_more a {
  color: <?php echo $koband_first_theme_color; ?> !important;
}
.read_more:hover a {
  color: <?php echo $koband_first_theme_color; ?> !important;
}
.read_more:hover {
  background-color: <?php echo $koband_second_theme_color ?> !important;
}

.sl-content{
  
  <?php if ($koband_check_slider_background == '1') 
  { ?>
  background:rgba(0,0,0,0.5) !important;
  <?php }
  else 
  { ?>
  background: none !important;
  <?php } 
  ?>
}
.submit {
  background-color: <?php echo $koband_first_theme_color; ?> !important;
  color: <?php echo $koband_second_theme_color; ?> !important;
}
.reply a, .submit {
  color: <?php echo $koband_first_theme_color; ?> !important;
}
.submit:hover {
  color: <?php echo $koband_first_theme_color; ?> !important;
}

.submit:hover {
 background-color: <?php echo $koband_second_theme_color; ?> !important;
  color: <?php echo $koband_first_theme_color; ?> !important;
}

.footer-section
{
  background-color: <?php echo $koband_footer_background_color; ?> !important;
}



<!--#logo{
  
  <?php /*if (!empty($koband_main_logo)) 
  { ?>
  background-image: : <?php echo $koband_main_logo; ?> !important;
  <?php }
  else 
  { ?>
  background-image: : <?php echo $koband_retina_main_logo;?> !important;
  <?php } 
  ?>
}


//
.site-icon-preview.wp-clearfix{
    background-image: <?php echo url($koband_retina_favicon);?> !important;
    background-size: 400px 300px !important;
    background-repeat: no-repeat !important;
    display: block !important;
    width: 400px !important;
    height: 300px !important;
}-->
*/