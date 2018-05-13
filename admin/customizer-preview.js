( function( $ ) {

   api = wp.customize;


    // Update theme first color
	api( 'ko_band_first_theme_color', function( value ) {
		value.bind( function( newThemeFirstColor ) {
		
			$('.first_color').css( 'color', newThemeFirstColor , 'important');
			$('.bg_first_color').css('background-color', newThemeFirstColor, 'important');
			$('.read_more a').css('color', newThemeFirstColor, 'important');			
		} );
	} );
   

    // Update theme font first color
	api( 'ko_band_main_font_color', function( value ) {
		value.bind( function( newThemeFontColor ) {
		
			$('.main_font_color').css( 'color', newThemeFontColor, 'important');
			
		} );
	} );

	// Update Theme logo
	api( 'ko_band_main_logo', function( value ) {
		value.bind( function( themeNewLogo ) {
		
			$(".main-logo a img").attr("src",themeNewLogo);
			
		} );
	} );

/*SLIDER Live changes start here */

    //Update slider text color
	api( 'ko_band_slider_text_color', function( value ) {
		value.bind( function( newSliderTextColor ) {
		
			$('.slider_text_color').css( 'color', newSliderTextColor, 'important');
			
		} );
	} );
    
    /*Update slider button text color*/
	api( 'ko_band_slider_button_text_color', function( value ) {
		value.bind( function( newSliderButtonTextColor ) {
		
			$('.slider_button_text_color').css( 'color', newSliderButtonTextColor, 'important');
			
		} );
	} );

	/*Update slider button bg color*/
	api( 'ko_band_slider_button_background_color', function( value ) {
		value.bind( function( newSliderButtonBgColor ) {
		
			$('.slider_button_text_color').css('background-color', newSliderButtonBgColor, 'important');
			
		} );
	} );

	/*Update slider button hover bg color*/
	api( 'ko_band_slider_button_hover_background_color', function( value ) {
		value.bind( function( newSliderHoverButtonBgColor ) {
		
			$('.slider_button_text_color:hover').css('background-color', newSliderHoverButtonBgColor, 'important');
			
		} );
	} );

   /*Update slider text holder box*/
	api( 'ko_band_slider_text_holder_background_color', function( value ) {
		value.bind( function( newtextHolderBgColor ) {
		   
			$('.sl-content').css('background-color', newtextHolderBgColor, 'important');
			
		} );
	} );
  
  /*Show hider slider text holder box*/
	api( 'ko_band_home_page_box_background', function( value ) {
		value.bind( function( newBgHolderMode ) {
		    
		    if(newBgHolderMode == false)
		    {   
               $('.sl-content').css('background-color', 'rgba(255,255,255, 0)', 'important');
		    }
		    else if (newBgHolderMode == true) 
		    {
		    	$('.sl-content').css('background-color', 'rgba(0,0,0, 0.4)', 'important');
		    }
			
			
		} );
	} );
/*SLIDER Live changes ends here */


} )( jQuery );