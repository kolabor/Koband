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
                                 
  
