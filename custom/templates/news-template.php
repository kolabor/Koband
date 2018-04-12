<?php
/**
 * 
 *
 * Template Name: News
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */?>

<div class="container koband_post_container">
	<div class="news">
		<div class="row">
			<h1>NEWS</h1>
				<?php if ( have_posts() ) : ?>
					<!-- start loop --> 
					<section id="news" class="row" >

							<?php while ( have_posts() ) : the_post(); ?>

								<div id="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
								<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
								<div id="excerpt"><?php the_excerpt(); ?></div>
								<a class="read_more" href="<?php the_permalink();?>"><?php _e('Continue reading -->', 'koband'); ?></a>
							
							<?php endwhile; ?>
					
					</section>
					<!-- loop ends here -->
				<?php endif; ?>
		</div>
	</div>
</div><!-- container -->

<div class="container text-center">
	<a class="btn-koband-load koband_load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="koband-loading">Loading...</span>
	<span class="text">Load more</span></a>
</div>


