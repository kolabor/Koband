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
					<small><?php the_category();?><?php the_time( get_option( 'date_format' ) ); ?>
						<div class="news-details-tag"><?php the_tags(); ?></div>
					</small>
					<div id="single-media-content"><?php the_content(); ?></div>
				</div>
			</div>
	<?php 
	$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
	$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); ?>
			
			<?php 
				if (isset($media_video_gallery[0])){
				foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
				<div class="col-md-12">
					<div class="row">
						<div class="gal">
<!--================================================================================================================
						// Checking which iframe to use from the select box at backed :)
=================================================================================================================--> 	
		            <?php
		            $video_type = $value_video_gallery['select'];
					if(isset($video_type) && $video_type == "option1"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "v=") + 2);	
						$value_video_gallery_video['link'] = 'https://www.youtube.com/embed/' . $value_video_gallery['link'];
						$value_video_gallery_image['link'] = 'https://img.youtube.com/vi/' . $value_video_gallery['link']; ?>
						<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe> 
						<img src="<?php echo $value_video_gallery_image['link']?>/hqdefault.jpg" alt="Smiley face" height="265" width="370"> 		
					<?php }

					elseif(isset($video_type) && $video_type == "option2"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strrpos($data, "/") +1);
						$value_video_gallery_video['link'] = 'https://player.vimeo.com/video/' . $value_video_gallery['link']; 
						$value_video_gallery_image['link'] = 'http://vimeo.com/api/v2/video/' . $value_video_gallery['link']; ?>
						<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<img src="<?php echo $value_video_gallery_image['link']?>.json" alt="Smiley face" height="265" width="370">

					<?php }

					elseif(isset($video_type) && $video_type == "option3"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "video/") + 6);
						$value_video_gallery_video['link'] = '//www.dailymotion.com/embed/video/' . $value_video_gallery['link'];
						$value_video_gallery_image['link'] = '//www.dailymotion.com/thumbnail/video/' . $value_video_gallery['link']; ?>
						<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>
						<img src="<?php echo $value_video_gallery_image['link']?>" alt="Smiley face" height="265" width="370">
					<?php }

					else {
						echo "<?php _e('Your browser does not support this type of iframe videos', 'koband');?>";
					} ?>
				</div>
				</div>
			<?php } ?>
			</div>
			<?php } ?>
<!--================================================================================================================
												iFrame support ends here :D
=================================================================================================================-->
			
				<div class="col-md-12">
					<div class="row">
						<div class="gal">
					<?php if(isset($media_gallery[0])) {
								foreach ($media_gallery[0] as  $value_image) { 
								echo wp_get_attachment_image( $value_image, array(500,500));}
					}?> 
				</div>
				</div> 
			
			</div>
		
		</div><!-- container ends here -->
	
	</div><!-- media_photo ends here -->

</div><!-- media_holder ends here -->
		
<?php endwhile; endif;?>

<!--comment section starts here-->
	
	<?php 	
			//Get only the approved comments 
			// If comments are open or we have at least one comment, load up the comment template.
		 if ( comments_open() || get_comments_number() ) :
		     comments_template();
		 endif;
		$args = array(
		    'status' => 'approve'
		);
	?>

<?php 
get_footer(); ?>