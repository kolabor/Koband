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

  /*** Main Menu color & font**/
  $koband_main_menu_font_color = get_theme_mod('ko_band_main_menu_font_color');
  $koband_main_menu_font_size = get_theme_mod('ko_band_main_menu_font_size'); 
  $koband_main_menu_bg_color = get_theme_mod('ko_band_main_menu_background_color');
  list($red, $green, $blue) = sscanf($koband_main_menu_bg_color, "#%02x%02x%02x");
   
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

  /****Slider Section Colors****/
  $koband_slider_text_color = get_theme_mod('ko_band_slider_text_color');
  $koband_slider_button_text_color = get_theme_mod('ko_band_slider_button_text_color');
  $koband_slider_button_bg_color = get_theme_mod('ko_band_slider_button_background_color');
  $koband_slider_button_hover_bg_color = get_theme_mod('ko_band_slider_button_hover_background_color');
  $koband_slider_text_holder_bg_color = get_theme_mod('ko_band_slider_text_holder_background_color');
  list($r, $g, $b) = sscanf($koband_slider_text_holder_bg_color, "#%02x%02x%02x");

  /*****Slider Check Background******/
  $koband_check_slider_background = get_theme_mod('ko_band_home_page_box_background');

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
  $koband_facebook = get_theme_mod( 'ko_band_facebook_social_media' );
  $koband_twitter = get_theme_mod( 'ko_band_twitter_social_media' );
  $koband_insagram = get_theme_mod( 'ko_band_insagram_social_media' );
  $koband_youtube = get_theme_mod( 'ko_band_youtube_social_media' );
  $koband_spotify = get_theme_mod( 'ko_band_spotify_social_media' );
  $koband_soundcloud = get_theme_mod( 'ko_band_soundcloud_social_media' );
  $koband_bandcamp = get_theme_mod( 'ko_band_bandcamp_social_media' );
  $koband_apple = get_theme_mod( 'ko_band_apple_social_media' );

  /***The band sction Backgroud image**/
  $koband_theband_biography = get_theme_mod('ko_band_theband_biography');
  $koband_theband_image = get_theme_mod('ko_band_theband_sectin_background_image');

  /***Contact section**/
  $koband_contact_country = get_theme_mod('ko_band_contact_country'); 
  $koband_contact_city = get_theme_mod('ko_band_contact_city');
  $koband_contact_address = get_theme_mod('ko_band_contact_address');
  $koband_contact_email = get_theme_mod('ko_band_contact_email');
  $koband_contact_phone = get_theme_mod('ko_band_contact_phone');
 
   /**Footer Logo**/
  $koband_footer_logo = get_theme_mod('ko_band_footer_logo');  
  $koband_retina_footer_logo = get_theme_mod('ko_band_retina_footer_logo'); 

  /****Footer section****/
  $koband_footer_copyright = get_theme_mod('ko_band_footer_copyright');
  $koband_footer_search = get_theme_mod('ko_band_footer_search');
  $koband_footer_background_color = get_theme_mod('ko_band_footer_section_background_color');

  /*** Footer Menu color & font**/
  $koband_footer_menu_font_color = get_theme_mod('ko_band_footer_menu_font_color');
  $koband_footer_menu_font_size = get_theme_mod('ko_band_footer_menu_font_size'); 

 
?>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=<?php echo esc_url($koband_general_font); ?>'">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=<?php echo esc_url($koband_headding_font); ?>'">


/* Menu item colors */
.home, .single, .page, .default
{
  
  font-size:  <?php echo esc_html($koband_theme_font_size); ?> ;
  line-height:  <?php echo esc_html($koband_theme_line_height); ?> ;
  color: <?php echo esc_html($koband_main_font_color); ?> ;

}
 
.home h1, .home h2, .home h3, .home h4, .single h1, .single h2, .single h3, .single h4, .page h1, .page h2, .page h3, .page h4,
{
  font-family: <?php echo esc_html($koband_headding_font); ?> ;
  color: <?php echo esc_html($koband_main_font_color);?> ;
  font-size:  <?php echo $koband_theme_font_size; ?> ;
}
#theband {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
  url("<?php echo esc_html($koband_theband_image); ?>") ;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

#News {
  background-color: <?php echo  esc_html($koband_news_background_color); ?> ;
}

#Tour {
  background-color: <?php echo  esc_html($koband_tour_background_color); ?> ;
}

#Discography {
  background-color: <?php echo  esc_html($koband_discography_background_color); ?> ;
}
#Media {
background-color: <?php echo  esc_html($koband_gallery_background_color); ?> ;
}


