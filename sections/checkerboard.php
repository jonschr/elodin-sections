<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_checkerboard' );
function redblue_section_fields_checkerboard( $layouts ) {

    $layouts[] = array (
        'key' => '57ec236529c66',
        'name' => 'checkerboard',
        'label' => 'Checkerboard',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57ec238829c6a',
                'label' => 'Alignment',
                'name' => 'alignment',
                'type' => 'radio',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    'left' => 'Content left',
                    'right' => 'Content right',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_57ec238829c6234a',
                'label' => 'Width',
                'name' => 'width',
                'type' => 'radio',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    'default-width' => 'Normal',
                    'wide' => 'Extra Wide',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_57ec236529c67',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 75,
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_57ec236529c68',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 25,
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_57ec236529c69',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_checkerboard', 10, 4 );
function redblue_section_markup_checkerboard( $id, $count, $case, $context_prefix ) {

	if ( $case != 'checkerboard' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = get_post_meta( $id, $context_prefix . $count . '_alignment', true );
    $class[] = get_post_meta( $id, $context_prefix . $count . '_width', true );

	//* Get the background image information
	$image = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_background', true ) );

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Output the container section
	printf( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		printf( '<div class="checkerboard-image" style="background-image: url(%s)"></div>', $image );
		printf( '<div class="checkerboard-content"><div class="content-wrap">%s</div></div>', $content );

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section

}
