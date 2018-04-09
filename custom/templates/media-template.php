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
    if ($media_posts->have_posts() ) : 
 
	while ( $media_posts->have_posts() ) : $media_posts->the_post();
		$post_id = get_the_ID(); 
		$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
		echo "</pre>";?>

		<a href="<?php the_permalink();?>"><?php the_title();?><?php the_post_thumbnail(array(200,200));?><?php the_content();?></a>
<?php
		

		$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
		foreach ($media_gallery as $key => $value_gallery) {
			
			echo '<img src="'.$value_gallery.'" alt="">';
			
		} 

		$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false);
		foreach ($media_video_gallery as $key => $value_video_gallery) {
			
			var_dump($value_video_gallery);
		} 


    endwhile;
    endif;
?>