a {
   color: <?php echo esc_html($koband_first_theme_color); ?>;
}

.first_color {
  font-family: <?php echo esc_html($koband_headding_font); ?> ;
  color: <?php echo esc_html($koband_first_theme_color); ?> ;

}
.social-icons a .first_color:hover {
  color: <?php echo esc_html($koband_second_theme_color); ?> ;
}
.first_color a {
  color: <?php echo esc_html($koband_first_theme_color);?> ;
}
.bg_first_color {
  background-color: <?php echo esc_html($koband_first_theme_color); ?> ; 
}
.bg_first_color:hover {
  background-color: <?php echo esc_html($koband_second_theme_color); ?> ;
  color: <?php echo esc_html($koband_first_theme_color); ?> ;
}
.border_first_color {
  border-bottom-color: <?php echo esc_html($koband_first_theme_color); ?> ;
}
.border_second_color {
  border-bottom-color: <?php echo esc_html($koband_second_theme_color); ?> ;
}

.bg_second_color {
  background-color: <?php echo esc_html($koband_second_theme_color); ?> ;
}


.main_font_color{
  font-family : <?php echo esc_html($koband_general_font); ?> ;
  color: <?php echo esc_html($koband_main_font_color); ?> ;  

}

.font-line_height {
  font-size:  <?php echo esc_html($koband_theme_font_size); ?>;
  line-height:  <?php echo esc_html($koband_theme_line_height); ?> ;
}

.read_more a {
  color: <?php echo esc_html($koband_first_theme_color); ?> ;
}
.read_more:hover a {
  color: <?php echo esc_html($koband_first_theme_color); ?> ;
}
.read_more:hover {
  background-color: <?php echo esc_html($koband_second_theme_color) ?> ;
}
.slider_text_color{
  color: <?php echo esc_html($koband_slider_text_color) ?>;
}
.slider_button_text_color {
  color: <?php echo esc_html($koband_slider_button_text_color) ?>;
  background-color: <?php echo esc_html($koband_slider_button_bg_color) ?>;
}
.slider_button_text_color:hover {
  background-color: <?php echo esc_html($koband_slider_button_hover_bg_color) ?> ;
}

.sl-content{
  
  <?php if ($koband_check_slider_background == '1') 
  { ?>
  background-color:rgba(<?php echo esc_html($r)?>,<?php echo esc_html($g)?>,<?php echo esc_html($b)?>,0.4);
  <?php }
  else 
  { ?>
  background: none ;
  <?php } 
  ?>
}
.submit {
  background-color: <?php echo esc_html($koband_first_theme_color); ?> ;
  color: <?php echo esc_html($koband_second_theme_color); ?> ;
}
.reply a, .submit {
  color: <?php echo esc_html($koband_first_theme_color); ?> ;
}

.submit:hover {
 background-color: <?php echo esc_html($koband_second_theme_color); ?> ;
  color: <?php echo esc_html($koband_first_theme_color); ?> ;
}

.footer-section
{
  background-color: <?php echo esc_html($koband_footer_background_color); ?> ;
}

.border_bottom {
  border-bottom-color: <?php echo esc_html($koband_second_theme_color); ?> ;
}
.hovereffect:hover .overlay {
  background-color: <?php echo esc_html($koband_first_theme_color); ?> ;
  opacity: 0.5;
}

#contact .wpcf7 {
  border: 1px solid <?php echo esc_html($koband_first_theme_color); ?> ;
} 
.menu-scroll {
  background-color:rgba(<?php echo esc_html($red)?>,<?php echo esc_html($green)?>,<?php echo esc_html($blue)?>,0.7);
}
.fixed {
  background-color: <?php echo esc_html($koband_main_menu_bg_color)?> ;
}
.menu-noscroll {
  background-color: <?php echo esc_html($koband_main_menu_bg_color)?> ;
  
}
.main-nav .menu li a {
  color: <?php echo esc_html($koband_main_menu_font_color)?>;
  font-size: <?php echo esc_html($koband_main_menu_font_size)?>px ;
}
.main-nav .menu li a:hover {
  color: <?php echo esc_html($koband_main_menu_font_color)?> ;
  border-bottom: 3px solid <?php echo esc_html($koband_first_theme_color); ?> ;
}
.footer-menu .menu li a {
  color: <?php echo esc_html($koband_footer_menu_font_color)?> ;
  font-size: <?php echo esc_html($koband_footer_menu_font_size)?>px ;
}
