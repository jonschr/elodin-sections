<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_two_column' );
function redblue_section_fields_two_column( $layouts ) {

    $layouts[] = array (
        'key' => 'fqscmHNXnwwW',
        'name' => 'two_column',
        'label' => 'Two Column (vertically aligned)',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_fqscmagagaHgNXnwwW',
                'label' => 'Alignment',
                'name' => 'alignment',
                'type' => 'radio',
                'instructions' => 'How would you like these sections aligned on desktop?',
                'required' => 1,
                'choices' => array (
                    'autowidth' => 'Automatic width',
                    'thirdleft' => '1/3 left, 2/3 right',
                    'thirdright' => '2/3 left, 1/3 right',
                    'halfhalf' => 'Half and half',
                ),
                'wrapper' => array (
                    'width' => 60,
                ),
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_fqscmagagaHgNXnwwW1',
                'label' => 'Content above',
                'name' => 'content_above_selection',
                'type' => 'radio',
                'instructions' => 'Content above the two-column area?',
                'required' => 1,
                'choices' => array (
                    'no' => 'No',
                    'yes' => 'Yes'
                ),
                'wrapper' => array (
                    'width' => 40,
                ),
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_fqscmHNXnwwW12ga',
                'label' => 'Content above',
                'name' => 'content_above',
                'type' => 'wysiwyg',
                'conditional_logic' => array (
    				array (
    					array (
    						'field' => 'field_fqscmagagaHgNXnwwW1',
    						'operator' => '==',
    						'value' => 'yes',
    					),
    				),
    			),
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_fqscmHNXnwwW1',
                'label' => 'Content',
                'name' => 'content_one',
                'type' => 'wysiwyg',
                'wrapper' => array (
                    'width' => 50,
                ),
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_fqscmHNXnwgagawW1',
                'label' => 'Content',
                'name' => 'content_two',
                'type' => 'wysiwyg',
                'wrapper' => array (
                    'width' => 50,
                ),
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_fqscmHNXnwwW2',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 50,
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_fqscmHNXnwwW3',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'wrapper' => array (
                    'width' => '50',
                ),
                'placeholder' => 'section-class another-class',
            ),
        ),
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_two_column', 10, 4 );
function redblue_section_markup_two_column( $id, $count, $case, $context_prefix ) {

	if ( $case != 'two_column' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = get_post_meta( $id, $context_prefix . $count . '_alignment', true );

    //* Get the background image information
    $imageid = (int) get_post_meta( $id, $context_prefix . $count . '_background', true );

    if ( $imageid ) {
        $imageurlarray = wp_get_attachment_image_src( $imageid, 'background-fullscreen' );
        $imageurl = $imageurlarray[0];
    }

    //* If there's a background image, then add a class to account for that
    if ( $imageid )
        $class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content_above = get_post_meta( $id, $context_prefix . $count . '_content_above', true );
	$content_above = apply_filters( 'the_content', $content_above );

	$content_one = get_post_meta( $id, $context_prefix . $count . '_content_one', true );
	$content_one = apply_filters( 'the_content', $content_one );

    $content_two = get_post_meta( $id, $context_prefix . $count . '_content_two', true );
	$content_two = apply_filters( 'the_content', $content_two );

	//* Output the container section
	printf( '<section id="section-%s" class="%s">', $count, $class );

	//* If there's a background image, output that
	if ( $imageid )
		printf( '<div class="background-div" style="background-image:url( %s )"></div>', $imageurl );

		do_action( 'before_inside_section_' . $count );

		echo '<div class="wrap">';

			if ( $content_above )
				printf( '<div class="content_above">%s</div>', $content_above );

	        echo '<div class="column-container">';

	    		printf( '<div class="column"><div class="content-wrap">%s</div></div>', $content_one );
	    		printf( '<div class="column"><div class="content-wrap">%s</div></div>', $content_two );

	        echo '</div>'; // .wrap
		echo '</div>'; // .column-container

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // section.section

}
