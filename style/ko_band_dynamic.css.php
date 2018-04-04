<?php
  header('Content-type: text/css');
  include_once("{$_SERVER['DOCUMENT_ROOT']}/wp-load.php"); 

  $main_font = get_theme_mod( 'ko_band_general_font_selector' );
?>


@import url('https://fonts.googleapis.com/css?family=<?php echo $main_font; ?>');



<?php 
	
$main_theme_first_color = get_theme_mod( 'ko_band_main_color' );
$main_theme_second_color = get_theme_mod( 'ko_band_second_color' );
$main_theme_third_color = get_theme_mod( 'ko_band_third_color' );
?>

body
{
  font-family: <?php echo $main_font ?>;
}



