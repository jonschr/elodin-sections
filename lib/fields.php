<?php

//* Set up the layouts on the init hook, so that the theme will have access to remove layouts if needed. We need to do it late so that all our posts types have finished registering
add_action( 'init', 'redblue_sections_set_layouts', 99 );
function redblue_sections_set_layouts() {

	//* Figure out which sections to leave out for this project
	$disable_layouts = array();
	$sections = isset( $sections ) ? $sections : null;
	$disable_layouts = apply_filters( 'redblue_section_remove_layouts', $sections );

	//* Declare our $layouts variable, just in case (we'll be adding to this in each of the various sections)
	$layouts = array();

	//* Allow a theme to add a layout
	$layouts = apply_filters( 'redblue_section_add_layout', $layouts );

	//* Add the sections
	do_action( 'redblue_sections_add_sections' );

	//* Allow a theme to add arguments for where we use the sections
	$instead_of_args = isset( $instead_of_args ) ? $instead_of_args : null;
	$instead_of_content = apply_filters( 'redblue_section_instead_of_content_display', $instead_of_args );

	//* Allow a theme to add arguments for where we use the sections
	$above_args = isset( $above_args ) ? $above_args : null;
	$above_content = apply_filters( 'redblue_section_above_content_display', $above_args );

	//* Allow a theme to add arguments for where we use the sections
	$below_args = isset( $below_args ) ? $below_args : null;
	$below_content = apply_filters( 'redblue_section_below_content_display', $below_args );

	/**
	 * Here's where we're actually registering our main field group
	 */
	if( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array (
			'key' => 'group_57a38f24e9031',
			'title' => 'Sections',
			'fields' => array (
				array (
					'key' => 'field_57a38f30e0b68',
					'label' => 'Flexible Content Area',
					'name' => 'page_flexible_content',
					'type' => 'flexible_content',
					'button_label' => 'Add Section',
					'layouts' => $layouts,
				),
			),
			'location' => $instead_of_content,
			'menu_order' => 1,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
			'active' => 1,
		));
	}

	/**
	 * Registering the field group above content on normal pages
	 */
	if( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array (
			'key' => 'group_57a38f24easdflkj1',
			'title' => 'Sections Above Page Content',
			'fields' => array (
				array (
					'key' => 'field_57a38f30e0agagwb6asdlfkjadsf8',
					'label' => 'Flexible Content Area',
					'name' => 'page_default_above',
					'type' => 'flexible_content',
					'instructions' => '',
					'button_label' => 'Add Section',
					'layouts' => $layouts,
				),
			),
			'location' => $above_content,
			'menu_order' => 1,
			'position' => 'acf_after_title',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (),
			'active' => 1,
		));
	}

	/**
	 * Registering the field group below content on normal pages
	 */
	if( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array (
			'key' => 'group_57a38f24gaggflkj1',
			'title' => 'Sections Below Page Content',
			'fields' => array (
				array (
					'key' => 'field_57a38f30e0b6aggasdlfkjadsf8',
					'label' => 'Flexible Content Area',
					'name' => 'page_default_below',
					'type' => 'flexible_content',
					'button_label' => 'Add Section',
					'layouts' => $layouts,
				),
			),
			'location' => $below_content,
			'menu_order' => 0,
			'position' => 'normal',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (),
			'active' => 1,
		));
	}
}

//* Sample code for removing a section (this doesn't actually remove one, but it *does* set the variable to an array, which it needs to be.)
add_filter( 'redblue_section_remove_layouts', 'redblue_section_remove_sample_sections', 5, 1 );
function redblue_section_remove_sample_sections( $sections ) {
    $sections[] = 'whatever_section_you_want_to_remove';
    return $sections;
}

//* Defaults for the flexible content page
add_filter( 'redblue_section_instead_of_content_display', 'redblue_section_instead_of_content_defaults', 1, 1 );
function redblue_section_instead_of_content_defaults( $instead_of_args ) {

	$instead_of_args = array(
		array(
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-flexible-content.php',
			),
		),
	);

	return $instead_of_args;
}

//* Defaults for the default page (above)
add_filter( 'redblue_section_above_content_display', 'redblue_section_above_content_defaults', 1, 1 );
function redblue_section_above_content_defaults( $above_args ) {

	$above_args = array(
		array(
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
	);

	return $above_args;
}

//* Defaults for the default page (below)
add_filter( 'redblue_section_below_content_display', 'redblue_section_below_content_defaults', 1, 1 );
function redblue_section_below_content_defaults( $below_args ) {

	$below_args = array(
		array(
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'default',
			),
		),
	);

	return $below_args;
}
