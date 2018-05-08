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
<form method="get" role="search"  class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr__( 'Search....', 'koband' ) ?>"
            value="<?php echo esc_attr(get_search_query()) ?>" name="s"
            title="<?php echo esc_attr__( 'Search for :  ', 'koband' ) ?>"/>
    </label>
    <button type="submit" class="search-submit bg_first_color"/><?php echo esc_html__('Search', 'koband') ?></button>
</form>
