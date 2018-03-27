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

// Load custom css script for admin dashboard
			
function ko_band_custom_wp_admin_style() {

        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/ko_band_admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'ko_band_custom_wp_admin_style' );

// Load custom javascript file for admin dashboard

function ko_band_custom_wp_admin_script() {

        wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/admin/ko_band_admin.js', false, '1.0.0' );
        wp_enqueue_script( 'custom_wp_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'ko_band_custom_wp_admin_script' ); 

// Theme Support

function ko_band_theme_support () {

	// Add theme support thumnails

	add_theme_support('post-thumbnails');

	// Add theme support Post Format Support

	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'ko_band_theme_support'); 






?>