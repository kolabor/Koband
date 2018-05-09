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
    'menu_name' => esc_html__('Media','koband')
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
    'name' => esc_html__('Gallery', 'koband'),
    'singular_name' =>  esc_html__('Gallery', 'koband'),
    'add_new' => esc_html__('Add Gallery','koband'),
    'all_items' => esc_html__('All Gallerys', 'koband'),
    'add_new_item' => esc_html__('Add Gallery','koband'),
    'edit_item' => esc_html__('Edit Gallery','koband'),
    'new_item' => esc_html__('New Gallery','koband'),
    'view_item' => esc_html__('View Gallery','koband'),
    'search_item' => esc_html__('Search Gallery', 'koband'),
    'not_found' => esc_html__('No Gallerys Found', 'koband'),
    'not-found_in_trash' => esc_html__('No Gallery Found in Trash','koband'),
    'parent_item_colon' => esc_html__('Parent Media','koband'),
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
    'supports' => array('title', 'editor', 'thumbnail', 'comments' ),
    'taxonomies' => array('category', 'post_type', 'post_tag'),
    'exclude_from_search' =>false,

  
);

register_post_type(  esc_html__('Media', 'koband'), $args);

}

add_action( 'init', 'ko_band_media_custom_post_type' );

// Gallery Images function

function ko_band_gallery_metabox($post_type) {

    $types = array('custom-post-type');
    {
      add_meta_box(
        'ko_band_gallery-metabox',
        esc_html__('Gallery', 'koband'),
        'ko_band_gallery_meta_callback',
        'media',
        'normal',
        'high'
        );
    }
}
add_action('add_meta_boxes', 'ko_band_gallery_metabox');


function ko_band_gallery_meta_callback() {
global $post;
    
    wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
    $ids = get_post_meta($post->ID, 'vdw_gallery_id', true);

    ?>
    <div class="container form-table">
        <div class="row-blank">
        <div class="col-sm"><?php echo esc_html__('You are able to upload images and videos on same Gallery.<br> On the following fields you can add or remove images by clicking a button "Add Images" or "Remove"', 'koband');?></div>
        </div>

        <div class="row-top media">
            <div class="col-sm"><a class="gallery-add button" href="#" data-uploader-title=<?php echo esc_html__("Add image's", 'koband');?> data-uploader-button-text=<?php echo esc_html__("Add image's",'koband');?>><?php echo esc_html__("Add image's",'koband');?></a>
            </div>    
        </div>

        <ul id="gallery-metabox-list" class="row">
            <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
            <li> 
                        <input type="hidden" name="vdw_gallery_id[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($value); ?>">
                        <img class="image-preview" src="<?php echo esc_url($image[0]); ?>"><br>
                        <a class="change-image button button-small" href="#" data-uploader-title=<?php echo esc_html__('Change image', 'koband');?> data-uploader-button-text=<?php echo esc_html__('Change image', 'koband');?> ><?php echo esc_html__('Change image', 'koband');?></a>
                        <a class="remove-image button button-small" href="#"><?php echo esc_html__('Remove image', 'koband');?></a>
            </li>
        <?php endforeach; endif; ?>
        </ul>
    </div>

  <?php }

function ko_band_gallery_meta_save($post_id) {

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

add_action('save_post', 'ko_band_gallery_meta_save');

//------------------------------------------------Gallery Image Metabox Ends Here---------------------------------------------

//-----------------------------------------------Gallery Video Metabox Starts Here----------------------------------------

function ko_band_get_video_options() {
    $options = array (
        'Youtube'       => 'option1',
        'Vimeo'         => 'option2',
        'DailyMotion'   => 'option3',
    );
    
    return $options;
}

add_action('add_meta_boxes', 'ko_band_media_meta_box_init');

function ko_band_media_meta_box_init(){
        add_meta_box(
        'ko_band_media_meta_box',
        esc_html__('Video Gallery', 'koband'),
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

<div class="container" id="ko_band_repetable_video_field_one">
    <div class="row-blank">
        <div class="col-sm"><?php echo esc_html__('On the following fields you can add or remove videos by clicking a button "Add Another" or "Remove"', 'koband');?></div>
    </div>
    
    <div class="row-top">
        <div class="col-sm"><?php echo esc_html__('Video Link', 'koband');?></div>
        <div class="col-sm"><?php echo esc_html__('Select', 'koband');?></div>
        <div class="col-sm"></div>
    </div>

    <?php if ( $video_field ) :    

    foreach ( $video_field as $field) { ?>
    <div class="row">
        <div class="col-sm"><input type="url" class="widefat" name="link[]" value="<?php if($field['link'] != '') echo esc_attr( $field['link'] ); ?>" /></div>
        <div class="col-sm"><select name="select[]">
                            <?php foreach ( $options as $label => $value ) : ?>
                            <option value="<?php echo esc_attr($value); ?>"<?php selected( $field['select'], $value ); ?>><?php echo esc_attr($label); ?></option>
                            <?php endforeach; ?>
                            </select></div>
        <div class="col-sm"><a class="button remove-row" href="#"><?php echo esc_html__('Remove', 'koband');?></a></div>
    </div>

    <?php } else: // show a blank one  ?>

    <div class="row">
        <div class="col-sm"><input type="url" class="widefat" name="link[]" placeholder="http://somelink.com" /></div>
        <div class="col-sm"><select name="select[]">
                            <?php foreach ( $options as $label => $value ) : ?>
                            <option value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($label); ?></option>
                            <?php endforeach; ?>
                            </select></div>
        <div class="col-sm"><a class="button remove-row" href="#"><?php echo  esc_html__('Remove', 'koband');?></a></div>
    </div>

    <?php endif; ?>
        <!-- empty hidden one for jQuery -->
    <div class="row empty-row-media screen-reader-text">
        <div class="col-sm"><input type="url" class="widefat" name="link[]" placeholder="http://somelink.com" /></div>
        <div class="col-sm"><select name="select[]" >
                            <?php foreach ( $options as $label => $value ) : ?>
                            <option value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($label); ?></option>
                            <?php endforeach; ?>
                            </select></div>
        <div class="col-sm"><a class="button remove-row" href="#"><?php echo esc_html__('Remove', 'koband');?></a></div>
    </div>
<div class="row row_no_border">
<div class="button-add-row"><p><a id="add-row-media" class="button" href="#"><?php echo esc_html__('Add another', 'koband');?></a></p></div>
</div>
</div>

 
<?php }


add_action( 'save_post', 'ko_band_media_save_meta_box' , 1, 2);


function ko_band_media_save_meta_box( $post_id, $post ) {

        if ( ! isset( $_POST['ko_band_media_save_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ko_band_media_save_meta_box_nonce'], 'ko_band_media_save_meta_box_nonce' ) )

            return;

        if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
 


 
    $old = get_post_meta($post_id, 'ko_band_repetable_video_field', true);
    $options = ko_band_get_video_options();
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