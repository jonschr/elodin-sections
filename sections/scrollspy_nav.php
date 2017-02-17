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
                'key' => 'field_YAegE77WAk7',
                'label' => 'Image type',
                'name' => 'scrollspy_image_type',
                'type' => 'radio',
                'layout' => 'horizontal',
                'choices' => array(
                    'none' => 'None',
                    'scrollspy_icons' => 'Icons (through <a target="_blank" href="http://fontawesome.io/icons/">Font Awesome</a>)',
                    'scrollspy_images' => 'Images',
                ),
                'wrapper' => array (
                    'width' => 50,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_YAegE77WAk8',
                'label' => 'Image layout',
                'name' => 'scrollspy_image_layout',
                'type' => 'radio',
                'layout' => 'horizontal',
                'choices' => array(
                    'icons_left' => 'Icons left of label',
                    'icons_above' => 'Icons above label',
                ),
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_YAegE77WAk7',
                            'operator' => '!=',
                            'value' => 'none',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => 50,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_YAegE77WAk115',
                'label' => 'Height of fixed-position elements',
                'instructions' => 'If you have a header which is stays at the top of the page when scrolling, please enter the height of that header while scrolled here (no need to include the height of <em>this</em> menu, as that\'s already taken into account.',
                'name' => 'scrollspy_fixed_height',
                'type' => 'number',
                'placeholder' => '',
            ),
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
                'button_label' => 'Add link',
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
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => 40,
                        ),
                        'instructions' => 'Enter the id of the element we\'re linking to, e.g. \'section-1\'',
                    ),
                    array (
                        'key' => 'field_YAegE77WAk5',
                        'label' => 'Image',
                        'name' => 'scrollspy_image',
                        'type' => 'image',
                        'wrapper' => array (
                            'width' => 40,
                        ),
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_YAegE77WAk7',
                                    'operator' => '==',
                                    'value' => 'scrollspy_images',
                                ),
                            ),
                        ),
                        'instructions' => 'Hint: If you\'re using the <a href="https://wordpress.org/plugins/safe-svg/" target="_blank">Safe SVG plugin</a>, you can use an SVG icon here.',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ),
                    array (
                        'key' => 'field_YAegE77WAk6',
                        'label' => 'Icon',
                        'name' => 'scrollspy_icon',
                        'instructions' => 'Add the name of the icon from <a target="_blank" href="http://fontawesome.io/icons/">Font Awesome</a>, e.g. <em>\'envelope\'</em> or <em>\'facebook-official\'</em>',
                        'type' => 'text',
                        'wrapper' => array (
                            'width' => 40,
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_YAegE77WAk7',
                                    'operator' => '==',
                                    'value' => 'scrollspy_icons',
                                ),
                            ),
                        ),
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

    $scrollspy_fixed_height = get_post_meta( $id, $context_prefix . $count . '_scrollspy_fixed_height', true );

    if ( $scrollspy_fixed_height == null )
        $scrollspy_fixed_height = 0;

    // Localize the script with new data
    $translation_array = array(
        'height_of_div' => $scrollspy_fixed_height,
    );
    wp_localize_script( 'ddscrollspy-init', 'passed_vars', $translation_array );

    //* Enqueue the scripts
    // wp_enqueue_script( 'throttle' );
    wp_enqueue_script( 'ddscrollspy' );
    wp_enqueue_script( 'ddscrollspy-init' );
    // wp_enqueue_script( 'sections-smoothscroll' );

    $image_display = get_post_meta( $id, $context_prefix . $count . '_scrollspy_image_type', true );
    $image_layout = get_post_meta( $id, $context_prefix . $count . '_scrollspy_image_layout', true );

    if ( $image_display == 'scrollspy_icons' )
        wp_enqueue_style( 'font-awesome' );

    //* Do the function which figures out which classes we need
    $class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    //* Add a class for the image layout option so that we can style accordingly
    $class[] = $image_layout;

    //* Get the classes ready
    $class = implode( ' ', $class );

    //* Get the background image information
    $items = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item', true );

    printf ( '<div id="scrollspy-nav-container" class="%s">', $class );
            
        do_action( 'before_inside_section_' . $count );

        echo '<ul id="scrollspy-nav" class="not-fixed">';

        for ( $i=0; $i < $items; $i++ ) {

            $link = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_link', true );
            
            //* Add a hash sign before the ID
            $link = '#' . $link;

            $label = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_label', true );
            $icon = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_icon', true );
            $image_id = get_post_meta( $id, $context_prefix . $count . '_scrollspy_item_' . $i . '_scrollspy_image', true );

            if ( $image_id ) {
                $image_url_array = wp_get_attachment_image_src( $image_id, 'medium' );
                $image_url = $image_url_array[0];
            }

            if ( $link && $label )
                printf( '<li class="scrollspy-nav-item"><a href="%s">', $link );

                if ( ( $image_display == 'scrollspy_icons' && $icon ) || ( $image_display == 'scrollspy_images' && $image_id ) )
                    echo '<span class="icon">';

                    if ( $image_display == 'scrollspy_icons' && $icon )
                        printf( '<i class="fa fa-%s" aria-hidden="true"></i>', $icon );

                    if ( $image_display == 'scrollspy_images' && $image_id )
                        printf( '<span class="icon-image" style="background-image:url(%s)"></span>', $image_url );

                if ( ( $image_display == 'scrollspy_icons' && $icon ) || ( $image_display == 'scrollspy_images' && $image_id ) )
                    echo '</span>';

                if ( $label )
                    echo $label;

            if ( $link && $label )
                echo '</a></li>';
        }

        echo '</ul>';

        do_action( 'after_inside_section_' . $count );

    echo '</div>'; // .wrap, section.section

}
