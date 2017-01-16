<?php

/**
 * A function to figure out which classes we'll need applied, then return an array of them for use in the output
 * @param  strng 	$id     The ID of the piece of content we're on
 * @param  string 	$count  The number of the section
 * @param  string 	$case   The type of section we're using
 * @return array   $class  An array of the classes we'll be outputting in the section markup
 */
function rb_section_class_setup( $id, $count, $case, $context_prefix ) {

	//* Set up the classes that are used for every section automatically
	$class[0] = 'section';
	$class[] = $case;

	//* Get the specific class assigned to this section
	$class[] = get_post_meta( $id, $context_prefix . $count . '_class', true );
	$class[] = $context_prefix;

	//* Return the string of classes for later use
	return $class;
}

/**
 * This function builds the markup for each of the sections
 * @param  string $context_prefix is the prefix for where the section is being used (this gives us the ability to use the same field group twice on one page, which is useful for header/footer use cases on standard pages)
 * @return [type]          [description]
 */
function rb_sections_output_sections( $context_prefix ) {

	//* Just dump out if we aren't on a single template (so far, we haven't designed this functionality for archives)
	if ( !is_singular() )
		return;

	$id = get_the_id();

    //* This is the only place (other than where we register the field) where we need the context prefix without the underscore
    $context_prefix_without_trailing_underscore = substr( $context_prefix, 0, -1);

    //* Figure out how many rows exist
	$rows = get_post_meta( $id, $context_prefix_without_trailing_underscore, true );

	foreach( (array) $rows as $count => $case ) {

		//* A hook to allow for adding things before each section
		do_action( $context_prefix . 'before_section_' . $count );

		// * A hook to allow for layouts to be added by other themes or plugins
		do_action( 'redblue_sections_add_layout', $id, $count, $case, $context_prefix );

		//* A hook to allow for adding things after each section
		do_action( $context_prefix . 'after_section_' . $count );
	}
}
