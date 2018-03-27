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
    'add_new' => 'Add Singles',
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
    'supports' => array('title', 'editor', 'thumbnail'),
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
   
    $singles_name = get_post_meta( $post->ID, 'ko_band_singles_name', true );
    $singles_length = get_post_meta( $post->ID, 'ko_band_singles_length', true );
    $singles_date_release = get_post_meta( $post->ID, 'ko_band_singles_date_release', true );
     // Output the field
        echo "<p> Singles Name: </p>";
    echo '<input type="text" name="ko_band_singles_name" value="' . esc_textarea( $singles_name )  . '" class="singlename" >';   
       echo "<p> Singles Length: </p>";
    echo '<input type="number" name="ko_band_singles_length" value="' . esc_attr( $singles_length )  . '" class="singlelength" >';    
        echo "<p> Date Release: </p>";
    echo '<input type="date" name="ko_band_singles_date_release" value="' . esc_attr( $singles_date_release )  . '" class="singledate" >';  
   // Get the loation data if it's already been entered  
?>
 <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_repetable_singles_stores_one tbody>tr:last' );
            return false;
        });
            $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>
        <table id="ko_band_repetable_singles_stores_one" width="98%">
    <thead>
       <tr>
            <th width="40%">Store Name</th>
            <th width="40%">Store Link</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php 

    if ( $singles_stores ) :    
         foreach ( $singles_stores as $field) {     ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
        <td><input type="url" class="widefat" name="link[]" value="<?php if($field['link'] != '') echo esc_attr( $field['link'] ); ?>" /></td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php  } else :  // show a blank one    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" /></td>
        <td><input type="url" class="widefat" name="link[]" /></td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="name[]" /></td>
        <td><input type="url" class="widefat" name="link[]" /></td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
        <p><a id="add-row" class="button" href="#">Add another</a></p>
 <?php }

add_action( 'save_post', 'ko_band_singles_save_meta_box' , 1, 2);
function ko_band_singles_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_singles_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_singles_save_meta_box_nonce'], 'ko_band_singles_save_meta_box_nonce' ) )
            return;
          if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
        $singles_meta['ko_band_singles_name'] = esc_textarea( $_POST['ko_band_singles_name'] );
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



