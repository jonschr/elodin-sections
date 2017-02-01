jQuery(document).ready(function($) {

    console.log( accordion_vars.navarea_class );
    console.log( accordion_vars.contentarea_class );

    $( accordion_vars.contentarea_class).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: accordion_vars.navarea_class ,
        focusOnSelect: false,
        fade: true,
        adaptiveHeight: true,
        swipeToSlide: false,
        infinite: true,
    });

    $( accordion_vars.navarea_class ).slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: accordion_vars.contentarea_class,
        dots: false,
        arrows: true,
        infinite: true,
        focusOnSelect: false,
        swipeToSlide: false,
        centerMode: false,
        adaptiveHeight: true,
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
