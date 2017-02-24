<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_rotator' );
function redblue_section_fields_background_rotator( $layouts ) {

    $layouts[] = array (
        'key' => '57a3dc7ce8c04',
    	'name' => 'background_rotator',
    	'label' => 'Background Rotator',
    	'display' => 'block',
    	'sub_fields' => array (
    		array (
    			'key' => 'field_57a3dc7ce8c05',
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
    			'key' => 'field_57a3dc7ce8c07',
    			'label' => 'Class',
    			'name' => 'class',
    			'type' => 'text',
    			'instructions' => '',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array (
    				'width' => 100,
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
    		array (
    			'key' => 'field_57a3dca1e8c08',
    			'label' => 'Background images',
    			'name' => 'backgrounds',
    			'type' => 'gallery',
    			'instructions' => '',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array (
    				'width' => '',
    				'class' => '',
    				'id' => '',
    			),
    			'min' => 1,
    			'max' => 10,
    			'preview_size' => 'thumbnail',
    			'insert' => 'append',
    			'library' => 'all',
    			'min_width' => '',
    			'min_height' => '',
    			'min_size' => '',
    			'max_width' => '',
    			'max_height' => '',
    			'max_size' => '',
    			'mime_types' => '',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_background_rotator', 10, 4 );
function redblue_section_markup_background_rotator( $id, $count, $case, $context_prefix ) {

	if ( $case != 'background_rotator' )
		return;

    //* Enqueue the scripts
    wp_enqueue_script( 'slick-main' );
    wp_enqueue_script( 'background-rotator-init' );

    //* Enqueue the styles
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme' );

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = 'slick-slider';

	//* Get the background image information
	$image_ids = get_post_meta( $id, $context_prefix . $count . '_backgrounds', true );

	// if ( $image_number )
	// 	$class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	$repeating_section_count = 0;

	printf ( '<section id="section-%s" class="%s">', $count, $class );

		foreach( $image_ids as $image_id ) {

			if ( $image_id ) {

				$image_url_array = wp_get_attachment_image_src( $image_id, 'background-fullscreen' );
				$image_url = $image_url_array[0];

				echo '<div class="slide">';

					do_action( 'before_inside_section_' . $count );

					//* Output the background div
					printf( '<div class="background-div" style="background-image:url(%s);"></div>', $image_url );

					//* Output the actual content
					echo '<div class="wrap">';
						printf( '<div class="slide-content">%s</div>', $content );
					echo '</div>'; // .wrap

					do_action( 'after_inside_section_' . $count );

				echo '</div>'; // .slide

			}
		}

	echo '</section>'; // .wrap, section.section

}
