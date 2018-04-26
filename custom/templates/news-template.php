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
<div id="News" class="section section_bg" >
 <div class=" album py5 " ">
 	<div class="container">
 		<div class="row">
		 	<div class="container">
		 		<div class="row">
					<h1 class="first_color"><?php _e('News', 'koband');?></h1>
				</div>
			</div><!-- container -->
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
										<div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
										<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
										<div class="card-body">
											<div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php _e('READ MORE →', 'koband');?></a></span>
													</div>
												</div>
										</div>
									</div>
								</div>	
							<?php endwhile; ?>	
							<!-- loop ends here -->
					<?php endif; ?>

				</div>
			</div><!-- container -->
				<div class="container text-center">
					<div class="row">
						<a class="btn-koband-load koband_load_more bg_first_color" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
							<span class="koband-loading"><?php _e('Loading...', 'koband');?></span>
							<span class="text"><?php _e('Load more', 'koband');?></span></a>
						<a class="no-news"><span class="news-posts"><?php _e('There are no more news', 'koband');?></span></a>
					</div>
				</div>
		
		</div><!-- row -->
	
	</div><!-- container -->

</div><!-- id news -->
</div>

