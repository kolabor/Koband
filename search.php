<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header('noscroll'); ?>
<div class="container search-holder">
    <div class="row">
        <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->
    <?php if ( have_posts() ) { ?>
        <div class="content">
            <div class="conent_holder">
                <div class="row koband_post_news">
                    <?php while ( have_posts() ) : the_post(); 
                    $post_type = get_post_type();?>
                        <div class="col-md-6">
                            <div class="card mb-4 box-shadow">
                                <div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a></h2><h5><?php _e('Post Type : ', 'koband'); 
                                if ($post_type == 'post') { echo _e('News', 'koband'); } 
                                elseif ($post_type == 'media') { echo _e('Gallery', 'koband');}
                                elseif ($post_type == 'album') { echo _e('Album', 'koband');}
                                elseif ($post_type == 'singles') { echo _e('Single', 'koband');}
                                elseif ($post_type == 'theband') { echo _e('Band Member', 'koband');}
                                elseif ($post_type == 'tour') { echo _e('Tour', 'koband');}?></h5></div>
                                <a class="card-img-top" href="<?php the_permalink();?>">
                                    <?php if($post_type == 'tour') {?> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/tour.jpg"/> <?php } else { the_post_thumbnail(array(300,300)); }?></a>
                                <div class="card-body">
                                    <div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php _e('Go To →', 'koband');?></a></span>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>  
                    <?php endwhile; ?>
                </div>
    <?php } else { ?>
    <?php get_template_part( 'no-results', 'search' ); }?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div><!--row -->
</div><!-- container -->
<?php get_footer(); ?>
