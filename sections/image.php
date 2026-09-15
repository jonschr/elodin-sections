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
                'label' => 'Desktop Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => 'This image should be a minimum of 1800px wide. It will maintain its aspect ratio and is used on mobile when no mobile image is supplied.',
                'wrapper' => array (
                    'width' => 30,
                ),
                'preview_size' => 'medium',
                'min_width' => '1600',
                'min_height' => '150',
            ),
            array (
                'key' => 'field_ztViAyUZUXN6ZV4',
                'label' => 'Mobile Image',
                'name' => 'mobile_background',
                'type' => 'image',
                'instructions' => 'Optional image shown below 768px wide.',
                'wrapper' => array (
                    'width' => 30,
                ),
                'preview_size' => 'medium',
            ),
            array (
                'key' => 'field_ztViAyUZUXN6ZV2',
                'label' => 'Overlay Content',
                'name' => 'overlay',
                'type' => 'wysiwyg',
                'wrapper' => array (
                    'width' => 40,
                ),
            ),
            array (
                'key' => 'field_ztViAyUZUXN6ZV5',
                'label' => 'Overlay Vertical Position',
                'name' => 'overlay_position',
                'type' => 'select',
                'choices' => array (
                    'center' => 'Center',
                    'top' => 'Near Top',
                    'bottom' => 'Near Bottom',
                ),
                'default_value' => 'center',
                'wrapper' => array (
                    'width' => 30,
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
	$mobile_imageid = (int) get_post_meta( $id, $context_prefix . $count . '_mobile_background', true );
	$mobile_image = $mobile_imageid ? wp_get_attachment_image_src( $mobile_imageid, 'full' ) : false;
	$mobile_srcset = $mobile_imageid ? wp_get_attachment_image_srcset( $mobile_imageid, 'full' ) : '';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$overlay = get_post_meta( $id, $context_prefix . $count . '_overlay', true );
	$overlay = apply_filters( 'the_content', $overlay );
	$overlay_position = sanitize_html_class( get_post_meta( $id, $context_prefix . $count . '_overlay_position', true ) );

	//* Markup for this section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

        if ( $imageid ) {
            echo '<div class="image-container"><picture>';

                if ( $mobile_image && $mobile_srcset )
                    printf( '<source media="(max-width: 767px)" srcset="%s" width="%d" height="%d">', esc_attr( $mobile_srcset ), $mobile_image[1], $mobile_image[2] );

                echo wp_get_attachment_image( $imageid, 'full', false, array( 'class' => 'the-image' ) );

            echo '</picture></div>';
        }

		if ( $overlay )
			printf( '<div class="overlay overlay-%s"><div class="wrap">%s</div></div>', esc_attr( $overlay_position ), $overlay );

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section

}
