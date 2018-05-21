<?php
/**
 * Koband The Band custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => esc_html__('The Band', 'koband')
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
    'name' => esc_html__('The Band', 'koband'),
    'singular_name' => esc_html__('The Band', 'koband'),
    'add_new' => esc_html__('Add band member', 'koband'),
    'all_items' => esc_html__('All The Bands', 'koband'),
    'add_new_item' => esc_html__('Add The Band', 'koband'),
    'edit_item' => esc_html__('Edit The Band', 'koband'),
    'new_item' => esc_html__('New The Band', 'koband'),
    'view_item' => esc_html__('View The Band', 'koband'),
    'search_item' => esc_html__('Search The Band', 'koband'),
    'not_found' => esc_html__('Mo The Band Found', 'koband'),
    'not-found_in_trash' => esc_html__('No The Band Found in Trash', 'koband'),
    'parent_item_colon' => esc_html__('Parent The Band', 'koband')
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
   'supports' => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('category', 'post_type', 'post_tag'),
    'exclude_from_search' =>false,

    
    );

register_post_type( esc_html__('The Band', 'koband'), $args);

}

add_action( 'init', 'ko_band_the_band_custom_post_type' );
  
add_action('add_meta_boxes', 'ko_band_the_band_meta_box_init');

function ko_band_the_band_meta_box_init(){
        add_meta_box(
        'ko_band_the_band_meta_box',
        esc_html__('The Band Details', 'koband'),
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
    $the_band_bio = get_post_meta( $post->ID, 'ko_band_the_band_bio', true );?>
    
    <div class="container">
        <div class="row top">
            <div class="col-sm"><?php echo esc_html__('Band Member Role:', 'koband');?></div>
        </div>
        <div class="row">
            <div class="col-sm"><input type="text" name="ko_band_the_band_bio" value="<?php echo esc_attr( $the_band_bio )?>" class="widefat" placeholder="<?php echo esc_html__('ex.Drummer, Bass ...', 'koband');?>"></div>
        </div>
    </div><?php }
add_action( 'save_post', 'ko_band_the_band_save_meta_box' , 1, 2);
function ko_band_the_band_save_meta_box( $post_id, $post ) 
{
    if ( ! current_user_can( 'edit_post', $post_id ) ) 
        {
            return $post_id;
        }
    if (isset($_POST['ko_band_the_band_bio'])) 
    {

    // Verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times.

    wp_verify_nonce(plugin_basename(__FILE__), 'ko_band_the_band_save_meta_box' );

    // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $the_band_meta['ko_band_the_band_bio'] = esc_html( $_POST['ko_band_the_band_bio'] );

    // Cycle through the $events_meta array.
    // Note, in this example we just have one item, but this is helpful if you have multiple.
    foreach ( $the_band_meta as $key => $value ) :

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
}
