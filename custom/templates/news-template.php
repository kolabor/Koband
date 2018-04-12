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
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container koband_post_container">
 			 <div class="news">
<div class="row">
	 <h1>NEWS</h1>
			 <?php
				
				if ( have_posts() ) : 
				//start loop ?>
				<section id="news" class="row" >

						<?php while ( have_posts() ) : the_post(); 

							?>

							<div id="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
							<div id="excerpt"><?php the_excerpt(); ?></div>
							<a class="read_more" href="<?php the_permalink();?>"><?php _e('Read more', 'koband'); ?></a>
						<?php endwhile; ?>
				<?php endif; ?>
				</section>
			<!--<button class="loadmore">Load More...</button>-->
			<!--
			<div class="loadmore">Load More...</div> -->

			</div><!-- container -->

			<div class="container text-center">
				<a class="btn btn-lg btn-default koband_load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><span class="sunset-icon sunset-loading">Load more</span></a>
			</div>
		</main>
	</div><!--#primary -->

