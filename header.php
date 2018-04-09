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

<body>   

  <!-- <nav>
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
    </nav>-->         
          <nav>
              <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
          </ul>

          </nav>