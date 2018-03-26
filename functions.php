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

/*add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

function my_enqueue($hook) {

wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/admin/ko_band_admin.js', array(), '1.0' );
	
} */

function theme_setup(){
	add_theme_support('post_thumbnail');
	set_post_thumbnail_size(900, 600);
	add_theme_support('post_formats', array('gallery'));

}
add_action('after_setup_theme', 'theme_setup');


