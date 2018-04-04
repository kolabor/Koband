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


$wp_customize->add_section( 'ko_band_fonts_and_color_section' , array(
    'title'       => __( 'Fonts & Colors', 'koband' ),
    'priority'    => 27,
    'description' => '<hr>',
) );

/*** Main theme color ***/
$wp_customize->add_setting( 'ko_band_main_theme_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_theme_color', array(
        'label'      => __( 'Main Theme Color', 'koband' ),
        'section'    => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_main_theme_color',
    ) ) 
);


/*** Second theme color ***/
$wp_customize->add_setting( 'ko_band_second_them_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_second_them_color', array(
        'label'      => __( 'Second Theme Color', 'koband' ),
        'section'    => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_second_them_color',
    ) ) 
);

/*** Third theme color ***/
$wp_customize->add_setting( 'ko_band_main_font_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_main_font_color', array(
        'label'      => __( ' Main Font Color', 'koband' ),
        'section'    => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_main_font_color',
    ) ) 
);
$wp_customize->add_setting( 'ko_band_heading_font_color' );
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'ko_band_heading_font_color', array(
        'label'      => __( 'Heading Font color', 'koband' ),
        'section'    => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_heading_font_color',
    ) ) 
);

$wp_customize->add_setting( 'ko_band_main_font_size' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_main_font_size',
    array(
        'label' => esc_html( 'Main Font Size (in px.)', 'koband' ),
        'section' => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_main_font_size',
        'type' => 'number',

    )
   )
);
$wp_customize->add_setting( 'ko_band_main_line_height' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_main_line_height',
    array(
        'label' => esc_html( 'Main Line Height (in px.)', 'koband' ),
        'section' => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_main_line_height',
        'type' => 'number',
        
       
    ))
);
$wp_customize->add_setting( 'ko_band_font_style' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_font_style',
    array(
        'label' => esc_html( 'Font Style', 'koband' ),
        'section' => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_font_style',
        'type' => 'select',
        'choices' => array(
            'normal'  => esc_html__( 'Normal', 'koband' ),
            'italic'  => esc_html__( 'Italic', 'koband' ),
            'oblique' => esc_html__( 'Oblique', 'koband' ),
        )
    )
)
);

$wp_customize->add_setting( 'ko_band_font_weight' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_font_weight',
    array(
        'label' => esc_html( 'Font Weight', 'koband' ),
        'section' => 'ko_band_fonts_and_color_section',
        'settings'   => 'ko_band_font_weight',
        'type' => 'select',
        'choices' => array(
            '100' => esc_html__( 'Thin',       'koband' ),
            '300' => esc_html__( 'Light',      'koband' ),
            '400' => esc_html__( 'Normal',     'koband' ),
            '500' => esc_html__( 'Medium',     'koband' ),
            '700' => esc_html__( 'Bold',       'koband' ),
            '900' => esc_html__( 'Ultra Bold', 'koband' ),
        )
       
    ))
);



/*** Main Font Selector ***/
$wp_customize->add_setting( 'ko_band_general_font_selector' );
$wp_customize->add_control( 'ko_band_general_font_selector', array(

        'type'      => 'select',
        'label'      => __( 'Select main website font:', 'koband' ),
        'section'    => 'ko_band_fonts_and_color_section',
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
        'section'    => 'ko_band_fonts_and_color_section',
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
$wp_customize->add_setting( 'ko_band_soundcloud_social_media' );


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

$wp_customize->add_control( 'ko_band_soundcloud_social_media', array(
    'label' => __( 'SoundCloud:', 'koband' ),
    'settings' => 'ko_band_soundcloud_social_media',
    'section' => 'ko_band_social_media_section',
) );

/*** The band section starts here  ***/
$wp_customize->add_section( 'ko_band_the_band_section' , array(
    'title'       => __( 'The Band', 'koband' ),
    'priority'    => 30,
    'description' => '<hr>',
) );

/**The band Biography**/
$wp_customize->add_setting( 'ko_band_the_band_biography' );
$wp_customize->add_control( 'ko_band_the_band_biography', array(
    'label' => __( 'Biography:', 'koband' ),
    'settings' => 'ko_band_the_band_biography',
    'section' => 'ko_band_the_band_section',
    'type'     => 'textarea',
) );

/**The band Images**/
$wp_customize->add_setting( 'ko_band_the_band_images' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ko_band_the_band_images', array(
    'label' => __( 'The Band Image:', 'koband' ),
    'settings' => 'ko_band_the_band_images',
    'section' => 'ko_band_the_band_section',
)) );

$wp_customize->add_setting( 'ko_band_first_render_moduls' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_first_render_moduls',
    array(

        'label' => esc_html( 'First Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_first_render_moduls',
        'type' => 'select',
        'choices' => array(
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
        )

    ))
);
$wp_customize->add_setting( 'ko_band_second_render_moduls' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_second_render_moduls',
    array(
        'label' => esc_html( 'Second Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_second_render_moduls',
        'type' => 'select',
         'choices' => array(
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
        )
       
    ))
);
$wp_customize->add_setting( 'ko_band_third_render_moduls' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_third_render_moduls',
    array(
        'label' => esc_html( 'Third Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_third_render_moduls',
        'type' => 'select',
       'choices' => array(
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
        )
       
    ))
);
$wp_customize->add_setting( 'ko_band_fourth_render_moduls' );
$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'ko_band_fourth_render_moduls',
    array(
        'label' => esc_html( 'Fourth Module on Home Page', 'koband' ),
        'section' => 'static_front_page',
        'settings'   => 'ko_band_fourth_render_moduls',
        'type' => 'select',
        'choices' => array(
            'Discography' => esc_html__( 'Discography',       'koband' ),
            'Media' => esc_html__( 'Media',      'koband' ),
            'The Band' => esc_html__( 'The Band',       'koband' ),
            'Tour/Events' => esc_html__( 'Tour/Events', 'koband' ),
        )
       
    ))
);


}
add_action( 'customize_register', 'ko_band_theme_customize_register' );

?>
