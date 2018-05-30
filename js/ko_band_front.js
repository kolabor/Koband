jQuery(document).ready(function( $ ){ 

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
$(".album-songs-show-hide").hide();														                      // hide the content on page load
$(".hide-album-song").hide();															                          // hide up button on page load
$(".show-album-song").click(function(){
	$(this).closest("div.container").find(".album-songs-show-hide").slideDown(1000); 	// show container elemnts 
	$(this).closest("div.album-up-down-buttons").find(".show-album-song").hide(); 		// button down hide
	$(this).closest("div.album-up-down-buttons").find(".hide-album-song").show();		  // button up show
  
});

// hide list of album songs
$(".hide-album-song").click(function(){
	$(this).closest("div.container").find(".album-songs-show-hide").slideUp(1000); 		// hide container elemnts 
	$(this).closest("div.album-up-down-buttons").find(".hide-album-song").hide();		  // button up hide
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
	$(this).closest("div.container").find(".single-songs-show-hide").slideUp(500); 	   // hide container elemnts 
	$(this).closest("div.single-up-down-buttons").find(".hide-single-song").hide();		 // button up hide
	$(this).closest("div.single-up-down-buttons").find(".show-single-song").show(); 	 // button down show
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
			//console.log("-----error----");
			console.log(response);
		},
		success : function( response ){
            
            console.log("-----success----");
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

/*
============================================
  Add smooth scrolling to all links
============================================
 */

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

/*
============================================
  On scroll change menu color
============================================
 */

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
  $('.main-nav ul li').click(function(){
      nav.slideUp(200);
      })
    });




/*
============================================
  Gallery click, next, prev functions
============================================
*/
 
$('#Fullscreen').css('height', $(document).outerWidth() + 'px');

$('.imageList img').click(function(){
 
  var mediaType = $(this).attr("data-type");
  var data_nr = $(this).attr("data-nr");
 
  $('#Fullscreen').attr('data-nr', data_nr);
  $('#Fullscreen').attr('data-type', mediaType);


  if( mediaType == "video")
  {
    
    var videoType = $(this).attr("data-video-type");
    var videoLink = $(this).attr("data-video-link");
    var videoCode = $(this).attr("data-video-code");      
    $.videoSlide(videoCode, videoLink, videoType);
   
  }

  else if( mediaType == "image")
  { 
    $("#Fullscreen img").remove();
    $("#Fullscreen iframe").remove();
    var src = $(this).attr('src');
    $('#Fullscreen').prepend('<img  src="'+src+'" />');
    $('#Fullscreen').fadeIn();
  }
 
});


$('#Fullscreen').click(function(){
    /*Stop All videos on iframe*/
    $("iframe").each(function() 
    { 
       var src= $(this).attr('src');
       $(this).attr('src',src);  
    });
  /*$('#Fullscreen').fadeOut(); //this will hide the fullscreen div if you click away from the image. */
});



$('.FullscreenV').css('height', $(document).outerWidth() + 'px');
$('.close_gallery').click(function(){ $('#Fullscreen').fadeOut();});			

/*Next prev button clicks*/
$('.next').click(function(){  $.nexMedia();  });
$('.prev').click(function(){ $.prevMedia();  });

/*Next prev functions with keycodes */
$(document).keydown(function(e){
    if (e.keyCode == 39) {
       $.nexMedia();
       return false;
    }
    else if (e.keyCode == 37) {
       $.prevMedia();
       return false;
    }
});
/*Next prev functions with keycodes ends here*/

/*Next media function starts here*/
$.nexMedia = function()
{

  var mediaNr  = $('#Fullscreen').attr("data-nr");
  var mediaType = $('#Fullscreen').attr("mediaType");
  var mediaCount = $(".imageList img").length;

  var nextMedia = +mediaNr + 1;
  if (nextMedia > mediaCount){nextMedia = 1;}
  
  var className = ".nr-"+nextMedia;
  
  
  if(nextMedia <= mediaCount)
  {

    $("#Fullscreen img").remove();
    $("#Fullscreen iframe").remove();
    
    var next = $(".imageList").find(className);
    var mediaType = $(next).attr("data-type");

    $('#Fullscreen').attr('data-nr', nextMedia);
    $('#Fullscreen').attr('data-type', mediaType);
    
     if (mediaType == "image")
    {
       //var src = $(next).attr("data-type");
        var src= $(next).attr('src');
        console.log(src);
        $('#Fullscreen').prepend('<img  src="'+src+'" />');

    }
    else if (mediaType == "video")
    {
        var videoType = $(next).attr("data-video-type");
        var videoLink = $(next).attr("data-video-link");
        var videoCode = $(next).attr("data-video-code");
        $.videoSlide(videoCode, videoLink, videoType);
    }

   
  } 
}
/*Next function ends here */

/*Prev function starts here */
$.prevMedia = function()
{

  var mediaNr  = $('#Fullscreen').attr("data-nr");
  var mediaType = $('#Fullscreen').attr("mediaType");
  var mediaCount = $(".imageList img").length;

  var nextMedia = +mediaNr - 1;
  if (nextMedia == 0){nextMedia = mediaCount;}
  
  var className = ".nr-"+nextMedia;
  
  
  if(nextMedia <= mediaCount)
  {

    $("#Fullscreen img").remove();
    $("#Fullscreen iframe").remove();
    
    var next = $(".imageList").find(className);
    var mediaType = $(next).attr("data-type");

    $('#Fullscreen').attr('data-nr', nextMedia);
    $('#Fullscreen').attr('data-type', mediaType);
    
     if (mediaType == "image")
    {
       //var src = $(next).attr("data-type");
        var src= $(next).attr('src');
        console.log(src);
        $('#Fullscreen').prepend('<img  src="'+src+'" />');

    }
    else if (mediaType == "video")
    {
        var videoType = $(next).attr("data-video-type");
        var videoLink = $(next).attr("data-video-link");
        var videoCode = $(next).attr("data-video-code");
        $.videoSlide(videoCode, videoLink, videoType);
    }

   
  } 
}/*Prev function ends here */



/*Video slide function starts here*/
$.videoSlide = function(videoCode, videoLink, videoType)
{
            
        switch (videoType) 
        { 
        case 'youtube': 
            $("#Fullscreen img").remove();
            $("#Fullscreen iframe").remove();
            $('#Fullscreen').prepend('<iframe src="https://www.youtube.com/embed/'+videoCode+'"></iframe>');
            $('#Fullscreen').fadeIn();
            break;
        case 'vimeo': 
            $("#Fullscreen img").remove();
            $("#Fullscreen iframe").remove();
            $('#Fullscreen').prepend('<iframe width="370" height="265" src="https://player.vimeo.com/video/'+videoCode+'" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
            $('#Fullscreen').fadeIn();
            
            break;
        case 'dailymotion': 
            $("#Fullscreen img").remove();
            $("#Fullscreen iframe").remove();
            $('#Fullscreen').prepend('<iframe width="370" height="265" src="//www.dailymotion.com/embed/video/'+videoCode+'"></iframe>');
            $('#Fullscreen').fadeIn();
            break;     
        default:
            console.log(videoType);
        }  

}
/*Video slide function ends here*/s

}); // Ready function ends here //