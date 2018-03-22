<?php 


$args = array(
    'labels'  =>  array(
    'menu_name' => 'Singles',
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

function ko_band_register_singles() {

  $label = array(
    'name' => 'Singles',
    'singular_name' => 'Singles',
    'add_new' => 'Add Single',
    'all_items' => 'All Singles',
    'add_new_item' => 'Add Singles',
    'edit_item' => 'Edit Singles',
    'new_item' => 'New Singles',
    'view_item' => 'View Singles',
    'search_item' => 'Search Singles',
    'not_found' => 'No Singles Found',
    'not-found_in_trash' => 'No Singles Found in Trash',
    'parent_item_colon' => 'Parent Singles'
      );
  $args = array(
    'menu_icon' => 'dashicons-media-audio',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats'),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
  );

register_post_type( 'Singles',$args);

}

add_action('init', 'ko_band_register_singles' );
  
add_action('add_meta_boxes', 'ko_band_singles_meta_box_init');

function ko_band_singles_meta_box_init(){
        add_meta_box(
        'ko_band_singles_meta_box',
        'Singles',
        'ko_band_singles_meta_box',
        'singles',
        'normal',
        'default'
    );

}

function ko_band_singles_meta_box($post, $box){

    global $post;

    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'singles_fields' );

    // Get the location data if it's already been entered
        

    $singles_title = get_post_meta( $post->ID, 'ko_band_singles_title', true );
    $singles_text = get_post_meta( $post->ID, 'ko_band_singles_text', true );
    $singles_date = get_post_meta($post->ID, 'ko_band_singles_date', true);


    // Output the field
    echo "<p>Single Title</p>";
    echo '<input type="text" name="ko_band_singles_title" value="' . esc_textarea( $singles_title )  . '" class="widefat" placeholder="The title of the song">';

    echo "<p>Lyrics</p>";
    echo '<input type="text" name="ko_band_singles_text" value="' . esc_textarea( $singles_text )  . '" class="widefat" placeholder="Lyrics of the song">';  

    echo "<p>Date</p>";
    echo '<input type="date" name="ko_band_singles_date" value="' . esc_textarea( $singles_date )  . '" class="widefat" placeholder="Date when the song relased for the first time">';    

}


add_action( 'save_post', 'ko_band_singles_save_meta_box' , 1, 2);

function ko_band_singles_save_meta_box( $post_id, $post ) {


    if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce(plugin_basename(__FILE__), 'singles_fields' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $singles_meta['ko_band_singles_title'] = esc_textarea( $_POST['ko_band_singles_title'] );
    $singles_meta['ko_band_singles_text'] = esc_textarea( $_POST['ko_band_singles_text'] );
    $singles_meta['ko_band_singles_date'] = esc_textarea( $_POST['ko_band_singles_date'] );

  

    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $singles_meta as $key => $value ) :

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
