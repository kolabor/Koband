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
	<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo esc_html__('Temporarliy Unavailable', 'koband');?></title>
	</head>
	<body>
		<div id="wrapper">
			<center>
				<!-- This is the generic database error page that will be shown when a fatal db connection issue aries -->
				<h1><?php echo esc_html($_SERVER['HTTP_HOST']);?><?php echo esc_html(' is Temporarliy Unavailable', 'koband');?></h1>
				<p><?php echo esc_html('The webmaster has been alerted. Please try again later.', 'koband');?></p>
			</center>
		</div>
	</body>
	</html>

<?php
get_sidebar();
get_footer(); ?>