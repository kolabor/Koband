jQuery(document).ready(function( $ ){ 

	
function ko_band_RetinaDisplay() {

/*function ko_band_RetinaDisplay() {
        if (window.matchMedia) {
            var mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
            return (mq && mq.matches || (window.devicePixelRatio > 1)); 
        }
}*/
};

/*
============================================
  Load more +2 News with Load-More button
============================================
 */

$('.koband_load_more').addClass('loading-load').find('.koband-loading').hide(320);
$(document).on('click', '.koband_load_more:not(.loading)', function(){

	var that = $(this);
	var page = $(this).data('page');
	var newPage = page+1;
	var ajaxurl = $(this).data('url');

	that.addClass('loading').find('.text').slideUp(320);
	that.addClass('loading-load').find('.koband-loading').slideDown(320);

	$.ajax({

		url : ajaxurl,
		type : 'POST',
		data : {
			page : page,
			action: 'koband_load_more'
		},
		error : function( response ){
			console.log("-----error----");
			console.log(response);
		},
		success : function( response ){
            
            console.log("-----success----");
            console.log(response);
            that.data('page', newPage);
			$('.koband_post_news').append( response );
			that.removeClass('loading').find('.text').slideDown(320);
			that.addClass('loading-load').find('.koband-loading').hide(320);
                    

		}
	});
});


/*
============================================
  Load more Media with Load-More button
============================================
 */

$('.koband_load_media').addClass('loading-load').find('.koband-loading').hide(320);
$(document).on('click', '.koband_load_media:not(.loading)', function(){

	var that = $(this);
	var page = $(this).data('page');
	var newPage = page+1;
	var ajaxurl = $(this).data('url');

	that.addClass('loading').find('.text').slideUp(320);
	that.addClass('loading-load').find('.koband-loading').slideDown(320);

	$.ajax({

		url : ajaxurl,
		type : 'POST',
		data : {
			page : page,
			action: 'koband_load_media'
		},
		error : function( response ){
			console.log("-----error----");
			console.log(response);
		},
		success : function( response ){
            
            console.log("-----success----");
            console.log(response);
            that.data('page', newPage);
			$('.koband_post_media').append( response );
			that.removeClass('loading').find('.text').slideDown(320);
			that.addClass('loading-load').find('.koband-loading').hide(320);
		}
	});
});


});     // Ready function ends here //