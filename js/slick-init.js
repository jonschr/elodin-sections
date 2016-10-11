jQuery(document).ready(function($) {
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

	$('#testimonial-slider').slick({
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        speed: 2000,
        slidesToShow: 4,
        fade: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        lazyLoad: 'ondemand',
        responsive: [
		{
            breakpoint: 1400,
            settings: {
                arrows: false,
                centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 3
            }
        },
		{
            breakpoint: 1023,
            settings: {
                arrows: false,
                centerMode: true,
                // centerPadding: '40px',
                slidesToShow: 2
            }
        },
		{
	        breakpoint: 768,
	        settings: {
	            arrows: false,
	            centerMode: true,
	            // centerPadding: '40px',
	            slidesToShow: 1
	        }
		}
		]
	});
});
