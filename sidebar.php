<?php
/**
 * The Template for displaying all sidebar posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */



 do_action( 'before_sidebar' ); 
 ?>
<div class="sidebar" role="complementary">
<p><?php _e('Side-Bar', 'koband');?></p>

 	<?php if ( is_active_sidebar( 'ko_band_sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'ko_band_sidebar' ); ?><!-- #sidebar-area -->
    <?php endif; ?>

</div>