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
<div class="section" id="theband">
	<div class="container">
		<div class="row">
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
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
									<!--<h2>test</h2>-->
									<?php 
									$theband_bio = get_theme_mod('ko_band_the_band_biography');
									echo $theband_bio;
									?>
								</div>
							
				   	


				   						<div class="container band-members">
				   							<div class="row">
									
											
											<?php 
								 				if ( $theband_posts->have_posts() ) : 
								 				//start loop
								 					//$i = 0;
								 					//$mymodal = 'myModal' . $i; 
													while ( $theband_posts->have_posts() ) : $theband_posts->the_post(); ?>
														<?php $post_id = get_the_ID(); ?>
														<?php $theband_role = get_post_meta( $post_id, 'ko_band_the_band_bio', false ); ?>
												<div class="col-sm-4">
														<div data-toggle="modal" data-target="#myModal<?php echo $id;?>"><?php the_post_thumbnail(array(200,200)); ?></div>

													<button type="button" id="myBtn" class="btn" data-toggle="modal" data-target="#myModal<?php echo $id;?>"><?php the_title(); ?></button>
												</div>
													  <!-- Modal -->
													  <div class="modal fade" id="myModal<?php echo $id;?>" role="dialog">
													    <div class="modal-dialog">
													    
													      <!-- Modal content-->
													      <div class="modal-content">
													        <div class="modal-header">
													          <h4 class="modal-title"><?php _e('Name : ', 'koband');?><?php the_title();?></h4>
													          <button type="button" class="close" data-dismiss="modal">&times;</button>
													        </div>
													        <div class="modal-body">
													        	<?php the_post_thumbnail(array(400,400)); ?>
													          <h4><?php _e('Biography : ', 'koband');?></h4>
													          <p><?php the_content();?></p>
													          <h4><?php _e('Band Role : ', 'koband');?></h4>
													          <p><?php if(isset($theband_role[0]))  { echo  $theband_role[0]; } ?></p>
													        </div>
													        <!--<div class="modal-footer">
													          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													        </div>-->
													      </div>
													      
													    </div>
													  </div>
								      				<?php endwhile; ?>
								      			<?php	endif;?>
								      		
							   					
							   				</div>
							   			</div>	
					   		</div>	

				   	</div>
				</div>
		
			</div>	
		</div>
	</div>
</div>
