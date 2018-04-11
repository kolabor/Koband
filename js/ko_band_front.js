jQuery(document).ready(function( $ ){ 

	
function ko_band_RetinaDisplay() {

/*function ko_band_RetinaDisplay() {
        if (window.matchMedia) {
            var mq = window.matchMedia("only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
            return (mq && mq.matches || (window.devicePixelRatio > 1)); 
        }
}*/
};

//$('.dropdown-toggle').dropdown();
$(document).on('click', '.sunset-load-more', function(){

	var that = $(this);
	var page = $(this).data('page');
	var newPage = page+1;
	var ajaxurl = $(this).data('url');

	$.ajax({

		url : ajaxurl,
		type : 'post',
		dataType: "json",
		data : {
			page : page,
			action: 'sunset_load_more'
		},
		error : function( response ){
			console.log("-----error----");
			console.log(response);
		},
		success : function( response ){
            
            console.log("-----success----");
            that.data('page', newPage);
			$('.sunset-posts-container').append( response );

		}
	});
});



/*$('.loadmore').click(function(){

var page =$(this).data('page');

        $.ajax({
        	url : ajaxurl,
            type : 'post',
            data: {
              page : page, 
              action: "load_posts_by_ajax", 
            },
            error : function( response ){
            	console.log(response);
            },
            success: function(response){
             $('.my-posts').append(response);
            }
        }); 
    });


var page = 2; 
	    $('.loadmore').on('click', function() {

        var data = {
	            'action': 'load_posts_by_ajax',
	            'page': page
	        };
 
	        $.post(ajaxurl, data, function(response) {
	            $('.my-posts').append(response);
	            console.log(response);
	            page++;
	        });
	    });*/



});     // Ready function ends here //