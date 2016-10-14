<?php

/**
 * Template Name: Flexible Content
 */

//* Requiring a file for each section
require_once( 'sections/fullwidth.php' );
require_once( 'sections/featureditems.php' );
require_once( 'sections/featured_3col.php' );
require_once( 'sections/background_rotator.php' );
require_once( 'sections/background_video.php' );
require_once( 'sections/threecol_fourth_half_fourth.php' );
require_once( 'sections/checkerboard.php' );
require_once( 'sections/testimonials_slider.php' );
require_once( 'sections/trust_building_snippets.php' );

/**
 * This function builds the markup for each of the sections
 * @param  [type] $context [description]
 * @return [type]          [description]
 */
function rb_home_page_content() {

	$id = get_the_id();
	$rows = get_post_meta( $id, 'rb_section', true );

	foreach( (array) $rows as $count => $case ) {

		do_action( 'before_section_' . $count );

		//* A case for each section
		switch( $case ) {

			case 'fullwidth':

				rb_section_fullwidth( $id, $count, $case );

			break;

			case 'featureditems':

				rb_section_featureditems( $id, $count, $case );

			break;

			case 'featured_3col':

				rb_section_featured_3col( $id, $count, $case );

			break;

			case 'background_rotator':

				rb_section_background_rotator( $id, $count, $case );

			break;

			case 'background_video':

				rb_section_background_video( $id, $count, $case );

			break;

			case 'threecol-25-50-25':

				rb_section_threecol_fourth_half_fourth( $id, $count, $case );

			break;

			case 'checkerboard':

				rb_section_checkerboard( $id, $count, $case );

			break;

			case 'testimonials_slider':

				rb_section_testimonials_slider( $id, $count, $case );

			break;

			case 'trust_building_snippets':

				rb_section_trust_building_snippets( $id, $count, $case );

			break;


		}

		do_action( 'after_section_' . $count );
	}
}
add_action( 'rb_home_content_area', 'rb_home_page_content' );

/**
 * A function to figure out which classes we'll need applied, then return an array of them for use in the output
 * @param  strng 	$id     The ID of the piece of content we're on
 * @param  string 	$count  The number of the section
 * @param  string 	$case   The type of section we're using
 * @return string   $class  An array of the classes we'll be outputting in the section markup
 */
function rb_section_class_setup( $id, $count, $case ) {

	//* Set up the classes that are used for every section automatically
	$class[0] = 'section';
	$class[] = $case;

	//* Get the specific class assigned to this section
	$class[] = get_post_meta( $id, 'rb_section_' . $count . '_class', true );

	//* Return the string of classes for later use
	return $class;
}

// Build the page
get_header();
do_action( 'rb_home_content_area' );
get_footer();
