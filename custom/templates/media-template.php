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
<div class="row">
	<h1>Gallery</h1>
	<div class="container koband_post_container">
<?php
	    $args_media = array(		
		 	 'post_type' => 'media',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => '4',
			 
		);

	    $media_posts = new WP_Query($args_media);
	    if ($media_posts->have_posts() ) : ?>
	 	<!--loop starts here -->

		 	<div class="row koband_post_media">
				<?php while ( $media_posts->have_posts() ) : $media_posts->the_post();
					$post_id = get_the_ID(); ?>
					<div class="col-sm-3"> 
						<div id="media-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
						<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a><br>
						
						<a class="see_more" href="<?php the_permalink();?>"><?php _e('Go to Gallery -->', 'koband'); ?></a>
					</div>
  				<?php endwhile;?>
			</div>	
   		<?php endif; ?>
	</div>		
</div>
<div class="container text-center">
	<a class="btn-koband-load koband_load_media" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="koband-loading">Loading...</span>
	<span class="text">Load media</span></a>
</div>
   
