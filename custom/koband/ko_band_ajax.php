<?php 
/*

============================
	KOBAND AJAX FUNCTIONS
============================


*/

/* 
===============================================
 Load more +2 News with Load-More button
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

	));

	if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); 
			$post_id = get_the_ID(); ?>
			<div id="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
			<div id="excerpt"><?php the_excerpt(); ?></div>
			<a class="read_more" href="<?php the_permalink();?>"><?php _e('Continue reading -->', 'koband'); ?></a>
		<?php endwhile; ?>
	<?php endif; 

	wp_reset_postdata();

	die();

}


 ?>