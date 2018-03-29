<?php
/**
 * Koband Slides custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => __('Slides', 'koband')
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

function ko_band_register_slides() {

  $label = array(
    'name' => __('Slides', 'koband'),
    'singular_name' => __('Slides', 'koband'),
    'add_new' => __('Add Slide', 'koband'),
    'all_items' => __('All Slides', 'koband'),
    'add_new_item' => __('Add Slides','koband'),
    'edit_item' => __('Edit Slides', 'koband'),
    'new_item' => __('New Slides', 'koband'),
    'view_item' => __('View Slides','koband'),
    'search_item' => __('Search Slides', 'koband'),
    'not_found' => __('No Slides Found', 'koband'),
    'not-found_in_trash' => __('No Slides Found in Trash', 'koband'),
    'parent_item_colon' => __('Parent Slides', 'koband')
    );
  
  $args = array(
    'menu_icon' => 'dashicons-images-alt',
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

register_post_type( __('Slides', 'koband'),$args);

}

add_action('init', 'ko_band_register_slides');

add_action('add_meta_boxes', 'ko_band_slides_meta_box_init');

function ko_band_slides_meta_box_init(){
        add_meta_box(
        'ko_band_slides_meta_box',
        __('Slides','koband'),
        'ko_band_slides_meta_box',
        'slides',
        'normal',
        'default'
    );

}

function ko_band_slides_meta_box($post, $box){

    global $post;
    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Get the location data if it's already been entered

    $slides_check = get_post_meta( $post->ID, 'ko_band_slides_check', true );
    $slides_video = get_post_meta( $post->ID, 'ko_band_slides_video', true );
    $slides_title = get_post_meta( $post->ID, 'ko_band_slides_title', true );
    $slides_subtitle = get_post_meta( $post->ID, 'ko_band_slides_subtitle', true );
    $slides_button_title = get_post_meta( $post->ID, 'ko_band_slides_button_title', true );
    $slides_button_link = get_post_meta( $post->ID, 'ko_band_slides_button_link', true );

    // Output the field ?>

    <div class="container">
        <div class="row">
            <div class="col-sm"><?php _e('If you want video slider please check here:', 'koband');?></div>
            <div class="col-sm"><?php _e('Video Holder:', 'koband');?></div>
            <div class="col-sm"><?php _e('Title:', 'koband');?></div>
            <div class="col-sm"><?php _e('Subtitle:', 'koband');?></div>
            <div class="col-sm"><?php _e('Button Title:', 'koband');?></div>
            <div class="col-sm"><?php _e('Button Link:', 'koband');?></div>

        </div>
        <div class="row">
            <div class="col-sm">
                <input type="text" name="ko_band_slides_title" value="<?php esc_textarea( $slides_title )?>" placeholder="Text title on slide" class="slidetitle">
            </div>
            <div class="col-sm">
                <input type="text" name="ko_band_slides_subtitle" value="<?php esc_textarea( $slides_subtitle )?>" placeholder="Text subtitle on slide" class="slidesub">
                <input type="text" name="ko_band_slides_video" value="<?php esc_textarea( $slides_video )?>" placeholder= "<?php _e('Please paste here embed video', 'koband');?>" class="slidevideo">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <input type="text" name="ko_band_slides_title" value="<?php esc_textarea( $slides_title )?>" placeholder= "<?php _e('Text title on slide', 'koband');?>" class="slidetitle">
            </div>
            <div class="col-sm">
                <input type="text" name="ko_band_slides_subtitle" value="<?php esc_textarea( $slides_subtitle )?>" placeholder= "<?php _e('Text subtitle on slide', 'koband');?>" class="slidesub">
            </div>
        </div>
        <div class="row">        
            <div class="col-sm">
                <input type="text" name="ko_band_slides_button_title" value="<?php esc_textarea( $slides_button_title )?>" placeholder= "<?php _e('Button Title', 'koband');?>" class="slidebutton">
            </div>
            <div class="col-sm">
                <input type="text" name="ko_band_slides_button_link" value="<?php esc_textarea( $slides_button_link )?>" placeholder="<?php _e('Please paste here button link', 'koband');?>" class="slidebuttonlink">
            </div>
        </div>
    </div>





     <?php


 }


add_action( 'save_post', 'ko_band_slides_save_meta_box' , 1, 2);

function ko_band_slides_save_meta_box( $post_id, $post ) {

/*    if (isset($_POST['ko_band_slides_check'])) {
        if( defiend('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;
        wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box');

        update_post_meta( $post_id, '_ko_band_slides_check',
            sanitizes_text_field ($POST['ko_band_slides_check']));
        update_post_meta( $post_id, '_ko_band_slides_video',
            sanitizes_text_field ($POST['ko_band_slides_video']));
        update_post_meta( $post_id, '_ko_band_slides_title',
            sanitizes_text_field ($POST['ko_band_slides_title']));
        update_post_meta( $post_id, '_ko_band_slides_subtitle',
            sanitizes_text_field ($POST['ko_band_slides_subtitle']));
        update_post_meta( $post_id, '_ko_band_slides_button_title',
            sanitizes_text_field ($POST['ko_band_slides_button_title']));
        update_post_meta( $post_id, '_ko_band_slides_button_link',
            sanitizes_text_field ($POST['ko_band_slides_button_link']));
    }
}

*/


if( !current_user_can( 'edit_post', $post_id ) ) {
     
        return $post_id;
    }

    if (isset($_POST['ko_band_slides_check'])) {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $slides_meta['ko_band_slides_check'] = esc_textarea( $_POST['ko_band_slides_check'] ); 
    $slides_meta['ko_band_slides_video'] = esc_textarea( $_POST['ko_band_slides_video'] );
    $slides_meta['ko_band_slides_title'] = esc_textarea( $_POST['ko_band_slides_title'] );
    $slides_meta['ko_band_slides_subtitle'] = esc_textarea( $_POST['ko_band_slides_subtitle'] );
    $slides_meta['ko_band_slides_button_title'] = esc_textarea( $_POST['ko_band_slides_button_title'] );
    $slides_meta['ko_band_slides_button_link'] = esc_textarea( $_POST['ko_band_slides_button_link'] ); 
   
    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $slides_meta as $key => $value ) :

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