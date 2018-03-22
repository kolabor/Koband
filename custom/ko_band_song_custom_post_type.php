<?php 


$args = array(
  'labels'  =>  array(

            'menu_name' => 'Song',
          ),  
    'capabilities'  =>  array(
            'capability_type' => 'posts',
            'create_posts' => 'do_not_allow',
    ),    
    'map_meta_cap' => true, 
    'menu_position' => 3,
    'public'    =>  true
);
//Custom post type function
function ko_band_song_custom_post_type() {

  $label = array(
    'name' => 'Song',
    'singular_name' => 'Song',
    'add_new' => 'Add Song',
    'all_items' => 'All Songs',
    'add_new_item' => 'Add Song',
    'edit_item' => 'Edit Song',
    'new_item' => 'New Song',
    'view_item' => 'View Song',
    'search_item' => 'Search Song',
    'not_found' => 'Mo Song Found',
    'not-found_in_trash' => 'No Song Found in Trash',
    'parent_item_colon' => 'Parent Song'
      );
  $args = array(
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks',  'comments', 'revisions', 'post-formats' ),
    
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false,

  
  );

    register_post_type( 'Song',$args);
 }

 add_action( 'init', 'ko_band_song_custom_post_type' );
  


  function ko_band_get_song_options() {
    $options = array (
        'Youtube' => 'www.youtybe.com',
        'Vevo' => 'www.vevo.com',
        'Option 3' => 'option3',
        'Option 4' => 'option4',
    );
    
    return $options;
}

add_action('add_meta_boxes', 'ko_band_song_meta_box_init');

 function ko_band_song_meta_box_init(){
         add_meta_box(
        'ko_band_song_meta_box',
        'Song Details',
        'ko_band_song_meta_box',
        'song',
        'normal',
        'default'
    );

 }
 function ko_band_song_meta_box() {
    global $post;
    $repeatable_fields = get_post_meta($post->ID, 'ko_band_song_meta_box', true);
    $options = ko_band_get_song_options();
    wp_nonce_field( 'ko_band_song_meta_box_nonce', 'ko_band_song_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_song_meta_box_one tbody>tr:last' );
            return false;
        });
    
        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>
  
    <table id="ko_band_song_meta_box_one" width="100%">
    <thead>
        <tr>
            <th width="30%">Song Title</th>
            <th width="30%">Lyric</th>
            <th width="12%">Select</th>
            <th width="4%"></th>
            <th width="20%">URL</th>
            <th width="4%"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    
    if ( $repeatable_fields ) :
    
    foreach ( $repeatable_fields as $field ) {
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name1[]" value="<?php if($field['name1'] != '') echo esc_attr( $field['name1'] ); ?>" /></td>

        <td><input type="text" class="widefat" name="name2[]" value="<?php if($field['name2'] != '') echo esc_attr( $field['name2'] ); ?>" /></td>
    
        <td>
            <select name="select[]">
            <?php foreach ( $options as $label => $value ) : ?>
            <option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
            <?php endforeach; ?>
            </select>
        </td>
         <td><a class="button append-play" href="#">Play</a></td>
    
        <td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" /></td>
    
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name1[]" /></td>
        <td><input type="text" class="widefat" name="name2[]" /></td>
    
        <td>
            <select name="select[]">
            <?php foreach ( $options as $label => $value ) : ?>
            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
            </select>
        </td>
        <td><a class="button append-play" href="#">Play</a></td>
        <td><input type="text" class="widefat" name="url[]" value="http://" /></td>
    
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>
    
    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="name1[]" /></td>
         <td><input type="text" class="widefat" name="name2[]" /></td>
    
        <td>
            <select name="select[]">
            <?php foreach ( $options as $label => $value ) : ?>
            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
            <?php endforeach; ?>
            </select>
        </td>
        <td><a class="button append-play" href="#">Play</a></td>
        
        <td><input type="text" class="widefat" name="url[]" value="http://" /></td>
          
        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>
    
    <p><a id="add-row" class="button" href="#">Add another</a></p>
    <?php
}


add_action('save_post', 'ko_band_song_meta_box_save');
function ko_band_song_meta_box_save($post_id) {
   /*if ( ! isset( $_POST['ko_band_song_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['ko_band_song_meta_box_nonce'], 'ko_band_song_meta_box_nonce' ) )
        return;*/
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    
    if (!current_user_can('edit_post', $post_id))
        return;
    
    $old = get_post_meta($post_id, 'ko_band_song_meta_box', true);
    $new = array();
    $options = ko_band_get_song_options();
    
    $names1 = $_POST['name1'];
    $names2 = $_POST['name2'];
    $selects = $_POST['select'];
    $urls = $_POST['url'];
    
    $count = count( $names1 );
    $count = count( $names2 );
    
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names1[$i] != '' ) :
            $new[$i]['name1'] = stripslashes( strip_tags( $names1[$i] ) );
        if ( $names2[$i] != '' ) :
            $new[$i]['name2'] = stripslashes( strip_tags( $names2[$i] ) );
            
            if ( in_array( $selects[$i], $options ) )
                $new[$i]['select'] = $selects[$i];
            else
                $new[$i]['select'] = '';
        
            if ( $urls[$i] == 'http://' )
                $new[$i]['url'] = '';
            else
                $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
        endif;
    
    
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'ko_band_song_meta_box', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'ko_band_song_meta_box', $old );
endif;
}

}
?>