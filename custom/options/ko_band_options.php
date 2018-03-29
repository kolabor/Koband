<?php 
/**
 * Koband Theme Options file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/********** koband Main theme settings  *******************/
function ko_band_theme_customize_register( $wp_customize ) {

/*** Main Top Logo ***/
$wp_customize->add_setting( 'ko_band_main_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_main_logo', array(
    'label'    => __( 'Main top Logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_main_logo',
) ) );
/*** Main Top Retina Logo ***/
$wp_customize->add_setting( 'ko_band_retina_main_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_retina_main_logo', array(
    'label'    => __( 'Main top Retina Logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_retina_main_logo',
) ) );


 /*** Main Footer Logo ***/
$wp_customize->add_setting( 'ko_band_footer_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_footer_logo', array(
    'label'    => __( 'Footer logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_footer_logo',
) ) );
 /*** Main Footer Retina Logo ***/
$wp_customize->add_setting( 'ko_band_retina_footer_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_retina_footer_logo', array(
    'label'    => __( 'Footer Retina logo', 'koband' ),
    'section'  => 'title_tagline',
    'settings' => 'ko_band_retina_footer_logo',
) ) );


/*** Main theme color ***/
$wp_customize->add_setting( 'ko_band_main_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_colorr', array(
        'label'      => __( 'Main color', 'koband' ),
        'section'    => 'title_tagline',
        'settings'   => 'ko_band_main_color',
    ) ) 
);


/*** Second theme color ***/
$wp_customize->add_setting( 'ko_band_second_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_second_color', array(
        'label'      => __( 'Second color', 'koband' ),
        'section'    => 'title_tagline',
        'settings'   => 'ko_band_second_color',
    ) ) 
);

/*** Third theme color ***/
$wp_customize->add_setting( 'ko_band_third_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_third_color', array(
        'label'      => __( 'Third color', 'koband' ),
        'section'    => 'title_tagline',
        'settings'   => 'ko_band_third_color',
    ) ) 
);


/*** Main Font Selector ***/
$wp_customize->add_setting( 'ko_band_general_font_selector' );
$wp_customize->add_control( 'ko_band_general_font_selector', array(

        'type'      => 'select',
        'label'      => __( 'Select main website font:', 'koband' ),
        'section'    => 'title_tagline',
        'settings'   => 'ko_band_general_font_selector',
        'choices' => array(
            'Open+Sans' => 'Open Sans',
            'Josefin+Slab' => 'Josefin Slab',
            'Arvo' => 'Arvo',
            'Lato' => 'Lato',
            'Vollkorn' => 'Vollkorn',
            'Abril+Fatface' => 'Abril Fatface',
            'Ubuntu' => 'Ubuntu',
            'PT+Sans' => 'PT Sans',
            'Old+Standard TT' => 'Old Standard TT',
            'Droid+Sans' => 'Droid Sans',
            'Anivers' => 'Anivers',
            'Source+Sans+Pro' => 'Source Sans Pro',
            'Fertigo' => 'Fertigo',
            'Allerta' => 'Allerta',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway',
            'Prociono' => 'Prociono',
            'Roboto' => 'Roboto',
            'Roboto+Condensed' => 'Roboto Condensed',
     ),
    ) 
);

/*** H1, H2, H3, H4, H5, h6, H7........ Font Selector ***/
$wp_customize->add_setting( 'ko_band_heading_font_selector' );
$wp_customize->add_control( 'ko_band_heading_font_selector', array(

        'type'      => 'select',
        'label'      => __( 'Select Heading (h1, h2, h3) font:', 'koband' ),
        'section'    => 'title_tagline',
        'settings'   => 'ko_band_heading_font_selector',
        'choices' => array(
            'Open+Sans' => 'Open Sans',
            'Josefin+Slab' => 'Josefin Slab',
            'Arvo' => 'Arvo',
            'Lato' => 'Lato',
            'Vollkorn' => 'Vollkorn',
            'Abril+Fatface' => 'Abril Fatface',
            'Ubuntu' => 'Ubuntu',
            'PT+Sans' => 'PT Sans',
            'Old+Standard TT' => 'Old Standard TT',
            'Droid+Sans' => 'Droid Sans',
            'Anivers' => 'Anivers',
            'Source+Sans+Pro' => 'Source Sans Pro',
            'Fertigo' => 'Fertigo',
            'Allerta' => 'Allerta',
            'Montserrat' => 'Montserrat',
            'Raleway' => 'Raleway',
            'Prociono' => 'Prociono',
            'Roboto' => 'Roboto',
            'Roboto+Condensed' => 'Roboto Condensed',
     ),
    ) 
);

    // Show Retina favicon

    $wp_customize->add_setting( 'ko_band_retina_favicon' );
    $wp_customize->add_control( new WP_Customize_Site_Icon_Control ( $wp_customize, 'ko_band_retina_favicon', array(
      'label'    => __( 'Retina Site Icon', 'koband' ),
      'section'  => 'title_tagline',
      'settings' => 'ko_band_retina_favicon',
  ) ) );
