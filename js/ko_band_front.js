jQuery(document).ready(function( $ ){ 

//function ko_band_RetinaDisplay() {

function ko_band_RetinaDisplay() {
        if (window.matchMedia) {
            var mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
            return (mq && mq.matches || (window.devicePixelRatio > 1)); 
        }
//}
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
	$(this).closest("div.container").find(".single-songs-show-hide").slideDown(500); 	// show container elemnts 
	$(this).closest("div.single-up-down-buttons").find(".show-single-song").hide(); 	// button down hide
	$(this).closest("div.single-up-down-buttons").find(".hide-single-song").show();		// button up show
});

// hide list of single stores
$(".hide-single-song").click(function(){
	$(this).closest("div.container").find(".single-songs-show-hide").slideUp(500); 	    // hide container elemnts 
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
            else{	
            	setTimeout(function(){
					that.data('page', newPage);
					$('.koband_post_news').append( response );

					that.removeClass('loading').find('.text').slideDown(320);
					that.addClass('loading-load').find('.koband-loading').hide(320);
            	
            	}, 1000);
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
            else{
	            that.data('page', newPage);
				$(".koband_post_media").append( response );
				that.removeClass('loading').find('.text').slideDown(320);
				that.addClass('loading-load').find('.koband-loading').hide(320);
			}
		}
	});
});

/*
============================================
  Load more Tour with Load-More button
============================================
 */

$('.no-tour').hide();
$('.koband_load_tour').addClass('loading-load').find('.koband-loading').hide(320);
$(document).on('click', '.koband_load_tour:not(.loading)', function(){

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
			action: 'koband_load_tour'
		},
		error : function( response ){
			console.log("-----error----");
			console.log(response);
		},
		success : function( response ){
            
            console.log("-----success----");
            console.log(response);
            // if there are no more post hide loadmore show nomore
            if($.trim(response) == "end-tour"){
	            $('.koband_load_tour').hide();
	            $('.no-tour').slideDown(700);
            }
            else{
	            that.data('page', newPage);
				$(".koband_post_tour").append( response );
				that.removeClass('loading').find('.text').slideDown(320);
				that.addClass('loading-load').find('.koband-loading').hide(320);
			}
		}
	});
});
 // Add smooth scrolling to all links
var jump=function(e)
{
   if (e){
       e.preventDefault();
       var target = $(this).attr("href");
   }else{
       var target = location.hash;
   }

   $('html,body').animate(
   {
       scrollTop: $(target).offset().top
   },1000,function()
   {
       location.hash = target;
   });

}

$('html, body').hide();

$(document).ready(function()
{
    $('a[href^=#]').bind("click", jump);

    if (location.hash){
        setTimeout(function(){
            $('html, body').scrollTop(0).show();
            jump();
        }, 0);
    }

    else{
         
        $('html, body').show();
    }
});	

//On scroll change menu color
var num = 600; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.menu-scroll').addClass('fixed');
    } else {
        $('.menu-scroll').removeClass('fixed');
    }
});
	// Back to top
	if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}

/*
============================================
  Mobile Nav 
============================================
 */


$('.mobile-nav-icon').click(function() {
        var nav = $('.main-nav');
        var icon = $('.js--nav-icon i');
        
        nav.slideToggle(200);
        
        if (icon.hasClass('fas fa-bars')) {
            icon.addClass('ion-close-round');
            icon.removeClass('fas fa-bars');
        } else {
            icon.addClass('fas fa-bars');
            icon.removeClass('ion-close-round');
        }

    });




 
				//image
//your code for stuff should go here
$('#Fullscreen').css('height', $(document).outerWidth() + 'px');
//for when you click on an image
$('.imageList .attachment-500x500').click(function(){
 
 $('#Fullscreen img').attr('src', "");
 var src = $(this).attr('src'); //get the source attribute of the clicked image
 $('#Fullscreen img').attr('src', src); //assign it to the tag for your fullscreen div
 $('#Fullscreen').fadeIn();

});
$('#Fullscreen').click(function(){
  $('#Fullscreen').fadeOut(); //this will hide the fullscreen div if you click away from the image. 
});
//video
//your code for stuff should go here
$('.FullscreenV').css('height', $(document).outerWidth() + 'px');
//for when you click on an image
$('.myvideo').click(function(){

var src = $(this).parent().next('.FullscreenV iframe').attr('src'); //get the source attribute of the clicked image
 
 $(this).parent().next('.FullscreenV').fadeIn();
 $(this).parent().next('.FullscreenV iframe').attr('src', src); //assign it to the tag for your fullscreen div

});
$('.FullscreenV').click(function(){
 $('.FullscreenV').fadeOut(); //this will hide the fullscreen div if you click away from the image. 
});
			



$('.next').click(function(){

    alert('test');
       /* var $images = $('.FullscreenV iframe'); // A list of the images in your gallery.

        var $currentImg = $('.FullscreenV iframe[src="' + $('.FullscreenV iframe').attr('src') + '"]'); // The current img being overlayed.
        var $nextImg = $($currentImg.closest('div').next().find('iframe')); // The next img in the gallery.

        if ($nextImg.length > 0) { // If there is a next img, display it.
          $('.FullscreenV iframe').attr('src', $nextImg.attr('src'));
        } else { // Otherwise, if you've reached the end, loop back to the first img.
          $('.FullscreenV iframe').attr('src', $($images[0]).attr('src'));
        }
      });
    var speed = 100;

    $(".prev").click(function() {
        var now = $(this).parent().next("div#Fullscreen").children(":visible"),
            last = $(this).parent().next("div#Fullscreen").children(":last"),
            prev = now.prev();
            prev = prev.index() == 0 ? last : prev;
        now.fadeOut(speed, function() {prev.fadeIn(speed);});
    });

    $(".next").click(function() {
        var now = $(this).parent().next("div#Fullscreen").children(':visible'),
            first = $(this).parent().next("div#Fullscreen").children(':first'),
            next = now.next();
            next = next.index() == 0 ? first : next;
        now.fadeOut(speed, function() {next.fadeIn(speed);});
    });

    $("#Fullscreen img").click(function() {
        var first = $(this).parent().children(':first'),
            next = $(this).next();
            next = next.index() == 0 ? first : next;
        $(this).fadeOut(speed, function() {next.fadeIn(speed);});
    });    */
  });



}); // Ready function ends here //