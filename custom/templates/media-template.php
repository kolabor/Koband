<?php
/**
 *
 * Template Name: Media
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
get_header();?>
<div id="Media" class="section section-full">
	<div class="container">
		<div class="row">
			<h1 class="first_color"><?php echo __('Gallery', 'koband');?></h1>
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
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					    <div class="hovereffect">
					      <a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php the_post_thumbnail('gallery_thumb'); ?>"></a>
				            <div class="overlay">
				                <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
									<a class="info" first_color" href="<?php the_permalink();?>"><?php echo __('Go to Gallery', 'koband'); ?></a>
				            </div>
					    </div>
					</div>
				<?php endwhile;?>
			<!-- loop ends here -->	
	   		<?php endif; ?>
		</div>
	<div class="container text-center">
		<div class="row">
			<a class="btn-koband-load koband_load_media bg_first_color" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<span class="koband-loading"><?php echo __('Loading...', 'koband');?></span>
				<span class="text"><?php echo __('Load media', 'koband');?></span></a>
			    <a class="no-media"><span class="media-posts"><?php echo __('There are no more media', 'koband');?>  
				<i class="far fa-smile"></i></span></a>
		</div>
	</div><!--container-->
</div><!--Section media-->
