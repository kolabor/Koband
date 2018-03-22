<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabor Band 0.3
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php
			/**
			 * kolabor_band_after_post hook
			 *
			 * @hooked kolabor_band_post_navigation - 10
			 */
			do_action( 'kolabor_band_after_post' );

		?>
	<?php endwhile; // end of the loop. ?>

<?php
get_sidebar();
get_footer(); ?>