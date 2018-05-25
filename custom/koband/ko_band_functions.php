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

// Load custom css script and custom javascript for admin dashboard
function ko_band_custom_wp_admin_resources() {

    wp_register_style( 'koband_wp_admin_css', get_template_directory_uri() . '/admin/ko_band_admin.css', false, '1.0.0' );
    wp_enqueue_style( 'koband_wp_admin_css' );

    wp_register_script( 'koband_wp_admin_js', get_template_directory_uri() . '/admin/ko_band_admin_min.js', false, '1.0.0' );
    wp_enqueue_script( 'koband_wp_admin_js' );

   wp_register_style( 'bootstrap_grid', get_template_directory_uri() . '/admin/bootstrap-grid.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap_grid' );

    wp_register_style( 'bootstrap', get_template_directory_uri() . '/admin/bootstrap.min.css', false, '1.0.0' );
    wp_enqueue_style( 'bootstrap' );
}
add_action( 'admin_enqueue_scripts', 'ko_band_custom_wp_admin_resources' );

// Load script for customizer live preview
function ko_band_customize_preview_js() {
	wp_enqueue_script( 'ko-band-customize-preview', get_template_directory_uri() . '/admin/customizer-preview-min.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'ko_band_customize_preview_js' );

// Load Script Customizer Controll
function ko_band_customize_control_js() {
    wp_enqueue_script( 'tuts_customizer_control', get_template_directory_uri() . '/admin/customizer-control.js', array( 'customize-controls', 'jquery' ), null, true );
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


// Changing the set image text
function ko_band_featured_image_metabox_title() {

	remove_meta_box( 'postimagediv', 'album', 'side' );
	add_meta_box( 'postimagediv', esc_html__( 'Set cover image', 'koband' ), 'post_thumbnail_meta_box', 'album', 'side' );

	remove_meta_box( 'postimagediv', 'media', 'side' );
	add_meta_box( 'postimagediv', esc_html__( 'Set gallery cover', 'koband' ), 'post_thumbnail_meta_box', 'media', 'side' );

	remove_meta_box( 'postimagediv', 'singles', 'side' );
	add_meta_box( 'postimagediv', esc_html__( 'Set cover image', 'koband' ), 'post_thumbnail_meta_box', 'singles', 'side' );

	remove_meta_box( 'postimagediv', 'slides', 'side' );
	add_meta_box( 'postimagediv', esc_html__( 'Set slide images', 'koband' ), 'post_thumbnail_meta_box', 'slides', 'side' );

	remove_meta_box( 'postimagediv', 'the band', 'side' );
	add_meta_box( 'postimagediv', esc_html__( 'Band Member image', 'koband' ), 'post_thumbnail_meta_box', 'the band', 'side' );

}
add_action('do_meta_boxes', 'ko_band_featured_image_metabox_title' );

// Theme Support

function ko_band_theme_support () {

	// Add theme support thumbnails

	//add_theme_support('custom-header', $args);
	//add_theme_support('custom-background', $args);

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'news_thumb', 694, 510, TRUE ); // Hard Crop Mode
	add_image_size( 'gallery_thumb', 553, 546, TRUE ); // Hard Crop Mode
	add_image_size( 'member_thumb', 400, 400, TRUE ); // Hard Crop Mode
	add_image_size( 'single_news_thumb', 1024, 350, TRUE ); // Hard Crop Mode
	
	add_theme_support('html5', array('search-form'));
	add_theme_support( 'automatic-feed-links' );

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


// Search for posts and CPT
add_filter( 'pre_get_posts', 'ko_band_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function ko_band_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'media', 'album', 'tour', 'singles', 'theband' ) );
    $query->query_vars['posts_per_page'] = -1;
    }
    
    return $query;
    
}

