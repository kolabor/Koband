<?php
/**
 * 
 * Template Name: Default with sidebar
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
 get_header('noscroll');?>
<div class="container">
	<div class="content">
			<header>
				<h1><?php the_title();?></h1>
			</header>
		<div class="conent_holder">
			<div class="container">
				<?php
				while ( have_posts() ) : the_post();
		
					the_content();
								
				endwhile; // End of the loop.?>
			</div>
		</div><!--conent_holder-->
	<?php get_sidebar(); ?>
	</div><!--content-->
</div><!--container-->
<?php get_footer(); ?>
