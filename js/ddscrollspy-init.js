jQuery(document).ready(function( $ ) {

	var fixedheight = parseInt( passed_vars.height_of_div );
	console.log( fixedheight );

	//* The nav element we'll be working with
    var nav_element = '#scrollspy-nav';

    //* Get the overall offset of the element (this is the original distance from the top we're measuring)
    var offset = $( nav_element ).offset();

    //* Figure out how far the element is from the top originally
    var top = offset.top;

    //* Figure out how tall the element is
    var height = $( nav_element ).outerHeight();

	//* Set the barheight to 0 by default (unless there's an admin bar)
	var barheight = 0;

	//* Check whether there's an admin bar. If so, that effects 
	if ( $('body').hasClass( 'admin-bar' ) )
		var barheight = $( '#wpadminbar' ).outerHeight();

	//* The height of everything we need to account for
	var heightallfixed = height + barheight + fixedheight;

	//* The negative of the height of everything we need to account for
    var theoffset = -Math.abs( heightallfixed );
    
	//* Run an initial check to see where we're at after the page loads (we might be scrolled part way down)
    checkposition();

    if ( $( nav_element ).hasClass( 'fixed' ) ) {
		fixedmode();
    } else {
    	normalmode();
    }

	//* Onscroll, run the checkposition function
    $(window).scroll( checkposition ); 

    ///////////////
    // FUNCTIONS //
    ///////////////

    function checkposition() {

		var current_position = $( window ).scrollTop();
        
        //* If we're almost to the nav (or past it), we convert it to be fixed
        if ( current_position >= top ) {

            //* Add the fixed class
            $( nav_element ).addClass('fixed');
            $( nav_element ).removeClass('not-fixed');

        //* If we aren't at the nav menu yet, or we've scrolled back up past it
        } else {

            $( nav_element ).removeClass( 'fixed' );
            $( nav_element ).addClass( 'not-fixed' );

        }
    }

    function fixedmode() {

		// console.log( "FIXED MODE" );

		//* Initialize the ddsmoothscroll plugin
		$('#scrollspy-nav').ddscrollSpy({
			scrolltopoffset: theoffset,
			scrollduration: 200
		});
    }

    function normalmode() {

    	// console.log( "NORMAL MODE" );
    	
		//* Initialize the ddsmoothscroll plugin
		$('#scrollspy-nav').ddscrollSpy({
			scrolltopoffset: ( theoffset*2 + barheight + fixedheight ),
			scrollduration: 200
		});
    }
});