get_header(); ?> 

<h1>Conact</h1>
<?php

     $args_news = array
    (		
	 	 'post_type' => 'post',   
		 'post_staus'=> 'publish',
		 'posts_per_page' => -1
	);

 $contact_posts = new WP_Query( $args_news );

 if ( $contact_posts->have_posts() ) : 
 	//start loop ?>

<div class='tour_holder'>

<?php while ( $contact_posts->have_posts() ) : $contact_posts->the_post(); 
	
	$post_id = get_the_ID(); 

$google_map = get_post_meta( $post_id, 'ko_band_googlemap', false );
$contact_country = get_post_meta( $post_id, 'ko_band_country', false );
$contact_city = get_post_meta( $post_id, 'ko_band_city', false );
$contact_address = get_post_meta( $post_id, 'ko_band_address', false );
$contact_email = get_post_meta( $post_id, 'ko_band_email', false );
$contact_phone = get_post_meta( $post_id, 'ko_band_phone', false );
?>
	     <div class="tour_row">
		<div id="title"><?php the_title();?></div>
		<a href="<?php the_permalink();?>"><?php the_post_thumbnail(array(200,200)); ?></a>
		<div id="excerpt"><?php the_excerpt(); ?></div>
		
               	<?php if(isset($google_map[0])) 		 { echo  $google_map[0]; } ?><br>
            	<?php if(isset($contact_country[0])) 	 { echo  $contact_country[0]; } ?><br>
            	<?php if(isset($contact_city[0])) 		 { echo  $contact_city[0]; } ?><br>
            	<?php if(isset($contact_address[0])) 	 { echo  $contact_address[0]; } ?><br>
            	<?php if(isset($contact_email[0])) 	 { echo  $contact_email[0]; } ?><br>
            	<?php if(isset($contact_phone[0]))  { echo  $contact_phone[0]; } ?><br>
            	
    
 
         <?php 
	 endwhile; // end of the loop. 
?>
</div>;

<?php
endif;

?>



<style>
    .map {
        min-width: 300px;
        min-height: 300px;
        width: 100%;
        height: 100%;
    }

    .header {
        background-color: #F5F5F5;
        color: #36A0FF;
        height: 70px;
        font-size: 27px;
        padding: 10px;
    }
</style>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });
</script>
