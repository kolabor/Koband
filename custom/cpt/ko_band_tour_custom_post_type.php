<?php
/**
 * Koband Tour(events) custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


$args = array(
    'labels'  =>  array(
    'menu_name' => __('Tour/Event', 'koband')
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
    'name' => __('Tour/Event', 'koband'),
    'singular_name' => __('Tour/Event', 'koband'),
    'add_new' => __('Add Tour/Event', 'koband'),
    'all_items' => __('All Tour/Events', 'koband'),
    'add_new_item' => __('Add Tour/Event', 'koband'),
    'edit_item' => __('Edit Tour/Event', 'koband'),
    'new_item' => __('New Tour/Event', 'koband'),
    'view_item' => __('View Tour/Event', 'koband'),
    'search_item' => __('Search Tour/Event', 'koband'),
    'not_found' => __('Mo Tour/Event Found', 'koband'),
    'not-found_in_trash' => __('No Tour/Event Found in Trash', 'koband'),
    'parent_item_colon' => __('Parent Tour/Event', 'koband')
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
    'supports' => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
    );

register_post_type( __('Tour', 'koband'), $args);

}

add_action( 'init', 'ko_band_tour_custom_post_type' );
  

add_action('add_meta_boxes', 'ko_band_tour_meta_box_init');

function ko_band_tour_meta_box_init(){
        add_meta_box(
        'ko_band_tour_meta_box',
        __('Tour Details', 'koband'),
        'ko_band_tour_display_meta_box',
        'tour',
        'normal',
        'default'
    );

}
function ko_band_tour_display_meta_box($post, $box){

    global $post;

    // Nonce field to validate form request came from current site

    $song_details = get_post_meta($post->ID, 'ko_band_tour_details', true);
    wp_nonce_field( 'ko_band_tour_save_meta_box_nonce', 'ko_band_tour_save_meta_box_nonce' );

   
    // Get the location data if it's already been entered
        

    $tour_date = get_post_meta( $post->ID, 'ko_band_tour_date', true );
    $tour_country = get_post_meta( $post->ID, 'ko_band_tour_country', true );
    $tour_city = get_post_meta( $post->ID, 'ko_band_tour_city', true );
    $tour_address = get_post_meta( $post->ID, 'ko_band_tour_address', true );
    $tour_zipCode = get_post_meta( $post->ID, 'ko_band_tour_zipCode', true );
    $tour_venue_name = get_post_meta( $post->ID, 'ko_band_tour_venue_name', true );
    $tour_ticket = get_post_meta( $post->ID, 'ko_band_tour_ticket', true );
   // $tour_ticket = get_post_meta( $post->ID, 'ko_band_tour_ticket', true );
    $tour_ticket_link = get_post_meta( $post->ID, 'ko_band_tour_ticket_link', true );


    // Output the field?>

    <div class="container">
        <div class="row blank">
         <div class="col-sm"><?php __('Fill the tour informations', 'koband');?></div></div>
        <div class="row-top row">
            <div class="col-sm"><?php __('Date:', 'koband');?></div>
            <div class="col-sm"><?php __('Country:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="date" name="ko_band_tour_date" value="'<?php echo esc_html( $tour_date )?>" class="widefat" placeholder="<?php __('Date', 'koband');?>"></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_country" value="<?php echo esc_textarea( $tour_country )?>" class="widefat" placeholder="<?php __('Country', 'koband');?>"></div>
        </div>

        <div class="row">
            <div class="col-sm"><?php __('City:', 'koband');?></div>
            <div class="col-sm"><?php __('Address:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="text" name="ko_band_tour_city" value="<?php echo esc_textarea( $tour_city )?>" class="widefat" placeholder="<?php __('City', 'koband');?>"></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_address" value="<?php echo esc_textarea( $tour_address )?>" class="widefat" placeholder="<?php __('Address', 'koband');?>"></div>
        </div>

        <div class="row">
            <div class="col-sm"><?php __('ZipCode:', 'koband');?></div>
            <div class="col-sm"><?php __('Venue:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="number" name="ko_band_tour_zipCode" value="<?php echo esc_attr( $tour_zipCode )?>" class="widefat" placeholder="<?php __('ZipCode', 'koband');?>"></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_venue_name" value="<?php echo esc_textarea( $tour_venue_name )?>" class="widefat" placeholder="<?php __('Venue', 'koband');?>"></div>
        </div>

        <div class="row blank">
            <div class="col-sm"><?php __('Please, using radio buttons check if there are available tickes and ADD the link of the store where tickets can be found', 'koband');?></div>
        </div>

        <div class="row-top">
            <div class="col-sm"><?php __('Tickets Availability', 'koband');?></div>
            <div id="tickets-title" class="col-sm"><?php __('Ticket Link', 'koband');?></div>
        </div>
        <div class="row radio_btns_row">
            <div class="col-sm">
                    <input id="id_radio1" type="radio" name="ko_band_tour_ticket" value="avaliable" class="radio1" checked="checked" <?php  if($tour_ticket == 'avaliable') {echo "checked";} ?> /> <?php __('Available', 'koband');?><br>
                    <input id="id_radio2" type="radio" name="ko_band_tour_ticket" value="soldout" class="radio2"<?php if($tour_ticket == 'soldout') {echo "checked";} ?> /> <?php __('Sold Out', 'koband');?>
            </div>

            <div class="col-sm"><input id="tickets-link" type="url" name="ko_band_tour_ticket_link" value="<?php echo esc_attr($tour_ticket_link )?>" class="widefat" placeholder="http://www.amazon.com"></div>
        </div>
    </div>

     <?php }


add_action( 'save_post', 'ko_band_tour_save_meta_box' , 1, 2);

function ko_band_tour_save_meta_box( $post_id, $post ) {

    // Verify this came from the screen and with proper authorization,

 if ( ! isset( $_POST['ko_band_tour_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_tour_save_meta_box_nonce'], 'ko_band_tour_save_meta_box_nonce' ) )
            return;

    if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
      
    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $tour_meta['ko_band_tour_date'] = esc_textarea( $_POST['ko_band_tour_date'] );
    $tour_meta['ko_band_tour_country'] = esc_textarea( $_POST['ko_band_tour_country'] );
    $tour_meta['ko_band_tour_city'] = esc_textarea( $_POST['ko_band_tour_city'] );
    $tour_meta['ko_band_tour_address'] = esc_attr( $_POST['ko_band_tour_address'] );
    $tour_meta['ko_band_tour_zipCode'] = esc_textarea( $_POST['ko_band_tour_zipCode'] );
    $tour_meta['ko_band_tour_venue_name'] = esc_textarea( $_POST['ko_band_tour_venue_name'] );
    $tour_meta['ko_band_tour_ticket'] = esc_attr($_POST['ko_band_tour_ticket']);
    $tour_meta['ko_band_tour_ticket_link'] = esc_attr( $_POST['ko_band_tour_ticket_link'] );

    // Cycle through the $tour_meta array.
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



?>  
