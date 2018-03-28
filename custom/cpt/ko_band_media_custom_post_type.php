<?php
/**
 * Koband Media custom post type and metabox creation file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

$args = array(
    'labels'  =>  array(
    'menu_name' => 'Media',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 6,
    'public'    =>  true
);

//Custom post type function

function ko_band_media_custom_post_type() {

  $label = array(
    'name' => __('Media', 'koband'),
    'singular_name' => 'Media',
    'add_new' => 'Add Media',
    'all_items' => 'All Medias',
    'add_new_item' => 'Add Media',
    'edit_item' => 'Edit Media',
    'new_item' => 'New Media',
    'view_item' => 'View Media',
    'search_item' => 'Search Media',
    'not_found' => 'Mo Media Found',
    'not-found_in_trash' => 'No Media Found in Trash',
    'parent_item_colon' => 'Parent Media'
    );

  $args = array(
    'menu_icon' => 'dashicons-format-gallery',
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

register_post_type( 'Media',$args);

}

add_action( 'init', 'ko_band_media_custom_post_type' );

// Gallery Images function

function ko_band_gallery_metabox($post_type) {

    $types = array('custom-post-type');
    {
      add_meta_box(
        'gallery-metabox',
        'Gallery',
        'gallery_meta_callback',
        'media',
        'normal',
        'high'
        );
    }
}
add_action('add_meta_boxes', 'ko_band_gallery_metabox');

function ko_band_enqueue_admin_scripts($hook) {

    if ( 'post.php' == $hook || 'post-new.php' == $hook ) {

          wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.js', array('jquery', 'jquery-ui-sortable'));
          wp_enqueue_style('gallery-metabox', get_template_directory_uri() . '/admin/ko_band_admin.css');
    }
}

add_action( 'admin_enqueue_scripts', 'ko_band_enqueue_admin_scripts' );


function gallery_meta_callback() {
global $post;
    wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
    $ids = get_post_meta($post->ID, 'vdw_gallery_id', true);
    ?>

    <div class="container">
        <div class="row">
            <div class="">
        </div>
    </div>




    <table class="form-table">
      <tr><td>
        <a class="gallery-add button" href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)">Add image(s)</a>

        <ul id="gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>

        <li>
                <input type="hidden" name="vdw_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
                <img class="image-preview" src="<?php echo $image[0]; ?>">
                <a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><br>
                <small><a class="remove-image" href="#">Remove image</a></small>
        </li>

        <?php endforeach; endif; ?>

        </ul>

      </td></tr>
    </table>
  <?php }

function gallery_meta_save($post_id) {

        if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
        if (!current_user_can('edit_post', $post_id)) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if(isset($_POST['vdw_gallery_id'])) {
          update_post_meta($post_id, 'vdw_gallery_id', $_POST['vdw_gallery_id']);
    } 

    else {

        delete_post_meta($post_id, 'vdw_gallery_id');
    }
}

add_action('save_post', 'gallery_meta_save');

//------------------------------------------------Gallery Image Metabox Ends Here---------------------------------------------

//-----------------------------------------------Gallery Video Metabox Starts Here----------------------------------------

function ko_band_get_video_options() {
    $options = array (
        'Youtube'       => 'option1',
        'Vimeo'         => 'option2',
        'DailyMotion'   => 'option3',
        'Others'        => 'option4',
    );
    
    return $options;
}

add_action('add_meta_boxes', 'ko_band_media_meta_box_init');

function ko_band_media_meta_box_init(){
        add_meta_box(
        'ko_band_media_meta_box',
        'Video',
        'ko_band_media_display_meta_box',
        'media',
        'normal',
        'default'
    );

}
function ko_band_media_display_meta_box($post, $box){
    global $post;

    // Nonce field to validate form request came from current site
//$singles_details = get_post_meta($post->ID, 'ko_band_repetable_singles_details', true);
$video_field = get_post_meta($post->ID, 'ko_band_repetable_video_field', true);
$options = ko_band_get_video_options();
wp_nonce_field( 'ko_band_media_save_meta_box_nonce', 'ko_band_media_save_meta_box_nonce' );
   
?>
 <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_repetable_video_field_one tbody>tr:last' );
            return false;
        });
    
        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>
  
      <table id="ko_band_repetable_video_field_one" width="70%">
    <thead>
       <tr>
            <th width="40%">Video Link</th>
            <th width="12%">Select</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    if ( $video_field ) :    
    foreach ( $video_field as $field) {
    ?>
    <tr>
            <td><input type="url" class="widefat" name="link[]" value="<?php if($field['link'] != '') echo esc_attr( $field['link'] ); ?>" /></td>
            <td>
                    <select name="select[]"   style="width: 100%;">
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
                    <?php endforeach; ?>
                    </select>
            </td>
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
        <tr>

            <td><input type="url" class="widefat" name="link[]" /></td>
            <td>
                    <select name="select[]"  style="width: 100%;">
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                    </select>
            </td>
            <td><a class="button remove-row" href="#">Remove</a></td>
        </tr>
    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
        <tr class="empty-row screen-reader-text">

            <td><input type="url" class="widefat" name="link[]" /></td>
            <td >
                    <select name="select[]"  style="width: 100%;">
                    <?php foreach ( $options as $label => $value ) : ?>
                    <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                    </select>
            </td>
            <td><a class="button remove-row" href="#">Remove</a></td>
        </tr>
    </tbody>
    </table>
        <p><a id="add-row" class="button" href="#">Add another</a></p>
 
<?php 
}

add_action( 'save_post', 'ko_band_media_save_meta_box' , 1, 2);


function ko_band_media_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_media_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_media_save_meta_box_nonce'], 'ko_band_media_save_meta_box_nonce' ) )

            return;

        if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 


 
    $old = get_post_meta($post_id, 'ko_band_repetable_video_field', true);
    $new= array();
       if (isset($_POST["link"]))    {

            $url = $_POST['link'];
            $selects = $_POST['select'];
            $count = count( $url );  
            }
    for ( $i = 0; $i < $count; $i++ )  {
        if ( $url[$i] != '' )    {

            $new[$i]['link'] = stripslashes( strip_tags( $url[$i] ) );   
            if ( in_array( $selects[$i], $options ) )
                $new[$i]['select'] = $selects[$i];
            else
                $new[$i]['select'] = '';    }
    }
    if ( !empty( $new ) && $new != $old ) { update_post_meta( $post_id, 'ko_band_repetable_video_field', $new );}
    elseif ( empty($new) && $old ) { delete_post_meta( $post_id, 'ko_band_repetable_video_field', $old ); }

}

?>