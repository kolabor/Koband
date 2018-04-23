<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 



  //color
  $main_theme_color = get_theme_mod( 'ko_band_main_theme_color' );
  $second_theme_color = get_theme_mod( 'ko_band_second_theme_color' );
  $main_font_color= get_theme_mod( 'ko_band_main_font_color' );
  $heading_font_color = get_theme_mod( 'ko_band_heading_font_color' );


  //font
  $main_font_size = get_theme_mod( 'ko_band_main_font_size' );
  $main_line_height = get_theme_mod( 'ko_band_main_line_height' );
  $main_font_style = get_theme_mod( 'ko_band_font_style' );
  $main_font_weight = get_theme_mod( 'ko_band_font_weight' );

 
  $general_font = get_theme_mod( 'ko_band_general_font_selector' );
  $headding_font = get_theme_mod( 'ko_band_heading_font_selector' ); 
  $main_theme_first_color = get_theme_mod( 'ko_band_main_color' );
  $main_theme_second_color = get_theme_mod( 'ko_band_second_color' );
  $main_theme_third_color = get_theme_mod( 'ko_band_third_color' );
  $theband_back_image = get_theme_mod('ko_band_the_band_images');

?>

#theband {
background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
 url("<?php echo $theband_back_image; ?>") !important;
 background-repeat: no-repeat;
 background-size: cover;
 background-position: center;
}


@import url('https://fonts.googleapis.com/css?family=<?php echo $main_font_size; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $general_font; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $headding_font; ?>');




/* Menu item colors */

body
{
  background-color: <?php echo $main_theme_color; ?> !important;
  font-family: <?php echo $general_font; ?> !important;
  font-size:  <?php echo $main_font_size; ?> !important;
  line-height:  <?php echo $main_line_height; ?> !important;
  font-weight:  <?php echo $main_font_weight; ?> !important;
  font-style:  <?php echo $main_font_style; ?> !important;
  color:  <?php echo $main_font_color; ?> !important; 


}

h1, h2, h3 
{
	
	font-family: <?php echo $headding_font; ?> !important;
	color: <?php echo $heading_font_color; ?> !important;


}











