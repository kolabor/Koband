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
    'supports' => array('title', 'thumbnail' ),
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
        <div class="row-blank"><?php _e('Select your slider type:', 'koband'); ?></div>
        <div class="row-top">
                    <div id="image-slider" class="col-sm"><?php _e('Slide types', 'koband');?></div>
                    <div id="slide-title" class="col-sm"><?php _e('Video Holder:', 'koband');?></div>
        </div>
        <div class="row">
            <div class="col-sm slide-radio"><input id="radio1" type="radio" name="ko_band_slides_check" value="image" checked="checked" class="slidecheck"<?php  if($slides_check == 'image') {echo "checked";} ?>><?php _e('Image', 'koband');?><br>
            <input id="radio2" type="radio" name="ko_band_slides_check" value="video" class="slidecheck"<?php  if($slides_check == 'video') {echo "checked";} ?>><?php _e('Video', 'koband');?></div>
            <div class="col-sm"><input id="slider-video" type="text" name="ko_band_slides_video" value="<?php echo esc_textarea( $slides_video )?>" placeholder= "<?php _e('Embed Video Link', 'koband');?>" class="slidevideo"></div>
        </div>

        <div class="row">
                    <div class="col-sm"><?php _e('Title:', 'koband');?></div>
                    <div class="col-sm"><?php _e('Subtitle:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="text" name="ko_band_slides_title" value="<?php echo esc_textarea( $slides_title )?>" placeholder= "<?php _e('Add Slide Title', 'koband');?>" class="slidetitle"></div>
            <div class="col-sm"><textarea type="text" name="ko_band_slides_subtitle" maxlength="250" placeholder= "<?php _e('Add Slide Text', 'koband');?>" class="slidesub"><?php echo esc_textarea( $slides_subtitle )?></textarea></div>
        </div>

        <div class="row">
                    <div class="col-sm"><?php _e('Button Title:', 'koband');?></div>
                    <div class="col-sm"><?php _e('Button Link:', 'koband');?></div>
        </div>

        <div class="row">        
            <div class="col-sm"><input type="text" name="ko_band_slides_button_title" value="<?php echo esc_textarea( $slides_button_title )?>" placeholder= "<?php _e('Add Button Text', 'koband');?>" class="slidebutton"></div>
            <div class="col-sm"><input type="text" name="ko_band_slides_button_link" value="<?php echo esc_textarea( $slides_button_link )?>" placeholder="<?php _e('Add Button Link', 'koband');?>" class="slidebuttonlink"></div>
        </div>
    </div>
  <?php }


add_action( 'save_post', 'ko_band_slides_save_meta_box' , 1, 2);

function ko_band_slides_save_meta_box( $post_id, $post ) 
{
    if( !current_user_can( 'edit_post', $post_id ) ) 
        {
            return $post_id;
        }
    if (isset($_POST['ko_band_slides_check']))
    {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $slides_meta['ko_band_slides_check'] = esc_attr( $_POST['ko_band_slides_check'] ); 
    $slides_meta['ko_band_slides_video'] = esc_textarea( $_POST['ko_band_slides_video'] );
    $slides_meta['ko_band_slides_title'] = esc_textarea( $_POST['ko_band_slides_title'] );
    $slides_meta['ko_band_slides_subtitle'] = esc_textarea( $_POST['ko_band_slides_subtitle'] );
    $slides_meta['ko_band_slides_button_title'] = esc_textarea( $_POST['ko_band_slides_button_title'] );
    $slides_meta['ko_band_slides_button_link'] = esc_textarea( $_POST['ko_band_slides_button_link'] ); 
   
    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $slides_meta as $key => $value ) :

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

        if ( ! $value ) {

            // Delete the meta key if there's no value
            delete_post_meta( $post_id, $key );
        }

    endforeach;
    } 
}
?> 