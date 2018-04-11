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
 <div class="news">
<div class="row">
	 <h1>NEWS</h1>
</div>
 
 <?php
	$args_news = array
	(		
		 'post_type' => 'post',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => '3',
		 'paged' => 1,
	);

	$news_posts = new WP_Query( $args_news );

	if ( $news_posts->have_posts() ) : 
	 	//start loop ?>
<section id="news" class="row" >
	     
			<?php while ( $news_posts->have_posts() ) : $news_posts->the_post(); 

				$post_id = get_the_ID(); ?>
				
		 <div class=" col">
				<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>

				<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>

				<div class="excerpt"><?php the_excerpt(); ?></div>

				<a class="read_more" href="<?php the_permalink();?>"><?php _e('Read more', 'koband'); ?></a>

		   </div> 
			<?php endwhile; ?>

		
	<?php endif; ?>


</section>
<div class="loadmore">More posts</div>
</div>
