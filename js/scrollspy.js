jQuery(document).ready(function( $ ) {

    //* The nav element we'll be working with
    var nav_element = '#scrollspy-nav';

    //* Get the overall offset of the element (this is the original distance from the top we're measuring)
    var offset = $( nav_element ).offset();

    //* Figure out how far the element is from the top originally
    var top = offset.top;

    // console.log ( 'NAV TOP: ' );
    // console.log( top );
    
    //* Figure out how tall the element is
    var height = $( nav_element ).outerHeight();
    
    // //* FOR TESTING
    // console.log ( 'NAV HEIGHT: ' );
    // console.log( height );
    
    $( window ).scroll( function() {
        var current_position = $( window ).scrollTop();
        
        // //* FOR TESTING
        // console.log ( 'CURRENT POSITION: ' );
        // console.log( current_position );

        //* If we're almost to the nav (or past it), we convert it to be fixed
        if ( current_position >= top - 2*height ) {

            //* Add the fixed class
            $( nav_element ).addClass('fixed');
            
            $( 'section.section' ).each(function(i) {

                //* If the top of the section is a bit higher than our current position (plus 3x the height of our menu, to make sure), make that nav item active 
                if ( $( this ).position().top <= current_position + 3*height ) {

                    $( nav_element + ' a.active' ).removeClass('active');
                    $( nav_element + ' a' ).eq(i).addClass('active');

                }
            });

        //* If we aren't at the nav menu yet, or we've scrolled back up past it
        } else {

            $( nav_element ).removeClass( 'fixed' );
            $( nav_element + ' a.active').removeClass( 'active' );
            $( nav_element + ' a:first').addClass( 'active' );
        }

    }).scroll();
  
});



