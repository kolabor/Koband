jQuery(function($) {

  var file_frame;

  $(document).on('click', '#ko_band_gallery-metabox a.gallery-add', function(e) {

    e.preventDefault();

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: true
    });

    file_frame.on('select', function() {
      var listIndex = $('#gallery-metabox-list li').index($('#gallery-metabox-list li:last')),
          selection = file_frame.state().get('selection');

      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        index      = listIndex + (i + 1);

        $('#gallery-metabox-list').append('<li><input type="hidden" name="vdw_gallery_id[' + index + ']" value="' + attachment.id + '"><img class="image-preview" src="' + attachment.sizes.thumbnail.url + '"><a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a><br><small><a class="remove-image" href="#">Remove image</a></small></li>');
      });
    });

    makeSortable();
    
    file_frame.open();

  });

  $(document).on('click', '#ko_band_gallery-metabox a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      attachment = file_frame.state().get('selection').first().toJSON();

      that.parent().find('input:hidden').attr('value', attachment.id);
      that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
    });

    file_frame.open();

  });

  function resetIndex() {
    $('#gallery-metabox-list li').each(function(i) {
      $(this).find('input:hidden').attr('name', 'vdw_gallery_id[' + i + ']');
    });
  }

  function makeSortable() {
    $('#gallery-metabox-list').sortable({
      opacity: 0.6,
      stop: function() {
        resetIndex();
      }
    });
  }

  $(document).on('click', '#ko_band_gallery-metabox a.remove-image', function(e) {
    e.preventDefault();

    $(this).parents('li').animate({ opacity: 0 }, 200, function() {
      $(this).remove();
      resetIndex();
    });
  });

  makeSortable();



   jQuery(document).ready(function( $ ){

        /*Repeatable fields for Media CPT (Adding videos) */
        $( '#add-row' ).on('click', function() {
            var row = $( '#ko_band_repetable_video_field_one .empty-row.screen-reader-text' ).clone();
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#ko_band_repetable_video_field_one .row:last' );
            return false;
        });
    
            $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });
        /*Repeatable fields for Media CPT (Adding videos) ends*/
        
        /*Repeatable fields for Media CPT (Adding "Singles CPF") */
        $( '#add-row-singles' ).on('click', function() {
            var row = $( '#ko_band_repetable_singles_stores_one .empty-row-singles.screen-reader-text' ).clone();
            row.removeClass( 'empty-row-singles screen-reader-text' );
            row.insertAfter( '#ko_band_repetable_singles_stores_one .row:last' );
            return false;
        });
            $( '.remove-row' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });

        /*Repeatable fields for Media CPT (Adding "Singles CPF") ends */ 

        /*Repeatable fields for Media CPT (Adding "Albums CPF") */   
        $( '#add-row-details' ).on('click', function() {
            var row_details = $( '#ko_band_album_meta_box_one .empty-row-detail.screen-reader-text' ).clone();
            row_details.removeClass( 'empty-row-details screen-reader-text' );
            row_details.insertBefore( '#ko_band_album_meta_box_one .row:last' );
            return false;
        });
            $( '.remove-row-details' ).on('click', function() {
            $(this).parents('.row').remove();
            return false; 
       });

        $( '#add-row-stores' ).on('click', function() {
            var row_stores = $( '#ko_band_album_meta_box_store .empty-row-stores.screen-reader-text' ).clone();
            row_stores.removeClass( 'empty-row-stores screen-reader-text' );
            row_stores.insertBefore( '#ko_band_album_meta_box_store .row:last' );
            return false;
        });
            $( '.remove-row-stores' ).on('click', function() {
            $(this).parents('.row').remove();
            return false;
        });

        /*Repeatable fields for Media CPT (Adding "Albums CPF") ends */
    });/* On document ready ends here */

});
