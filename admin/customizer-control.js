
// Function to hide the video fields if image slider is detected on page load

(function( $ ) {
    wp.customize.bind( 'ready', function() {
    
    var customize = this;
      
         customize.control('ko_band_home_page_slider_type', function( control ) {       
         
             var slider_type = control.settings.default._value;
         //alert(slider_type);   
           
              if (slider_type == "Image") 
                {
                  $("#customize-control-ko_band_home_page_slider_videolink").hide();
                  $("#customize-control-ko_band_home_page_slider_title").hide();
                  $("#customize-control-ko_band_home_page_slider_text").hide();
                  $("#customize-control-ko_band_home_page_slider_buttontitle").hide();
                  $("#customize-control-ko_band_home_page_slider_buttonlink").hide();
                };
               if (slider_type == "Video") {
                  $("#customize-control-ko_band_home_page_slider_videolink").show();
                  $("#customize-control-ko_band_home_page_slider_title").show();
                  $("#customize-control-ko_band_home_page_slider_text").show();
                  $("#customize-control-ko_band_home_page_slider_buttontitle").show();
                  $("#customize-control-ko_band_home_page_slider_buttonlink").show();
                };
               
       });
      
});



})( jQuery );

// Function to hide the video fields if image slider is detected inside customizer

jQuery(document).ready(function( $ ){ 


      $(document).on('change',"#_customize-input-ko_band_home_page_slider_type",function (e) {
         var optVal= $("#_customize-input-ko_band_home_page_slider_type option:selected").val();
        // alert(optVal);

          if($(this).val() == 'Image'){ 
            $("#customize-control-ko_band_home_page_slider_videolink").hide();
            $("#customize-control-ko_band_home_page_slider_title").hide();
            $("#customize-control-ko_band_home_page_slider_text").hide();
            $("#customize-control-ko_band_home_page_slider_buttontitle").hide();
            $("#customize-control-ko_band_home_page_slider_buttonlink").hide();
          }
          if($(this).val() == 'Video'){
            $("#customize-control-ko_band_home_page_slider_videolink").show();
            $("#customize-control-ko_band_home_page_slider_title").show();
            $("#customize-control-ko_band_home_page_slider_text").show();
            $("#customize-control-ko_band_home_page_slider_buttontitle").show();
            $("#customize-control-ko_band_home_page_slider_buttonlink").show();
          }
      });


});





