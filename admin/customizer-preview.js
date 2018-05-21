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
			//$('.read_more a:hover ').css('color', newThemeFirstColor, 'important');	
			//$('.read_more:hover').css(' background-color', '#fff', 'important');	
			
			$('.border_first_color').css('border-bottom-color', newThemeFirstColor, 'important');	
			$('.submit').css('background-color', newThemeFirstColor, 'important');	
			$('.submit:hover').css('color', newThemeFirstColor, 'important');	
			$('.reply a, .submit').css('color', newThemeFirstColor, 'important');	
			$('.hovereffect:hover .overlay').css('background-color', newThemeFirstColor, 'important');
			$('.hovereffect:hover .overlay').css('opacity', '0.5', 'important');	
			$('.main-nav .menu li a:hover').css('border-bottom', newThemeFirstColor, 'important');
			//$('.border_color').css('border-color', newThemeFirstColor, 'important');	
			//$('.btn-koband-load:hover').css('color', '#fff', 'important');		
			//$('.btn-koband-load:hover').css('background-color', newThemeFirstColor, 'important');	
			//$('.venue_name:hover').css('color', newThemeFirstColor, 'important');		
			//$('.venue_name:hover').css('text-decoration', 'none', 'important');				
			//$('.news-details_li a').css('color', newThemeFirstColor, 'important');		
			//$('.news-details_li a').css('text-decoration', 'none', 'important');					
			$('#contact .wpcf7').css(' border', newThemeFirstColor, 'important');	

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
			//$('.reply a:hover').css('color', newThemeSecondColor, 'important');
			//$('.news-details_li a:hover').css('color', newThemeSecondColor, 'important'); 
			//$('.news-details_li a:hover').css('text-decoration', 'none', 'important'); 
			//$('.soldout_btn:hover').css('background-color', newThemeSecondColor, 'important'); 
			//$('.soldout_btn:hover').css('color', '#ffffff', 'important'); 
		} );
	} );
   

    // Update theme main font color
	api( 'ko_band_main_font_color', function( value ) {
		value.bind( function( newThemeMainFontColor ) {
		
			$('.main_font_color').css( 'color', newThemeMainFontColor, 'important');
			$('.home').css( 'color', newThemeMainFontColor, 'important'); //if have any problem take it out
			$('.single').css( 'color', newThemeMainFontColor, 'important');//if have any problem take it out
			$('.page').css( 'color', newThemeMainFontColor, 'important');//if have any problem take it out
			$('.default').css( 'color', newThemeMainFontColor, 'important');
			$('.home h1').css( 'color', newThemeMainFontColor, 'important');
			$('.home h2 ').css( 'color', newThemeMainFontColor, 'important');
			$('.home h3').css( 'color', newThemeMainFontColor, 'important');
			$('.home h4').css( 'color', newThemeMainFontColor, 'important');
			$('.single h1').css( 'color', newThemeMainFontColor, 'important');
			$('.single h2').css( 'color', newThemeMainFontColor, 'important');
			$('.single h3').css( 'color', newThemeMainFontColor, 'important');
			$('.single h4').css( 'color', newThemeMainFontColor, 'important');
			$('.page h1').css( 'color', newThemeMainFontColor, 'important');
			$('.page h2').css( 'color', newThemeMainFontColor, 'important');
			$('.page h3').css( 'color', newThemeMainFontColor, 'important');
			$('.page h4').css( 'color', newThemeMainFontColor, 'important');
			//$('.comments-area, .sidebar').css( 'color', newThemeMainFontColor, 'important');
			//$('.read_more a').css( 'color', newThemeMainFontColor, 'important');


			
		} );
	} );

	 // Update theme main menu font Color
	api( 'ko_band_main_menu_font_color', function( value ) {
		value.bind( function( newThemeMenuFontColor ) {
		
			$('.main-nav .menu li a').css( 'color', newThemeMenuFontColor, 'important');
			$('.main-nav .menu li a:hover ').css( 'color', newThemeMenuFontColor, 'important');
			$('.main-nav .menu li a:hover ').css( 'opacity', '0.4', 'important');
						
		} );
	} );

	 // Update theme main menu font size
	api( 'ko_band_main_menu_font_size', function( value ) {
		value.bind( function( newThemeMenuFontSize ) {
		
			$('.main-nav .menu li a').css( 'font-size', newThemeMenuFontSize, 'important');
						
		} );
	} );

	 // Update theme main menu bg color
	api( 'ko_band_main_menu_background_color', function( value ) {
		value.bind( function( newThemeMenuBGColor ) {
		
			$('.menu-scroll').css( 'background-color', 'rgba(255,255,255, 0.7)', 'important');
			$('.fixed').css( 'background-color', newThemeMenuBGColor, 'important');
			$('.menu-noscroll').css( 'background-color', newThemeMenuBGColor, 'important');
						
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
			$('.home h2').css( 'font-size', newThemeFontSize, 'important');
			$('.home h3').css( 'font-size', newThemeFontSize, 'important');
			$('.home h4').css( 'font-size', newThemeFontSize, 'important');
			$('.single h1').css( 'font-size', newThemeFontSize, 'important');
			$('.single h2').css( 'font-size', newThemeFontSize, 'important');
			$('.single h3').css( 'font-size', newThemeFontSize, 'important');
			$('.single h4').css( 'font-size', newThemeFontSize, 'important');
			$('.page h1').css( 'font-size', newThemeFontSize, 'important');
			$('.page h2').css( 'font-size', newThemeFontSize, 'important');
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
		value.bind( function( newThemeGeneralFont ) {
		
			$('.main_font_color').css( 'font-family', newThemeGeneralFont, 'important'); 
			$('.comments-area, .sidebar').css( 'font-family', newThemeGeneralFont, 'important'); 
			$('.main-nav .menu li a').css( 'font-family', newThemeGeneralFont, 'important'); 
			$('.footer-menu .menu li a').css( 'font-family', newThemeGeneralFont, 'important'); 
			$('.search-submit').css( 'font-family', newThemeGeneralFont, 'important'); 
										
		} );
	} );


	 // Update theme heading font selector
	api( 'ko_band_heading_font_selector', function( value ) {
		value.bind( function( newThemeHeadingFont ) {
		
			$('.first_color').css( 'font-family', newThemeHeadingFont, 'important'); 
			$('.heading_font').css( 'font-family', newThemeHeadingFont, 'important'); 
			$('.home h1').css( 'font-family', newThemeHeadingFont, 'important');
			$('.home h2').css( 'font-family', newThemeHeadingFont, 'important');
			$('.home h3').css( 'font-family', newThemeHeadingFont, 'important');
			$('.home h4').css( 'font-family', newThemeHeadingFont, 'important');
			$('.single h1').css( 'font-family', newThemeHeadingFont, 'important');
			$('.single h2').css( 'font-family', newThemeHeadingFont, 'important');
			$('.single h3').css( 'font-family', newThemeHeadingFont, 'important');
			$('.single h4').css( 'font-family', newThemeHeadingFont, 'important');
			$('.page h1').css( 'font-family', newThemeHeadingFont, 'important');
			$('.page h2').css( 'font-family', newThemeHeadingFont, 'important');
			$('.page h3').css( 'font-family', newThemeHeadingFont, 'important');
			$('.page h4').css( 'font-family', newThemeHeadingFont, 'important');

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
			//$('.slider_button_text_color:hover').css('border-color', newSliderButtonBgColor, 'important');
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

/*Show theband section bg image*/
	api( 'ko_band_theband_sectin_background_image', function( value ) {
		value.bind( function( newThebandSectionBGImage ) {

			$('#theband').css('background-image', newThebandSectionBGImage, 'important');
			$('#theband').css('linear-gradient', 'rgba(0, 0, 0, 0.5)', 'important');
			$('#theband').css('background-repeat', 'no-repeat', 'important');
			$('#theband').css('background-size', 'cover', 'important');
			$('#theband').css('background-position', 'center', 'important');
					
		} );
	} );

/*Update Beckground News section color*/
	api( 'ko_band_background_news_section_color', function( value ) {
		value.bind( function( newBGNewsSectionColor) {

			$('#News').css('background-color', newBGNewsSectionColor, 'important');
								
		} );
	} );

/*Update Beckground Tour section color*/
	api( 'ko_band_background_tour_section_color', function( value ) {
		value.bind( function( newBGTourSectionColor) {

			$('#Tour').css('background-color', newBGTourSectionColor, 'important');
								
		} );
	} );

/*Update Beckground Discography section color*/
	api( 'ko_band_background_discography_section_color', function( value ) {
		value.bind( function( newBGDiscographySectionColor) {

			$('#Discography').css('background-color', newBGDiscographySectionColor, 'important');
								
		} );
	} );

/*Update Beckground Gallery section color*/
	api( 'ko_band_background_gallery_section_color', function( value ) {
		value.bind( function( newBGMediaSectionColor) {

			$('#Media').css('background-color', newBGMediaSectionColor, 'important');
								
		} );
	} );

/*Update Beckground Footer section color*/
	api( 'ko_band_footer_section_background_color', function( value ) {
		value.bind( function( newBGFooterSectionColor) {

			$('.footer-section').css('background-color', newBGFooterSectionColor, 'important');
								
		} );
	} );

	/*Update Footer Menu font color*/
	api( 'ko_band_footer_menu_font_color', function( value ) {
		value.bind( function( newFooterMenuFontColor) {

			$('.footer-menu .menu li a').css('color', newFooterMenuFontColor, 'important');
								
		} );
	} );

	/*Update Footer Menu font size*/
	api( 'ko_band_footer_menu_font_size', function( value ) {
		value.bind( function( newFooterMenuFontSize) {

			$('.footer-menu .menu li a').css('font-size', newFooterMenuFontSize, 'important');
								
		} );
	} );

/*SLIDER Live changes ends here */


} )( jQuery );