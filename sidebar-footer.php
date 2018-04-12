<?php
/**
 * The Template for displaying all sidebar footer posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

if (   ! is_active_sidebar( 'footer-1'  )
	&& ! is_active_sidebar( 'footer-2' )
	&& ! is_active_sidebar( 'footer-3'  )
) {
	return;
}

// If we get this far, we have widgets. Let do this.
?>
    <aside id="supplementary" <?php ko_band_footer_sidebar_class(); ?> role="complementary">
        <div class="wrapper">
            <div class="footer-widget-wrapper clearfix">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                <div id="widgets_1" class="widget-column side-widgets_1">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div><!-- #first .widget-area -->
                <?php endif; ?>
            
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                <div id="widgets_2" class="widget-column side-widgets_2">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div><!-- #second .widget-area -->
                <?php endif; ?>
            
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                <div id="widgets_3" class="widget-column side-widgets_3">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div><!-- #third .widget-area -->
                <?php endif; ?>
            </div><!-- .footer-widget-wrapper -->
        </div><!-- .wrapper -->
    </aside><!-- #supplementary -->

?>