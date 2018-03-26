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
$singles_details = get_post_meta($post->ID, 'ko_band_repetable_singles_details', true);
$singles_stores = get_post_meta($post->ID, 'ko_band_repetable_singles_stores', true);
wp_nonce_field( 'ko_band_singles_save_meta_box_nonce', 'ko_band_singles_save_meta_box_nonce' );
   

   // Get the loation data if it's already been entered  
?>
   <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row-details' ).on('click', function() {
            var row_details = $( '#ko_band_singles_meta_box_one .empty-row-details.screen-reader-text' ).clone(true);
            row_details.removeClass( '#ko_band_singles_meta_box_one .empty-row-details screen-reader-text' );
            row_details.insertBefore( '#ko_band_singles_meta_box_one tbody>tr:last' );
            return false;
        });
            $( '.remove-row-details' ).on('click', function() {
            $(this).parents('tr').remove();
            return false; 
       });
       $( '#add-row-stores' ).on('click', function() {
            var row_stores = $( '#ko_band_singles_meta_box_store .empty-row-stores.screen-reader-text' ).clone(true);
            row_stores.removeClass( '#ko_band_singles_meta_box_store .empty-row-stores screen-reader-text' );
            row_stores.insertBefore( '#ko_band_singles_meta_box_store tbody>tr:last' );
            return false;
        });
            $( '.remove-row-stores' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>
  
    <table id="ko_band_singles_meta_box_one" width="100%">
    <thead>
        <tr>
            <th width="30%">Single Name</th>
            <th width="30%">Single Length</th>
            <th width="20%">Date Release</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php    
    if ( $singles_details ) :    
    foreach ( $singles_details as $field_details ) {     ?>
    <tr>
        <td><input type="text" class="widefat" name="name-details[]" value="<?php if($field_details['name-details'] != '') echo esc_attr( $field_details['name-details'] ); ?>" /></td>
        <td><input type="text" class="widefat" name="length[]" value="<?php if($field_details['length'] != '') echo esc_attr( $field_details['length'] ); ?>" /></td>
        <td><input type="date" class="widefat" name="daterelease[]" value="<?php if($field_details['daterelease'] != '') echo esc_attr( $field_details['daterelease'] ); ?>" /></td>

        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    <?php     }     else :     // show a blank one     ?>
    <tr>
        <td><input type="text" class="widefat" name="name-details[]" /></td>
        <td><input type="text" class="widefat" name="length[]" /></td>
        <td><input type="date" class="widefat" name="daterelease[]" /></td>
        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
    <!-- empty hidden one for jQuery -->
    <tr class="empty-row-details screen-reader-text">
        <td><input type="text" class="widefat" name="name-details[]" /></td>

        <td><input type="text" class="widefat" name="length[]" /></td>
        <td><input type="date" class="widefat" name="daterelease[]" /></td>
        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
        <p><a id="add-row-details" class="button" href="#">Add another</a></p>
   <table id="ko_band_singles_meta_box_stores" width="100%">
    <thead>
        <tr>
            <th width="30%">Store Name</th>
            <th width="30%">Store Link</th>
          
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    if ( $singles_stores ) :    
    foreach ( $singles_stores as $field_stores ) {
    ?>
    <tr>
        <td><input type="text" class="widefatt" name="name-store[]" value="<?php if($field_stores['name-store'] != '') echo esc_attr( $field_stores['name-store'] ); ?>" /></td>
        <td><input type="url" class="widefatt" name="link[]" value="<?php if($field_stores['link'] != '') echo esc_attr( $field_stores['link'] ); ?>" /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefatt" name="name-store[]" /></td>
        <td><input type="url" class="widefatt" name="link[]" /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
    <tr class="empty-row-stores screen-reader-text">
        <td><input type="text" class="widefatt" name="name-store[]" /></td>
        <td><input type="url" class="widefatt" name="link[]" /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
        <p><a id="add-row-stores" class="button" href="#">Add another</a></p>
 
<?php 
}

add_action( 'save_post', 'ko_band_singles_save_meta_box' , 1, 2);


function ko_band_singles_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_singles_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_singles_save_meta_box_nonce'], 'ko_band_singles_save_meta_box_nonce' ) )

            return;

          if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
    $old_details = get_post_meta($post_id, 'ko_band_repetable_singles_details', true);
    $new_details = array();
       if (isset($_POST["name-details"]))    {
         $names_details =$_POST['name-details'];
         $length = $_POST['length'];
         $daterelease = $_POST['daterelease'];
         $count_details = count( $names_details );
    }       
    for ( $i = 0; $i < $count_details; $i++ )     {
        if ( $names_details[$i] != '' )         {
            $new_details[$i]['name-details'] = stripslashes( strip_tags( $names_details[$i] ) );
            $new_details[$i]['length'] = stripslashes( strip_tags( $length[$i] ) );
            $new_details[$i]['daterelease'] = stripslashes( strip_tags( $daterelease[$i] ) );        }
     }
    if ( !empty( $new_details ) && $new_details != $old_details ) { update_post_meta( $post_id, 'ko_band_repetable_singles_details', $new_details );}
    elseif ( empty($new_details) && $old_details ) { delete_post_meta( $post_id, 'ko_band_repetable_singles_details', $old_details ); }
 
  $old_stores = get_post_meta($post_id, 'ko_band_repetable_singles_stores', true);
    $new_stores = array();
       if (isset($_POST["name-store"]))    {
         $names_stores =$_POST['name-store'];
         $url = $_POST['link'];
        $count_stores = count( $names_stores );  
          }
    for ( $i = 0; $i < $count_stores; $i++ )  {
        if ( $names_stores[$i] != '' )    {
            $new_stores[$i]['name-store'] = stripslashes( strip_tags( $names_stores[$i] ) );
            $new_stores[$i]['link'] = stripslashes( strip_tags( $url[$i] ) );       }
     }
    if ( !empty( $new_stores ) && $new_stores != $old_stores ) { update_post_meta( $post_id, 'ko_band_repetable_singles_stores', $new_stores );}
    elseif ( empty($new_stores) && $old_stores ) { delete_post_meta( $post_id, 'ko_band_repetable_singles_stores', $old_stores ); }

}

?>  



