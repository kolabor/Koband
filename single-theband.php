<?php
/**
 * The Template for displaying single posts for theband
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


get_header('noscroll'); ?>
<div class="container theband_single_page">
	<?php if (have_posts() ) : 
	 	//start loop ?>
	<div class='theband_holder'>
		<?php  while( have_posts() ) : the_post(); 
		$post_id = get_the_ID(); ?>
		<?php endwhile;?>
		<div class="contenier">
			<div class="row ">
				<div class="main_font_color theband_single_title"><h3><?php echo esc_html__('Name : ', 'koband');?><?php the_title();?></h3></div>
				<div class="row theband_sng_content_hld">
					<div class="col-sm-4">
						<div class="single_page_cover"><?php the_post_thumbnail(array(800,800)); ?></div>
					</div>
					<div class="col-sm-8">
						<h4 class="main_font_color"><?php echo esc_html__('Biography : ', 'koband');?></h4>
							<div class="main_font_color justify bio_content"><?php the_content();?></div>
						<h4 class="main_font_color"><?php echo esc_html__('Band Role : ', 'koband');?></h4>
						<?php 
							$single_theband_role = get_post_meta( $post_id, 'ko_band_the_band_bio', false );
							if (isset($single_theband_role[0])){ echo esc_attr($single_theband_role[0]);}?>
					</div>
				</div>
			</div><!--row-->
		</div><!--container-->
	</div><!--theband_holder-->
	<?php endif;?>
</div><!--container theband_single_page-->

<?php get_footer(); ?>