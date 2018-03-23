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

// Load custom css script for admin dashboard

function load_custom_wp_admin_style() {

        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/ko_band_admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Load custom javascript file for admin dashboard

function load_custom_wp_admin_script() {

        wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/admin/ko_band_admin.js', false, '1.0.0' );
        wp_enqueue_script( 'custom_wp_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

// Theme Support

function koband_theme_support () {

	// Add theme support thumnails

	add_theme_support('post-thumbnails');

	// Add theme support Post Format Support

	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'koband_theme_support');

?>
