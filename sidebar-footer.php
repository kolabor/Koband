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

if (   ! is_active_sidebar( 'widgets_1'  )
	&& ! is_active_sidebar( 'widgets_2' )
	&& ! is_active_sidebar( 'widgets_3'  )
    && ! is_active_sidebar( 'widgets_4'  )
) {
	return;
}

// If we get this far, we have widgets. Let do this.
?>
    <aside id="supplementary" <?php init_widgets(); ?> role="complementary">
        <div class="wrapper">
            <div class="footer-widget-wrapper clearfix">
                <?php if ( is_active_sidebar( 'widgets_1' ) ) : ?>
                <div id="widgets_1" class="widget-column side-widgets_1">
                    <?php dynamic_sidebar( 'widgets_1' ); ?>
                </div><!-- #first .widget-area -->
                <?php endif; ?>
            
                <?php if ( is_active_sidebar( 'widgets_2' ) ) : ?>
                <div id="widgets_2" class="widget-column side-widgets_2">
                    <?php dynamic_sidebar( 'widgets_2' ); ?>
                </div><!-- #second .widget-area -->
                <?php endif; ?>
            
                <?php if ( is_active_sidebar( 'widgets_3' ) ) : ?>
                <div id="widgets_3" class="widget-column side-widgets_3">
                    <?php dynamic_sidebar( 'widgets_3' ); ?>
                </div><!-- #third .widget-area -->
                <?php endif; ?> 
                <?php if ( is_active_sidebar( 'widgets_4' ) ) : ?>
                <div id="widgets_4" class="widget-column side-widgets_4">
                    <?php dynamic_sidebar( 'widgets_4' ); ?>
                </div><!-- #third .widget-area -->
                <?php endif; ?>
            </div><!-- .footer-widget-wrapper -->
        </div><!-- .wrapper -->
    </aside><!-- #supplementary -->

?>