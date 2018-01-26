<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for a services section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_image' );
function redblue_section_fields_image( $layouts ) {

    $layouts[] = array (
        'key' => 'ztViAyUZUXN6ZV',
        'name' => 'image',
        'label' => 'Fullwidth Image',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_ztViAyUZUXN6ZV1',
                'label' => 'Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => 'This image should be a minimum of 1800px wide, and however tall you\'d like, as it will maintain aspect ratio in all views.',
                'wrapper' => array (
                    'width' => 30,
                ),
                'preview_size' => 'medium',
                'min_width' => '1600',
                'min_height' => '150',
            ),
            array (
                'key' => 'field_ztViAyUZUXN6ZV2',
                'label' => 'Overlay Content',
                'name' => 'overlay',
                'type' => 'wysiwyg',
                'wrapper' => array (
                    'width' => 70,
                ),
            ),
            array (
                'key' => 'field_ztViAyUZUXN6ZV3',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_image', 10, 4 );
function redblue_section_markup_image( $id, $count, $case, $context_prefix ) {

	if ( $case != 'image' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the background image information
	$imageid = (int) get_post_meta( $id, $context_prefix . $count . '_background', true );

	if ( $imageid ) {
		$imageurlarray = wp_get_attachment_image_src( $imageid, 'background-fullscreen' );
		$imageurl = $imageurlarray[0];
	}

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$overlay = get_post_meta( $id, $context_prefix . $count . '_overlay', true );
	$overlay = apply_filters( 'the_content', $overlay );

	//* Markup for this section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

        if ( $imageid )
            printf( '<div class="image-container"><img class="the-image" src="%s" /></div>', $imageurl );

		if ( $overlay )
			printf( '<div class="overlay"><div class="wrap">%s</div></div>', $overlay );

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
