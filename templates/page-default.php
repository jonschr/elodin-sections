<?php

//* NOTE: This is not actually a page template; these are simply functions we're adding to the default page

/**
 * Add a common body class to pages using the custom layout
 */
add_filter( 'body_class', function( $classes ) {
    if ( basename( get_page_template() ) == 'page.php' )
        return array_merge( $classes, array( 'flexible-content-page-builder' ) );

    return $classes;
} );

/**
 * Set up the output for the sections above the content for the default page layout
 */
add_action( 'genesis_after_header', 'rb_sections_default_page_output_above' );
function rb_sections_default_page_output_above() {
    if ( basename( get_page_template() ) == 'page.php' ) {
        $context_prefix = 'page_default_above_';
        do_action( 'rb_flexible_content_sections', $context_prefix );
    }
}

/**
 * Set up the output for the sections below the content for the default page layout
 */
add_action( 'genesis_before_footer', 'rb_sections_default_page_output_below' );
function rb_sections_default_page_output_below() {
    if ( basename( get_page_template() ) == 'page.php' ) {
        $context_prefix = 'page_default_below_';
        do_action( 'rb_flexible_content_sections', $context_prefix );
    }
}

add_action( 'rb_flexible_content_sections', 'rb_sections_output_sections' );
