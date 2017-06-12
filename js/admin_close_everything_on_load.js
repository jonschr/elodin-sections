jQuery(document).ready(function($)
{
	//* Close the overall layouts
    $('.layout').addClass('-collapsed');

    //* Close individual rows
    // $('.acf-row').addClass('-collapsed');

	//* For the scrollspy nav, the collapsing makes it tough to use. Remove that when the section is opened
    $( 'div.layout.-collapsed[data-layout="scrollspy_nav"]' ).click(function(){
        $( 'div.layout[data-layout="scrollspy_nav"] .acf-row' ).removeClass( '-collapsed' );
    });

});
