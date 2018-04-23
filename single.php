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
			<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
			<div class="container">
			<h1><div id="news-title" class="section_heading"><?php the_title();?></div></h1>
				<div class="row">
					<div class="col-sm">
						<small><?php the_category();?> || <?php the_tag(); ?> || <?php edit_post_link();?></small>
						<div id="news-content" class="main_p"><?php the_content(); ?></div>


					</div>
				</div>
			</div>
		<?php endwhile; 
	endif; ?>
<?php get_footer(); ?>