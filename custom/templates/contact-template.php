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
<div class="page-header"> <h1>Contact Us </h1></div>

<?php
$google_map = get_theme_mod('ko_band_googlemap', false );
$contact_country = get_theme_mod('ko_band_country', false );
$contact_city = get_theme_mod('ko_band_city', false );
$contact_address = get_theme_mod('ko_band_address', false );
$contact_email = get_theme_mod('ko_band_email', false );
$contact_phone = get_theme_mod('ko_band_phone', false );
?>
<div class="container">
	<div class="row-contact"> 
	
 		<div class="col-country"><?php _e('Country Name', 'koband'); ?></div>
	        <?php echo $contact_country; ?>
	    
	    <div class="col-city"><?php _e('City Name', 'koband'); ?></div>
        	<?php echo $contact_city; ?>

   		<div class="col-address"><?php _e('Address', 'koband'); ?></div>
			<?php echo $contact_address;  ?>

		<div class="col-email"><?php _e('Email', 'koband'); ?> </div>
      		<?php echo $contact_email; ?>

        <div class="col-phone"><?php _e('Phone Number', 'koband'); ?></div>
       		<?php echo $contact_phone; ?>
       
        <div class="col-google"><?php _e('Google Map', 'koband'); ?> </div>
       		<?php echo $google_map; ?>               
   </div>
</div>
<!-- Contact with Map - END -->

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



<?php
//Social Network start here
$facebook = get_theme_mod( 'ko_band_facebook_social_media' , false);
$twitter = get_theme_mod( 'ko_band_twitter_social_media' , false);
$instagram = get_theme_mod( 'ko_band_insagram_social_media' , false);
$googleplus= get_theme_mod( 'ko_band_googleplus_social_media' , false);
$linkedin= get_theme_mod( 'ko_band_linkedin_social_media' , false);
$youtube= get_theme_mod( 'ko_band_youtube_social_media' , false);
$pinterest= get_theme_mod( 'ko_band_pinterest_social_media' , false);
$github= get_theme_mod( 'ko_band_github_social_media' , false);
$soundcloud= get_theme_mod( 'ko_band_soundcloud_social_media' , false);
?>
 <div class="container">
    <div class="row-socialmedia"> 
    
        <div class="col-sm"><?php _e('Facebook', 'koband'); ?></div>
            <?php if(isset($facebook[0])) { echo  $facebook; } ?><br>
   
        <div class="col-sm"><?php _e('Twitter', 'koband'); ?></div>
            <?php if(isset($twitter[0])) { echo  $twitter[0]; } ?><br>

        <div class="col-sm"><?php _e('Istagram', 'koband'); ?></div>
            <?php if(isset($instagram[0])) { echo  $instagram[0]; } ?><br>

        <div class="col-sm"><?php _e('Googleplus', 'koband'); ?></div>
            <?php if(isset($googleplus[0])) { echo  $googleplus[0]; } ?><br>

        <div class="col-sm"><?php _e('Linkedin', 'koband'); ?></div>
            <?php if(isset($linkedin[0])) { echo  $linkedin[0]; } ?><br>

        <div class="col-sm"><?php _e('Youtube', 'koband'); ?></div>
            <?php if(isset($youtube[0])) { echo  $youtube[0]; } ?><br>

        <div class="col-sm"><?php _e('Pinterest', 'koband'); ?></div>
            <?php if(isset($pinterest[0])) { echo  $pinterest[0]; } ?><br>

        <div class="col-sm"><?php _e('Spotify', 'koband'); ?></div>
            <?php if(isset($spotify[0])) { echo  $spotify[0]; } ?><br>

        <div class="col-sm"><?php _e('Soundcloud', 'koband'); ?></div>
            <?php if(isset($soundcloud[0])) { echo  $soundcloud[0]; } ?><br>

        <div class="col-sm"><?php _e('Bandcamp', 'koband'); ?></div>
            <?php if(isset($bandcamp[0])) { echo  $bandcamp[0]; } ?><br>

        <div class="col-sm"><?php _e('Deezer', 'koband'); ?></div>
            <?php if(isset($deezer[0])) { echo  $deezer[0]; } ?><br>

        <div class="col-sm"><?php _e('Apple', 'koband'); ?></div>
            <?php if(isset($apple[0])) { echo  $apple[0]; } ?><br>
</div> 
</div>                                     
  <?php                     
    //Social Network end here
?>