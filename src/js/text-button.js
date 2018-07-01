$(document).ready(function() {
   
    var windowWidth = $(window).width();
    var text = [];
    var text_item;
    var count;
    $('.button_sm').each(function() {
        text_item = $(this).text();
        text.push(text_item);
        if( windowWidth <= 480 ) {
            $(this).empty();
            $(this).append('Купить <strong>Bit</strong>bon');
        }
    });
    
});