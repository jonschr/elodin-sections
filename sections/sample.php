<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_THESECTIONNAME' );
function redblue_section_fields_THESECTIONNAME( $layouts ) {

    $layouts[] = array (
        THELAYOUTS
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_THESECTIONNAME', 10, 4 );
function redblue_section_markup_THESECTIONNAME( $id, $count, $case, $context_prefix ) {

	if ( $case != 'THESECTIONNAME' )
		return;

    // THEMARKUP

}
