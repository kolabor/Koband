jQuery(document).ready(function( $ ){ 

	
function ko_band_RetinaDisplay() {

/*function ko_band_RetinaDisplay() {
        if (window.matchMedia) {
            var mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
            return (mq && mq.matches || (window.devicePixelRatio > 1)); 
        }
}*/
};

//Limiting the number of characters for textarea to 250 chars//
	var maxLength = 250;
	$('textarea').keyup(function() {
	var textlen = maxLength - $(this).val().length;
	}); 

/*
=================================================================================================================
							Jquery functions for show-hide album and single songs
=================================================================================================================
*/

// show list of album songs
$(".album-songs-show-hide").hide();														// hide the content on page load
$(".hide-album-song").hide();															// hide up button on page load
$(".show-album-song").click(function(){
	$(this).closest("div.container").find(".album-songs-show-hide").slideDown(1000); 	// show container elemnts 
	$(this).closest("div.album-up-down-buttons").find(".show-album-song").hide(); 		// button down hide
	$(this).closest("div.album-up-down-buttons").find(".hide-album-song").show();		// button up show
  
});

// hide list of album songs
$(".hide-album-song").click(function(){
	$(this).closest("div.container").find(".album-songs-show-hide").slideUp(1000); 		// hide container elemnts 
	$(this).closest("div.album-up-down-buttons").find(".hide-album-song").hide();		// button up hide
	$(this).closest("div.album-up-down-buttons").find(".show-album-song").show(); 		// button down show
});

// show hide list of single stores
$(".single-songs-show-hide").hide();
$(".hide-single-song").hide();
$(".show-single-song").click(function(){
	$(this).closest("div.container").find(".single-songs-show-hide").slideDown(1000); 	// show container elemnts 
	$(this).closest("div.single-up-down-buttons").find(".show-single-song").hide(); 	// button down hide
	$(this).closest("div.single-up-down-buttons").find(".hide-single-song").show();		// button up show
});

// hide list of single stores
$(".hide-single-song").click(function(){
	$(this).closest("div.container").find(".single-songs-show-hide").slideUp(1000); 	// hide container elemnts 
	$(this).closest("div.single-up-down-buttons").find(".hide-single-song").hide();		// button up hide
	$(this).closest("div.single-up-down-buttons").find(".show-single-song").show(); 	// button down show
});

/*
============================================
  Load more +2 News with Load-More button
============================================
 */
$('.no-news').hide();
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
            console.log($.trim(response));
            // if there are no more post hide loadmore show nomore
            if($.trim(response) == "end"){
	            $('.koband_load_more').hide();
	            $('.no-news').slideDown(700);
            }
            else {
	            that.data('page', newPage);
				$('.koband_post_news').append( response );
				that.removeClass('loading').find('.text').slideDown(320);
				that.addClass('loading-load').find('.koband-loading').hide(320);
			}
		}
	});
});


/*
============================================
  Load more Media with Load-More button
============================================
 */

$('.no-media').hide();
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
            // if there are no more post hide loadmore show nomore
            if($.trim(response) == "end-media"){
	            $('.koband_load_media').hide();
	            $('.no-media').slideDown(700);
            }
            else {
	            that.data('page', newPage);
				$(".koband_post_media").append( response );
				that.removeClass('loading').find('.text').slideDown(320);
				that.addClass('loading-load').find('.koband-loading').hide(320);
			}
		}
	});
});


});     // Ready function ends here //