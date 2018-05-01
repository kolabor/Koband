<?php
/**
 * The index template file displays the latest.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>
<head>
  <?php wp_head();?>
</head>

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
                            <span  class="btn btn-sm btn-outline-secondary"><a class="read_more" href="<?php the_permalink();?>"><?php _e('READ MORE →', 'koband');?></a></span>
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
      </div><!-- container -->
</div>