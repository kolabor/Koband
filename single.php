<?php
/**
 * The Template for displaying all single posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>

	<?php if (have_posts() ) : ?>
		<!--start loop --> 
		<?php while (have_posts() ) : the_post(); ?>
			<div id="news-photo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail("full"); ?></a></div>
			<div class="container">
			<h1><div id="news-title"><?php the_title();?></div></h1>
				<div class="row">
					<div class="col-sm">
						<div id="news-content"><?php the_content(); ?></div>
					</div>
				</div>
			</div>
		<?php endwhile; 
	endif; ?>
<?php get_footer(); ?>