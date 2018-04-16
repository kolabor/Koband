<?php
/**
 * 
 *
 * Template Name: Contact
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 * -----------------------------------------------------------------------------
 */

get_header();?>

 <!-- Contact with Map - START -->
<div class="album py5 bg-light" id="News">
    <div class="container"> <h1>Contact Us </h1>
        <div class="row">

<?php
$google_map = get_theme_mod('ko_band_googlemap', false );
$contact_country = get_theme_mod('ko_band_country', false );
$contact_city = get_theme_mod('ko_band_city', false );
$contact_address = get_theme_mod('ko_band_address', false );
$contact_email = get_theme_mod('ko_band_email', false );
$contact_phone = get_theme_mod('ko_band_phone', false );
?>
	
 		<div class="col-sm-4">
            <?php _e('Country Name: ', 'koband'); ?>
	           <?php echo $contact_country; ?></br>
	    
	        <?php _e('City Name: ', 'koband'); ?>
        	   <?php echo $contact_city; ?></br>

   		    <?php _e('Address: ', 'koband'); ?>
		       <?php echo $contact_address;  ?></br>

		    <?php _e('Email: ', 'koband'); ?>
      		    <?php echo $contact_email; ?></br>

            <?php _e('Phone Number: ', 'koband'); ?> 
       		   <?php echo $contact_phone; ?></br>
        </div>
       
        <div class="col-sm-8"><?php _e('Google Map: ', 'koband'); ?> </br>
       		<?php echo $google_map; ?>  </br> 
        </div>             
    </div>
    <!-- Contact with Map - END -->
    <div class="row">
    
<?php
//Social Network start here
$facebook = get_theme_mod( 'ko_band_facebook_social_media' , false);
$twitter = get_theme_mod( 'ko_band_twitter_social_media' , false);
$instagram = get_theme_mod( 'ko_band_insagram_social_media' , false);
$googleplus= get_theme_mod( 'ko_band_googleplus_social_media' , false);

$youtube= get_theme_mod( 'ko_band_youtube_social_media' , false);
$github= get_theme_mod( 'ko_band_github_social_media' , false);
$soundcloud= get_theme_mod( 'ko_band_soundcloud_social_media' , false);
?>
        <div class="col-sm-4"></div>
  
        <div class="col-sm-8">
          
         
                <?php if(isset($facebook[0])) { echo $facebook;} ?>
           
                <?php if(isset($twitter[0])) { echo  $twitter; } ?>
           
                <?php if(isset($instagram[0])) { echo  $instagram; } ?>
           
                <?php if(isset($googleplus[0])) { echo  $googleplus; } ?>
           
          
                <?php if(isset($youtube[0])) { echo  $youtube; } ?>
        
           
                <?php if(isset($spotify[0])) { echo  $spotify; } ?>
            
                <?php if(isset($soundcloud[0])) { echo  $soundcloud; } ?>
           
                <?php if(isset($bandcamp[0])) { echo  $bandcamp; } ?>
            
                <?php if(isset($deezer[0])) { echo  $deezer; } ?>
            
                <?php if(isset($apple[0])) { echo  $apple; } ?>
        </div>
   </div>
</div>
</div>
<?php                     
    //Social Network end here
?>
<script src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11858.21723189105!2d20.968557999999998!3d42.0098398!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smk!4v1523891538553"></script>

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
                                 
  
