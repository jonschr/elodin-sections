jQuery(document).ready(function($) {

    $('.accordion-slider-section').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.accordion-slider-nav',
        focusOnSelect: true,
        fade: false,
        swipeToSlide: true,
        infinite: true,
    });

    $('.accordion-slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.accordion-slider-section',
        dots: false,
        arrows: true,
        infinite: true,
        focusOnSelect: true,
        swipeToSlide: true,
        centerMode: false,
        variableWidth: false,
        responsive: [{
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

});
