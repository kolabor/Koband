<?php
/**
 * Koband Singles custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => __('Singles', 'koband')
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
    'name' => __('Singles', 'koband'),
    'singular_name' => __('Singles', 'koband'),
    'add_new' => __('Add Singles', 'koband'),
    'all_items' => __('All Singles','koband'),
    'add_new_item' => __('Add Singles', 'koband'),
    'edit_item' => __('Edit Singles', 'koband'),
    'new_item' => __('New Singles', 'koband'),
    'view_item' => __('View Singles', 'koband'),
    'search_item' => __('Search Singles', 'koband'),
    'not_found' => __('No Singles Found', 'koband'),
    'not-found_in_trash' => __('No Singles Found in Trash', 'koband'),
    'parent_item_colon' => __('Parent Singles', 'koband')
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
    'supports' => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,
  );

register_post_type( __('Singles','koband'), $args);
}
add_action('init', 'ko_band_register_singles' );
  
add_action('add_meta_boxes', 'ko_band_singles_meta_box_init');
function ko_band_singles_meta_box_init(){
        add_meta_box(
        'ko_band_singles_meta_box',
        __('Song Details', 'koband'),
        'ko_band_singles_display_meta_box',
        'singles',
        'normal',
        'default'
    );
}
function ko_band_singles_display_meta_box($post, $box){
    global $post;

    // Nonce field to validate form request came from current site
    $singles_stores = get_post_meta($post->ID, 'ko_band_repetable_singles_stores', true);
    wp_nonce_field( 'ko_band_singles_save_meta_box_nonce', 'ko_band_singles_save_meta_box_nonce' );
   
    $singles_length = get_post_meta( $post->ID, 'ko_band_singles_length', true );
    $singles_date_release = get_post_meta( $post->ID, 'ko_band_singles_date_release', true );
     // Output the field


?>

<div class="container"> <!-- Container div for Single Length and Date -->
    <div class="row">
              <div class="col-sm"><?php _e('Single Length', 'koband');?></div>
              <div class="col-sm"><?php _e('Date Release', 'koband');?></div>

    </div>
    <div class="row">
              <div class="col-sm">
                    <input type="number" name="ko_band_singles_length" value="<?php esc_attr( $singles_length ) ?>" class="singlelength">
              </div>
              <div class="col-sm">
                    <input type="date" name="ko_band_singles_date_release" value="<?php esc_attr( $singles_date_release ) ?>" class="singledate">
              </div>
    </div>

 
<script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertAfter( '#ko_band_repetable_singles_stores_one .row:last' );
            return false;
        });
            $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });
    });

</script>

<div class="container" id="ko_band_repetable_singles_stores_one"> <!-- Container form for Repetable Single fields -->
    <div class="row form_heading">
                <div class="col-sm"><?php _e('Store Name', 'koband');?></div>
                <div class="col-sm"><?php _e('Store Link', 'koband');?></div>
    </div>
    <?php if ( $singles_stores ) :    
         foreach ( $singles_stores as $field) { ?>
      <div class="row">
                <div class="col-sm">
                          <input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" />
                </div> 
                <div class="col-sm">
                          <input type="url" class="widefat" name="link[]" value="<?php if($field['link'] != '') echo esc_attr( $field['link'] ); ?>" />
                </div>
                <div class="col-sm">
                          <a class="button remove-row" href="#"><?php _e('Remove', 'koband');?></a>
                </div>
      </div>
      <?php  } else :  // show a blank one    ?>
      <div class="row form_elements">
                <div class="col-sm">
                          <input type="text" class="widefat" name="name[]" />
                </div>
                <div class="col-sm">
                          <input type="url" class="widefat" name="link[]" />
                </div>
                <div class="col-sm">
                          <a class="button remove-row" href="#"><?php _e('Remove', 'koband');?></a>
                </div>
      </div>
      <?php endif; ?>
        <!-- empty hidden one for jQuery -->
      <div class="row empty-row screen-reader-text form_elements">
                <div class="col-sm">
                          <input type="text" class="widefat" name="name[]" />
                </div>
                <div class="col-sm">
                          <input type="url" class="widefat" name="link[]" />
                </div>
                <div class="col-sm">
                          <a class="button remove-row" href="#"><?php _e('Remove', 'koband');?></a>
                </div>
      </div>
</div>


<p><a id="add-row" class="button" href="#"><?php _e('Add another', 'koband');?></a></p>

<?php } 

add_action( 'save_post', 'ko_band_singles_save_meta_box' , 1, 2);

function ko_band_singles_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_singles_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_singles_save_meta_box_nonce'], 'ko_band_singles_save_meta_box_nonce' ) )
            return;
          if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
        $singles_meta['ko_band_singles_length'] = esc_attr( $_POST['ko_band_singles_length'] );
        $singles_meta['ko_band_singles_date_release'] = esc_attr( $_POST['ko_band_singles_date_release'] );
  
        foreach ( $singles_meta as $key => $value ) :
        // Don't store custom data twice
        if ( 'revision' === $post->post_type ) { return;    }
        if ( get_post_meta( $post_id, $key, false ) ) {   // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );
        } else {       // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value);     }
        if ( ! $value ) { delete_post_meta( $post_id, $key ); }
    endforeach;

    $old = get_post_meta($post_id, 'ko_band_repetable_singles_stores', true);
    $new= array();
       if (isset($_POST["name"]))    {
              $names =$_POST['name'];
              $url = $_POST['link'];
              $count = count( $names );   }
    for ( $i = 0; $i < $count; $i++ )  {
        if ( $names[$i] != '' )    {
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
            $new[$i]['link'] = stripslashes( strip_tags( $url[$i] ) ); 
         }
     }
    if ( !empty( $new ) && $new != $old ) { update_post_meta( $post_id, 'ko_band_repetable_singles_stores', $new );}
    elseif ( empty($new) && $old ) { delete_post_meta( $post_id, 'ko_band_repetable_singles_stores', $old ); }
}
?>  



