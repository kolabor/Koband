<?php
/**
 * 
 *
 * Template Name: Contact Template
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
				<h1 class="heading_font first_color"><?php the_title();?></h1>
			</header>
		<div class="conent_holder">
			<div class="container">
				<?php
				$koband_contact_country = get_theme_mod('ko_band_contact_country'); 
			  	$koband_contact_city = get_theme_mod('ko_band_contact_city');
			  	$koband_contact_address = get_theme_mod('ko_band_contact_address');
			  	$koband_contact_email = get_theme_mod('ko_band_contact_email');
			  	$koband_contact_phone = get_theme_mod('ko_band_contact_phone');?>
			  	<div class="row contact_row main_font">
				 	<div class="col-sm-3"><?php echo esc_html__('Country:', 'koband');?></div>
				  	<div class="col-sm-3"><?php if(isset($koband_contact_country)) { echo esc_attr($koband_contact_country); } ?></div>
				</div>
				<div class="row contact_row main_font">
				  	<div class="col-sm-3"><?php echo esc_html__('City:', 'koband');?></div> 
				  	<div class="col-sm-3"><?php if(isset($koband_contact_city)) { echo esc_attr($koband_contact_city); } ?></div>
				</div>
				<div class="row contact_row main_font">
					<div class="col-sm-3"><?php echo esc_html__('Address:', 'koband');?></div>
					<div class="col-sm-3"><?php if(isset($koband_contact_address)) { echo esc_attr($koband_contact_address); } ?></div>
				</div>
				<div class="row contact_row main_font">	
					<div class="col-sm-3"><?php echo esc_html__('E-mail Adress:', 'koband');?></div>
					<div class="col-sm-3"><?php if(isset($koband_contact_email)) { echo esc_attr($koband_contact_email); } ?></div>
				</div>
				<div class="row contact_row main_font">
					<div class="col-sm-3"><?php echo esc_html__('Phone Number:', 'koband');?></div>
					<div class="col-sm-3"><?php if(isset($koband_contact_phone)) { echo esc_attr($koband_contact_phone); } ?></div>
				</div> </br>
				<div class="contact_form main_font">
					<?php while ( have_posts() ) : the_post();
			
						the_content();
									
					endwhile; // End of the loop.?>
				</div>
			</div><!--container -->
		</div><!--content_holder -->
	<?php get_sidebar(); ?>
	</div><!--content -->
</div><!--contact -->
<?php get_footer(); ?>
