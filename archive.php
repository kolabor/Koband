<?php
/**
 * Koband Theme Archive
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<header class="page-header" style="animation-delay: 0.3s; animation-duration: 2s;">
		    <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>

		<div id="archive-blog-wrapper" class="archive-blog-wrapper three-columns">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>
		</div><!-- archive-blog-wrapper -->
	<?php endif; ?>

<?php
get_sidebar();
get_footer(); ?>