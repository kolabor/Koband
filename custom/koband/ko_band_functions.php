<?php 
/**
 * KOBAND Functions and definitions
 *
 * Set up  theme and provides some helper functions, which are used in the
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


// Load script for customizer live preview
function ko_band_customize_preview_js() {
	wp_enqueue_script( 'ko-band-customize-preview', get_template_directory_uri() . '/admin/customizer-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'ko_band_customize_preview_js' );

// Load Script Customizer Controll
function ko_band_customize_control_js() {
    wp_enqueue_script( 'tuts_customizer_control', get_template_directory_uri() . '/admin/customizer-control-min.js', array( 'customize-controls', 'jquery' ), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'ko_band_customize_control_js' );


//Register frontend resources
function ko_band_custom_wp_front_resources() {

if( !is_admin() ) 
 { 
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script("jquery");
    
    wp_register_style('koband_theme_options', get_template_directory_uri() .'/style/ko_band_dynamic.css.php', false, '1.0.0' );
    wp_enqueue_style( 'koband_theme_options' );

    wp_register_style( 'bootstrap_wp_front_css', get_template_directory_uri() . '/admin/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap_wp_front_css' );

    wp_register_script( 'bootstrap_wp_front_js', get_template_directory_uri() . '/js/bootstrap.min.js', false, '1.0.0' );
    wp_enqueue_script( 'bootstrap_wp_front_js' );

	wp_register_script( 'script_wp_front_css', get_template_directory_uri() . '/js/ko_band_front_min.js', false, '1.0.0' );
    wp_enqueue_script( 'script_wp_front_css' );

    wp_register_script( 'font-awesome', get_template_directory_uri() . '/js/fontawesome-all.min.js', false, '1.0.0' );
    wp_enqueue_script( 'font-awesome' );
 } 

    wp_enqueue_style('parent-style', get_template_directory_uri(). '/style.css');

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
}

add_action( 'wp_enqueue_scripts', 'ko_band_custom_wp_front_resources' );




// Shorten Excerpt Length
function ko_band_set_excerpt_length( $excerpt ){
	return substr($excerpt, 0, 150);
}


add_filter('the_excerpt', 'ko_band_set_excerpt_length', 999);

// Theme Support

function ko_band_theme_support () {

	// Add theme support thumbnails

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'news_thumb', 694, 510, TRUE ); // Hard Crop Mode
	add_image_size( 'gallery_thumb', 553, 546, TRUE ); // Hard Crop Mode
	add_image_size( 'member_thumb', 400, 400, TRUE ); // Hard Crop Mode
	add_image_size( 'single_news_thumb', 1024, 350, TRUE ); // Hard Crop Mode
	
	add_theme_support('html5', array('search-form'));
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'get_post_format' );
	//add_theme_support( 'custom-header' );
	//add_theme_support( 'custom-background' );

	// Add theme support Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));

	//Menu
	register_nav_menus(array(
		'primary' => esc_html__('Primary Menu', 'koband'),
		'secondary' => esc_html__('Single Page', 'koband'),
		'footer' => esc_html__('Footer Menu', 'koband')
	));
    
	
	
}
add_action('after_setup_theme', 'ko_band_theme_support');

//Widget Locations
function ko_band_footer_widgets($id){

	register_sidebar(array(
		'name' => esc_html__('Sidebar','koband'),
		'id' => 'ko_band_sidebar',
		'before_sidebar' => '<div  class="side-ko_band_sidebar">',
		'after_sidebar' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('First Footer Widgets', 'koband'),
		'id' => 'ko_band_first_footer_widgets',
		'before_widget' => '<div  class="side-ko_band_first_footer_widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => esc_html__('Second Footer Widgets', 'koband'),
		'id' => 'ko_band_second_footer_widgets',
		'before_widget' => '<div  class="side-ko_band_second_footer_widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
	
}
add_action('widgets_init', 'ko_band_footer_widgets');

function koband_add_editor_styles() {
    add_editor_style( 'admin/editor-style.css' );
}
add_action( 'admin_init', 'koband_add_editor_styles' );

 	$koband_post_pagination = array(
		'before'           => '<p>' . __( 'Pages:', 'koband' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'koband'),
		'previouspagelink' => __( 'Previous page', 'koband' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
 
    wp_link_pages( $koband_post_pagination );

