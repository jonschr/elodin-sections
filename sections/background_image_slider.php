<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_image_slider' );
function redblue_section_fields_background_image_slider( $layouts ) {

    $layouts[] = array (
        'key' => 'DvbTDAJyq8WaWFLiXH6',
        'name' => 'background_image_slider',
        'label' => 'Background Image Slider',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_DvbTDAJyq8WaWFLiXH64',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'placeholder' => 'section-class another-class',
            ),
            array (
                'key' => 'field_DvbTDAJyq8WaWFLiXH61',
                'label' => 'Slide',
                'name' => 'slide',
                'type' => 'repeater',
                'instructions' => 'Click "add slide" below to add a new slide. These slides have independent content on a per-slide basis.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_DvbTDAJyq8WaWFLiXH63',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add Slide',
                'sub_fields' => array (
                    array (
                        'key' => 'field_DvbTDAJyq8WaWFLiXH62',
                        'label' => 'Slide Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'wrapper' => array (
                            'width' => 70,
                        ),
                    ),
                    array (
                        'key' => 'field_DvbTDAJyq8WaWFLiXH63',
                        'label' => 'Slide image',
                        'name' => 'image',
                        'type' => 'image',
                        'wrapper' => array (
                            'width' => 30,
                        ),
                        'instructions' => '',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                    array (
                        'key' => 'field_DvbTDAJyq8WaWFLiXH65',
                        'label' => 'Slide class',
                        'name' => 'class',
                        'type' => 'text',
                        'placeholder' => 'slide-class another-class',
                    ),
                ),
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_background_image_slider', 10, 4 );
function redblue_section_markup_background_image_slider( $id, $count, $case, $context_prefix ) {

	if ( $case != 'background_image_slider' )
		return;

    //* Enqueue the scripts
    // wp_enqueue_script( 'slick-main' );
    wp_enqueue_script( 'background-image-slider-init' );

    //* Enqueue the styles
    // wp_enqueue_style( 'slick-style' );
    // wp_enqueue_style( 'slick-theme' );

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = 'slick-slider';

    //* Get the classes ready
    $class = implode( ' ', $class );

	//* Get the background image information
	$slides = get_post_meta( $id, $context_prefix . $count . '_slide', true );

	//* Variables for this section
	// $content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	// $content = apply_filters( 'the_content', $content );

	printf ( '<section id="section-%s" class="%s">', $count, $class );

		for ( $i=0; $i < $slides; $i++ ) {

            $slide_content = get_post_meta( $id, $context_prefix . $count . '_slide_' . $i . '_content', true );
            $image_id = get_post_meta( $id, $context_prefix . $count . '_slide_' . $i . '_image', true );

            $slide_class = '';
            $slide_class = get_post_meta( $id, $context_prefix . $count . '_slide_' . $i . '_class', true );

			if ( $image_id ) {
				$image_url_array = wp_get_attachment_image_src( $image_id, array( 1600, 1000 ) );
				$image_url = $image_url_array[0];
            }

            if ( $image_url )
    			printf( '<div class="slide has-background %s">', $slide_class );

            if ( !$image_url )
    			printf( '<div class="slide no-background %s">', $slide_class );

    				do_action( 'before_inside_section_' . $count );

    				//* Output the background div
    				if ( $image_url )
        				printf( '<div class="background-div" style="background-image:url(%s);"></div>', $image_url );

                    if ( !$image_url )
        				echo '<div class="background-div"></div>';

    				//* Output the actual content
    				echo '<div class="wrap">';

                        if ( $slide_content )
        					printf( '<div class="slide-content">%s</div>', $slide_content );

    				echo '</div>'; // .wrap

    				do_action( 'after_inside_section_' . $count );

			echo '</div>'; // .slide

		}

	echo '</section>'; // .wrap, section.section

}
