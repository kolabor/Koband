<?php
/**
 * Koband Theme Options file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */

wp_head(); ?>


<header id="masthead" class="site-header" role="banner">
 <div class="header-main">
  <h1 class="site-title">
   <a href="<?php echo esc_url ( home_url ( '/' ) ); ?>"
   rel="home"><?php bloginfo( 'name' ); ?>
   </a>
  </h1>
  <?php if (is_category(__('Band','koband'))) { ?>
   <!-- overlay a pretty guitar on the logo for the band category -->
   <img id="koband"
    src="<?php bloginfo('template_directory');?>/images/kolabor.png"
    alt="<?php _e('I Love Rock!', 'koband');?> " />
  <?php } ?>
 </div> <!-- Here ends header-main div -->
</header>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="resources/js/script.js"></script>
   <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
         <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
         <link rel="stylesheet" type="text/css" href="resources/css/style.css">
         <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
         <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
         <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,900,300italic' rel='stylesheet' type='text/css'>
 <title><?php _e('Këpurdhat', 'koband');?></title>
</head>
<body>
 <header>

   
<!--<div class="wrap">-->
   <nav>
     <div class="row clearfix menu">
                    <img src="resources/img/logo-font.gif" alt="Koband-logo" class="logo">
      <ul class="main-nav ">
                        <li><a href="#"><?php _e('HOME', 'koband');?></a></li>
                        <li><a href="#"><?php _e('NEWS', 'koband');?></a></li>
                        
                         <li>
                          <a href="#"><?php _e('MUSIC ￬', 'koband');?></a>
         <ul class="dropdown-content">
             <li> <a href="#"><?php _e('ALBUMS', 'koband');?></a></li>
             <li><a href="#"><?php _e('SINGLES', 'koband');?></a></li>
         </ul>
       </li>
       
                        <li><a href="#"><?php _e('TOUR/EVENTS', 'koband');?></a></li>
                        <li><a href="#"><?php _e('THE BAND', 'koband');?></a></li>
                         <li>
                          <a href="#"><?php _e('MEDIA ￬', 'koband');?></a>
         <ul class="dropdown-content">
              <li> <a href="#"><?php _e('PHOTOS', 'koband');?></a></li>
              <li> <a href="#"><?php _e('VIDEOS', 'koband');?></a></li>
          </ul>
       </li>   

                    </ul>
                    <a class="mobile-nav-icon"><i class="ion-navicon-round"></i></a>
                   </div>
    </nav>
         <video autoplay muted loop id="myVideo">
            <source src="resources/Kepurdhat-UneRabaBota.mp4" type="video/mp4">
          </video> 
        


								 <!-- <div id="arrow-left" class="arrow"></div>
								  <div id="slider">
								    <div class="slide slide1">
								    	
								    </div>
								    <div class="slide slide2">
								      <div class="slide-content">
								        
								      </div>
								    </div>
								    <div class="slide slide3">
								      <div class="slide-content">
								        
								      </div>
								    </div>
								  </div>
								  <div id="arrow-right" class="arrow"></div>
								</div>-->
	</header>


         <!-- <div id="arrow-left" class="arrow"></div>
          <div id="slider">
            <div class="slide slide1">
             
            </div>
            <div class="slide slide2">
              <div class="slide-content">
                
              </div>
            </div>
            <div class="slide slide3">
              <div class="slide-content">
                
              </div>
            </div>
          </div>
          <div id="arrow-right" class="arrow"></div>
        </div>-->
 </header>

