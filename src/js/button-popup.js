$(document).ready(function() {
   
    var text = $('.button-open').text();
    if( $(window).width() <= 750 ) {
        $('.button-open').empty();
        $('.button-open').html('<i class="fa fa-gift" aria-hidden="true"></i>');
    }
    
});