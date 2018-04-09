<?php
/**
 * 
 *
 * Template Name: Discography
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header();?> <h1>Discography Temp</h1>

<?php

$args_album = array (
		  	'post_type' => 'album',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1

			);
$args_singles = array(
		  	'post_type' => 'singles',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1		  
  
			);

$album_posts = new WP_Query($args_album);

    if ($album_posts->have_posts() ) : 
 
	while( $album_posts->have_posts() ) : $album_posts->the_post();
		
	$post_id = get_the_ID();?>

		<a href="<?php the_permalink();?>"><?php the_title();?><br><?php the_post_thumbnail(array(200,200));?><br><?php the_content();?></a>

        <?php $album_date = get_post_meta( $post_id, 'ko_band_album_date_release', false );
		
		$album_length = get_post_meta($post_id, "ko_band_album_length", false ); 
		$album_song_details = get_post_meta($post_id, "ko_band_repetable_song_details", false);
		$album_song_store = get_post_meta($post_id, "ko_band_repetable_song_stores", false); ?>
		
		<?php if(isset($album_date[0])) 	{ echo  $album_date[0]; } ?> <br>
        <?php if(isset($album_length[0])) 	{ echo  $album_length[0]; } ?> <br>

		<?php foreach ($album_song_details[0] as  $value_song_details) { 
			
			echo "<br>";
			echo $value_song_details['name-details']; 
			echo "<br>"; 
		    echo $value_song_details['length'];
		    echo "<br>";
			echo $value_song_details['detail'];
			echo "<br>"; 
			} 

		foreach ($album_song_store[0] as  $value_song_store) { 
			
			echo "<br>"; 
			echo $value_song_store['name-store']; 
			echo "<br>"; 
			echo $value_song_store['link']; 
			echo "<br>"; 
	 } 

	endwhile; // end of the loop. 
endif;

$single_posts = new WP_Query($args_singles);

	if ($single_posts->have_posts() ) :

	while ($single_posts->have_posts() ) : $single_posts->the_post();

	$post_id = get_the_ID(); ?>

	<a href="<?php the_permalink();?>"><?php the_title();?><?php the_post_thumbnail(array(200,200));?><?php the_content();?></a>

        <?php $single_date = get_post_meta( $post_id, 'ko_band_singles_date_release', false );
		$single_length = get_post_meta($post_id, "ko_band_singles_length", false ); 
		$single_store = get_post_meta($post_id, "ko_band_repetable_singles_stores", false); ?>

		<?php if(isset($single_date[0])) 	{ echo  $single_date[0]; } ?> <br>
        <?php if(isset($single_length[0])) 	{ echo  $single_length[0]; } ?> <br>

        <?php foreach ($single_store[0] as  $value_single_store) { 
			
			echo "<br>"; 
			echo $value_single_store['name']; 
			echo "<br>"; 
			echo $value_single_store['link']; 
			echo "<br>"; 

		} 
 	endwhile; 
endif; 
?>
