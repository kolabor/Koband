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
 * Register all neccessary custom post files and their metaboxes
 */
require 'custom/ko_band/ko_band_functions.php';
require 'custom/cpt/ko_band_albums_custom_post_type.php';
require 'custom/cpt/ko_band_media_custom_post_type.php';
require 'custom/cpt/ko_band_singles_custom_post_types.php';
require 'custom/cpt/ko_band_slides_custom_post_types.php';
require 'custom/cpt/ko_band_the_band_custom_post_type.php';
require 'custom/cpt/ko_band_tour_custom_post_type.php';




?>
