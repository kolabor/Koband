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
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			if (have_posts() ) :
			while ( have_posts() ) : the_post(); ?>
			<div id="news-photo"><?php the_post_thumbnail(array(400,400)); ?></div>
				<div class="container">
					<div class="col-sm news-details">
					<div class="news-details-admin"><?php _e('Posted by : ', 'koband');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></div>
					<div class="news-details-category"><?php _e('Category : ', 'koband');?><?php the_category();?></div>
					<div class="news-details-date"><?php _e('Posted at : ', 'koband');?><?php the_time( get_option( 'date_format' ) ); ?></div>
				</div>	
				<h1><div id="news-title"><?php the_title();?></div></h1>
					<div class="row">
						<div class="col-sm">
							<div id="news-content"><?php the_content(); ?></div>
						</div>
					</div>
				</div>
				<?php
				/*
				 * Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			endwhile;
			//koband_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>