<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core rock-star-core and provides some helper functions using rock-star-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabo Band 0.3
 */

//define theme version
if ( !defined( 'KOLABOR_BAND_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();

	define ( 'KOLABOR_BAND_THEME_VERSION', $theme_data->get( 'Version' ) );
}
/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ) . 'inc/core.php'; 



require 'custom/ko_band_tour_custom_post_type.php';
require 'custom/ko_band_album_custom_post_type.php';
require 'custom/ko_band_music_custom_post_type.php';
require 'custom/ko_band_song_custom_post_type.php';
require 'custom/ko_band_the_band_custom_post_type.php';
require 'custom/ko_band_media_custom_post_type.php';