<?php

/**
 * Koband Theme Options footer file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


 ///get_footer();
?>
 <!-- footer row starts here -->
<div class="container">
 	<div class="row" id="footer">
 	    <div class="col-sm-3 ">
 	    	<div class= "footer_logo">
 	  			<?php $footer_logo = get_theme_mod( 'ko_band_footer_logo' ); ?>
                	<img src="<?php echo $footer_logo; ?>" class="footer_logo">
        			
            </div>
   		</div>

 	    <div class="col-sm-3 side-widgets_one">
            <?php if ( is_active_sidebar( 'widgets_one' ) ) : ?>
               <?php dynamic_sidebar( 'widgets_one' ); ?><!-- #first .widget-area -->
            <?php endif; ?>
 	 	</div>

		<div class="col-sm-3 side-widgets_two">
 	  		<?php if ( is_active_sidebar( 'widgets_two' ) ) : ?>
              	<?php dynamic_sidebar( 'widgets_two' ); ?> <!-- #second .widget-area -->
            <?php endif; ?>
 		</div>

 	    <div class="col-sm-3 side-widgets_three">
 	  		<?php if ( is_active_sidebar( 'widgets_three' ) ) : ?>
       			<?php dynamic_sidebar( 'widgets_three' ); ?> <!-- #third .widget-area -->
            <?php endif; ?> 
 	 	</div>
 	
 		<div class="col-sm copyright">
 			<a href="http://www.kolabor.net">Copyright © 2018 | Kolabor.net </a> <!--Copyright-->
 		</div>
	</div>
</div>
<!-- footer row ends here -->
</body>
</html>
