<?php
/**
 * Functions and definitions
 *
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabo Band 0.3
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
 * Implement the custom post types functions
 */

require 'custom/ko_band_slides.php';
require 'custom/ko_band_singles.php';
require 'custom/ko_band_tour_custom_post_type.php';
require 'custom/ko_band_album_custom_post_type.php';
require 'custom/ko_band_the_band_custom_post_type.php';
require 'custom/ko_band_media_custom_post_type.php';