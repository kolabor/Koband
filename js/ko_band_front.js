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

//show hide list of album songs
/*$(".album-songs-show-hide").hide();
$(".hide-album-song").hide();
$(".show-album-song").click(function(){
	$(this).closest("div.container").find(".album-songs-show-hide").slideDown(1000);
    //$(".album-songs-show-hide").slideDown(1000);// hide container elemnts 
    $(".show-album-song").hide(); // button down hide
    $(".hide-album-song").show(); // button up show

});/*
$(".album-songs-show-hide").hide();
$(".hide-album-song").hide();
$(".show-album-song").click(function(){
    $(".album-songs-show-hide").hide();
    $(".hide-album-song").hide();
    $(this).next(".album-songs-show-hide").slideDown(1000);
    $(this).hide();
    $(this).next(".hide-album-song").show();
});
$(".hide-album-song").click(function(){
	$(".album-songs-show-hide").slideUp(1000);
    $(".hide-album-song").hide();
	$(".show-album-song").show();
});

// show hide list of single stores
$(".single-songs-show-hide").hide();
$(".hide-single-song").hide();
$(".show-single-song").click(function(){
    $(".single-songs-show-hide").slideDown(1000);
    $(".show-single-song").hide();
    $(".hide-single-song").show();

});
$(".hide-single-song").click(function(){
	$(".single-songs-show-hide").slideUp(1000);
    $(".hide-single-song").hide();
	$(".show-single-song").show();
});*/

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