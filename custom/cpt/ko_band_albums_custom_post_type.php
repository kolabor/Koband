<?php
/**
 * Koband Albums custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


/* Declare Album cpt arguments */
$args = array(
    'labels'  =>  array(
    'menu_name' => 'Album'
    ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow'
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 3,
    'public'    =>  true
    );

/* Register Album custom post type function */
function ko_band_album_custom_post_type() {

  $label = array(
    'name' => 'Album',
    'singular_name' => 'Album',
    'add_new' => 'Add Album',
    'all_items' => 'All Albums',
    'add_new_item' => 'Add Album',
    'edit_item' => 'Edit Album',
    'new_item' => 'New Album',
    'view_item' => 'View Album',
    'search_item' => 'Search Album',
    'not_found' => 'Mo Album Found',
    'not-found_in_trash' => 'No Album Found in Trash',
    'parent_item_colon' => 'Parent Album'
    );
  
  $args = array(
    'menu_icon' => 'dashicons-portfolio',
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

register_post_type( 'Album',$args);
}  

add_action( 'init', 'ko_band_album_custom_post_type' );
  

function ko_band_album_meta_box_init(){
        add_meta_box(
            'ko_band_album_meta_box', 
            'Album Details',
            'ko_band_album_display_meta_box', 
            'album',
            'normal',
            'default'
            );
}

add_action('add_meta_boxes', 'ko_band_album_meta_box_init');

function ko_band_album_display_meta_box() {
    global $post;
   // Nonce field to validate form request came from current site

        $song_details = get_post_meta($post->ID, 'ko_band_repetable_song_details', true);
        $song_stores = get_post_meta($post->ID, 'ko_band_repetable_song_stores', true);
        wp_nonce_field( 'ko_band_album_save_meta_box_nonce', 'ko_band_album_save_meta_box_nonce' );

// Get the location data if it's already been entered
         $album_date_release = get_post_meta( $post->ID, 'ko_band_album_date_release', true );
         $album_length = get_post_meta( $post->ID, 'ko_band_album_length', true );

// Output the field
        echo "<p>  Date Release: </p>";
        echo '<input type="date" name="ko_band_album_date_release" value="' . esc_html( $album_date_release )  . '" class="albumrelease" >';   
        echo "<p>Album Length</p>";
        echo '<input type="number" name="ko_band_album_length" value="' . esc_html( $album_length )  . '" class="albumlength" >';    
?>
<script type="text/javascript">
    jQuery(document).ready(function( $ ){ 
        $( '#add-row-details' ).on('click', function() {
            var row_details = $( '#ko_band_album_meta_box_one .empty-row-details.screen-reader-text' ).clone(true);
            row_details.removeClass( '#ko_band_album_meta_box_one .empty-row-details screen-reader-text' );
            row_details.insertBefore( '#ko_band_album_meta_box_one tbody>tr:last' );
            return false;
        });
            $( '.remove-row-details' ).on('click', function() {
            $(this).parents('tr').remove();
            return false; 
       });

        $( '#add-row-stores' ).on('click', function() {
            var row_stores = $( '#ko_band_album_meta_box_store .empty-row-stores.screen-reader-text' ).clone(true);
            row_stores.removeClass( '#ko_band_album_meta_box_store .empty-row-stores screen-reader-text' );
            row_stores.insertBefore( '#ko_band_album_meta_box_store tbody>tr:last' );
            return false;
        });
            $( '.remove-row-stores' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
</script>
  
    <table id="ko_band_album_meta_box_one">
    <thead>
        <tr>
            <th>Song Name</th>
            <th>Song Length</th>
            <th>Song Detail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
    if ( $song_details ) :
        foreach ( $song_details as $field_details ) {   ?>
    <tr>
        <td><input type="text" class="songname" name="name-details[]" value="<?php if($field_details['name-details'] != '') echo esc_attr( $field_details['name-details'] ); ?>" /></td>
        <td><input type="text" class="songlength" name="length[]" value="<?php if($field_details['length'] != '') echo esc_attr( $field_details['length'] ); ?>" /></td>
        <td><input type="text" class="songdetails" name="detail[]" value="<?php if($field_details['detail'] != '') echo esc_attr( $field_details['detail'] ); ?>" /></td>
        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    <?php   }
    else :  // show a blank one ?>
     <tr>
        <td><input type="text" class="songname" name="name-details[]" /></td>
        <td><input type="text" class="songlength" name="length[]" /></td>
        <td><input type="text" class="songdetails" name="detail[]" /></td>
        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>    <!-- empty hidden one for jQuery -->
    <tr class="empty-row-details screen-reader-text">
        <td><input type="text" class="songname" name="name-details[]" /></td>
        <td><input type="text" class="songlength" name="length[]" /></td>
        <td><input type="text" class="songdetails" name="detail[]" /></td>
        <td><a class="button remove-row-details" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
    <p><a id="add-row-details" class="button" href="#">Add another</a></p>
<!--Song_store-->
    <table id="ko_band_album_meta_box_store">
    <thead>
        <tr>
            <th>Store Name</th>
            <th>Store Link</th>
            <th width="30%"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ( $song_stores ):
        foreach ($song_stores as $field_stores ) {    ?>
    <tr>
        <td><input type="text" class="storename" name="name-store[]" value="<?php if($field_stores['name-store'] != '') echo esc_attr( $field_stores['name-store'] ); ?>" /></td>
        <td><input type="url" class="storelink" name="link[]" value="<?php if($field_stores['link'] != '') echo esc_attr( $field_stores['link'] ); ?>" /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    <?php      }
    else :     // show a blank one    ?>
    <tr>
        <td><input type="text" class="storename" name="name-store[]" style="width:237px; " /></td>
        <td><input type="url" class="storelink" name="link[]" style="width:237px; " /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
    <tr class="empty-row-stores screen-reader-text">
        <td><input type="text" class="storename" name="name-store[]" style="width:237px; " /></td>
        <td><input type="url" class="storelink" name="link[]" style="width:237px; "  /></td>
        <td><a class="button remove-row-stores" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
    <p><a id="add-row-stores" class="button" href="#">Add another</a></p>
 <?php 
}

add_action( 'save_post', 'ko_band_album_save_meta_box' , 1, 2);
function ko_band_album_save_meta_box( $post_id, $post ) 
{
   if ( ! isset( $_POST['ko_band_album_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_album_save_meta_box_nonce'], 'ko_band_album_save_meta_box_nonce' ) )
            return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 
   // Now that we're authenticated, time to save the data.
    // This sanitizes the data from the field and saves it into an array $events_meta.
    $album_meta['ko_band_album_date_release'] = esc_textarea( $_POST['ko_band_album_date_release'] );
    $album_meta['ko_band_album_length'] = esc_html( $_POST['ko_band_album_length'] );
  
        foreach ( $album_meta as $key => $value ) :
        // Don't store custom data twice
        if ( 'revision' === $post->post_type ) {
            return;    }
        if ( get_post_meta( $post_id, $key, false ) ) {
            // If the custom field already has a value, update it.
            update_post_meta( $post_id, $key, $value );
        } else { 
            // If the custom field doesn't have a value, add it.
            add_post_meta( $post_id, $key, $value);     }
        if ( ! $value ) { delete_post_meta( $post_id, $key ); }
    endforeach;

    $old_details = get_post_meta($post_id, 'ko_band_repetable_song_details', true);
    $new_details = array();
       if (isset($_POST["name-details"])) {   
         $names_details =$_POST['name-details'];
         $length = $_POST['length'];
         $detail = $_POST['detail'];
         $count = count( $names_details );

         for ( $i = 0; $i < $count; $i++ )    {
        if ( $names_details[$i] != '' )     {
            $new_details[$i]['name-details'] = stripslashes( strip_tags( $names_details[$i] ) );
            $new_details[$i]['length'] = stripslashes( strip_tags( $length[$i] ) );
            $new_details[$i]['detail'] = stripslashes( strip_tags( $detail[$i] ) );  } 
       }
     if ( !empty( $new_details ) && $new_details != $old_details ) { update_post_meta( $post_id, 'ko_band_repetable_song_details', $new_details );}
     elseif ( empty($new_details) && $old_details ) { delete_post_meta( $post_id, 'ko_band_repetable_song_details', $old_details ); }
    }
   

    $old_stores = get_post_meta($post_id, 'ko_band_repetable_song_stores', true);
    $new_stores = array();
       if (isset($_POST["name-store"])) {
         $names_stores =$_POST['name-store'];
         $url = $_POST['link'];
         $count_stores = count( $names_stores ); }
   

    for ( $i = 0; $i < $count_stores; $i++ ) {
        if ( $names_stores[$i] != '' ) {
            $new_stores[$i]['name-store'] = stripslashes( strip_tags( $names_stores[$i] ) );
            $new_stores[$i]['link'] = stripslashes( strip_tags( $url[$i] ) );  }
     }            
    if ( !empty( $new_stores ) && $new_stores != $old_stores ) { update_post_meta( $post_id, 'ko_band_repetable_song_stores', $new_stores );}
    elseif ( empty($new_stores) && $old_stores ) { delete_post_meta( $post_id, 'ko_band_repetable_song_stores', $old_stores ); }

}


?>




 
