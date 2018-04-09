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

get_header(); 

$count_slides = wp_count_posts('slides')->publish;

if("Slides" && $count_slides > 0) {
get_template_part( 'custom/templates/slides', 'template' );}
else { echo "<p>Error: You must fill up the Custom Post Type 'Slides', at this section there must be slider</p>"; };

$count_news = wp_count_posts('post')->publish;

if("posts" && $count_news > 0) {
	get_template_part('custom/templates/news', 'template');}
else {
	get_template_part('custom/templates/media', 'template');
}

$first_section = get_theme_mod('ko_band_first_render_moduls');
$second_section = get_theme_mod('ko_band_second_render_moduls');
$third_section = get_theme_mod('ko_band_third_render_moduls');
$fourth_section = get_theme_mod('ko_band_fourth_render_moduls');

//Declaration of template variables
$count_album = wp_count_posts('album')->publish; 
$count_singles = wp_count_posts('singles')->publish;
$count_discography = "";
if ($count_album > 0 || $count_singles > 0) {
	
	$count_discography = true;
};

$count_media = wp_count_posts('media')->publish;
$count_theband = wp_count_posts('theband')->publish;
$count_tour = wp_count_posts('tour')->publish;
// Declartaion of Vraiables ends here

//First Section if statement starts here
/********************************************************************************/
echo "<p>****************************Section 1**********************</p>";
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
	};

echo "<p>**********************************************************</p>";

/***********************************************************************************/
//First Section if statement ends here

//Second Section if statemend starts here
/***********************************************************************************/
echo "<p>****************************Section 2**********************</p>";

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
	};
echo "<p>**********************************************************</p>";
/***********************************************************************************/
//Second Section if statemend ends here

//Third Sections if statemend starts here
/***********************************************************************************/

echo "<p>****************************Section 3**********************</p>";
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
  	};
echo "<p>**********************************************************</p>";
/***********************************************************************************/
//Third Sections if statemend ends here

//Fourth Sections if statemend starts here
/***********************************************************************************/
echo "<p>****************************Section 4**********************</p>";
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
    };
echo "<p>**********************************************************</p>";
/***********************************************************************************/
//Fourth Sections if statemend ends here


get_footer(); 

?>

