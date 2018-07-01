$(document).ready(function() {
   
    $('.accordion__button').click(function() {
        if( $(this).parents('.accordion__card').hasClass('accordion_open') ) {
            $(this).parents('.accordion__card').removeClass('accordion_open');
        }
        else {
            $('.accordion__card').removeClass('accordion_open');
            $(this).parents('.accordion__card').addClass('accordion_open');
        }
    });
    
});