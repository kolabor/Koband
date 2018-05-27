<?php
/**
 * KOBAND Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 *
 *
 *
 */
// Define theme version

if ( !defined( 'KOLABOR_BAND_THEME_VERSION' ) ) {
 $theme_data = wp_get_theme();

 define ( 'KOLABOR_BAND_THEME_VERSION', $theme_data->get( 'Version' ) );
} 

/**
 * Register all neccessary theme files from their proper directory
 */
require 'custom/koband/ko_band_functions.php';
require 'custom/koband/ko_band_ajax.php';
require 'custom/koband/ko_band_options.php';

/*TMG plugin require*/
require 'custom/tmg/ko_band_tmg.php';

add_action('init','ko_band_enqueue_dynamic_css');
function ko_band_enqueue_dynamic_css() {
  if (! is_admin()){
    $version = get_theme_mod('koband-dynamic-css',"1.00");
    $koband_dir = get_stylesheet_directory_uri();
    wp_enqueue_style('dynamic-css',  $koband_dir . '/style/ko_band_dynamic.css.php', array(), $version);
  }
}



?>