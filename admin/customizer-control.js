(function( $ ) {
    wp.customize.bind( 'ready', function() {
    
    var customize = this;
      
         customize.control('ko_band_home_page_slider_type', function( control ) {       
             
             var slider_type = control.settings.default._value;
           
              control.setting.bind(function (value)
               {
                switch (value) {
                   case 'Image':
                     customize.control('ko_band_home_page_slider_videolink').deactivate();
                     customize.control('ko_band_home_page_slider_title').deactivate();
                     customize.control('ko_band_home_page_slider_text').deactivate();
                     customize.control('ko_band_home_page_slider_buttontitle').deactivate();
                     customize.control('ko_band_home_page_slider_buttonlink').deactivate();
                
                     break;
                   case 'Video':
                     customize.control('ko_band_home_page_slider_videolink').activate();
                     customize.control('ko_band_home_page_slider_title').activate();
                     customize.control('ko_band_home_page_slider_text').activate();
                     customize.control('ko_band_home_page_slider_buttontitle').activate();
                     customize.control('ko_band_home_page_slider_buttonlink').activate();
                     break;
                   }
               });
               
       });
      
});



})( jQuery );
/*jQuery(window).on('pageshow',function($){ //code here });



    
   
   wp.customize.control('ko_band_home_page_slider_type', function( control ) 
   {       


             
             var slider_type = control.settings.default._value;


             if(slider_type == "Image")
             {      

                     wp.customize.control('ko_band_home_page_slider_videolink').deactivate();
                     wp.customize.control('ko_band_home_page_slider_title').deactivate();
                     wp.customize.control('ko_band_home_page_slider_text').deactivate();
                     wp.customize.control('ko_band_home_page_slider_buttontitle').deactivate();
                     wp.customize.control('ko_band_home_page_slider_buttonlink').deactivate();
                    
             }
             else if(slider_type == "Video")
             {
                     wp.customize.control('ko_band_home_page_slider_videolink').activate();
                     wp.customize.control('ko_band_home_page_slider_title').activate();
                     wp.customize.control('ko_band_home_page_slider_text').activate();
                     wp.customize.control('ko_band_home_page_slider_buttontitle').activate();
                     wp.customize.control('ko_band_home_page_slider_buttonlink').activate();
             }
   });

  });*/





