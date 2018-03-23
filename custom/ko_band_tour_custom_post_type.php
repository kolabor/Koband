<?php 


$args = array(
    'labels'  =>  array(
    'menu_name' => 'Tour',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 4,
    'public'    =>  true
);

//Custom post type function

function ko_band_tour_custom_post_type() {

  $label = array(
    'name' => 'Tour',
    'singular_name' => 'Tour',
    'add_new' => 'Add Tour',
    'all_items' => 'All Tours',
    'add_new_item' => 'Add Tour',
    'edit_item' => 'Edit Tour',
    'new_item' => 'New Tour',
    'view_item' => 'View Tour',
    'search_item' => 'Search Tour',
    'not_found' => 'Mo Tour Found',
    'not-found_in_trash' => 'No Tour Found in Trash',
    'parent_item_colon' => 'Parent Tour',
    );

  $args = array(
    'menu_icon' => 'dashicons-calendar-alt',
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor',  'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions', 'post-formats' ),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
    );

register_post_type( 'Tour',$args);
}

add_action( 'init', 'ko_band_tour_custom_post_type' );
  

add_action('add_meta_boxes', 'ko_band_tour_meta_box_init');

function ko_band_tour_meta_box_init(){
        add_meta_box(
        'ko_band_tour_meta_box',
        'Tour Details',
        'ko_band_tour_meta_box',
        'tour',
        'normal',
        'default'
    );

}
function ko_band_tour_meta_box($post, $box){

    global $post;

    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'ko_band_tour_save_meta_box' );
    
    // Get the location data if it's already been entered
        

    $tour_date = get_post_meta( $post->ID, 'ko_band_tour_date', true );
    $tour_country = get_post_meta( $post->ID, 'ko_band_tour_country', true );
    $tour_city = get_post_meta( $post->ID, 'ko_band_tour_city', true );
    $tour_address = get_post_meta( $post->ID, 'ko_band_tour_address', true );
    $tour_zipCode = get_post_meta( $post->ID, 'ko_band_tour_zipCode', true );
    $tour_venue_name = get_post_meta( $post->ID, 'ko_band_tour_venue_name', true );
    $tour_ticket = get_post_meta( $post->ID, 'ko_band_tour_ticket', true );
    $tour_ticket = get_post_meta( $post->ID, 'ko_band_tour_ticket', true );
    $tour_ticket_link = get_post_meta( $post->ID, 'ko_band_tour_ticket_link', true );


    // Output the field
    echo "<p>Tour date:</p>";
    echo '<input type="date" name="ko_band_tour_date" value="' . esc_textarea( $tour_date )  . '" class="widefat" placeholder="Date">';
    
    echo "<p>Tour Country:</p>";
    echo '<input type="text" name="ko_band_tour_country" value="' . esc_textarea( $tour_country )  . '" class="widefat" placeholder="Country">';  

    echo "<p>Tour City:</p>";
    echo '<input type="text" name="ko_band_tour_city" value="' . esc_textarea( $tour_city )  . '" class="widefat" placeholder="City">';
    
    echo "<p>Tour Address:</p>";
    echo '<input type="text" name="ko_band_tour_address" value="' . esc_textarea( $tour_address )  . '" class="widefat" placeholder="Address">';

    echo "<p>Tour ZipCode:</p>";
    echo '<input type="text" name="ko_band_tour_zipCode" value="' . esc_textarea( $tour_zipCode )  . '" class="widefat" placeholder="ZipCode">';

    echo "<p>Tour Venue Name:</p>";
    echo '<input type="text" name="ko_band_tour_venue_name" value="' . esc_textarea( $tour_venue_name )  . '" class="widefat" placeholder="Venue Name">';

    echo "<p>Tour Ticket:</p>";
    echo "<p> On Sale</p>";
    echo '<input type="radio" name="ko_band_tour_ticket" value1="' . esc_textarea( $tour_ticket )  . '" class="widefat" >';
    echo "<p> Sale Out</p>";
    echo '<input type="radio" name="ko_band_tour_ticket" value2="' . esc_textarea( $tour_ticket )  . '" class="widefat" >';

    echo "<p> Ticet Link</p>";
    echo '<input type="text" name="ko_band_tour_ticket_link" value="'. esc_textarea($tour_ticket_link )  . '" class="widefat" placeholder="Ticket Link">';
}


add_action( 'save_post', 'ko_band_tour_save_meta_box' , 1, 2);

function ko_band_tour_save_meta_box( $post_id, $post ) {


/*
if (isset($_POST['ko_band_tour_date'])) {
        if( defiend('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;
        wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_tour_save_meta_box');

        update_post_meta( $post_id, '_ko_band_tour_date',
            sanitizes_text_field ($POST['ko_band_tour_date']));

        update_post_meta( $post_id, '_ko_band_tour_country',
            sanitizes_text_field ($POST['ko_band_tour_country']));

        update_post_meta( $post_id, '_ko_band_tour_city',
            sanitizes_text_field ($POST['ko_band_tour_city']));

        update_post_meta( $post_id, '_ko_band_tour_address',
            sanitizes_text_field ($POST['ko_band_tour_address']));

        update_post_meta( $post_id, '_ko_band_tour_zipCode',
            sanitizes_text_field ($POST['ko_band_tour_zipCode']));

        update_post_meta( $post_id, '_ko_band_tour_venue_name',
            sanitizes_text_field ($POST['ko_band_tour_venue_name']));

        update_post_meta( $post_id, '_ko_band_tour_ticketon',
            sanitizes_text_field ($POST['ko_band_tour_ticketon']));

        update_post_meta( $post_id, '_ko_band_tour_ticket',
            sanitizes_text_field ($POST['ko_band_tour_ticket']));
        
        update_post_meta( $post_id, '_ko_band_tour_ticket_link',
            sanitizes_text_field ($POST['ko_band_tour_ticket_link']));
    }
}

*/

if ( ! current_user_can( 'edit_post', $post_id ) ) {

        return $post_id;

    }

    if (isset($_POST['ko_band_tour_date'])) {


    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce(plugin_basename(__FILE__), 'ko_band_tour_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $tour_meta['ko_band_tour_date'] = esc_textarea( $_POST['ko_band_tour_date'] );
    $tour_meta['ko_band_tour_country'] = esc_textarea( $_POST['ko_band_tour_country'] );
    $tour_meta['ko_band_tour_city'] = esc_textarea( $_POST['ko_band_tour_city'] );
    $tour_meta['ko_band_tour_address'] = esc_textarea( $_POST['ko_band_tour_address'] );
    $tour_meta['ko_band_tour_zipCode'] = esc_textarea( $_POST['ko_band_tour_zipCode'] );
    $tour_meta['ko_band_tour_venue_name'] = esc_textarea( $_POST['ko_band_tour_venue_name'] );
    $tour_meta['ko_band_tour_ticket'] = esc_textarea( $_POST['ko_band_tour_ticket'] );
    $tour_meta['ko_band_tour_ticket_link'] = esc_textarea( $_POST['ko_band_tour_ticket_link'] );

    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $tour_meta as $key => $value ) :

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
