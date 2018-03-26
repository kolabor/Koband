<?php
/**
 * Koband Media custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => 'Media',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 6,
    'public'    =>  true
);

//Custom post type function

function ko_band_media_custom_post_type() {

  $label = array(
    'name' => 'Media',
    'singular_name' => 'Media',
    'add_new' => 'Add Media',
    'all_items' => 'All Medias',
    'add_new_item' => 'Add Media',
    'edit_item' => 'Edit Media',
    'new_item' => 'New Media',
    'view_item' => 'View Media',
    'search_item' => 'Search Media',
    'not_found' => 'Mo Media Found',
    'not-found_in_trash' => 'No Media Found in Trash',
    'parent_item_colon' => 'Parent Media'
    );

  $args = array(
    'menu_icon' => 'dashicons-format-gallery',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail' ),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
);

register_post_type( 'Media',$args);

}

add_action( 'init', 'ko_band_media_custom_post_type' );
  
add_action('add_meta_boxes', 'ko_band_media_meta_box_init');

function ko_band_media_meta_box_init(){
        add_meta_box(
        'ko_band_media_meta_box',
        'Media Details',
        'ko_band_media_meta_box',
        'media',
        'normal',
        'default'
    );

}

function ko_band_media_meta_box($post, $box){

    global $post;

    // Nonce field to validate form request came from current site


   wp_nonce_field( basename( __FILE__ ), 'ko_band_media_save_meta_box' );


    // Get the location data if it's already been entered
        

      
    
    $media_photo = get_post_meta( $post->ID, 'ko_band_media_photo', true );  // Get image ID.
   
    $media_video = get_post_meta( $post->ID, 'ko_band_media_video', true );  // Get image ID.
 


    // Output the field
       
    echo "<p>  Media Photo: </p>";
    echo '<input type="file"  name="ko_band_media_photo" size="36" value="' . esc_html( $media_photo)  . '" class="widefat" placeholder="Media Photo">';  
    
   

    echo "<p>  Media Video: </p>";
    echo '<input type="oembed"  name="ko_band_media_video" size="36" value="' . esc_url( $media_video)  . '" class="widefat" placeholder="Media Video">';  
    
    
  

}


add_action( 'save_post', 'ko_band_media_save_meta_box' , 1, 2);

function ko_band_media_save_meta_box( $post_id, $post ) {

  /*
    if (isset($_POST['ko_band_media_photo'])) {
        if( defiend('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_media_save_meta_box');

        update_post_meta( $post_id, '_ko_band_media_photo',
            sanitizes_text_field ($POST['ko_band_media_photo']));
        update_post_meta( $post_id, '_ko_band_media_photo',
            sanitizes_text_field ($POST['ko_band_media_photo']));
        update_post_meta( $post_id, '_ko_band_media_video',
            sanitizes_text_field ($POST['ko_band_media_video']));
        update_post_meta( $post_id, '_ko_band_media_video',
            sanitizes_text_field ($POST['ko_band_media_video']));
    }
}

*/

if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    } 

    if (isset($_POST['ko_band_media_photo'])) {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce(plugin_basename(__FILE__), 'ko_band_media_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.

    $media_meta['ko_band_media_photo'] = esc_html( $_POST['ko_band_media_photo'] );
    $media_meta['ko_band_media_video'] = esc_url( $_POST['ko_band_media_video'] );

  

    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    
    foreach ( $media_meta as $key => $value ) :

        // Don't store custom data twice

        if ( 'revision' === $post->post_type ) {

            return;
        }

        if ( get_post_meta( $post_id, $key, false ) ) {

            // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );

        } else {

            // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value);

        }

        if ( ! $value ) {

            // Delete the meta key if there's no value
            delete_post_meta( $post_id, $key );

        }

    endforeach;
    } 
}

?> 
