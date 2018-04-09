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
 */?> <h1>News</h1>
 <?php 

     $args_news = array
    (		
	 	 'post_type' => 'post',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $news_posts = new WP_Query( $args_news );

 if ( $news_posts->have_posts() ) : 
 	//start loop
?>
<div class='tour_holder'>
<?php

	 while ( $news_posts->have_posts() ) : $news_posts->the_post(); 

		$post_id = get_the_ID(); ?>

<a href="<?php the_permalink();?>"><?php the_title();?><br><?php the_post_thumbnail(array(200,200)); ?><br><?php the_content();?></a><br>
</div> <?php
endwhile;
endif
 ?>