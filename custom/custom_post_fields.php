
<?php

 $args = array(
  'labels'  =>  array(

            'menu_name' => 'Products',
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
function create_custom_post_type() {

  $label = array(
    'name' => 'Products',
    'singular_name' => 'Products',
    'add_new' => 'Add Product',
    'all_items' => 'All Products',
    'add_new_item' => 'Add Product',
    'edit_item' => 'Edit Product',
    'new_item' => 'New Product',
    'view_item' => 'View Product',
    'search_item' => 'Search Product',
    'not_found' => 'Mo Product Found',
    'not-found_in_trash' => 'No Product Found in Trash',
    'parent_item_colon' => 'Parent Product'
      );
  $args = array(
    'labels' => $label,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' =>true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'support' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
    
    'taxonomies' => array('category', 'post_type'),
    'exclude_from_search' =>false
  );

    register_post_type( 'Products',$args);
 }

 add_action( 'init', 'create_custom_post_type' );


/*add_action( 'init', 'create_meta_box' );

function create_meta_box()
{
    add_meta_box( 'meta-box-id', 'My First Meta Box', 'create_meta_box', 'post', 'normal', 'high' );


register_meta_box( 'Products',$args);
}

*/




?>

