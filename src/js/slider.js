$(document).ready(function() {
   
    $('.slider').slick({
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 10000,
        prevArrow: '<button class="slider__button"><img src="' + srcSite + '/images/arrow.png"></button>',
        nextArrow: '<button class="slider__button slider__button_next"><img src="' + srcSite + '/images/arrow.png"></button>',
        fade: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    arrows: false,
                    dots: true
                }
            }
        ]
    });
    
});