<?php
/**
 * The Template for displaying all single posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<?php
$images = get_post_meta($post->ID, 'vdw_gallery_id', true);
foreach ($images as $image) {
    $image_obj = get_post($image);
    echo $image_obj->post_excerpt;
} ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php
			/**
			 * kolabor_band_after_post hook
			 *
			 * @hooked kolabor_band_post_navigation - 10
			 */
			do_action_e( 'ko_band_after_post', 'koband');

		?>
	<?php endwhile; // end of the loop. ?>

<?php
get_sidebar();
get_footer(); ?>