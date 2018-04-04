<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabor Band 0.3
 */

get_header();
?>

		<?php if ( have_posts() ) : ?>

			<div id="archive-blog-wrapper" class="archive-blog-wrapper three-columns">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );


						$First_Section = get_theme_mod('ko_band_first_render_moduls');
						$count_media =  wp_count_posts( 'media' )->publish;

						if(){}

						$Second_Section = get_theme_mod('ko_band_second_render_moduls');

						$Third_Section = get_theme_mod('ko_band_third_render_moduls');

						$Fourth_Section = get_theme_mod('ko_band_fourth_render_moduls');


					?>

				<?php endwhile; ?>
			</div><!-- archive-blog-wrapper -->

			<?php kolabor_band_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

<?php
get_sidebar();
get_footer(); ?>