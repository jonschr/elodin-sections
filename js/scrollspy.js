jQuery(document).ready(function( $ ) {

$(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 100) {
        $('#scrollspy-nav').addClass('fixed');
        $('.section').each(function(i) {
            if ($(this).position().top <= windscroll + 100) {
                $('#scrollspy-nav a.active').removeClass('active');
                $('#scrollspy-nav a').eq(i).addClass('active');
            }
        });

    } else {

        $('#scrollspy-nav').removeClass('fixed');
        $('#scrollspy-nav a.active').removeClass('active');
        $('#scrollspy-nav a:first').addClass('active');
    }

}).scroll();
  
});



