jQuery(document).ready(function( $ ) {

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
