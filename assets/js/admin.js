/**
 * Subscribe widget WP-ADMIN script
 */
(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.av-color-field').wpColorPicker();
    });
    
    $('.av-datetime').datetimepicker({
        inline:false,
        //value: '',
        rtl: false,
        format: 'Y-m-d H:i',
    });

    $('.gfont-picker').fontselect({
        googleFonts:'Rubik|Notable|Anton|Bitter|Kanit|Arvo|Asap|Maven+Pro|Exo|BioRhyme'.split('|')
    });

    var custom_uploader;

    $('#upload_img_btn, #upload_bg_btn').click(function(e) {

        e.preventDefault();

        var elem = $(this);
        var target = $(this).attr('data-target'); 
        var max_height = $(this).attr('data-height');

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false,
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {

            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#ph-'+target).html('<img src="'+attachment.url+'" style="width: auto; max-height: '+max_height+'px;" />');
            $('#url_'+target).val(attachment.url);
            $('#remove_'+target).show();
            $('#'+target).val(attachment.id);
        });

        //Open the uploader dialog
        custom_uploader.open();

    });

    $('.remove-attachment').click(function(e) {

        e.preventDefault();

        var target = $(this).attr('data-target');
        var placeholder = '<div class="av-img-placeholder">Upload logo</div>';
        if( target == "bg" ) { placeholder = '<div class="av-img-placeholder" style="height:175px;>Upload background image</div>'; }
        $('#ph-'+target).html( placeholder );
        $('#url_'+target).val('');
        $('#remove_'+target).hide();
        $('#'+target).val(0);
    });
     
})( jQuery );