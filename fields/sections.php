<?php

//* Set up the layouts on the init hook, so that the theme will have access to remove layouts if needed
add_action( 'genesis_init', 'redblue_sections_set_layouts' );
function redblue_sections_set_layouts() {

	//* Figure out which sections to leave out for this project
	$disable_layouts = array();
	$disable_layouts = apply_filters( 'redblue_section_remove_layouts', $sections );

	//* Declare our $layouts variable, just in case (we'll be adding to this in each of the various sections)
	$layouts = array();

	//* Allow a theme to add a layout
	$layouts = apply_filters( 'redblue_section_add_layout', $layout );

	/**
	 * Include the files that actually include the layouts, allowing the theme or another plugin to remove them
	 */
	if ( !in_array( 'fullwidth', $disable_layouts ) )
		include( 'sections/fullwidth.php' );

	if ( !in_array( 'background_video', $disable_layouts ) )
		include( 'sections/background_video.php' );

	if ( !in_array( 'background_rotator', $disable_layouts ) )
		include( 'sections/background_rotator.php' );

	if ( !in_array( 'checkerboard', $disable_layouts ) )
		include( 'sections/checkerboard.php' );

	if ( !in_array( 'featured_items', $disable_layouts ) )
		include( 'sections/featured_items.php' );

	if ( !in_array( 'featured_3col', $disable_layouts ) )
		include( 'sections/featured_3col.php' );

	if ( !in_array( 'testimonials_slider', $disable_layouts ) )
		include( 'sections/testimonials_slider.php' );

	if ( !in_array( 'threecolumns_onefourth_onehalf_onefourth', $disable_layouts ) )
		include( 'sections/threecolumns_onefourth_onehalf_onefourth.php' );

	if ( !in_array( 'trust_building_snippets', $disable_layouts ) )
		include( 'sections/trust_building_snippets.php' );

	//* Allows a theme or another plugin to hook in and add its own section
	do_action( 'redblue_sections_add_sections' );

	/**
	 * Here's where we're actually registering out main field group
	 */
	if( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array (
			'key' => 'group_57a38f24e9031',
			'title' => 'Sections',
			'fields' => array (
				array (
					'key' => 'field_57a38f30e0b68',
					'label' => 'Flexible Content Area',
					'name' => 'rb_section',
					'type' => 'flexible_content',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'button_label' => 'Add Section',
					'min' => '',
					'max' => '',
					'layouts' => $layouts,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_template',
						'operator' => '==',
						'value' => 'page-flexible-content.php',
					),
				),
			),
			'menu_order' => 1,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'revisions',
				5 => 'author',
				6 => 'format',
				7 => 'featured_image',
				8 => 'categories',
				9 => 'tags',
				10 => 'send-trackbacks',
			),
			'active' => 1,
			'description' => '',
		));
	}
}

//* Sample code for removing a section (this doesn't actually remove one, but it *does* set the variable to an array, which it needs to be.)
add_filter( 'redblue_section_remove_layouts', 'redblue_section_remove_sample_sections', 5, 1 );
function redblue_section_remove_sample_sections( $sections ) {
    $sections[] = 'whatever_section_you_want_to_remove';
    return $sections;
}
