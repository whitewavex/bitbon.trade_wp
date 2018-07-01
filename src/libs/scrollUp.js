(function($){

	$.fn.scrollUp = function(options){

		var options = $.extend({ 
			speed: 600
		}, options);
        
        $(window).scroll(function(){
		 	if( $(this).scrollTop() > 700 && options.toTop == true ){
                $('.toTop').fadeIn();
            }
            else if(options.toTop == true) {
                $('.toTop').fadeOut();
            }
		 });

            var make = function(){

                $(this).click(function(e){
                    e.preventDefault();
                    if(options.toTop == true){
                            $('html, body').animate({
                            scrollTop: 0
                        }, options.speed);
                    }

                });

            };

		return this.each(make)
	}

}(jQuery));