/*******************************************************************
$wp_customize->add_section( 'ko_band_general_section' , array(
    'title'       => __( 'General Setting', 'koband' ),
    'priority'    => 26,
    'description' => '<hr>',
) );


$wp_customize->add_setting( 'ko_band_general_setting' );
$wp_customize->add_control(new WP_Customize_Control( 'ko_band_general_setting', array(
    'label' => __( 'General Setting:', 'koband' ),
    'settings' => 'ko_band_general_setting',
    'section' => 'ko_band_general_section',
)) );
*************************************************************************/

/*** Footer section starts here  ***/
$wp_customize->add_section( 'ko_band_footer_section' , array(
    'title'       => __( 'Footer', 'koband' ),
    'priority'    => 27,
    'description' => '<hr>',
) );

/*Copyright text*/
$wp_customize->add_setting( 'ko_band_footer_copyright_text' );
$wp_customize->add_control( 'ko_band_footer_copyright_text', array(
    'label' => __( 'Copyright text:', 'koband' ),
    'settings' => 'ko_band_footer_copyright_text',
    'section' => 'ko_band_footer_section',
) );



/***  Social media section starts here  ***/
$wp_customize->add_section( 'ko_band_social_media_section' , array(
    'title'       => __( 'Social Media', 'koband' ),
    'priority'    => 28,
    'description' => '<hr>',
) );

/*Social Media checkbox */
$wp_customize->add_setting( 'ko_band_social_media_chx' );
$wp_customize->add_control( 'ko_band_social_media_chx', array(
    'label' => __( 'Enable social media icons in footer:', 'koband' ),
    'settings' => 'ko_band_social_media_chx',
    'section' => 'ko_band_social_media_section',
    'type'     => 'checkbox',

) );

$wp_customize->add_setting( 'ko_band_facebook_social_media' );
$wp_customize->add_setting( 'ko_band_twitter_social_media' );
$wp_customize->add_setting( 'ko_band_insagram_social_media' );
$wp_customize->add_setting( 'ko_band_googleplus_social_media' );
$wp_customize->add_setting( 'ko_band_linkedin_social_media' );
$wp_customize->add_setting( 'ko_band_youtube_social_media' );
$wp_customize->add_setting( 'ko_band_pinterest_social_media' );
$wp_customize->add_setting( 'ko_band_github_social_media' );


/*Facebook*/
$wp_customize->add_control( 'ko_band_facebook_social_media', array(
    'label' => __( 'Facebook:', 'koband' ),
    'settings' => 'ko_band_facebook_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Twitter*/
$wp_customize->add_control( 'ko_band_twitter_social_media', array(
    'label' => __( 'Twitter:', 'koband' ),
    'settings' => 'ko_band_twitter_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Instagram*/
$wp_customize->add_control( 'ko_band_insagram_social_media', array(
    'label' => __( 'Instagram:', 'koband' ),
    'settings' => 'ko_band_insagram_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Google*/
$wp_customize->add_control( 'ko_band_googleplus_social_media', array(
    'label' => __( 'Google +:', 'koband' ),
    'settings' => 'ko_band_googleplus_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Linkedin*/
$wp_customize->add_control( 'ko_band_linkedin_social_media', array(
    'label' => __( 'Linkedin:', 'koband' ),
    'settings' => 'ko_band_linkedin_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Youtube*/
$wp_customize->add_control( 'ko_band_youtube_social_media', array(
    'label' => __( 'Youtube:', 'koband' ),
    'settings' => 'ko_band_youtube_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Pinterest*/
$wp_customize->add_control( 'ko_band_pinterest_social_media', array(
    'label' => __( 'Pinterest:', 'koband' ),
    'settings' => 'ko_band_pinterest_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*Github*/
$wp_customize->add_control( 'ko_band_github_social_media', array(
    'label' => __( 'GitHub:', 'koband' ),
    'settings' => 'ko_band_github_social_media',
    'section' => 'ko_band_social_media_section',
) );

}
add_action( 'customize_register', 'ko_band_theme_customize_register' );

/*function ko_band_theme_customizer_favicon( $wp_customize ) {
    // Fun code will go here

    $wp_customize->add_section( 'ko_band_favicon_section' , array(
      'title'       => __( 'Favicon', 'koband' ),
      'priority'    => 30,
      'description' => 'Upload a favicon to your Wordpress',
  ) );
    $wp_customize->add_setting( 'ko_band_favicon' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_favicon', array(
      'label'    => __( 'Favicon', 'koband' ),
      'section'  => 'title_tagline',
      'settings' => 'ko_band_favicon',
  ) ) );
}
add_action('customize_register', 'ko_band_theme_customizer_favicon');*/


?>