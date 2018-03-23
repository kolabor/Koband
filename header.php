<?php
/**
* The default template for displaying header
*
* @package Catch Themes
* @subpackage Kolabor Band
* @since Kolabor Band 0.3
*/
wp_head(); ?>

<header id="masthead" class="site-header" role="banner">
	<div class="header-main">
		<h1 class="site-title">
			<a href="<?php echo esc_url ( home_url ( '/' ) ); ?>"
			rel="home"><?php bloginfo( 'name' ); ?>
			</a>
		</h1>
		<?php if (is_category('Band')) { ?>
			<!-- overlay a pretty guitar on the logo for the band category -->
			<img id="rainbow"
				src="<?php bloginfo('template_directory');?>/images/kolabor.png"
				alt="I Love Rock! " />
		<?php } ?>
	</div> <!-- Here ends header-main div -->
</header>