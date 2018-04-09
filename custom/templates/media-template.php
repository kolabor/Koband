<?php
/**
 * 
 *
 * Template Name: Media
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
get_header();?>

 <h1>Media Temp</h1>

<?php

    $args_media = array(		
	 	 'post_type' => 'media',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1,
		 
	);


    $media_posts = new WP_Query($args_media);
    $total = $media_posts->found_posts;
    if ($media_posts->have_posts() ) : 
 
	while ( $media_posts->have_posts() ) : $media_posts->the_post();
		$post_id = get_the_ID(); ?>


		<!--<a href="<?php the_permalink();?>"><?php the_title();?><?php the_post_thumbnail(array(200,200));?><?php the_content();?></a>-->
<?php
		

		$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
		
		$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false);

		foreach ($media_video_gallery[0] as  $value_video_gallery) {
			
			//var_dump($value_video_gallery);
			echo "<br>";
			echo $value_video_gallery['link'];
			echo "<br>";
		} 

       foreach ($media_gallery[0] as  $value_image) {
			
			//var_dump($value_video_gallery);
			echo "<br>";
			echo wp_get_attachment_image( $value_image, 'thumbnail' );
			echo "<br>";
		} 

       


    endwhile;
    endif;
    //echo wp_get_attachment_image( 143, 'full' );

    /*echo "<pre>";
    print_r($media_gallery);
    echo "</pre>";*/
?>