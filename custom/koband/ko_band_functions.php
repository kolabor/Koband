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
// Change Set Featured image text
/*
function ko_band_featured_image_text( $content ) {
    return $content = str_replace( __( 'Set featured image', 'koband' ), __( 'Set Cover Image', 'koband' ), $content);
}
add_filter( 'admin_post_thumbnail_html', 'ko_band_featured_image_text' ); */

// Load custom css script and custom javascript for admin dashboard

function ko_band_custom_wp_admin_resources() {

    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin/ko_band_admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );

    wp_register_script( 'custom_wp_admin_js', get_template_directory_uri() . '/admin/ko_band_admin.js', false, '1.0.0' );
    wp_enqueue_script( 'custom_wp_admin_js' );

    wp_register_style( 'bootstrap_grid', get_template_directory_uri() . '/admin/bootstrap-grid.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap_grid' );

    wp_register_style( 'bootstrap', get_template_directory_uri() . '/admin/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap' );

    wp_register_style('theme_colors', get_template_directory_uri() .'/style/ko_band_dynamic.css.php', false, '1.0.0' );
    wp_enqueue_style( 'theme_colors' );
}
add_action( 'admin_enqueue_scripts', 'ko_band_custom_wp_admin_resources' );

// Excerpt Length

function ko_band_set_excerpt_length( $excerpt ){
	return substr($excerpt, 0, 150);
}

add_filter('the_excerpt', 'ko_band_set_excerpt_length', 999);

// Function for Media CPT to add gallery images

function ko_band_enqueue_admin_scripts($hook) {

    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {

    wp_enqueue_script('ko_band_gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.js', array('jquery', 'jquery-ui-sortable'));
    wp_enqueue_style('ko_band_gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.css');
         //wp_enqueue_style( 'theme_colors', get_template_directory_uri() .'/style/ko_band_dynamic.css.php');

    }
}

add_action( 'admin_enqueue_scripts', 'ko_band_enqueue_admin_scripts' );

// Changing the set image text

function ko_band_featured_image_metabox_title() {
	remove_meta_box( 'postimagediv', 'tour', 'side' );
	add_meta_box( 'postimagediv', __( 'Set cover image', 'koband' ), 'post_thumbnail_meta_box', 'tour', 'side' );

	remove_meta_box( 'postimagediv', 'album', 'side' );
	add_meta_box( 'postimagediv', __( 'Set cover image', 'koband' ), 'post_thumbnail_meta_box', 'album', 'side' );

	remove_meta_box( 'postimagediv', 'media', 'side' );
	add_meta_box( 'postimagediv', __( 'Set gallery cover', 'koband' ), 'post_thumbnail_meta_box', 'media', 'side' );

	remove_meta_box( 'postimagediv', 'singles', 'side' );
	add_meta_box( 'postimagediv', __( 'Set cover image', 'koband' ), 'post_thumbnail_meta_box', 'singles', 'side' );

	remove_meta_box( 'postimagediv', 'slides', 'side' );
	add_meta_box( 'postimagediv', __( 'Set slide images', 'koband' ), 'post_thumbnail_meta_box', 'slides', 'side' );

	remove_meta_box( 'postimagediv', 'the band', 'side' );
	add_meta_box( 'postimagediv', __( 'Band Member image', 'koband' ), 'post_thumbnail_meta_box', 'the band', 'side' );

}
add_action('do_meta_boxes', 'ko_band_featured_image_metabox_title' );

// Theme Support

function ko_band_theme_support () {

	// Add theme support thumbnails

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'news-thumb', 347, 255, true); // Hard Crop Mode
	
	add_theme_support('html5', array('search-form'));
	add_theme_support( 'automatic-feed-links' );

	// Add theme support Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));

	//Menu

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'koband'),
		'footer' => __('Footer Menu', 'koband')
	));
	
	
}
add_action('after_setup_theme', 'ko_band_theme_support');

//Widget Locations
function ko_band_footer_widgets($id){

	register_sidebar(array(
		'name' => __('Sidebar','koband'),
		'id' => 'ko_band_sidebar',
		'before_sidebar' => '<div  class="side-ko_band_sidebar">',
		'after_sidebar' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('First Footer Widgets', 'koband'),
		'id' => 'ko_band_first_footer_widgets',
		'before_widget' => '<div  class="side-ko_band_first_footer_widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Second Footer Widgets', 'koband'),
		'id' => 'ko_band_second_footer_widgets',
		'before_widget' => '<div  class="side-ko_band_second_footer_widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	
	
}
add_action('widgets_init', 'ko_band_footer_widgets');

/* Register frontend resources */

function ko_band_custom_wp_front_resources() {

	if( !is_admin() ) 
		{ 
			wp_enqueue_style( 'style', get_stylesheet_uri() );
            wp_enqueue_script("jquery");
		 } 
}
add_action( 'wp_enqueue_scripts', 'ko_band_custom_wp_front_resources' );

/* Register frontend resources ends here */

//Function for registering bootstrap for front-end with css and js, and adding front.js for front

function ko_band_bootstrap_front_resources() {
	
	wp_register_style( 'bootstrap_wp_front_css', get_template_directory_uri() . '/admin/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap_wp_front_css' );

    wp_register_script( 'bootstrap_wp_front_js', get_template_directory_uri() . '/js/bootstrap.min.js', false, '1.0.0' );
    wp_enqueue_script( 'bootstrap_wp_front_js' );

	wp_register_script( 'script_wp_front_css', get_template_directory_uri() . '/js/ko_band_front.js', false, '1.0.0' );
    wp_enqueue_script( 'script_wp_front_css' );
}

add_action('wp_enqueue_scripts', 'ko_band_bootstrap_front_resources');


// Load Font Awesome
add_action( 'wp_enqueue_scripts', 'ko_band_enqueue_font_awesome' );
function ko_band_enqueue_font_awesome() {

	wp_register_script( 'font-awesome', get_template_directory_uri() . '/js/fontawesome-all.min.js', false, '1.0.0' );
    wp_enqueue_script( 'font-awesome' );
}

// Register taxonomy for Discography

	// Taxonomy for Albums
	add_action('init', 'ko_band_define_album_type_taxonomy');

	function ko_band_define_album_type_taxonomy(){
		register_taxonomy(
			'album_year',
			'album',
			array(
				'hierarchical' => true,
				'label'		   => 'Album Year',
				'query_var'	   => true,
				'rewrite'	   => true
			)
		);
	}

	// Taxonomy for Singles
	add_action('init', 'ko_band_define_single_type_taxonomy');

	function ko_band_define_single_type_taxonomy(){
		register_taxonomy(
			'single_year',
			'singles',
			array(
				'hierarchical' => true,
				'label'		   => 'Single Year',
				'query_var'	   => true,
				'rewrite'	   => true
			)
		);
	}
// Adding support for Additional CSS at customize section
add_action('wp_enqueue_scripts', 'ko_band_additional_css_enqueue_styles');

function ko_band_additional_css_enqueue_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri(). '/style.css');
}

//Adding support for Comments Replay
function ko_band_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'ko_band_enqueue_comments_reply' );


// Make WordPress Retina Ready

function ko_band_retina_script() {

wp_enqueue_script('ko_band_retina', 'http://192.168.88.225/wp-content/uploads/2018/04/retina.min_.js', null, '', true);

}

add_action( 'wp_head', 'ko_band_retina_script' );


