<?php 


$args = array(
  'labels'  =>  array(

            'menu_name' => 'Song',
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
function ko_band_song_custom_post_type() {

  $label = array(
    'name' => 'Song',
    'singular_name' => 'Song',
    'add_new' => 'Add Song',
    'all_items' => 'All Songs',
    'add_new_item' => 'Add Song',
    'edit_item' => 'Edit Song',
    'new_item' => 'New Song',
    'view_item' => 'View Song',
    'search_item' => 'Search Song',
    'not_found' => 'Mo Song Found',
    'not-found_in_trash' => 'No Song Found in Trash',
    'parent_item_colon' => 'Parent Song'
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

    register_post_type( 'Song',$args);
 }

 add_action( 'init', 'ko_band_song_custom_post_type' );
  
add_action('add_meta_boxes', 'ko_band_song_meta_box_init');

 function ko_band_song_meta_box_init(){
         add_meta_box(
        'ko_band_song_meta_box',
        'Song Details',
        'ko_band_song_meta_box',
        'song',
        'normal',
        'default'
    );

 }
 function ko_band_song_meta_box($post, $box){

    global $post;
    // Nonce field to validate form request came from current site
    wp_nonce_field( basename( __FILE__ ), 'event_fields' );
    // Get the location data if it's already been entered
        

      $song_title = get_post_meta( $post->ID, 'ko_band_song_title', true );
      $song_lyric = get_post_meta( $post->ID, 'ko_band_song_lyric', true );

      $song_plarform = get_post_meta( $post->ID, 'ko_band_song_platform', true );
   


    // Output the field
     echo "<p>  Song Title: </p>";
    echo '<input type="text" name="ko_band_song_title" value="' . esc_textarea( $song_title )  . '" class="widefat" placeholder="Song Title">';  
       echo "<p>  Song Cover: </p>";
    echo '<input type="text" name="ko_band_song_lyric" value="' . esc_textarea( $song_lyric )  . '" class="widefat" placeholder="Song Cover">';    
  echo "<p>  Song Button: </p>";
    echo '<input type="submit" class="button-primary" value="Save Changes" " class="widefat">';    


    echo "<p>  Song Platform: </p>";
    echo '<input type="text" name="ko_band_song_platform" value="' . esc_textarea( $song_plarform )  . '" class="widefat" placeholder="Song Platform">';  
      
}


add_action( 'save_post', 'ko_band_song_save_meta_box' , 1, 2);

function ko_band_song_save_meta_box( $post_id, $post ) {


 if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    if ( ! isset( $_POST['ko_band_song_title'] ) || ! wp_verify_nonce( $_POST['event_fields'], basename(__FILE__) ) ) {

        return $post_id;

    }

   // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $song_meta['ko_band_song_title'] = esc_textarea( $_POST['ko_band_song_title'] );
    $song_meta['ko_band_song_lyric'] = esc_textarea( $_POST['ko_band_song_lyric'] );
    $song_meta['ko_band_song_platform'] = esc_textarea( $_POST['ko_band_song_platform'] );
  

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
