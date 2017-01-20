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

	$('#featured-content-carousel').slick({
        dots: true,
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 6,
        adaptiveHeight: true,
        speed: 2000,
		fade: false,
		centerMode: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [
		{
            breakpoint: 1400,
            settings: {
                arrows: false,
                slidesToShow: 4,
				slidesToScroll: 4,
            }
        },
		{
            breakpoint: 1023,
            settings: {
                arrows: false,
                slidesToShow: 2,
				slidesToScroll: 2,
            }
        },
		{
	        breakpoint: 768,
	        settings: {
				dots: false,
	            arrows: true,
	            slidesToShow: 1,
				slidesToScroll: 1,
	        }
		}
		]
	});
});
