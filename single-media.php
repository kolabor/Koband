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

get_header('noscroll'); ?>



<?php
if (have_posts() ) : 
	
 	//start loop ?>

	<?php  while ( have_posts() ) : the_post(); 
	$post_id = get_the_ID(); ?>
<div class="container">
		<div id="media-photo"><?php the_post_thumbnail('single_news_thumb'); ?></div>
		<div id="single-media-title"><h1><?php the_title();?></h1></div>
			<div class="row">
				<div class="col-sm news-details">
					<div class="news-details_li admin"><?php echo __('Posted by : ', 'koband');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></div>
					<div class="news-details_li category"><?php echo __('Category : ', 'koband');?><?php the_category();?></div>
					<div class="news-details_li date"><?php echo __('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
					<div class="news-details_li tag"><?php the_tags(); ?></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<div class="content_single_page"><?php the_content(); ?></div>
				</div>
			</div>
	<?php 
	$media_gallery = get_post_meta($post_id, 'vdw_gallery_id', false);
	$media_video_gallery = get_post_meta($post_id, 'ko_band_repetable_video_field', false); ?>
	<div class="col-md-12">
		<div class="row">
			<div class="gal">

			<?php 

				if (isset($media_video_gallery[0])){
				foreach ($media_video_gallery[0] as  $value_video_gallery) { ?>
				
					
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
						<!--<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>-->
						<div class="videos-list">
						<img src="<?php echo $value_video_gallery_image['link']?>/hqdefault.jpg" alt="Smiley face" height="265" width="370" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>
           					
           					<a href="#" class="next">&#8249;</a>
							<a href="#" class="prev">&#8250;</a>
       					</div>		
					<?php }

					elseif(isset($video_type) && $video_type == "option2"){
						$vimeo_ondemand = $value_video_gallery['link'];
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strrpos($data, "/") +1);
						$value_video_gallery_video['link'] = 'https://player.vimeo.com/video/' . $value_video_gallery['link']; 
						//$value_video_gallery_image['link'] = 'http://vimeo.com/api/v2/video/' . $value_video_gallery['link'];
						if (strpos($vimeo_ondemand, 'ondemand') !== false) { ?>
						<div class="videos-list">
						   <img src="<?php echo get_template_directory_uri(); ?>/img/vimeo.jpg" height="265" width="370" class="myvideo" />
						</div>
						   <div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
           					
           					<a href="#" class="next">&#8249;</a>
							<a href="#" class="prev">&#8250;</a>
       					</div>		
						  <!-- <iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
						<?php }
						else {  
						$hash = unserialize(file_get_contents('https://vimeo.com/api/v2/video/' . $value_video_gallery['link'] . '.php'));
						$hash[0]['thumbnail_large']?>
						<!--<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
						<div class="videos-list">
						<img src="<?php echo $hash[0]['thumbnail_large']?>" alt="Smiley face" height="265" width="370" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
           					
           					<a href="#" class="next">&#8249;</a>
							<a href="#" class="prev">&#8250;</a>
       					</div>		

					<?php } }

					elseif(isset($video_type) && $video_type == "option3"){
						$data = $value_video_gallery['link'];
						$value_video_gallery['link'] = substr($data, strpos($data, "video/") + 6);
						$value_video_gallery_video['link'] = '//www.dailymotion.com/embed/video/' . $value_video_gallery['link'];
						$value_video_gallery_image['link'] = '//www.dailymotion.com/thumbnail/video/' . $value_video_gallery['link']; ?>
						<!--<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>-->
						<div class="videos-list">
						<img src="<?php echo $value_video_gallery_image['link']?>" alt="Smiley face" height="265" width="370" class="myvideo" >
					</div>
						<div class="FullscreenV">
           					<iframe width="370" height="265" src="<?php echo $value_video_gallery_video['link']?>"></iframe>
           					
           					<div  class="next">&#8249;</div>
							<a href="#" class="prev">&#8250;</a>
       					</div>	
					<?php }

					else {
						echo "<?php echo __('Your browser does not support this type of iframe videos', 'koband');?>";
					} ?>
				
			<?php } ?>
		
	
			<?php } ?>
<!--================================================================================================================
												iFrame support ends here :D
=================================================================================================================-->
			
			
				<div class="image_media_slider">
                   <div class="imageList">
					<?php if(isset($media_gallery[0])) {
						foreach ($media_gallery[0] as  $value_image) { 
						$thumb = wp_get_attachment_image( $value_image, array(500,500)); 
                        	echo $thumb; 
						} ?>
				    </div>
					<div id="Fullscreen">
           					<img src="" alt="" />
           				
    						<a href="#" class="next">&#8249;</a>
							<a href="#" class="prev">&#8250;</a>
       					
					<?php }?> 
       				</div>
       			</div>


</div>
</div>
</div>
						

		
</div><!-- container ends here -->

		
<?php endwhile; endif;?>

<!--comment section starts here-->
	<div class="container">
		<div class="row">
			<?php 	
				//Get only the approved comments 
				// If comments are open or we have at least one comment, load up the comment template.
			 if ( comments_open() || get_comments_number() ) :
			     comments_template();
			 endif;
			$args = array(
			    'status' => 'approve'
			);?>
		</div>
	</div>
<?php 
get_footer(); ?>