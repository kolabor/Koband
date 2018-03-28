<?php 
/**
 * Koband Theme Options file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


function ko_band_customize_register( $wp_customize )
{
   //All our sections, settings, and controls will be added here
  	$wp_customize->add_section('ko_band_footer', array(

        'title' => __('Footer', 'koband'),
        'description' => 'Modify the theme footer'
    ));
    $wp_customize->add_setting('footer-nav', array(
        'default' => '',
    ));
    $wp_customize->add_control(new WP_Customize_Footer_Control($wp_customize,'footer-nav', array(
        'label' => __('Footer Edit', 'koband'),
        'section' => 'ko_band_footer',
        'settings' => 'footer-nav'
    )));
}
add_action( 'customize_register', 'ko_band_customize_register' );


?>
