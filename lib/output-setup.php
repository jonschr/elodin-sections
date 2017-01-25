<?php

/**
 * Add a common body class to pages using the custom layout
 */
add_action( 'body_class', 'redblue_sections_add_body_classes' );
function redblue_sections_add_body_classes( $classes ) {
    // if ( basename( get_page_template() ) == 'page.php' )
    //     $classes = array_merge( $classes, array( 'flexible-content-page-builder' ) );

    //* Get the page number
    $id = get_the_id();

    //////////////////////
    // NOTES ON CLASSES //
    //////////////////////
    
    /// .flexible-content-page-builder: used every time any section is output
    /// .flexible-page-with-sections: used if we're on a flexible page that has sections
    /// .sections-top: used if there's a section that is above the content area (or if there's no content area)
    /// .sections-bottom: used if there's a section that below the content area (or if there's no content area)
    /// .default-page-with-sections: used if we're on the default page (with content) and there are sections

    //* Figure out if we're on a flexible page that has sections, and how many sections
    $rows_flexible = get_post_meta( $id, 'page_flexible_content', true );
    if ( is_array( $rows_flexible ) )
        $classes = array_merge( $classes, array( 'flexible-content-page-builder', 'flexible-page-with-sections', 'sections-top', 'sections-bottom' ) );

    //* Get rows for the above and below sections
    $rows_above = get_post_meta( $id, 'page_default_above', true );
    $rows_below = get_post_meta( $id, 'page_default_below', true );

    //* Add classes for the above and below areas
    if ( is_array( $rows_above ) || is_array( $rows_below ) )
        $classes = array_merge( $classes, array( 'flexible-content-page-builder', 'default-page-with-sections' ) );

    //* Figure out if we're on a default page that has sections above the content
    if ( is_array( $rows_above ) )
        $classes = array_merge( $classes, array( 'sections-top' ) );

    //* Figure out if we're on a default page that has sections above the content
    if ( is_array( $rows_below ) )
        $classes = array_merge( $classes, array( 'sections-bottom' ) );


    return $classes;
} 

/**
 * Set up the output for the sections above the content for the default page layout
 */
add_action( 'genesis_after_header', 'rb_sections_default_page_output_above', 25 );
function rb_sections_default_page_output_above() {
    if ( basename( get_page_template() ) == 'page.php' ) {
        $context_prefix = 'page_default_above_';
        do_action( 'rb_flexible_content_sections', $context_prefix );
    }
}

/**
 * Set up the output for the sections below the content for the default page layout
 */
add_action( 'genesis_before_footer', 'rb_sections_default_page_output_below', 0 );
function rb_sections_default_page_output_below() {
    if ( basename( get_page_template() ) == 'page.php' ) {
        $context_prefix = 'page_default_below_';
        do_action( 'rb_flexible_content_sections', $context_prefix );
    }
}

add_action( 'rb_flexible_content_sections', 'rb_sections_output_sections' );
