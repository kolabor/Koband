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
    'menu_name' => esc_html__('Tour/Event', 'koband')
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
    'name' => esc_html__('Tour/Event', 'koband'),
    'singular_name' => esc_html__('Tour/Event', 'koband'),
    'add_new' => esc_html__('Add Tour/Event', 'koband'),
    'all_items' => esc_html__('All Tour/Events', 'koband'),
    'add_new_item' => esc_html__('Add Tour/Event', 'koband'),
    'edit_item' => esc_html__('Edit Tour/Event', 'koband'),
    'new_item' => esc_html__('New Tour/Event', 'koband'),
    'view_item' => esc_html__('View Tour/Event', 'koband'),
    'search_item' => esc_html__('Search Tour/Event', 'koband'),
    'not_found' => esc_html__('Mo Tour/Event Found', 'koband'),
    'not-found_in_trash' => esc_html__('No Tour/Event Found in Trash', 'koband'),
    'parent_item_colon' => esc_html__('Parent Tour/Event', 'koband')
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
    'supports' => array('title', 'editor'),
    'taxonomies' => array('category', 'post_type', 'post_tag'),
    'exclude_from_search' =>false,

  
    );

register_post_type( esc_html__('Tour', 'koband'), $args);

}

add_action( 'init', 'ko_band_tour_custom_post_type' );
  

add_action('add_meta_boxes', 'ko_band_tour_meta_box_init');

function ko_band_tour_meta_box_init(){
        add_meta_box(
        'ko_band_tour_meta_box',
        esc_html__('Tour Details', 'koband'),
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
    $tour_ticket_link = get_post_meta( $post->ID, 'ko_band_tour_ticket_link', true );


    // Output the field?>

    <div class="container">
        <div class="row blank">
         <div class="col-sm"><?php echo esc_html__('Fill the tour informations', 'koband');?></div></div>
        <div class="row-top row">
            <div class="col-sm"><?php echo esc_html__('Date:', 'koband');?></div>
            <div class="col-sm"><?php echo esc_html__('Country:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="date" name="ko_band_tour_date" value="<?php echo esc_attr( $tour_date );?>" class="widefat" ></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_country" value="<?php echo esc_attr( $tour_country );?>" class="widefat" placeholder="<?php echo esc_html__('Country', 'koband');?>"></div>
        </div>

        <div class="row">
            <div class="col-sm"><?php echo esc_html__('City:', 'koband');?></div>
            <div class="col-sm"><?php echo esc_html__('Address:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="text" name="ko_band_tour_city" value="<?php echo esc_attr( $tour_city );?>" class="widefat" placeholder="<?php echo esc_html__('City', 'koband');?>"></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_address" value="<?php echo esc_attr( $tour_address );?>" class="widefat" placeholder="<?php echo esc_html__('Address', 'koband');?>"></div>
        </div>

        <div class="row">
            <div class="col-sm"><?php echo esc_html__('ZipCode:', 'koband');?></div>
            <div class="col-sm"><?php echo esc_html__('Venue:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="number" name="ko_band_tour_zipCode" value="<?php echo esc_attr( $tour_zipCode );?>" class="widefat" placeholder="<?php echo esc_html__('ZipCode', 'koband');?>"></div>
            <div class="col-sm"><input type="text" name="ko_band_tour_venue_name" value="<?php echo esc_attr( $tour_venue_name );?>" class="widefat" placeholder="<?php echo esc_html__('Venue', 'koband');?>"></div>
        </div>

        <div class="row blank">
            <div class="col-sm"><?php echo esc_html__('Please, using radio buttons check if there are available tickes and ADD the link of the store where tickets can be found', 'koband');?></div>
        </div>

        <div class="row-top">
            <div class="col-sm"><?php echo esc_html__('Tickets Availability', 'koband');?></div>
            <div id="tickets-title" class="col-sm"><?php echo esc_html__('Ticket Link', 'koband');?></div>
        </div>
        <div class="row radio_btns_row">
            <div class="col-sm">
                    <input id="id_radio1" type="radio" name="ko_band_tour_ticket" value="avaliable" class="radio1" checked="checked" <?php  if($tour_ticket == 'avaliable') {echo esc_attr("checked");} ?> /> <?php echo esc_html__('Available', 'koband');?><br>
                    <input id="id_radio2" type="radio" name="ko_band_tour_ticket" value="soldout" class="radio2"<?php if($tour_ticket == 'soldout') {echo esc_attr("checked");} ?> /> <?php echo esc_html__('Sold Out', 'koband');?>
            </div>

            <div class="col-sm"><input id="tickets-link" type="url" name="ko_band_tour_ticket_link" value="<?php echo esc_attr($tour_ticket_link );?>" class="widefat" placeholder="http://www.amazon.com"></div>
        </div>
    </div>

     <?php }


add_action( 'save_post', 'ko_band_tour_save_meta_box' , 1, 2);

function ko_band_tour_save_meta_box( $post_id, $post ) 
{
    // Verify this came from the screen and with proper authorization,
    if ( ! isset( $_POST['ko_band_tour_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_tour_save_meta_box_nonce'], 'ko_band_tour_save_meta_box_nonce' ) )
            return;

        if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
      
    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $tour_meta['ko_band_tour_date'] = esc_html( $_POST['ko_band_tour_date'] );
    $tour_meta['ko_band_tour_country'] = esc_html( $_POST['ko_band_tour_country'] );
    $tour_meta['ko_band_tour_city'] = esc_html( $_POST['ko_band_tour_city'] );
    $tour_meta['ko_band_tour_address'] = esc_html( $_POST['ko_band_tour_address'] );
    $tour_meta['ko_band_tour_zipCode'] = esc_html( $_POST['ko_band_tour_zipCode'] );
    $tour_meta['ko_band_tour_venue_name'] = esc_html( $_POST['ko_band_tour_venue_name'] );
    $tour_meta['ko_band_tour_ticket'] = esc_html($_POST['ko_band_tour_ticket']);
    $tour_meta['ko_band_tour_ticket_link'] = esc_html( $_POST['ko_band_tour_ticket_link'] );

    // Cycle through the $tour_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $tour_meta as $key => $value ) :

        // Don't store custom data twice

        if ( 'revision' === $post->post_type ) 
        {
            return;
        }
        if ( get_post_meta( $post_id, $key, false ) ) {

            // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );
        } else {

            // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value);
        }

        if ( ! $value ) 
        {
            // Delete the meta key if there's no value
            delete_post_meta( $post_id, $key );
        }
    endforeach;
    }

