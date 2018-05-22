	( function( $ ) {

   api = wp.customize;


    // Update theme first color
	api( 'ko_band_first_theme_color', function( value ) {
		value.bind( function( newThemeFirstColor ) {
			$('.first_color').css('color', newThemeFirstColor, 'important');
			$('.border_color').css('color', newThemeFirstColor, 'important');
			$('.news-details_li a').css('color', newThemeFirstColor, 'important');
			$('.reply a').css('color', newThemeFirstColor, 'important');
			$('.logged-in-as a').css('color', newThemeFirstColor, 'important');
			$('.news-title h2 a').css('color', newThemeFirstColor, 'important');
			$('.submit').css('background-color', newThemeFirstColor, 'important');
			$('.bg_first_color').css('background-color', newThemeFirstColor, 'important');
			$('#contact .wpcf7').css('border-color', newThemeFirstColor, 'important');				
			$('.border_first_color').css('border-color', newThemeFirstColor, 'important');				

		} );
	} ); 

    // Update theme main font color
	api( 'ko_band_main_font_color', function( value ) {
		value.bind( function( newThemeMainFontColor ) {
		
			$('.main_font_color').css( 'color', newThemeMainFontColor, 'important');
			//$('.main_font').css( 'color', newThemeMainFontColor, 'important');
			$('.comment-list p').css( 'color', newThemeMainFontColor, 'important');
			$('.read_more a').css( 'color', newThemeMainFontColor, 'important');
			$('.copyright').css( 'color', newThemeMainFontColor, 'important');
		} );
	} );

	 // Update theme main menu font Color
	api( 'ko_band_main_menu_font_color', function( value ) {
		value.bind( function( newThemeMenuFontColor ) {
		
			$('.main-nav li a').css( 'color', newThemeMenuFontColor, 'important');
						
		} );
	} );

	 // Update theme main menu font size
	api( 'ko_band_main_menu_font_size', function( value ) {
		value.bind( function( newThemeMenuFontSize ) {
		
			$('.main-nav li a').css( 'font-size', newThemeMenuFontSize, 'important');
						
		} );
	} );

	 // Update theme main menu bg color
	api( 'ko_band_main_menu_background_color', function( value ) {
		value.bind( function( newThemeMenuBGColor ) {
		
			$('.menu-scroll').css( 'background-color', newThemeMenuBGColor, 'important');
			$('.fixed').css( 'background-color', newThemeMenuBGColor, 'important');
			$('.menu-noscroll').css( 'background-color', newThemeMenuBGColor, 'important');
						
		} );
	} );

	 // Update theme font size
	api( 'ko_band_theme_font_size', function( value ) {
		value.bind( function( newThemeFontSize ) {
		
			$('.font_size').css( 'font-size', newThemeFontSize, 'important');
						
		} );
	} );


	 // Update theme line height
	api( 'ko_band_theme_line_height', function( value ) {
		value.bind( function( newThemeLineHeight ) {
		
			$('.font_size').css( 'line-height', newThemeLineHeight, 'important');
								
		} );
	} );


	 // Update theme general font selector
	api( 'ko_band_general_font_selector', function( value ) {
		value.bind( function( newThemeGeneralFont ) {
		
			$('.main_font').css('font-family', newThemeGeneralFont, 'important'); 
			//$('.comments-area, .sidebar').css( 'font-family', newThemeGeneralFont, 'important'); 
			//$('.main-nav .menu li a').css( 'font-family', newThemeGeneralFont, 'important'); 
			//$('.footer-menu .menu li a').css( 'font-family', newThemeGeneralFont, 'important'); 
			//$('.search-submit').css( 'font-family', newThemeGeneralFont, 'important'); 
										
		} );
	} );


	 // Update theme heading font selector
	api( 'ko_band_heading_font_selector', function( value ) {
		value.bind( function( newThemeHeadingFont ) {
		
			$('.heading_font').css( 'font-family', newThemeHeadingFont, 'important'); 
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

	// Update Footer logo
	api( 'ko_band_footer_logo', function( value ) {
		value.bind( function( themeNewFooterLogo ) {
		
			$(".footer_logo a img").attr("src",themeNewFooterLogo);
			
		} );
	} );

/*SLIDER Live changes start here */

   		//Update slider title color
	api( 'ko_band_slider_title_color', function( value ) {
		value.bind( function( newSliderTitleColor ) {
		
			$('.sl-content h5').css( 'color', newSliderTitleColor, 'important');
			
		} );
	} );

	   //Update slider paragraph text color
	api( 'ko_band_slider_paragraph_text_color', function( value ) {
		value.bind( function( newSliderParagraphTextColor ) {
		
			$('.sl-content p').css( 'color', newSliderParagraphTextColor, 'important');
			
		} );
	} );
    
       /*Update slider button text color*/
	api( 'ko_band_slider_button_text_color', function( value ) {
		value.bind( function( newSliderButtonTextColor ) {
		
			$('.slider_button_text_color').css( 'color', newSliderButtonTextColor, 'important');
			
		} );
	} );

	/*Update slider button border color*/
	api( 'ko_band_slider_button_border_color', function( value ) {
		value.bind( function( newSliderButtonBorderColor ) {
		
			$('.slider_button_text_color').css('border-color', newSliderButtonBorderColor, 'important');

			
		} );
	} );

   /*Update slider text holder box*/
	api( 'ko_band_slider_text_holder_background_color', function( value ) {
		value.bind( function( newtextHolderBgColor ) {
		   
			$('.sl-content').css('background-color', newtextHolderBgColor, 'important');
			$('.sl-content').css('opacity', newtextHolderBgColor, 'important');
			
		} );
	} );
  
  /*Show hider slider text holder box*/
	api( 'ko_band_home_page_box_background', function( value ) {
		value.bind( function( newBgHolderMode ) {
		    
		    if(newBgHolderMode == false)
		    {   
		       $('.sl-content').addClass('no_background_color')
               
		    }
		     else if (newBgHolderMode == true) 
		    {
		    	$('.sl-content').removeClass('no_background_color')

		    }
			
		} );
	} );

/* Show or hide search at footer*/
	api('ko_band_footer_search', function( value ) {
		value.bind( function( hideSearchFooter ) {
			if (hideSearchFooter == false){
				$('.search-form').slideUp()
			}
			if (hideSearchFooter == true){
				$('.search-form').slideDown()
			}
		})
	})
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