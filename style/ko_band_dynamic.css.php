<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 


$general_font = get_theme_mod( 'ko_band_general_font_selector' );
$headding_font = get_theme_mod( 'ko_band_heading_font_selector' ); 
?>


@import url('https://fonts.googleapis.com/css?family=<?php echo $general_font; ?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $headding_font; ?>');



<?php

$main_theme_color = get_theme_mod( 'ko_band_main_theme_color' );
$second_theme_color = get_theme_mod( 'ko_band_second_them_color' );
$main_font_color= get_theme_mod( 'ko_band_main_font_color' );
$heading_font_color = get_theme_mod( 'ko_band_heading_font_color' );



$main_font_size = get_theme_mod( 'ko_band_main_font_size' );
$main_line_height = get_theme_mod( 'ko_band_main_line_height' );
$main_font_style = get_theme_mod( 'ko_band_font_style' );
$main_font_weight = get_theme_mod( 'ko_band_font_weight' );
?>

/* Menu item colors */

body
{
  background-color: <?php echo $main_theme_color; ?> !important;

  font-family: <?php echo $general_font; ?> !important;
  font-size:  <?php echo $main_font_size; ?> !important;
  line-height:  <?php echo $ko_band_line_height; ?> !important;
  
  font-weight:  <?php echo $main_font_weight; ?> !important;
  font-style:  <?php echo $main_font_style; ?> !important;
  color:  <?php echo $main_font_color; ?> !important;
}
h1, h2, h3 
{
	
	font-family: <?php echo $headding_font; ?> !important;
	color: <?php echo $heading_font_color; ?> !important;

}






