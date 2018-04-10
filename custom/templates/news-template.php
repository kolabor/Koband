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
 */
     $args_news = array
    (		
	 	 'post_type' => 'post',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $news_posts = new WP_Query( $args_news );

 if ( $news_posts->have_posts() ) : 
 	//start loop ?>

<div class='tour_holder'>

<?php while ( $news_posts->have_posts() ) : $news_posts->the_post(); 

		$post_id = get_the_ID(); ?>

		<div id="title"><?php the_title();?></div>
		<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
		<div id="excerpt"><?php the_excerpt(); ?></div>
		<button class="load_more"><?php _e('Load More', 'koband'); ?></button>
</div> 
<?php endwhile; 
endif; ?>