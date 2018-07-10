$(document).ready(function() {
    
//    OPEN BLOCK BACK CALL
   
    $('.back-call').click(function(e) {
        e.preventDefault();
        $('.overlay').fadeIn(300, function() {
            $('#back-call').css({
                'display': 'block' 
            }).animate({
                'opacity': 1 
            }, 300);
        });
    });
    
//    CLOSED BLOCK BACK CALL
    
    $('.block-back-call__close').click(function(e) {
        e.preventDefault();
        $('.block-back-call').animate({
            'opacity': 0
        },300, function() {
            $('.block-back-call').css({'display':'none'});
            $('.overlay').fadeOut(300);
        });
    });
    
});