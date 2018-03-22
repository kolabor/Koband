<?php
/**
 * The template for displaying search form
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabor Band 0.3
 */
?>

<?php $options 	= kolabor_band_get_theme_options(); // Get options ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'kolabor-band' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $options['search_text'] ); ?>" value="<?php the_search_query(); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'kolabor-band' ); ?>" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_attr_x( 'Search', 'submit button', 'kolabor-band' ); ?></span></button>
</form>
