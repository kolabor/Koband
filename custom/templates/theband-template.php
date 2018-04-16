<?php
/**
 * 
 *
 * Template Name: The Band
 *
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<div class="album py5 bg-theband" id="theband">
 	<div class="container">
 		<div class="row">
 			<h1>The Band Temp</h1>
		</div>
	</div>
	
			<?php $args_theband = array(		
			 	'post_type' => 'theband',   
				'post_staus'=> 'publish',
				'posts_per_page' => -1
			);
			$theband_posts = new WP_Query( $args_theband );?>
			
	<div class="container">
		<div class="row koband_post_theband">
			<div class="col-sm-4">
				<!--<h2>test</h2>-->
				<?php 
				$theband_bio = get_theme_mod('ko_band_the_band_biography');
				echo $theband_bio;
				?>
			</div>

			<div class="col-sm-8">		
			<?php 
 				if ( $theband_posts->have_posts() ) : 
 				//start loop
					while ( $theband_posts->have_posts() ) : $theband_posts->the_post(); ?>
					<?php $post_id = get_the_ID(); ?> 
					<?php the_title(); the_content();?></br>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(200,200)); ?></a></br>
					<?php $theband_role = get_post_meta( $post_id, 'ko_band_the_band_bio', false ); ?>
   			 		<?php if(isset($theband_role[0])) 		 { echo  $theband_role[0]; } ?></br></br></br>
      				<?php endwhile;
      			endif;?>
   			</div>
		</div>
	</div>
</div>
