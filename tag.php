<?php
/**
 * 
 *
 * Koband Theme Tag
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
		<div id="content" role="main">
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( _e( 'Tag Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
				</h1>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			if (have_posts() ) : ?>
			<div class="content">
				<div class="conent_holder">
					<?php while ( have_posts() ) : the_post(); ?>
						<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
						<h1 class="news-title section_heading"><?php the_title();?></h1>
							<div class="col-sm news-details">
								<div class="news-details-category"><?php _e('Category : ', 'koband');?><?php the_category();?></div>
								<div class="news-details-date"><?php _e('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
								<div class="news-details-tag"><?php the_tags(); ?></div>
							</div>
							<div class="row">
								<div class="col-sm">
									<div id="news-content"><?php the_content(); ?></div>
								</div>
							</div>
							<!-- * Include the post format-specific template for the content. If you want to
							 * this in a child theme then include a file called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 -->
						<?php get_template_part( 'content', get_post_format() );
					endwhile; //koband_content_nav( 'nav-below' );?>
				</div>
				<?php get_sidebar(); ?>
			</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div><!-- #content -->
	</div><!-- container -->
<?php get_footer(); ?>