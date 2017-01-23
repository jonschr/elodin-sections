jQuery(document).ready(function($) {

    $('body').on('click', 'li.acf-fc-show-on-hover a.acf-icon.-minus.small', function(e) {
        return confirm( "Do you really want to delete this?" );
    });

    $('body').on('click', 'a.acf-icon.-minus.small', function(e) {
        return confirm( "Do you really want to delete this?" );
    });

});
