<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_blocks' );
function redblue_section_fields_blocks( $layouts ) {

    $layouts[] = array (
        'key' => 'ZdxPj4vnds2Au',
        'name' => 'blocks',
        'label' => 'Blocks',
        'instructions' => 'This section is for specific use cases we can\'t anticipate – typically, you\'ll add some classes to the section as a whole and to individual blocks to set up an especially custom, flexible section.',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_ZdxPj4vnds2Au1',
                'label' => 'Blocks',
                'name' => 'repeater',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_ZdxPj4vnds2Au2',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add New Block',
                'sub_fields' => array (
                    array (
                        'key' => 'field_ZdxPj4vnds2Au3',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 70,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'item-class another class',
                        'maxlength' => '',
                        'rows' => 8,
                        'new_lines' => 'wpautop',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_ZdxPj4vnds2Au4',
                        'label' => 'Class',
                        'name' => 'class',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 30,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
            ),
            array (
                'key' => 'field_ZdxPj4vnds2Au5',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_blocks', 10, 4 );
function redblue_section_markup_blocks( $id, $count, $case, $context_prefix ) {

	if ( $case != 'blocks' )
		return;

        //* Do the function which figures out which classes we need
    	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    	//* Get the classes ready
    	$class = implode( ' ', $class );

        //* Figure out how many featured items we'll have (to add to the class)
        $featureditems = get_post_meta( $id, $context_prefix . $count . '_repeater', true );

		do_action( 'before_inside_section_' . $count );

		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		if ( $featureditems )
			echo '<div class="items">'; 

				for ( $i=0; $i < $featureditems ; $i++ ) {

                    //* Get the class of the individual item
                    $itemclass = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_class', true );

                    printf( '<div class="item %s"><div class="item-container">', $itemclass );
                        
                        //* Get content information
                        $featured_content = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_content', true );

                        if ( $featured_content )
                            echo apply_filters( 'the_content', $featured_content );

					echo '</div></div>'; // .item-container, .item
				}

		if ( $featureditems )
			echo '</div>'; // .items

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
