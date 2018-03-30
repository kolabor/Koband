<?php
  header('Content-type: text/css');
  require '/../../../wp-load.php';
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
  border-top: solid 10px <?php echo $main_theme_first_color; ?> !important;

   background:<?php echo $main_theme_second_color; ?> !important;
    background-color: <?php echo $main_theme_third_color; ?> !important;
      border: 8px solid <?php echo $main_theme_second_color; ?> !important;
}



