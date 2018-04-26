<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>


            <?php if ( have_posts() ) : ?>

                
            <div class="container search-holder">
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
                <div class="row koband_post_news">
                <?php while ( have_posts() ) : the_post(); ?>
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
                </div>
            </div>    
                <?php// shape_content_nav( 'nav-below' ); ?>

            <?php else : ?>

                <?php get_template_part( 'no-results', 'search' ); ?>

            <?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>