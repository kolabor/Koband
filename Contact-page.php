<?php
/**
 * 
 *
 Template Name: Contact Page
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0

 */
 get_header('noscroll');?>
<div id="contact" class="container">
	<div class="content">
			<header>
				<h1><?php the_title();?></h1>
			</header>
		<div class="conent_holder">
			<div class="container">
				<?php
				$koband_contact_country = get_theme_mod('ko_band_contact_country'); 
			  	$koband_contact_city = get_theme_mod('ko_band_contact_city');
			  	$koband_contact_address = get_theme_mod('ko_band_contact_address');
			  	$koband_contact_email = get_theme_mod('ko_band_contact_email');
			  	$koband_contact_phone = get_theme_mod('ko_band_contact_phone');?>

				 	<div class="col-sm">
				  		<?php echo __('Country Name:', 'koband');?> <?php if(isset($koband_contact_country)) { echo  $koband_contact_country; } ?></div>
				  	<div class="col-sm">
				  		<?php echo __('City Name:', 'koband');?> <?php if(isset($koband_contact_city)) { echo  $koband_contact_city; } ?></div>
					<div class="col-sm">
						<?php echo __('Address:', 'koband');?> <?php if(isset($koband_contact_address)) { echo  $koband_contact_address; } ?></div>	
					<div class="col-sm">
						<?php echo __('E-mail Adress:', 'koband');?> <?php if(isset($koband_contact_email)) { echo  $koband_contact_email; } ?></div>
					<div class="col-sm">
						<?php echo __('Phone Number:', 'koband');?> <?php if(isset($koband_contact_phone)) { echo  $koband_contact_phone; } ?></div>  </br>

				<?php while ( have_posts() ) : the_post();
		
					the_content();
								
				endwhile; // End of the loop.?>
			</div>
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
