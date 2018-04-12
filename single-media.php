<?php
/**
 * The Template for displaying all single gallery posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); 
	
if (have_posts() ) : 
	
 	//start loop ?>

	<div class='media_holder'>

		<?php  while ( have_posts() ) : the_post(); 
				$post_id = get_the_ID(); ?>

				<div id="single-media-title"><?php the_title();?></div>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
				<div id="single-media-content"><?php the_content(); ?></div>
		 
				<?php $media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
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
				} ?>
	</div>

		<?php endwhile; 
endif;
get_footer(); ?>