<?php 


$args = array(
  'labels'  =>  array(

            'menu_name' => 'Album',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 5,
    'public'    =>  true
);
//Custom post type function
function ko_band_album_custom_post_type() {

  $label = array(
    'name' => 'Album',
    'singular_name' => 'Album',
    'add_new' => 'Add Album',
    'all_items' => 'All Albums',
    'add_new_item' => 'Add Album',
    'edit_item' => 'Edit Album',
    'new_item' => 'New Album',
    'view_item' => 'View Album',
    'search_item' => 'Search Album',
    'not_found' => 'Mo Album Found',
    'not-found_in_trash' => 'No Album Found in Trash',
    'parent_item_colon' => 'Parent Album'
      );
  $args = array(
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks',  'comments', 'revisions', 'post-formats' ),
    
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
  );

    register_post_type( 'Album',$args);
 }

 add_action( 'init', 'ko_band_album_custom_post_type' );
  
add_action('add_meta_boxes', 'ko_band_album_meta_box_init');

 function ko_band_album_meta_box_init(){
         add_meta_box(
        'ko_band_album_meta_box',
        'Album Details',
        'ko_band_album_meta_box',
        'album',
        'normal',
        'default'
    );

 }
 function ko_band_album_meta_box($post, $box){

    global $post;
    // Nonce field to validate form request came from current site
    wp_nonce_field( basename( __FILE__ ), 'event_fields' );
    // Get the location data if it's already been entered
        

      $album_title = get_post_meta( $post->ID, 'ko_band_album_title', true );
      $album_cover = get_post_meta( $post->ID, 'ko_band_album_cover', true );
     $album_name = get_post_meta( $post->ID, 'ko_band_album_name', true );
   


    // Output the field
     echo "<p>  Album Title: </p>";
    echo '<input type="text" name="ko_band_album_title" value="' . esc_textarea( $album_title )  . '" class="widefat" placeholder="Album Title">';  
       echo "<p>  Album Cover: </p>";
    echo '<input type="link" name="ko_band_album_cover" value="' . esc_html( $album_cover )  . '" class="widefat" placeholder="Album Cover">';    echo "<p>  Album Name: </p>";
    echo '<input type="text" name="ko_band_album_name" value="' . esc_textarea( $album_name )  . '" class="widefat" placeholder="Album Name">';  
      
}


add_action( 'save_post', 'ko_band_album_save_meta_box' , 1, 2);

function ko_band_album_save_meta_box( $post_id, $post ) {


 if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    if ( ! isset( $_POST['ko_band_album_title'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) {

        return $post_id;

    }

   // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $album_meta['ko_band_album_cover'] = esc_html( $_POST['ko_band_album_cover'] );
    $album_meta['ko_band_album_name'] = esc_textarea( $_POST['ko_band_album_name'] );
  

      // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $album_meta as $key => $value ) :

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

?>
