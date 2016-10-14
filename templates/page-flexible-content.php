<?php

/**
 * Template Name: Flexible Content
 */

//* The rb_sections_output_sections function is located in the template-common-functions file,
//  to allow for use by other templates as well
add_action( 'rb_flexible_content_sections', 'rb_sections_output_sections' );

//* Build the page
get_header();

$context_prefix = 'page_flexible_content_';
do_action( 'rb_flexible_content_sections', $context_prefix );

get_footer();
