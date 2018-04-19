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
	<?php 
	$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
	$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); ?>
			<div class="row">
			<?php 
				if (isset($media_video_gallery[0])){
				foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
				<div class="col-sd-4"> 
<!--================================================================================================================
						// Checking which iframe to use from the select box at backed :)
=================================================================================================================--> 	
		            <?php
		            $video_type = $value_video_gallery['select'];
					if(isset($video_type) && $video_type == "option1"){	
						$value_video_gallery['link'] = 'https://www.youtube.com/embed/' . $value_video_gallery['link'];?>		
						<iframe width="370" height="265" src="<?php echo $value_video_gallery['link']?>"></iframe> 
					<?php }

					elseif(isset($video_type) && $video_type == "option2"){
						$value_video_gallery['link'] = 'https://player.vimeo.com/video/' . $value_video_gallery['link']; ?>
						<iframe width="370" height="265" src="<?php echo $value_video_gallery['link']?>"></iframe>
					<?php }

					elseif(isset($video_type) && $video_type == "option3"){
						$value_video_gallery['link'] = '//www.dailymotion.com/embed/video/' . $value_video_gallery['link']; ?>
						<iframe width="370" height="265" src="<?php echo $value_video_gallery['link']?>"></iframe>
					<?php }

					else {
						echo "Your browser does not support iframe videos";
					} ?>
				</div>
			<?php } ?>
<!--================================================================================================================
												iFrame support ends here :D
=================================================================================================================-->
			</div>
			<div class="row">
				<div class="col-sd-4">
					<?php if(isset($media_gallery[0])) {
						foreach ($media_gallery[0] as  $value_image) { 
						echo wp_get_attachment_image( $value_image, array(500,500));}
					}?> 
				</div> 
			<?php } ?>
			</div>
		
		</div><!-- container ends here -->
	
	</div><!-- media_photo ends here -->

</div><!-- media_holder ends here -->
		
<?php endwhile; endif;?>

<?php get_footer(); ?>