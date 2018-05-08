<?php

/**
 * Koband Theme Options footer file!
 *
 *
 * @package Wordpress 
 * @subpackage Koband
 * @since Koband 1.0
 */


 ///get_footer();
?>
 <!-- footer row starts here -->

<div class="footer-section">
    <div id="footer" class="container"> 
     
        <div class="media-container-row">
            <div class= "col-md-3  ">
                <!--Footer Logo-->
                <div class="footer_logo">
                        <?php $footer_logo = get_theme_mod( 'ko_band_footer_logo' ); ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $footer_logo; ?>" class="footer_logo"></a>
                    </div>
            </div>
            
        </div>    
        <div class="media-container-row">
            <div class="col-md-6 footer_right_side">
                <div class= "footer_search ">
                    <!--Footer search fields-->
                    
                        <?php
                        $footer_search = get_theme_mod('ko_band_footer_search');
                        if($footer_search == '1') { 
                         echo get_search_form(); }?>
                    
                </div>
                    <!--Footer Widgets Menu-->
                    <div class="footer-menu">
                        <?php if ( is_active_sidebar( 'ko_band_first_footer_widgets' ) ) : ?>
                            <?php dynamic_sidebar( 'ko_band_first_footer_widgets' ); ?><!-- #first .widget-area -->
                        <?php endif; ?>
                </div>

                <?php
                  //Social Network start here
                  $facebook = get_theme_mod( 'ko_band_facebook_social_media' , false);
                  $twitter = get_theme_mod( 'ko_band_twitter_social_media' , false);
                  $instagram = get_theme_mod( 'ko_band_insagram_social_media' , false);
                  $googleplus= get_theme_mod( 'ko_band_googleplus_social_media' , false);
                  $youtube= get_theme_mod( 'ko_band_youtube_social_media' , false);
                  $spotify= get_theme_mod( 'ko_band_spotify_social_media' , false);
                  $soundcloud= get_theme_mod( 'ko_band_soundcloud_social_media' , false);
                  $bandcamp= get_theme_mod( 'ko_band_bandcamp_social_media', false );
                  $apple= get_theme_mod( 'ko_band_apple_social_media', false);
                ?>
            <div class="social-media"> 
                <!--Footer social Media-->
                <div class="social-list align-right">
                    <div class="social-icons "><?php if(isset($facebook[0])) { echo "<a href='$facebook'><i class='fab fa-facebook-f first_color'></i></a>";} ?> 
                    </div>
                    <div class="social-icons "><?php if(isset($twitter[0])) { echo  "<a href='$twitter'> <i class='fab fa-twitter first_color ' ></i></a>";} ?>
                    </div>
                    <div class="social-icons "><?php if(isset($instagram[0])) { echo  "<a href='$instagram'><i class='fab fa-instagram first_color '></i></a>";} ?>
                    </div>
                    <div class="social-icons "><?php if(isset($youtube[0])) { echo  "<a href='$youtube'><i class='fab fa-youtube first_color '></i></a>";} ?>
                    </div>
                    <div class="social-icons "><?php if(isset($spotify[0])) { echo  "<a href='$spotify'><i class='fab fa-spotify first_color '></i></a>";} ?>
                    </div>
                    <div class="social-icons "><?php if(isset($soundcloud[0])) { echo  "<a href='$soundcloud'><i class='fab fa-soundcloud first_color '></i></a>";} ?>
                    </div>
                    <div class="social-icons "> <?php if(isset($bandcamp[0])) { echo  "<a href='$bandcamp'><i class='fab fa-bandcamp first_color'></i></a>";} ?>
                    </div>      
                    <div class="social-icons "> <?php if(isset($apple[0])) { echo  "<a href='$apple'><i class='fab fa-apple first_color '></i></a>";} ?>
                    </div>
                </div>
            </div>

            </div>          
            <div class="col-md-6 footer_left_side">
            <?php if ( is_active_sidebar( 'ko_band_second_footer_widgets' ) ) : ?>
                <?php dynamic_sidebar( 'ko_band_second_footer_widgets' ); ?> <!-- #second .widget-area-->
            <?php endif; ?>
               </div> 
        </div><!--media-container-row -->
    <div class="footer-lower">
        <div class="media-container-row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="media-container-row mbr-white">
            <!--Footer copyright-->
                <div class="col-md-6 copyright">
                <?php 
                    $Koband_Copyright = get_theme_mod( 'ko_band_footer_copyright' ); ?>
                <?php echo $Koband_Copyright; ?>
                    <!--<a href="http://www.kolabor.net">Copyright © 2018 | Kolabor.net </a>--> <!--Copyright-->
            </div>
                
        </div>

 <!-- Social Network ends here-->
      </div>
  </div>
</div>

<?php wp_footer() ?>
<!-- footer row ends here -->
</body>
</html>