( function( $ ) {

   api = wp.customize;


    // Update theme first color
	api( 'ko_band_first_theme_color', function( value ) {
		value.bind( function( newThemeFirstColor ) {

			$('a').css('color', newThemeFirstColor, 'important');
			$('.first_color').css( 'color', newThemeFirstColor , 'important');
			$('.first_color a ').css('color', newThemeFirstColor, 'important');	
			$('.read_more a').css('color', newThemeFirstColor, 'important');	
			$('.read_more:hover a').css('color', newThemeFirstColor, 'important');	
			$('.bg_first_color').css('background-color', newThemeFirstColor, 'important');
			$('.bg_first_color:hover').css('color', newThemeFirstColor, 'important');	
			$('.border_first_color').css('border-bottom-color', newThemeFirstColor, 'important');	
			$('.submit').css('background-color', newThemeFirstColor, 'important');	
			$('.submit:hover').css('color', newThemeFirstColor, 'important');	
			$('.reply a,).css('color', newThemeFirstColor, 'important');	
			$('.submit').css('color', newThemeFirstColor, 'important');	
			$('.hovereffect:hover .overlay').css('background-color', newThemeFirstColor, 'important');
			$('.hovereffect:hover .overlay').css('opacity', '0.5', 'important')	
			$('.main-nav .menu li a:hover').css('background-color', newThemeFirstColor, 'important');	
			$('#contact .wpcf7').css('border-bottom', newThemeFirstColor, 'important');	

		} );
	} ); 

	 // Update theme second color
	api( 'ko_band_second_theme_color', function( value ) {
		value.bind( function( newThemeSecondColor ) {

			$('.social-icons a .first_color:hover').css('color', newThemeSecondColor, 'important');
			$('.bg_first_color:hover').css( 'background-color', newThemeSecondColor , 'important');
			$('.border_second_color').css('border-bottom-color', newThemeSecondColor, 'important');	
			$('.bg_second_color').css('background-color', newThemeSecondColor, 'important');	
			$('.read_more:hover').css('background-color', newThemeSecondColor, 'important');	
			$('.submit').css('color', newThemeSecondColor, 'important');
			$('.submit:hover').css('background-color', newThemeSecondColor, 'important');	
			$('.border_bottom').css('border-bottom-color', newThemeSecondColor, 'important');	
		
		} );
	} );
   

    // Update theme main font color
	api( 'ko_band_main_font_color', function( value ) {
		value.bind( function( newThemeFontColor ) {
		
			$('.main_font_color').css( 'color', newThemeFontColor, 'important');
			$('.home').css( 'color', newThemeFontColor, 'important'); //if have any problem take it out
			$('.single').css( 'color', newThemeFontColor, 'important');//if have any problem take it out
			$('.page').css( 'color', newThemeFontColor, 'important');//if have any problem take it out
			$('.default').css( 'color', newThemeFontColor, 'important');
			$('.home h1').css( 'color', newThemeFontColor, 'important');
			$('.home h2 ').css( 'color', newThemeFontColor, 'important');
			$('.home h3').css( 'color', newThemeFontColor, 'important');
			$('.home h4, ').css( 'color', newThemeFontColor, 'important');
			$('.single h1').css( 'color', newThemeFontColor, 'important');
			$('.single h2 ').css( 'color', newThemeFontColor, 'important');
			$('.single h3').css( 'color', newThemeFontColor, 'important');
			$('.single h4').css( 'color', newThemeFontColor, 'important');
			$('.page h1').css( 'color', newThemeFontColor, 'important');
			$('.page h2 ').css( 'color', newThemeFontColor, 'important');
			$('.page h3').css( 'color', newThemeFontColor, 'important');
			$('.page h4').css( 'color', newThemeFontColor, 'important');
			
			
		} );
	} );

	 // Update theme main menu font size
	api( 'ko_band_main_menu_font_size', function( value ) {
		value.bind( function( newThemeMenuFontSize ) {
		
			$('.main-nav .menu li a ').css( 'font-size', newThemeMenuFontSize, 'important');
						
		} );
	} );

	 // Update theme main menu bg color
	api( 'ko_band_main_menu_background_color', function( value ) {
		value.bind( function( newThemeMenuBGColor ) {
		
			$('.menu-scroll').css( ' background-color', 'rgba(255,255,255, 0.7)', 'important');
			$('.fixed').css( ' background-color', newThemeMenuBGColor, 'important');
			$('.menu-noscroll').css( ' background-color', newThemeMenuBGColor, 'important');
						
		} );
	} );

	 // Update theme font size
	api( 'ko_band_theme_font_size', function( value ) {
		value.bind( function( newThemeFontSize ) {
		
			$('.home').css( 'font-size', newThemeFontSize, 'important'); //if have any problem take it out
			$('.single').css( 'font-size', newThemeFontSize, 'important');//if have any problem take it out
			$('.page').css( 'font-size', newThemeFontSize, 'important');//if have any problem take it out
			$('.default').css( 'font-size', newThemeFontSize, 'important');
			$('.home h1').css( 'font-size', newThemeFontSize, 'important');
			$('.home h2 ').css( 'font-size', newThemeFontSize, 'important');
			$('.home h3').css( 'font-size', newThemeFontSize, 'important');
			$('.home h4, ').css( 'font-size', newThemeFontSize, 'important');
			$('.single h1').css( 'font-size', newThemeFontSize, 'important');
			$('.single h2 ').css( 'font-size', newThemeFontSize, 'important');
			$('.single h3').css( 'font-size', newThemeFontSize, 'important');
			$('.single h4').css( 'font-size', newThemeFontSize, 'important');
			$('.page h1').css( 'font-size', newThemeFontSize, 'important');
			$('.page h2 ').css( 'font-size', newThemeFontSize, 'important');
			$('.page h3').css( 'font-size', newThemeFontSize, 'important');
			$('.page h4').css( 'font-size', newThemeFontSize, 'important');
			$('.font-line_height').css( 'font-size', newThemeFontSize, 'important');
						
		} );
	} );


	 // Update theme line height
	api( 'ko_band_theme_line_height', function( value ) {
		value.bind( function( newThemeLineHeight ) {
		
			$('.home').css( 'line-height', newThemeLineHeight, 'important'); 
			$('.single').css( 'line-height', newThemeLineHeight, 'important');
			$('.page').css( 'line-height', newThemeLineHeight, 'important');
			$('.default').css( 'line-height', newThemeLineHeight, 'important');
			$('.font-line_height').css( 'line-height', newThemeLineHeight, 'important');
								
		} );
	} );


	 // Update theme general font selector
	api( 'ko_band_general_font_selector', function( value ) {
		value.bind( function( newThemeGeneralFontSelector ) {
		
			$('.main_font_color').css( 'font-family', newThemeGeneralFontSelector, 'important'); 
										
		} );
	} );

	// Update Theme logo
	api( 'ko_band_main_logo', function( value ) {
		value.bind( function( themeNewLogo ) {
		
			$(".main-logo a img").attr("src",themeNewLogo);
			
		} );
	} );

		// Update Theme retina logo
	api( 'ko_band_retina_main_logo', function( value ) {
		value.bind( function( themeNewRetinaLogo ) {
		
			$(".retina-main-logo a img").attr("src",themeNewRetinaLogo);
			
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
			$('.sl-content').css('opacity', '0.4', 'important');
			
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