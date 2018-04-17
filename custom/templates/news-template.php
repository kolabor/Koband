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

 <div class="album py5 bg section" id="News">
 	<div class="container">
 		<div class="row">
		 	<div class="container">
		 		<div class="row">
					<h1>News</h1>
				</div>
			</div>
			<div class="container">
				<div class="row koband_post_news">
					<?php
				    $args_news = array(		
					 	 'post_type' => 'post',   
						 'post_staus'=> 'publish',
						 'posts_per_page' => 3,
						 
					);

					$news_posts = new WP_Query($args_news);
					if ( $news_posts->have_posts() ) : ?>
						<!-- start loop --> 										
						
							<?php while ( $news_posts->have_posts() ) : $news_posts->the_post(); ?>
								<div class="col-md-4">
									<div class="card mb-4 box-shadow">
										<div class="news-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
										<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
										<div class="card-body">
											<div id="card-text"><?php the_excerpt(); ?></div>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<button type="button" class="btn btn-sm btn-outline-secondary"><a class="read_more" href="<?php the_permalink();?>"><?php _e('READ MORE →', 'koband');?></a></button>
													</div>
												</div>
										</div>
									</div>
								</div>	
							<?php endwhile; ?>
						
								
							<!-- loop ends here -->
					<?php endif; ?>

			</div><!-- container -->
		</div>
		<div class="container text-center">
		<div class="row">
			<a class="btn-koband-load koband_load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
			<span class="koband-loading">Loading...</span>
			<span class="text">Load more</span></a>
			<a class="no-news"><span class="news-posts">There are no more news</span></a>
		</div>
		</div>
</div>
</div>
</div>


