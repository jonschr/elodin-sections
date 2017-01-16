<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for a services section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_fullwidth' );
function redblue_section_fields_fullwidth( $layouts ) {

    $layouts[] = array (
        'key' => '57a38f3ad4c9f',
        'name' => 'fullwidth',
        'label' => 'Fullwidth',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57a38fbce0b6b',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_57a38f9de0b6a',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => '',
                'required' => '',
                'conditional_logic' => '',
                'wrapper' => array (
                    'width' => 30,
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => '',
                'preview_size' => 'thumbnail',
                'library' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_57a38f62e0b69',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 70,
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'section-class another-class',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_fullwidth', 10, 4 );
function redblue_section_markup_fullwidth( $id, $count, $case, $context_prefix ) {

	if ( $case != 'fullwidth' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the background image information
	$imageid = (int) get_post_meta( $id, $context_prefix . $count . '_background', true );

	if ( $imageid ) {
		$imageurlarray = wp_get_attachment_image_src( $imageid, array( 1600, 1000 ) );
		$imageurl = $imageurlarray[0];
	}

	//* If there's a background image, then add a class to account for that
	if ( $imageid )
		$class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
			printf( '<div class="section-content">%s</div>', $content );

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
