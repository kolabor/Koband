<?php
/**
 * The Template for displaying single posts for tour
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header('noscroll'); ?>
<h1>testttt</h1> <?php 
if (have_posts() ) : 
	
 	//start loop ?>
	<?php  while ( have_posts() ) : the_post(); 
	$post_id = get_the_ID(); ?>
	<?php endwhile; endif;?>