<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Catch Themes
 * @subpackage Kolabor Band
 * @since Kolabor Band 0.3
 */

get_header();
?>




     <?php
      /* Include the Post-Format-specific template for the content.
       * If you want to override this in a child theme then include a file
       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
       */
      get_template_part( 'content', get_post_format() );


      $first_section = get_theme_mod('ko_band_first_render_moduls');    

      $second_section = get_theme_mod('ko_band_second_render_moduls');

      $third_section = get_theme_mod('ko_band_third_render_moduls');

      $fourth_section = get_theme_mod('ko_band_fourth_render_moduls');

      //Declaration of template variables

      $count_album = wp_count_posts('Album')->publish;

      $count_singles = wp_count_posts('Singles')->publish;

       if (($count_album >0) || ($count_singles >0)) {
        
        $count_discography = true;
       };

      $count_media = wp_count_posts('Media')->publish;

      $count_theband = wp_count_posts('The Band')->publish;

      $count_tour = wp_count_posts('Tour')->publish;

      // Declartaion of Vraiables ends here

      //First Section if statement starts here

      if($first_section == "Discography" && ($count_discography = true)) {
       get_template_directory_uri() . '/custom/templates/ko_discography_template.php';
      }

      elseif ($first_section == "Media" && ($count_media > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_media_template.php';
      }

      elseif ($first_section == "The Band" && ($count_theband > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_theband_template.php';
      }

      elseif ($first_section == "Tour" && ($count_tour > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_tour_template.php';
      };

      //First Section if statemend ends here

      //Second Section if statemend starts here

      if($second_section == "Discography" && ($count_discography = true)) {
       get_template_directory_uri() . '/custom/templates/ko_discography_template.php';
      }

      elseif ($second_section == "Media" && ($count_media > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_media_template.php';
      }

      elseif ($second_section == "The Band" && ($count_theband > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_theband_template.php';
      }

      elseif ($second_section == "Tour" && ($count_tour > 0)) {
       get_template_directory_uri() . '/custom/templates/ko_tour_template.php';
      };

      //Second Section if statemend ends here

      //Third Sections if statemend starts here


            if($third_section =="Discography" && $count_discography = true){
             get_template_directory_uri() .'/custom/templates/ko_discography_template.php';
           }
         
           elseif ($third_section =="Media" && $count_media >0){
       get_template_directory_uri() .'/custom/templates/ko_media_template.php';
           }

           elseif ($third_section =="The Band" && $count_theband >0){
             get_template_directory_uri() .'/custom/templates/ko_theband_template.php';
           }

           elseif ($third_section =="Tour" && $count_tour >0){
             get_template_directory_uri() .'/custom/templates/ko_tour_template.php';
           };

           //Third Sections if statemend ends here

           //Fourth Sections if statemend starts here

           if($fourth_section =="Discography" && $count_discography = true){
             get_template_directory_uri() .'/custom/templates/ko_discography_template.php';
         }

         elseif ($fourth_section =="Media" && $count_media >0){
             get_template_directory_uri() .'/custom/templates/ko_media_template.php';
         }
         
         elseif ($fourth_section =="The Band" && $count_theband >0){
             get_template_directory_uri() .'/custom/templates/ko_theband_template.php';
         }

         elseif ($fourth_section =="Tour" && $count_tour >0){
             get_template_directory_uri() .'/custom/templates/ko_tour_template.php';
         };

         //Fourth Sections if statemend ends here

     ?>


<?php
get_sidebar();
get_footer(); ?>