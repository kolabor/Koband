<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
	  <div class="row koband_post_news">
	          <?php
	            $args_news = array(   
	             'post_type' => 'post',   
	             'post_staus'=> 'publish',
	             'posts_per_page' => -1,
	             
	          );?>

	        <?php  $news_posts = new WP_Query($args_news);
	          if ( $news_posts->have_posts() ) : ?>
	            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	                            <span  class="btn btn-sm btn-outline-secondary"><a class="read_more" href="<?php the_permalink();?>"><?php echo esc_html__('READ MORE →', 'koband');?></a></span>
	                          </div>
	                        </div>
	                    </div>
	                  </div>
	                </div>  
	              <?php endwhile; ?>  
	        <!-- loop ends here -->
	        <?php endif; ?>
	      <?php wp_footer();?>
	    </body>
	  </div><!-- row -->
	</div><!--container-->
</article><!-- -->