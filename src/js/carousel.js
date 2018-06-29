$(document).ready(function() {
    
    $('.carousel').slick({
        slidesToShow: 3,
        prevArrow: '<button class="carousel__button"><img src="' + srcSite +  '/images/arrow_carousel.png"></button>',
        nextArrow: '<button class="carousel__button carousel__button_next"><img src="' + srcSite +  '/images/arrow_carousel.png"></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    arrows: false

                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    arrows: false

                }
            }
        ]
    });
    
});