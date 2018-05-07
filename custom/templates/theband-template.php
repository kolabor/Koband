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
<div id="theband" class="section">
	<div class="container">
		<div class="row">
		 	<div class="container">
		 		<div class="row theband-heading">
		 			<h1 class="first_color"><?php echo esc_html__('The Band', 'koband');?></h1>
				</div>
			</div>
			
			<?php $args_theband = array(		
			 	'post_type' => 'theband',   
				'post_staus'=> 'publish',
				'posts_per_page' => -1
			);
			$theband_posts = new WP_Query( $args_theband );?>
					
			<div class="container band-bio">
				<div class="row koband_post_theband">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 justify main_font_color">
								<p class="main_font_color"><h4><?php echo esc_html__('Band Biography', 'koband');?></h4>
								<?php 
								$theband_bio = get_theme_mod('ko_band_theband_biography');
								echo esc_html($theband_bio);
								?></p>
							</div>
				   			<div class="container band-members">
				   				<div class="row">
									<?php 
								 	if ( $theband_posts->have_posts() ) : 
								 	//start loop
									while ( $theband_posts->have_posts() ) : $theband_posts->the_post();
									$post_id = get_the_ID();
									$theband_role = get_post_meta( $post_id, 'ko_band_the_band_bio', false ); ?>
									<div class="col-sm-4 band_member">
										<button type="button" id="myBtn" class="band_member_name main_font_color" data-toggle="modal" data-target="#myModal<?php echo $id;?>"><?php the_title(); ?></button> <br>
										<button type="button" id="myBtn" class="band_member_role main_font_color" data-toggle="modal" data-target="#myModal<?php echo esc_attr($id);?>"><?php if(isset($theband_role[0]))  { echo  esc_attr($theband_role[0]); } ?></button>

											<div class="bnd_mem_img" data-toggle="modal" data-target="#myModal<?php echo esc_attr($id);?>"><?php the_post_thumbnail('member_thumb'); ?>
											</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo esc_attr($id);?>" role="dialog">
										<div class="modal-dialog">
										<!-- Modal content-->
											<div class="modal-content bg">
												<div class="modal-header">
										          	<h4 class="modal-title main_font_color"><?php echo esc_html__('Name : ', 'koband');?><?php the_title();?></h4>
										          	<button type="button" class="close" data-dismiss="modal">&times;</button>
										        </div>
												<div class="modal-body">
													<div class="popup-img"><?php the_post_thumbnail(); ?></div>
											          	<h4 class="main_font_color"><?php echo esc_html__('Biography : ', 'koband');?></h4>
											          	<div class="main_font_color"><?php the_content();?></div>
											          	<h4 class="main_font_color"><?php echo esc_html__('Band Role : ', 'koband');?></h4>
											          	<p class="main_font_color"><?php if(isset($theband_role[0]))  { echo  esc_attr($theband_role[0]); } ?></p>
												</div>
													        
											</div><!--modal-content bg-->
													      
										</div><!--modal-dialog-->
									</div><!--modal fade-->
								    <?php endwhile; ?>
								    <?php	endif;?>
								      		
							   					
							   	</div><!--row-->
							</div><!--container band-members-->	
					   	
					   	</div><!--row-->	
				   	</div><!--container-->
				</div><!--row koband_post_theband-->
			</div><!--container band-bio-->	
		
		</div><!--row-->
	</div><!--container-->
</div><!--Section Theband-->
