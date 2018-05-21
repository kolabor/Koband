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
 		<div class="row ">
		 	<div class="container">
		 		<div class="row ">
					<h1 class="first_color heading_font"><?php echo esc_html__('News', 'koband');?></h1>
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
										<div class="news-title main_font_color"><h2 class="heading_font"><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 4 )); ?></a></h2></div>
										<a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail('news_thumb'); ?></a>
										<div class="card-body">
											<div id="card-text" class="main_font_color main_font"><?php the_excerpt(); ?></div>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<span  class="btn btn-sm btn-outline-secondary read_more main_font"><a href="<?php the_permalink();?>"><?php echo esc_html__('READ MORE →', 'koband');?></a></span>
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
					<div class="row ">
						<a class="btn-koband-load koband_load_more border_color main_font" data-page="1" data-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
							<span class="koband-loading main_font first_color"><?php echo esc_html__('Loading...', 'koband');?></span>
							<span class="text main_font first_color"><?php echo esc_html__('Load more', 'koband');?></span></a>
						<a class="no-news"><span class="news-posts first_color main_fonts"><?php echo esc_html__('There are no more news', 'koband');?>  <i class="far fa-smile"></i></span></a>
					</div>
				</div>
		
		</div><!-- row -->
	
	</div><!-- container -->

</div><!-- id news -->
</div>

