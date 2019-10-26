// Ready...
jQuery( document ).ready( function() {

	// Synchronize Demos List
	jQuery( '.update-demos-btn' ).on( 'click', function() {
        
        jQuery.ajax({
            url : sync_demos.ajax_url,
            type : 'post',
            data : {
                action : 'bdim_sync_demos_list'
            },
            success : function( response ) {
                location.reload(true);
            }
        });

    });
    
});