(function($) {
	'use strict';

	/*===================================*
	05. SLIDER JS
	*===================================*/
	$( window ).on( "load", function() {
		$('.carousel_slider').each( function() {
			var $carousel = $(this);
			$carousel.owlCarousel({
				dots : $carousel.data("dots"),
				loop : $carousel.data("loop"),
				margin: $carousel.data("margin"),
				items: $carousel.data("items"),
				mouseDrag: $carousel.data("mouse-drag"),
				touchDrag: $carousel.data("touch-drag"),
				center: $carousel.data("center"),
				autoHeight: $carousel.data("autoheight"),
				rewind: $carousel.data("rewind"),
				nav: $carousel.data("nav"),
				navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
				autoplay : $carousel.data("autoplay"),
				animateIn : $carousel.data("animate-in"),
				animateOut: $carousel.data("animate-out"),
				autoplayTimeout : $carousel.data("autoplay-timeout"),
				smartSpeed: $carousel.data("smart-speed"),
				responsive: $carousel.data("responsive")
			});
		});
	});
	          
})(jQuery);