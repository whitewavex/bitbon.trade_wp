$(document).ready(function() {
   
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        var id = event.detail.contactFormId;
        if( id == 331 ) {
            $('#back-call').animate({
                'opacity': 0
            },300, function() {
                $('#back-call').css({'display':'none'});
                $('#success-callback').css({
                    'display': 'block' 
                }).animate({
                    'opacity': 1 
                }, 300);
            });
        }
    }, false );
    
});