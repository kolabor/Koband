<?php
/**
 * 
 *
 * Template Name: Media
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
get_header();?>

 <h1>Media Temp</h1>

<?php



    $args_media = array
    (		
	 	 'post_type' => 'media',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $media_posts = new WP_Query( $args_media );
 $total = $media_posts->found_posts; 

if($total>0):
 if ( $media_posts->have_posts() ) : 
 	//start loop
	 while ( $media_posts->have_posts() ) : $media_posts->the_post(); 

		$post_id = get_the_ID();

        $all  = get_post_meta($post_id);

		$images = get_post_meta("vdw_gallery_id", $post_id);
		$videos = get_post_meta("ko_band_repetable_video_field", $post_id);
	




 		foreach($images as $image)
       {
             echo $image . ' show: ' . $val . '<br/>';
       };
		 foreach($videos as $image=>$val)
       {
             echo $image . ' show: ' . $val . '<br/>';
       };
		echo "<pre>";
		print_r($all);
		echo "</pre>";

       /* echo "<pre>";
		print_r($images['vdw_gallery_id'][0]);
		echo "</pre>";

		 echo "<pre>";
		print_r($videos['ko_band_repetable_video_field'][0]);
		echo "</pre>";*/


		/*foreach($all as $key=>$val)
       {
             echo $key . ' : ' . $val[0] . '<br/>';
       }*/

      
  

			/*<!--<a href="<?php the_permalink();?>"><?php the_title();?></a>
		
			<li>	<?php get_post_meta( "vdw_gallery_id", $post_id );
	 				//echo $fieldd_bank;?>
	 				
	 		</li>
	 	
	 		<li>	<?php get_post_meta( "link[]", $post_id );
	 			//	echo $fieldd_kategory;?>
	 				 

	 		</li>
	 		<li>	<?php get_post_meta( "select[]", $post_id );?> -->
*/
	 endwhile; // end of the loop. 
endif;
endif;


 ?>

