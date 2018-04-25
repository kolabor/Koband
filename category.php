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
<div class="container">
	<div class="row">
		<header class="archive-header">
			<h1 class="archive-title">
				<?php printf( __( 'Posts of category: %s', 'koband'),
				single_cat_title( '', false )); ?>
			</h1>
	</div>
	<div class="row">
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
							<div class="col-sm news-details">
							<div class="news-details-admin"><?php _e('Posted by : ', 'koband');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></div>
							<div class="news-details-date"><?php _e('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
							<div class="news-details-tag"><?php the_tags(); ?></div>
						<h1><div id="news-title"><?php the_title();?></div></h1>
							<div class="row">
								<div class="col-sm">
									<div id="news-content"><?php the_content(); ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; 
				endif; ?> 
		</header>
	</div>
</div>
<?php 
get_sidebar();
get_footer(); ?>
