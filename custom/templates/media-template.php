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
			<h1 class="first_color heading_font"><?php echo esc_html__('Gallery', 'koband');?></h1>
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
					<div class="col-lg-3 img-holder col-xs-12">
					    <div class="hovereffect">
					      <a href="<?php the_permalink();?>"><?php the_post_thumbnail('gallery_thumb');?></a>
				            <div class="overlay heading_font">
				                <h2 class="heading_font"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>

									<a class="info" href="<?php the_permalink();?>">
									<i class="fas fa-link"></i></a>

				            </div>
					    </div>
					</div>
				<?php endwhile;?>
			<!-- loop ends here -->	
	   		<?php endif; ?>
		</div>
	<div class="container text-center">
		<div class="row">

			<div class="btn-koband-load koband_load_media border_color main_font" data-page="1" data-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
				<span class="koband-loading first_color main_font"><?php echo esc_html__('Loading...', 'koband');?></span>
				<span class="text first_color main_font"><?php echo esc_html__('Load media', 'koband');?></span></div>
			    <a class="no-media"><span class="media-posts first_color main_font"><?php echo esc_html__('There are no more media', 'koband');?>  

				<i class="far fa-smile"></i></span></a>
		</div>
	</div><!--container-->
</div><!--Section media-->
