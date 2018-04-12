<?php

/**
 * Koband Theme Options footer file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


 get_footer();
?>
 <!-- footer row starts here -->
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="row">	

					
					<div class="col-sm-4">
	 				<div class="footer-left">
				   	  <a href="http://www.kolabor.net">
			   			    Copyright © 2018 | Kolabor.net 
			     	  </a>
			      	</div>
			      </div>
			      		<div class="col-sm-4">	      	
				     <div class="footer-nav">
	            		  <?php
	                		$args = array(
	                		  'theme_location' => 'footer'
	               			 );
	             		   ?>
	             		  <?php wp_nav_menu($args); ?>
	       			 </div>
	       			</div>
					<div class="col-sm-4">
						<div class="footer-right">
						<?php $sidebars_widgets = wp_get_sidebars_widgets();
					if(!empty($sidebars_widgets['widgets_1'])) : ?>
					<div class="footer-bar site-pad">
						<div class="site-container">
							<div class="side-widgets_1">
								<?php dynamic_sidebar('widgets_1') ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	      		</footer>
		
<!-- footer row ends here -->
</body>
</html>
