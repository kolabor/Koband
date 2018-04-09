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

	// Add theme support thumnails

	add_theme_support('post-thumbnails');

	//Menu

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'koband'),
		'footer' => __('Footer Menu', 'koband')
	));
	// Add theme support Post Format Support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'ko_band_theme_support'); 

//Widget Locations
function init_widgets($id){
	register_sidebar(array(
		'name' => __('Sidebar','koband'),
		'id' => 'sidebar',
		'before_sidebar' => '<duv  class="side-sidebar">',
		'after_sidebar' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Widgets 1', 'koband'),
		'id' => 'widgets_1',
		'before_widget' => '<duv  class="side-widgets_1">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Widgets 2', 'koband'),
		'id' => 'widgets_2',
		'before_widget' => '<duv  class="side-widgets_2">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Widgets 3', 'koband'),
		'id' => 'widgets_3',
		'before_widget' => '<duv  class="side-widgets_3">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Widgets 4', 'koband'),
		'id' => 'widgets_4',
		'before_widget' => '<duv  class="side-widgets_4">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
add_action('widgets_init', 'init_widgets');




/*Function to generate Theme Colors dynamicly*/
/*wp_enqueue_style('theme_colors',
                 admin_url('admin-ajax.php').'?action=theme_colors'
                 );
function theme_colors() {
  require(get_template_directory().'/style/ko_band_dynamic.css.php');
  exit;
}
add_action('wp_ajax_theme_colors', 'theme_colors');
add_action('wp_ajax_nopriv_theme_colors', 'theme_colors');*/

/*function theme_enqueue_styles() {
  wp_enqueue_style( 'theme-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style( 'theme-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

*/


/*function ko_band_dynamic_css() {
	?>
	<style>
	<?php header('Content-type: text/css');?>

	<?php
	$main_theme_first_color = get_theme_mod( 'ko_band_main_color' );
$main_theme_second_color = get_theme_mod( 'ko_band_second_color' );
$main_theme_third_color = get_theme_mod( 'ko_band_third_color' );
?>
	
	body {
		
		background-color: <?php echo $main_theme_first_color; ?> !important;
		 border: 8px solid <?php echo $main_theme_second_color; ?> !important;
	}
	</style>
	<?php
}
add_action( 'wp_head' , 'ko_band_dynamic_css' );*/


/* Register frontend resources */

function ko_band_custom_wp_front_resources() {

	if( !is_admin() ) { wp_enqueue_style( 'style', get_stylesheet_uri() );} 
}
add_action( 'wp_enqueue_scripts', 'ko_band_custom_wp_front_resources' );
/* Register frontend resources ends here */

?>