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
<div id="Media" class="section section-full bg-media">
	<div class="container">
		<div class="row">
			<h1 class="section_heading">Gallery</h1>
		</div>
	</div><!--container-->				
		<div class="row koband_post_media no-gutters mt-70">
			<?php
		    $args_media = array(		
			 	 'post_type' => 'media',   
				 'post_staus'=> 'publish',
				 'posts_per_page' => '8',
				 
			);
		    $media_posts = new WP_Query($args_media);
		    if ($media_posts->have_posts() ) : ?>
		 	<!-- start loop --> 
				<?php 
				while ( $media_posts->have_posts() ) : $media_posts->the_post();
				$post_id = get_the_ID(); ?>
					<div class="cmix category-1 col-lg-3 col-md-4 col-sm-6 single-filter-content content-1">
						<a class="gallery-img" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(230,230)); ?></a><br>
						<div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
							<div class="media-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
								
								<div class="btn-group">
									<span class="btn btn-sm btn-outline-secondary"><a class="go_to_gallery" href="<?php the_permalink();?>"><?php _e('Go to Gallery', 'koband'); ?></a></span>
								</div>
								
						</div>
					</div>
				<?php endwhile;?>
			<!-- loop ends here -->	
	   		<?php endif; ?>
		</div>	
	
	<div class="container text-center">
		<div class="row">
			<a class="btn-koband-load koband_load_media" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<span class="koband-loading">Loading...</span>
				<span class="text">Load media</span></a>
			<a class="no-media"><span class="media-posts">There are no more media</span></a>
		</div>
	</div><!--container-->
			

</div><!--Section media-->
