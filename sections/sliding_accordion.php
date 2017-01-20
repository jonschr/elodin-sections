<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_sliding_accordion' );
function redblue_section_fields_sliding_accordion( $layouts ) {

    $layouts[] = array (
        'key' => 'tk7eRNKJHuUCwsDYV2z',
        'name' => 'sliding_accordion',
        'label' => 'Sliding Accordion',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_tk7eRNKJHuUCwsDYV2z1',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'placeholder' => 'section-class another-class',
            ),
            array (
                'key' => 'field_tk7eRNKJHuUCwsDYV2z2',
                'label' => 'Tab',
                'name' => 'tab',
                'type' => 'repeater',
                'instructions' => 'Click "add tab" below to add a new accordion tab.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_tk7eRNKJHuUCwsDYV2z3',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add Tab',
                'sub_fields' => array (
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z4',
                        'label' => 'Tab name',
                        'name' => 'name',
                        'type' => 'text',
                        'instructions' => '',
                        'wrapper' => array (
                            'width' => 33.3,
                        ),
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z5',
                        'label' => 'Padding',
                        'name' => 'padding',
                        'type' => 'radio',
                        'instructions' => 'Use default padding on this section?',
                        'required' => 1,
                        'choices' => array (
                            'yes' => 'Default padding',
                            'no' => 'No padding'
                        ),
                        'wrapper' => array (
                            'width' => 33.3,
                        ),
                        'layout' => 'horizontal',
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z6',
                        'label' => 'Tab class',
                        'name' => 'class',
                        'type' => 'text',
                        'placeholder' => 'tab-class another-class',
                        'wrapper' => array (
                            'width' => 33.3,
                        ),
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z7',
                        'label' => 'Tab Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_sliding_accordion', 10, 4 );
function redblue_section_markup_sliding_accordion( $id, $count, $case, $context_prefix ) {

	if ( $case != 'sliding_accordion' )
		return;

    //* Enqueue the scripts
    wp_enqueue_script( 'slick-main' );
    wp_enqueue_script( 'accordion-slider-init' );

    //* Enqueue the styles
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme' );

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    //* Get the classes ready
    $class = implode( ' ', $class );

	//* Get the background image information
	$tabs = get_post_meta( $id, $context_prefix . $count . '_tab', true );

	//* Variables for this section
	// $content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	// $content = apply_filters( 'the_content', $content );

	printf ( '<section id="section-%s" class="%s">', $count, $class );

        echo '<div class="accordion-nav-container"><div class="wrap"><div class="accordion-slider-nav">';

            for ($i=0; $i < $tabs; $i++) {

                //* Get the tab name
                $tab_name = get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_name', true );

                printf( '<div class="slide"><span class="tab-name-wrap">%s</span></div>', $tab_name );
            }

        echo '</div></div></div>';

        echo '<div class="accordion-slider-section-container"><div class="accordion-slider-section">';

            for ($i=0; $i < $tabs; $i++) {

                //* Get the tab name
                $tab_content = get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_content', true );
                $tab_content = apply_filters( 'the_content', $tab_content );

                printf( '<div class="slide"><div class="wrap">%s</div></div>', $tab_content );
            }

        echo '</div></div>';

	echo '</section>'; // .wrap, section.section

}
