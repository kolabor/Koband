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
<div class="container search-holder">
	<div id="content" role="main">
		<header class="archive-header">
		<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'koband' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
		</h1>
			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->
		<div class="row">
		<?php
		/* Start the Loop */
		if (have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <div class="news-title main_font_color"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
                        <a class="card-img-top" href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
                        <div class="card-body">
                            <div id="card-text" class="main_font_color"><?php the_excerpt(); ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <span  class="btn btn-sm btn-outline-secondary read_more"><a href="<?php the_permalink();?>"><?php _e('READ MORE →', 'koband');?></a></span>
                                    </div>
                                </div>
                        </div>
                    </div> 
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
				<!-- * Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 -->
			<?php endwhile; //koband_content_nav( 'nav-below' );?>
			<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div>
	</div><!-- #content -->
</div><!-- container -->
<?php get_footer(); ?>