jQuery(document).ready(function($){$(".accordion-slider-nav").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,dots:!1,asNavFor:".accordion-slider-section"}),$(".accordion-slider-section").slick({slidesToShow:5,slidesToScroll:1,asNavFor:".accordion-slider-nav",dots:!1,centerMode:!1,focusOnSelect:!0})});