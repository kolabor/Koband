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



    $args_album = array(

	 	 
		  	'post_type' => 'album',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1
		  
		  
  
	);

 $album_posts = new WP_Query( $args_album );
 $total_album = $album_posts->found_posts; 
if (!empty('album')):
 if ( $album_posts->have_posts() ) : 
 	//start loop
	 while ( $album_posts->have_posts() ) : $album_posts->the_post(); 

		$post_id = get_the_ID();
$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
	echo "</pre>";
		 ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
			<?php 
			 the_post_thumbnail(array(200,200));

	$album_daterelease = get_post_meta( $post_id, 'ko_band_album_date_release', false );
		    foreach ($album_daterelease as $key => $value_daterelease) {

		 	print_r( $value_daterelease);
		 	# code...
		 }

	$album_length = get_post_meta($post_id, "ko_band_album_length", false );
		    foreach ($album_length as $key => $value_length) {

		 	print_r( $value_length);
		 	# code...
		 }
	$album_repetable_song = get_post_meta($post_id, "ko_band_repetable_song_details", false);

			foreach ($album_repetable_song as $key => $value_album_repetable_song) 
				  {
				  	
				 	print_r( $value_album_repetable_song);
				 	# code...
				 }	
	
	$album_song_name = get_required_files($post_id,'[name-details]');
				 
			foreach ($album_song_name as $key => $value_song_name) 
				  {
				  	
				 	print_r( $value_song_name);
				 	# code...
				 }	

	$album_song_length = get_required_files($post_id,'length[]'); 

			foreach ($album_song_length as $key => $value_song_length) 
				  {
				  	
				 	print_r( $value_song_length);
				 	# code...
				 }	

			$album_song_detail = get_required_files($post_id,'detail[]'); 

		    foreach ($album_song_detail as $key => $value_song_detail) 
				  {
				  	
				 	print_r( $value_song_detail);
				 	# code...
				 }	
		
/*
 foreach ($album_repetable_song as $key => $someVar) {
 print_r ($key." holds the value ".$someVar."<br />");
}

$album_song_name = get_post_meta($post_id,"name-details[]", false);
				 
				 foreach ($album_song_name as $key => $value_song_name) 
				  {
				  	print_r($key." holds the value ".$value_song_name."<br />");
				 	//print_r( $value_song_name);
				 	# code...
				 }	



		/*if( have_posts('ko_band_repetable_song_details', $post_id) )
			{
			    echo '<ul>';

			    while( the_repeater_field('ko_band_repetable_song_details', $post_id) )
			    {
			        echo '<li>name-details = ' . get_sub_field('name-details') . ', length = ' . get_sub_field('length') .', detail = ' . get_sub_field('detail') .',etc</li>';
			    }

			    echo '</ul>';
			}
*/

  


		/*

					*/

		 $album_repetable_stores = get_post_meta($post_id, "ko_band_repetable_song_stores", false );
		 foreach ($album_repetable_stores as $key => $value_repetable_song_stores) {

		 	print_r( $value_repetable_song_stores);
		 	# code...
		 }
	 endwhile; // end of the loop. 
endif;
endif;

/**************************************************************************************************/

 $args_singles = array(

	 	 
		  	'post_type' => 'singles',
		  	'post_staus'=> 'publish',
		 	'posts_per_page' => -1		  
  
	);

 $singles_posts = new WP_Query( $args_singles );
 $total_singles = $singles_posts->found_posts; 
if(!empty('singles')):
 if ( $singles_posts->have_posts() ) : 
 	//start loop
	 while ( $singles_posts->have_posts() ) : $singles_posts->the_post(); 

		$post_id = get_the_ID();
/*$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
	echo "</pre>";*/
		 ?>
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
			<?php 
			 the_post_thumbnail(array(200,200));

		 $singles_length = get_post_meta( $post_id, 'ko_band_singles_length', false );
		 foreach ($singles_length as $key => $value_singlelength) {

		 	print_r( $value_singlelength);
		 	# code...
		 }

		  $singles_daterelease = get_post_meta($post_id, "ko_band_singles_date_release", false );
		   foreach ($singles_daterelease as $key => $value_singledaterelease) {

		 	print_r( $value_singledaterelease);
		 	# code...
		 }

		  $singles_repetable_stores = get_post_meta($post_id, "ko_band_repetable_singles_stores", true );
		
			if ($singles_repetable_stores) {
			  for ($i=0; $i<$singles_repetable_stores; $i++) {
			    $meta_key_name = 'ko_band_repetable_singles_stores'.$i.'name';
			    $sub_field_value_name = get_post_meta($post_id, $meta_key_name, true);
			  }
			}
			if ($singles_repetable_stores) {
			  for ($i=0; $i<$singles_repetable_stores; $i++) {
			    $meta_key_link = 'ko_band_repetable_singles_stores'.$i.'link';
			    $sub_field_value_link = get_post_meta($post_id, $meta_key_link, true);
			  }
			}

		 
	 endwhile; // end of the loop. 
endif;
endif;
 
?>



