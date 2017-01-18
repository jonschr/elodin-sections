jQuery(document).ready(function( $ ) {

    $('.slick-slider.background_image_slider').slick({
	    dots: true,
	    infinite: true,
	    adaptiveHeight: true,
	    speed: 1000,
	    slidesToShow: 1,
	    fade: true,
        pauseOnHover: false,
	    autoplay: true,
	    autoplaySpeed: 5000,
	    arrows: false,
	    lazyLoad: 'ondemand',
	});

});
