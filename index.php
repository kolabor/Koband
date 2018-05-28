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

get_header('noscroll'); 
if ( ! isset( $content_width ) ) $content_width = 900;
     if ( have_posts() ) : ?>

      <div id="archive-blog-wrapper" class="archive-blog-wrapper three-columns">
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
          ?>

        <?php endwhile; ?>
      </div><!-- archive-blog-wrapper -->

    <?php else : ?>

      <?php get_template_part( 'no-results', 'index' ); ?>

    <?php endif; ?>

<?php
get_sidebar();
get_footer(); ?>
