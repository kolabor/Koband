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
<div id="footer" class="container">
 	<div class="row">
                 	    <div class="row">
                   	    	<div class= "footer_logo">
                   	  			<?php $footer_logo = get_theme_mod( 'ko_band_footer_logo' ); ?>
                                  	<img src="<?php echo $footer_logo; ?>" class="footer_logo">
                          			
                              </div>
                   		</div>
                      <div class="row">
                     	    <div class="col-sm-3 side-widgets_one">
                                <?php if ( is_active_sidebar( 'widgets_one' ) ) : ?>
                                   <?php dynamic_sidebar( 'widgets_one' ); ?><!-- #first .widget-area -->
                                <?php endif; ?>
                     	 	  </div>
                      </div>
                      
                  		<div class="col-sm-3 side-widgets_two">
                   	  		<?php if ( is_active_sidebar( 'widgets_two' ) ) : ?>
                                	<?php dynamic_sidebar( 'widgets_two' ); ?> <!-- #second .widget-area -->
                              <?php endif; ?>
                   		</div>

                 	   <!-- <div class="col-sm-3 side-widgets_three">
                 	  		<?php if ( is_active_sidebar( 'widgets_three' ) ) : ?>
                       			<?php dynamic_sidebar( 'widgets_three' ); ?>  #third .widget-area 
                            <?php endif; ?> 
                 	 	</div>-->
                   
                   <div class="row">
                       	
                       		<div class="col-sm-4 copyright">
                       			<a href="http://www.kolabor.net">Copyright © 2018 | Kolabor.net </a> <!--Copyright-->
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
                                $deezer= get_theme_mod( 'ko_band_deezer_social_media', false);
                                $apple= get_theme_mod( 'ko_band_apple_social_media', false);
                                ?>


                              <div class="col-sm-8 social-media">  
                                
                                  <div class="facebook-ikon"><?php if(isset($facebook[0])) { echo "<a href='$facebook'><i class='fab fa-facebook'></i></a>";} ?> 
                                  </div>
                                  <div class="twitter-ikon"><?php if(isset($twitter[0])) { echo  "<a href='$twitter'> <i class='fab fa-twitter' ></i></a>";} ?>
                                  </div>
                                  <div class="instagram-ikon"><?php if(isset($instagram[0])) { echo  "<a href='$instagram'><i class='fab fa-instagram'></i></a>";} ?>
                                  </div>
                                  <div class="googleplus-ikon"><?php if(isset($googleplus[0])) { echo  "<a href='$googleplus'><i class='fab fa-google-plus'></i></a>";} ?>
                                  </div>
                                  <div class="youtube-ikon"><?php if(isset($youtube[0])) { echo  "<a href='$youtube'><i class='fab fa-youtube'></i></a>";} ?>
                                  </div>
                                  <div class="spotify-ikon"><?php if(isset($spotify[0])) { echo  "<a href='$spotify'><i class='fab fa-spotify'></i></a>";} ?>
                                  </div>
                                  <div class="soundcloud-ikon"><?php if(isset($soundcloud[0])) { echo  "<a href='$soundcloud'><i class='fab fa-soundcloud'></i></a>";} ?>
                                  </div>
                                  <div class="bandcamp-ikon"> <?php if(isset($bandcamp[0])) { echo  "<a href='$bandcamp'><i class='fab fa-bandcamp'></i></a>";} ?>
                                  </div>
                                  <div class="deezer-ikon"><?php if(isset($deezer[0])) { echo   "<a href='$deezer'><i class='fab fa-deezer'></i></a>";} ?>
                                  </div>       
                                  <div class="apple-ikon"> <?php if(isset($apple[0])) { echo  "<a href='$apple'><i class='fab fa-apple'></i></a>";} ?>
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




      