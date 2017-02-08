<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_scrollspy_nav' );
function redblue_section_fields_scrollspy_nav( $layouts ) {

    $layouts[] = array (
        'key' => 'YAegE77WAk',
        'name' => 'scrollspy_nav',
        'label' => 'Scrollspy Fixed Navigation',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_YAegE77WAk2',
                'label' => 'Menu item',
                'name' => 'scrollspy_item',
                'type' => 'repeater',
                'instructions' => 'Click "add menu item" to add menu items.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_YAegE77WAk3',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add Slide',
                'sub_fields' => array (
                    array (
                        'key' => 'field_YAegE77WAk3',
                        'label' => 'Label',
                        'name' => 'scrollspy_label',
                        'type' => 'text',
                        'instructions' => 'This is the label for your navigation link (you\'ll want to keep it short)',
                        'wrapper' => array (
                            'width' => 20,
                        ),
                    ),
                    array (
                        'key' => 'field_YAegE77WAk4',
                        'label' => 'Link',
                        'name' => 'scrollspy_link',
                        'type' => 'url',
                        'wrapper' => array (
                            'width' => 60,
                        ),
                        'instructions' => 'To make this work properly, link to the section itself, e.g. http://yoursite.com/this-page/#section-0. NOTE: If sections move, you may need to update these links.',
                    ),
                    array (
                        'key' => 'field_YAegE77WAk5',
                        'label' => 'Icon (optional)',
                        'name' => 'scrollspy_image',
                        'type' => 'image',
                        'wrapper' => array (
                            'width' => 20,
                        ),
                        'instructions' => '',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                ),
            ),
            array (
                'key' => 'field_YAegE77WAk1',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_scrollspy_nav', 10, 4 );
function redblue_section_markup_scrollspy_nav( $id, $count, $case, $context_prefix ) {

    if ( $case != 'scrollspy_nav' )
        return;

    //* Enqueue the scripts
    wp_enqueue_script( 'scrollspy' );
    wp_enqueue_script( 'sections-smoothscroll' );

    //* Do the function which figures out which classes we need
    $class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    //* Get the classes ready
    $class = implode( ' ', $class );

    //* Get the background image information
    $items = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item', true );

    //* Variables for this section
    // $content = get_post_meta( $id, $context_prefix . $count . '_content', true );
    // $content = apply_filters( 'the_content', $content );

    printf ( '<div id="scrollspy-nav-container" class="%s">', $count, $class );
            
        do_action( 'before_inside_section_' . $count );

        echo '<ul id="scrollspy-nav">';

        for ( $i=0; $i < $items; $i++ ) {

            $link = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_link', true );
            $label = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_label', true );
            $image_id = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_image', true );

            if ( $image_id ) {
                $image_url_array = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_url = $image_url_array[0];
            }

            if ( $link && $label ) {
                printf( '<li class="scrollspy-nav-item"><a href="%s">%s</a></li>', $link, $label );
            }
        }

        echo '</ul>';

        do_action( 'after_inside_section_' . $count );

    echo '</div>'; // .wrap, section.section

}
