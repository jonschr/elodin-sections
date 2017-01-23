jQuery(document).ready(function($) {

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
