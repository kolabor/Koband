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

    $args_media = array(		
	 	 'post_type' => 'media',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
		 
	);

$media_posts = new WP_Query( $args_media );
$total = $media_posts->found_posts; 

if($total>0):
 if ( $media_posts->have_posts() ) : 
 	//start loop
	 while ( $media_posts->have_posts() ) : $media_posts->the_post(); the_content();

		$post_id = get_the_ID();
		/*$all  = get_post_meta($post_id);
		echo "<pre>";
		print_r($all);
		echo "</pre>";
*/



		// Get post meta
//$images = get_post_meta($post_id, 'vdw_gallery_id', false);

if ( get_post_gallery($post_id, 'vdw_gallery_id', false) ) {

    $gallery        = get_post_gallery( $post_id, 'vdw_gallery_id', false );
    $galleryIDS     = $gallery['ids'];
    $pieces         = explode(",", $galleryIDS);

    foreach ($pieces as $key => $value ) { 

        $image_medium   = wp_get_attachment_image_src( $value, 'medium'); 
        $image_full     = wp_get_attachment_image_src( $value, 'full'); 
    ?>


    <div class="col-sm">
            <a href="<?php echo $image_medium[0] ?>" >
                <img src="<?php echo $image_full[0] ?>"/>
            </a>
    </div>
    <?php 
    }
}
//echo '<ul class="$images">';
// Loop all post meta
/*foreach ( $images as $field_image) 
{	
   		echo'<li>'.$field_image .'</li>';
   		?><div class="image">
                <h3 class="image-title"></h3>

                
                             
                
            </div>
   <?php
}*/

//echo '</ul>';

// Get post meta
$videos = get_post_meta($post_id,'ko_band_repetable_video_field', false);
//echo '<ul class="$videos">';
	// Loop all post meta
foreach ( $videos as $field_video) 
{	
   		echo'<li>'. $field_video .'</li>';?>

   		<div class="video">
                <h3 class="video-title"></h3>

                <iframe width="560" height="315" src="<?php echo $field_video['link']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                             
                
            </div>
   <?php
}
   		    

//echo '</ul>';

endwhile; // end of the loop. 
endif;
endif;


 
/*

$videos = get_post_meta($post->ID,'ko_band_media_video', true);

 foreach ( $images as $metakey ){
        echo $metakey;
	};*/
	

 	
		/*echo "<pre>";
		print_r($all);
		echo "</pre>";*/

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


?>