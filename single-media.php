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

get_header(); ?>



<?php
if (have_posts() ) : 
	
 	//start loop ?>


	<div class='media_holder'>

		<?php  while ( have_posts() ) : the_post(); 
				$post_id = get_the_ID(); ?>

				<div id="media-photo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(1024,800)); ?></a>
				<div class="container">
				<h1><div id="single-media-title"><?php the_title();?></div></h1>
						<div class="row">
							<div class="col-sm">
								<div id="single-media-content"><?php the_content(); ?></div>
							</div>
						</div>
				 
						<?php $media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
						$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); ?>

						<div class="row">
							<?php foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
								<div class="col-sd-4">
									 <iframe width="420" height="315"
										src="<?php echo $value_video_gallery['link']; ?>">
										</iframe> 
									<?php
									echo "<br>";
									/*echo $value_video_gallery['link'];*/
									echo "<br>";
									?>
								</div>
							<?php } ?>
						</div>
						<div class="row">
						       <?php foreach ($media_gallery[0] as  $value_image) {	?>
									<div class="col-sd-4">
										<?php	
										echo "<br>";
										echo wp_get_attachment_image( $value_image, array(500,500));
										echo "<br>";
										?> 
									</div> 
								<?php } ?>
							</div>
						</div>
						</div>
				</div>
		<?php endwhile; 
endif;?>

<?php get_footer(); ?>