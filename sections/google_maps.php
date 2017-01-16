<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_google_maps' );
function redblue_section_fields_google_maps( $layouts ) {

    $layouts[] = array (
        'key' => 'oLedymgj9A6GgHvCmFD',
        'name' => 'google_maps',
        'label' => 'Google Map',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_oLedymgj9A6GgHvCmFD1',
                'label' => 'Embed Code',
                'name' => 'embed',
                'type' => 'text',
                'instructions' => 'Use a Google Maps embed code (not just the URL)',
                'required' => 1,
                'conditional_logic' => 0,
            ),
            array (
                'key' => 'field_oLedymgj9A6GgHvCmFD3',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                ),
                'placeholder' => 'section-class another-class',
            ),
        ),
        'min' => '',
        'max' => '',
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_google_maps', 10, 4 );
function redblue_section_markup_google_maps( $id, $count, $case, $context_prefix ) {

	if ( $case != 'google_maps' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the classes ready
	$class = implode( ' ', $class );

    //* Get the embed code
    $embed = get_post_meta( $id, $context_prefix . $count . '_embed', true );

    //* Add the scrips for Google Maps scrolling fix
    wp_enqueue_script( 'google-maps-scrollfix' );

	//* Markup for this section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

        echo '<div id="google-maps">';

            if ( $embed )
                echo $embed;

        echo '</div>';


		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section

}
