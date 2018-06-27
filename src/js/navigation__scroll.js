$(document).ready(function() {
    
    if( $(this).scrollTop() > 5 ) {
        $('.header').css({
            'background-color': 'rgba(48, 166, 224, 1)'
        });
        $('.header__triangle').addClass('header_slide');
        $('.header__rectangle').addClass('header_slide');
        $('.header__navigation').addClass('header__navigation_slide');
        if( $(window).width() > 750 ) {
            $('.header__logo').addClass('header__logo_slide');
            $('.header__logo img').addClass('logo__img_slide');
        }
    }

    $(window).scroll(function() {
        if( $(this).scrollTop() > 5 ) {
            $('.header').css({
                'background-color': 'rgba(48, 166, 224, .85)'
            });
            $('.header__triangle').addClass('header_slide');
            $('.header__rectangle').addClass('header_slide');
            $('.header__navigation').addClass('header__navigation_slide');
            if( $(window).width() > 750 ) {
                $('.header__logo').addClass('header__logo_slide');
                $('.header__logo img').addClass('logo__img_slide');
            }
        }
        else {
            $('.header').css({
                'background-color': 'rgba(48, 166, 224, 1)'
            });
            $('.header__triangle').removeClass('header_slide');
            $('.header__rectangle').removeClass('header_slide');
            $('.header__navigation').removeClass('header__navigation_slide');
            $('.header__logo').removeClass('header__logo_slide');
            $('.header__logo img').removeClass('logo__img_slide');
        }
    });
    
});