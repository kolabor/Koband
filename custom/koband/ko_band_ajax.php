<?php 
/*

============================
	KOBAND AJAX FUNCTIONS
============================


*/

/* 
===============================================
 Load more News with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_more', 'koband_load_more' );
add_action( 'wp_ajax_koband_load_more', 'koband_load_more' );

function koband_load_more(){
	
	$paged = $_POST["page"]+1;
	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 3,

	));

	if ( $query->have_posts() ) {?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<div class="col-sm-4">
				<div id="news-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(300,300)); ?></a>
				<div id="news-excerpt"><?php the_excerpt(); ?></div>
				<a class="read_more" href="<?php the_permalink();?>"><?php _e('Continue reading -->', 'koband'); ?></a>
			</div>
		<?php endwhile; ?>
	<?php }

	else 
	{
       echo "end";
	}

	wp_reset_postdata();

	die();

}

/* 
===============================================
 Load more Media with Load-More button
===============================================
*/

add_action( 'wp_ajax_nopriv_koband_load_media', 'koband_load_media' );
add_action( 'wp_ajax_koband_load_media', 'koband_load_media' );

function koband_load_media(){
	
	$paged = $_POST["page"]+1;
	$gallery = new WP_Query( array(
		'post_type' => 'media',
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 4,

	));

	if ( $gallery->have_posts() ) { ?>
		<?php while ( $gallery->have_posts() ) : $gallery->the_post();?>
			<div class="col-sm-3"> 
				<div id="media-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(230,230)); ?></a><br>
				
				<a class="read_more" href="<?php the_permalink();?>"><?php _e('Go to Gallery -->', 'koband'); ?></a>
			</div>
		<?php endwhile; ?>
	<?php } 
	else 
	{
       echo "end-media";
	}

	wp_reset_postdata();

	die();

}


 ?>