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



} )( jQuery );