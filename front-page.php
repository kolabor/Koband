<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

get_header(); ?>
<!-- Add back to top button -->
<?php
if ( ! isset( $content_width ) ) $content_width = 900;
// Determine if there is "video-slider" or "image-slider"

$silder_type = get_theme_mod('ko_band_home_page_slider_type');
$count_slides = wp_count_posts('slides')->publish;

if ($silder_type == 'Video'){
  get_template_part('custom/templates/video-slider', 'template');
}
elseif ($silder_type == 'Image' && $count_slides > 0) {
  get_template_part( 'custom/templates/slides', 'template' );
}
else { ?>
  <img src="<?php echo get_template_directory_uri(); ?>//img/noslider.jpeg" height="auto" width="100%" />
<?php }


$first_section = get_theme_mod('ko_band_first_render_modules');
$second_section = get_theme_mod('ko_band_second_render_modules');
$third_section = get_theme_mod('ko_band_third_render_modules');
$fourth_section = get_theme_mod('ko_band_fourth_render_modules');
$fifth_section = get_theme_mod('ko_band_fifth_render_modules');

//Declaration of template variables
$count_album = wp_count_posts('album')->publish; 
$count_singles = wp_count_posts('singles')->publish;
$count_discography = "";
if ($count_album > 0 || $count_singles > 0) {
  
  $count_discography = true;
};

//$count_contact = wp_count_posts('')->publish;
$count_news = wp_count_posts('post')->publish;
$count_media = wp_count_posts('media')->publish;
$count_theband = wp_count_posts('theband')->publish;
$count_tour = wp_count_posts('tour')->publish;

// Declartaion of Vraiables ends here

//First Section if statement starts here


  if($first_section == "Discography" && $count_discography == true) 
  { 
    get_template_part( 'custom/templates/discography', 'template' ); 
  }

  elseif ($first_section == "Media" && $count_media > 0) 
  {
    get_template_part( 'custom/templates/media', 'template' );
  }

  elseif ($first_section == "The Band" && $count_theband > 0) 
  {
    get_template_part( 'custom/templates/theband', 'template' );
  }

  elseif ($first_section == "Tour/Events" && $count_tour > 0) {
    get_template_part( 'custom/templates/tour', 'template' );
  }

  elseif ($first_section == "News" && $count_news > 0) {
    get_template_part( 'custom/templates/news', 'template');
  };


//First Section if statement ends here

//Second Section if statemend starts here


  if($second_section == "Discography" && $count_discography == true) 
  {
    get_template_part( 'custom/templates/discography', 'template' );
  }

  elseif ($second_section == "Media" && $count_media > 0) 
  {
    get_template_part( 'custom/templates/media', 'template' );
  }

  elseif ($second_section == "The Band" && $count_theband > 0) 
  {
    get_template_part( 'custom/templates/theband', 'template' );
  }

  elseif ($second_section == "Tour/Events" && $count_tour > 0) 
  {
    get_template_part( 'custom/templates/tour', 'template' );
  }

  elseif ($second_section == "News" && $count_news > 0) {
    get_template_part( 'custom/templates/news', 'template');
  };

/***********************************************************************************/
//Second Section if statemend ends here

//Third Sections if statemend starts here
/***********************************************************************************/

    if($third_section =="Discography" && $count_discography == true)
    {
      get_template_part( 'custom/templates/discography', 'template' );
    }
 
    elseif ($third_section =="Media" && $count_media > 0)
    {
    get_template_part( 'custom/templates/media', 'template' );
    }

    elseif ($third_section =="The Band" && $count_theband > 0)
    {
      get_template_part( 'custom/templates/theband', 'template' );
    }

    elseif ($third_section =="Tour/Events" && $count_tour > 0)
    {
      get_template_part( 'custom/templates/tour', 'template' );
    }

    elseif ($third_section == "News" && $count_news > 0) {
      get_template_part( 'custom/templates/news', 'template');
  };

/***********************************************************************************/
//Third Sections if statemend ends here

//Fourth Sections if statemend starts here
/***********************************************************************************/

    if($fourth_section =="Discography" && $count_discography == true)
    {
      get_template_part( 'custom/templates/discography', 'template' );
    }

    elseif ($fourth_section =="Media" && $count_media > 0)
    {
      get_template_part( 'custom/templates/media', 'template' );
    }
    
    elseif ($fourth_section =="The Band" && $count_theband > 0)
    {
      get_template_part( 'custom/templates/theband', 'template' );
    }

    elseif ($fourth_section =="Tour/Events" && $count_tour > 0)
    {
      get_template_part( 'custom/templates/tour', 'template' );
    }

    elseif ($fourth_section == "News" && $count_news > 0) {
      get_template_part( 'custom/templates/news', 'template');
  };

/***********************************************************************************/
//Fourth Sections if statemend ends here

//Fifth Sections if statemend starts here
/***********************************************************************************/

    if($fifth_section =="Discography" && $count_discography == true)
    {
      get_template_part( 'custom/templates/discography', 'template' );
    }

    elseif ($fifth_section =="Media" && $count_media > 0)
    {
      get_template_part( 'custom/templates/media', 'template' );
    }
    
    elseif ($fifth_section =="The Band" && $count_theband > 0)
    {
      get_template_part( 'custom/templates/theband', 'template' );
    }

    elseif ($fifth_section =="Tour/Events" && $count_tour > 0)
    {
      get_template_part( 'custom/templates/tour', 'template' );
    }

    elseif ($fifth_section == "News" && $count_news > 0) {
      get_template_part( 'custom/templates/news', 'template');
   };

/***********************************************************************************/
//Fifth Sections if statemend ends here


get_footer(); 


?>



