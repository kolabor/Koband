<?php 


$args = array(
    'labels'  =>  array(
    'menu_name' => 'The Band',
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

function ko_band_the_band_custom_post_type() {

  $label = array(
    'name' => 'The Band',
    'singular_name' => 'The Band',
    'add_new' => 'Add The Band',
    'all_items' => 'All The Bands',
    'add_new_item' => 'Add The Band',
    'edit_item' => 'Edit The Band',
    'new_item' => 'New The Band',
    'view_item' => 'View The Band',
    'search_item' => 'Search The Band',
    'not_found' => 'Mo The Band Found',
    'not-found_in_trash' => 'No The Band Found in Trash',
    'parent_item_colon' => 'Parent The Band'
    );

  $args = array(
    'menu_icon' => 'dashicons-groups',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
   'supports' => array('title', 'editor', 'thumbnail', 'excerpt',  'comments', 'revisions', 'post-formats' ),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

    
    );

register_post_type( 'The Band',$args);

}

add_action( 'init', 'ko_band_the_band_custom_post_type' );
  
add_action('add_meta_boxes', 'ko_band_the_band_meta_box_init');

function ko_band_the_band_meta_box_init(){
        add_meta_box(
        'ko_band_the_band_meta_box',
        'The Band Details',
        'ko_band_the_band_meta_box',
        'the band',
        'normal',
        'default'
    );

}
function ko_band_the_band_meta_box($post, $box){

    global $post;

    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'ko_band_the_band_save_meta_box' );

    // Get the location data if it's already been entered
        

    $the_band_bio = get_post_meta( $post->ID, 'ko_band_the_band_bio', true );
    $the_band_success = get_post_meta( $post->ID, 'ko_band_the_band_success', true );
    $the_band_award = get_post_meta( $post->ID, 'ko_band_the_band_award', true );
    $the_band_photo = get_post_meta( $post->ID, 'ko_band_the_band_photo', true );  // Get image ID.
    $url = wp_get_attachment_url( $the_band_photo ); // Get the URL only.
        wp_get_attachment_image( $the_band_photo );  // Get a full image tag.
   


    // Output the field
    echo "<p>  The Band Biography: </p>";
    echo '<input type="text" name="ko_band_the_band_bio" value="' . esc_textarea( $the_band_bio )  . '" class="widefat" placeholder="The Band Biography">';

    echo "<p>  The Band Success: </p>";
    echo '<input type="text" name="ko_band_the_band_success" value="' . esc_textarea( $the_band_success )  . '" class="widefat" placeholder="The Band Success">'; 

    echo "<p>  The Band Award: </p>";
    echo '<input type="text" name="ko_band_the_band_award" value="' . esc_textarea( $the_band_award )  . '" class="widefat" placeholder="The Band Award">'; 

    echo "<p>  The Band Photo: </p>";
    echo '<input type="file"  id="upload_image" name="ko_band_the_band_photo" size="36" value="' . esc_html( $the_band_photo )  . '" class="widefat" placeholder="The Band Photo">';

   
  

}


add_action( 'save_post', 'ko_band_the_band_save_meta_box' , 1, 2);

function ko_band_the_band_save_meta_box( $post_id, $post ) {

/*
    if (isset($_POST['ko_band_the_band_bio'])) {
        if( defiend('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_the_band_save_meta_box');

        update_post_meta( $post_id, '_ko_band_the_band_bio',
            sanitizes_text_field ($POST['ko_band_the_band_bio']));
        update_post_meta( $post_id, '_ko_band_the_band_success',
            sanitizes_text_field ($POST['ko_band_the_band_success']));
        update_post_meta( $post_id, '_ko_band_the_band_award',
            sanitizes_text_field ($POST['ko_band_the_band_award']));
        update_post_meta( $post_id, '_ko_band_the_band_photo',
            sanitizes_text_field ($POST['ko_band_the_band_photo']));
        update_post_meta( $post_id, '_ko_band_the_band_photo',
            sanitizes_text_field ($POST['ko_band_the_band_photo']));
    }
}

*/


if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    if (isset($_POST['ko_band_the_band_bio'])) {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce(plugin_basename(__FILE__), 'ko_band_the_band_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $the_band_meta['ko_band_the_band_bio'] = esc_textarea( $_POST['ko_band_the_band_bio'] );
    $the_band_meta['ko_band_the_band_success'] = esc_textarea( $_POST['ko_band_the_band_success'] );
    $the_band_meta['ko_band_the_band_award'] = esc_textarea( $_POST['ko_band_the_band_award'] );
    $the_band_photo['ko_band_the_band_photo'] = esc_html( $_POST['ko_band_the_band_photo'] ); 
  

    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $the_band_meta as $key => $value ) :

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