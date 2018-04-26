<?php
/**
 * The Template for displaying all searchform posts
 *
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */
?>

<?php //$options 	= ko_band_get_theme_options(); // Get options ?>
<!--<form role="search" method="get" class="search-form" action="<?php /*echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'koband' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $options['search_text'] ); ?>" value="<?php the_search_query(); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'koband' ); ?>" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_attr_x( 'Search', 'submit button', 'koband' ); */?></span></button>
</form>-->


<form method="get" role="search"  class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_e( 'Search....', 'koband' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_e( 'Search for :  ', 'koband' ) ?>"/>
    </label>
    <button type="submit" class="search-submit bg_first_color"/><?php _e('Search', 'koband') ?></button>
</form>
