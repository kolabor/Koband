<?php
/**
 * Koband Slides custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


/* Declare Slides cpt arguments */
$args = array(
    'labels'  =>  array(
    'menu_name' => esc_html__('Slides', 'koband')
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
    'name' => esc_html__('Slider', 'koband'),
    'singular_name' => esc_html__('Slider', 'koband'),
    'add_new' => esc_html__('Add Slides', 'koband'),
    'all_items' => esc_html__('All Slides', 'koband'),
    'add_new_item' => esc_html__('Add Slides', 'koband'),
    'edit_item' => esc_html__('Edit Slides', 'koband'),
    'new_item' => esc_html__('New Slides', 'koband'),
    'view_item' => esc_html__('View Slides','koband'),
    'search_item' => esc_html__('Search Slides', 'koband'),
    'not_found' => esc_html__('No Slides Found', 'koband'),
    'not-found_in_trash' => esc_html__('No Slides Found in Trash', 'koband'),
    'parent_item_colon' => esc_html__('Parent Slides', 'koband')
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

    register_post_type( esc_html__('Slides', 'koband'),$args);

}

add_action('init', 'ko_band_register_slides');


function ko_band_slides_meta_box_init(){
        add_meta_box(
        'ko_band_slides_meta_box',
        esc_html__('Slides','koband'),
        'ko_band_slides_meta_box',
        'slides',
        'normal',
        'default'
    );

}
add_action('add_meta_boxes', 'ko_band_slides_meta_box_init');

function ko_band_slides_meta_box($post, $box){

    global $post;
    
    // Nonce field to validate form request came from current site

    wp_nonce_field( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Get the location data if it's already been entered

    $slides_title = get_post_meta( $post->ID, 'ko_band_slides_title', true );
    $slides_subtitle = get_post_meta( $post->ID, 'ko_band_slides_subtitle', true );
    $slides_button_title = get_post_meta( $post->ID, 'ko_band_slides_button_title', true );
    $slides_button_link = get_post_meta( $post->ID, 'ko_band_slides_button_link', true );

    // Output the field ?>

    <div class="container">

        <div class="row-blank"></div>
        <div class="row top">
            <div class="col-sm"><?php echo esc_html__('Title:', 'koband');?></div>
            <div class="col-sm"><?php echo esc_html__('Subtitle:', 'koband');?></div>
        </div>

        <div class="row">
            <div class="col-sm"><input type="text" name="ko_band_slides_title" value="<?php echo esc_attr( $slides_title )?>" placeholder= "<?php echo esc_html__('Add Slide Title', 'koband');?>" class="slidetitle"></div>
            <div class="col-sm"><textarea type="text" name="ko_band_slides_subtitle" maxlength="250" placeholder= "<?php echo esc_html__('Add Slide Text', 'koband');?>" class="slidesub"><?php echo esc_textarea( $slides_subtitle )?></textarea></div>
        </div>

        <div class="row">
            <div class="col-sm"><?php echo esc_html__('Button Title:', 'koband');?></div>
            <div class="col-sm"><?php echo esc_html__('Button Link:', 'koband');?></div>
        </div>

        <div class="row">        
            <div class="col-sm"><input type="text" name="ko_band_slides_button_title" value="<?php echo esc_attr( $slides_button_title )?>" placeholder= "<?php echo esc_html__('Add Button Text', 'koband');?>" class="slidebutton"></div>
            <div class="col-sm"><input type="text" name="ko_band_slides_button_link" value="<?php echo esc_attr( $slides_button_link )?>" placeholder="<?php echo esc_html__('Add Button Link', 'koband');?>" class="slidebuttonlink"></div>
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
    if (isset($_POST['ko_band_slides_title']))
    {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce( plugin_basename( __FILE__ ), 'ko_band_slides_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $slides_meta['ko_band_slides_title'] = esc_html( $_POST['ko_band_slides_title'] );
    $slides_meta['ko_band_slides_subtitle'] = esc_html( $_POST['ko_band_slides_subtitle'] );
    $slides_meta['ko_band_slides_button_title'] = esc_html( $_POST['ko_band_slides_button_title'] );
    $slides_meta['ko_band_slides_button_link'] = esc_html( $_POST['ko_band_slides_button_link'] ); 
   
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
