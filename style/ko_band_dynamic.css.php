<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 
?>

<?php 

$main_theme_first_color = get_theme_mod( 'ko_band_main_color' );
$main_theme_second_color = get_theme_mod( 'ko_band_second_color' );
$main_theme_third_color = get_theme_mod( 'ko_band_third_color' );
?>

/* Menu item colors */

body
{
  background-color: <?php echo $main_theme_first_color; ?> !important;
}



