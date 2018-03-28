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
  	$wp_customize->add_section('ko_band_colors', array(

        'title' => __('Colors', 'koband'),
        'description' => 'Modify the theme colors'
    ));
    $wp_customize->add_setting('background_color', array(
        'default' => '#fff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'background_color', array(
        'label' => __('Edit Background Color', 'koband'),
        'section' => 'ko_band_colors',
        'settings' => 'background_color'
    )));
}
add_action( 'customize_register', 'ko_band_customize_register' );


?>
