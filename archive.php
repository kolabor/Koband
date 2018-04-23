<?php
/**
 * 
 *
 * Koband Theme Archive
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<h1 class="page-title">
	<?php
	if( is_day() ) :
		printf( __( 'Daily Archives: %s', 'koband' ), get_the_date() );
	elseif ( is_month() ) : 
		printf( __( 'Monthly Archives: %s', 'koband'), get_the_date( _x('F Y', 'monthly archives date format', 'koband') ) );
	elseif ( is_year() ) :
		printf( __( 'Yearly Archives: %s', 'koband'), get_the_date( _x('Y', 'yearly archives date format', 'koband') ) );
	else :
		_e( 'Archives', 'koband' );
	endif;
	?>
	<?php if (have_posts() ) : ?>
		<!--start loop --> 
			<?php while (have_posts() ) : the_post(); ?>
				<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
				<div class="container">
				<h1><div id="news-title"><?php the_title();?></div></h1>
					<div class="row">
						<div class="col-sm">
							<small><?php the_category();?> <!--|| <?php// the_tag(); ?> || <?php //edit_post_link(); ?>--></small>
							<div id="news-content"><?php the_content(); ?></div>
						</div>
					</div>
				</div>
			<?php endwhile; 
	endif; ?>
</h1>
	<!--<?php if ( have_posts() ) : ?>
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
		</div> archive-blog-wrapper
	<?php endif; ?> -->
<?php 
get_sidebar();
get_footer(); ?>