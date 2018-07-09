$(document).ready(function() {
   
    $('.header__navigation .navigation__button').hover(function() {
        $('.header__navigation .navigation__dropdown').addClass('priority-nav__dropdown show');
    });
    $('.header__navigation .navigation__list li a').hover(function() {
        $('.header__navigation .navigation__dropdown').addClass('priority-nav__dropdown show');
    });
    
});