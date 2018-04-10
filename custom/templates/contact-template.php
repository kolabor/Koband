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
	<div class="row-top"> 
	
 		<div class="col-country"><?php _e('Country Name', 'koband'); ?></div>
	        <?php 
	        echo $contact_country; 
	        ?>
	    <div class="col-city"><?php _e('City Name', 'koband'); ?></div>
        	<?php 
        	echo $contact_city; 
        	?>
   		<div class="col-address"><?php _e('Address', 'koband'); ?></div>
			<?php
			 echo $contact_address; 
			 ?>
		<div class="col-email"><?php _e('Email', 'koband'); ?> </div>
      		<?php 
      		echo $contact_email;
      		 ?>
        <div class="col-phone"><?php _e('Phone Number', 'koband'); ?></div>
       		<?php 
       		echo $contact_phone; 
       		?>
       
        <div class="col-google"><?php _e('Google Map', 'koband'); ?> </div>
        <?php echo $google_map; ?>

			<iframe class="col-sm" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21817368.134000897!2d4.124021438720625!3d48.12464519333026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ed8886cfadda85%3A0x72ef99e6b3fcf079!2sEurope!5e0!3m2!1sen!2smk!4v1523369113798" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		                  
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

