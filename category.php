<?php
/**
 * 
 *
 * Koband Theme Category
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>

<header class="archive-header">
	<h1 class="archive-title">
		<?php printf( __( 'Posts of category: %s', 'koband'),
		single_cat_title( '', false )); ?>
	</h1>
	
		<?php
		// Show an optional term description.
		$term_description = term_description();
		if (! empty( $term_description) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
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
</header>
<?php get_footer(); ?>
