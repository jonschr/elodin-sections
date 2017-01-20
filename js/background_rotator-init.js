jQuery(document).ready(function( $ ) {

    $('.slick-slider.background_rotator').slick({
	    dots: false,
	    infinite: true,
	    adaptiveHeight: true,
	    speed: 2000,
	    slidesToShow: 1,
	    fade: true,
	    autoplay: true,
	    autoplaySpeed: 2000,
	    arrows: false,
	    lazyLoad: 'ondemand',
	});

});
