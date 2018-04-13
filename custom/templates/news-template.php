<?php
/**
 * 
 *
 * Template Name: News
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */?>

	<div class="row">
	<h1 class="display-1">News</h1>
	</div>
	<div class="container koband_post_container">
		<?php
	    $args_news = array(		
		 	 'post_type' => 'post',   
			 'post_staus'=> 'publish',
			 'posts_per_page' => 3,
			 
		);
		$news_posts = new WP_Query($args_news);
			 if ( $news_posts->have_posts() ) : ?>
			<!-- start loop --> 							
				<div class="row koband_post_news">
					<?php while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
						<div class="col-sm-4">
								<div id="news-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
								<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
								<div id="news-excerpt"><?php the_excerpt(); ?></div>
								<a class="read_more" href="<?php the_permalink();?>"><?php _e('Continue reading -->', 'koband'); ?></a>
						</div>	
					<?php endwhile; ?>
				</div>
						
					<!-- loop ends here -->
			<?php endif; ?>

	</div><!-- container -->
</div>
<div class="container text-center">
	<a class="btn-koband-load koband_load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<span class="koband-loading">Loading...</span>
	<span class="text">Load more</span></a>
	<a class="no-news"><span class="news-posts">There are no more news</span></a>
</div>



