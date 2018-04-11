<?php
/**
 * The Template for displaying all single gallery posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); 

    $loop = new WP_Query( 
    	array( 
        'post_type' => 'media',   
        'posts_per_page' => 15 ) );
	
if (have_posts() ) : 
	
 	//start loop ?>

<div class='media_holder'>

<?php  while ( $loop->have_posts() ) : $loop->the_post(); 
		
		$post_id = get_the_ID(); ?>

		<div id="title"><?php the_title();?></div>
		    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
		<div id="excerpt"><?php the_content(); ?></div>

		<?php get_template_part( 'content', 'media' );?>
</div> 
<?php endwhile; 
endif;
get_footer(); ?>