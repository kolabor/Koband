<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll');
	
	mail('developers@example.com', 'WP SQL Connection Issue on '.$_SERVER['HTTP_HOST'], 'This is an automated message from the wordpress custom db error message file.');
	?>
<div class="container search-holder">
	<div class="content">
        <div class="conent_holder">
				<div id="wrapper">
					<center>
						<!-- This is the generic database error page that will be shown when a fatal db connection issue aries -->
						<h1><?php echo esc_html__('Temporarliy Unavailable', 'koband');?></h1>
						<h3><?php echo esc_html($_SERVER['HTTP_HOST']);?><?php echo esc_html(' is Temporarliy Unavailable', 'koband');?></h3>
						<p><?php echo esc_html__('The webmaster has been alerted. Please try again later.', 'koband');?></p>
					</center>
				</div>
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer(); ?>