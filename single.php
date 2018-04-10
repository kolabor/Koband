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

<?php 
 if (have_posts() ) : 
 	//start loop ?>

<div class='tour_holder'>

<?php while (have_posts() ) : the_post(); 

		$post_id = get_the_ID(); ?>

		<div id="title"><?php the_title();?></div>
		<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
		<div id="excerpt"><?php the_content(); ?></div>
		
</div> 
<?php endwhile; 
endif;
get_footer(); ?>