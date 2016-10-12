<?php

/**
 * These are the actual layouts, presented in php
 */
include( 'sections/background_rotator.php' );
include( 'sections/background_video.php' );
include( 'sections/fullwidth.php' );
include( 'sections/testimonials_slider.php' );
include( 'sections/checkerboard.php' );
include( 'sections/featured_items.php' );
include( 'sections/threecolumns_onefourth_onehalf_onefourth.php' );

$layouts = array (
	$background_rotator,
	$background_video,
	$fullwidth,
	$testimonials_slider,
	$checkerboard,
	$featured_items,
	$three_columns_onefourth_onehalf_onefourth,
);

if( function_exists( 'acf_add_local_field_group' ) ):

/**
 * Here's where we're actually registering out main field group
 */
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

endif;
