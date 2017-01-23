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
                'collapsed' => 'field_tk7eRNKJHuUCwsDYV2z4',
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
                        'instructions' => 'Displays in the tab navigation, but not in the section itself.',
                        'wrapper' => array (
                            'width' => 33,
                        ),
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z78',
                        'label' => 'Tab image (optional)',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => 'This displays above the tab name (could be an icon)',
                        'wrapper' => array (
                            'width' => 33,
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
                            'yes' => 'Both',
                            'horizontal' => 'Horizontal',
                            'vertical' => 'Vertical',
                            'no' => 'None'
                        ),
                        'wrapper' => array (
                            'width' => 33,
                        ),
                        'layout' => 'horizontal',
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z7',
                        'label' => 'Tab Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                    ),
                    array (
                        'key' => 'field_tk7eRNKJHuUCwsDYV2z6',
                        'label' => 'Tab class',
                        'name' => 'class',
                        'type' => 'text',
                        'placeholder' => 'tab-class another-class',
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

    //* Enqueue the scripts and styles
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme' );

    wp_enqueue_script( 'slick-main' );
    // wp_enqueue_script( 'accordion-slider-init' . $context_prefix . $count );
    // wp_enqueue_script( 'accordion-slider-init' . $context_prefix . $count, dirname( plugin_dir_url( __FILE__ ) ). '/js/accordion-slider-init.js', array( 'slick-main' ), null );

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    //* Get the classes ready
    $class = implode( ' ', $class );

	//* Get the background image information
	$tabs = get_post_meta( $id, $context_prefix . $count . '_tab', true );

    //* We're getting variables here to connect the javascript with the specific classes used here
    $nav_class = $context_prefix . $count . '_nav';
    $nav_class_with_dot = '.' . $nav_class;
    $content_class = $context_prefix . $count . '_content';
    $content_class_with_dot = '.' . $content_class;

    //* NOTE: We're outputting the script the ugly way below.
    //* I'd love to someday update this enqueuing all of the scripts with wp_localize_script
    //* But in the last version of this attempted that didn't allow for outputting multiple times on the page

    //* Localize the script
    // wp_localize_script( 'accordion-slider-init', 'accordion_vars' . $count,
    //     array(
    //         'navarea_class' => $nav_class_with_dot,
    //         'contentarea_class' => $content_class_with_dot
    //     )
    // );

    ?>
    <script>
    jQuery(document).ready(function($) {

        // console.log( <?php // echo $nav_class_with_dot; ?> );
        // console.log( <?php // echo $content_class_with_dot; ?> );

        $( <?php echo "'" . $content_class_with_dot . "'"; ?> ).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: <?php echo "'" . $nav_class_with_dot . "'"; ?> ,
            focusOnSelect: true,
            fade: false,
            adaptiveHeight: true,
            swipeToSlide: true,
            infinite: true,
        });

        $( <?php echo "'" . $nav_class_with_dot . "'"; ?> ).slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: <?php echo "'" . $content_class_with_dot . "'"; ?>,
            dots: false,
            arrows: true,
            infinite: true,
            focusOnSelect: true,
            swipeToSlide: true,
            centerMode: false,
            adaptiveHeight: true,
            variableWidth: false,
            responsive: [{
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

    });
    </script>

    <?php
	printf ( '<section id="section-%s" class="%s">', $count, $class );

        //* Output the area, adding the nav_class so that we can have multiples areas on a page
        printf( '<div class="accordion-nav-container"><div class="wrap"><div class="accordion-slider-nav %s">', $nav_class );

            for ($i=0; $i < $tabs; $i++) {

                //* Get the image url if there is one
                $image = wp_get_attachment_image_src( get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_image', true ), 'medium' );

                //* Get the tab name
                $tab_name = get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_name', true );
                $number = $i;

                if ( !$image )
                    printf( '<div class="slide" id="nav-%s"><span class="tab-name-wrap">%s</span></div>', $i, $tab_name );

                if ( $image )
                    printf( '<div class="slide" id="nav-%s"><div class="tab-icon" style="background-image:url(%s)"></div><span class="tab-name-wrap">%s</span></div>', $i, $image[0], $tab_name );
            }

        echo '</div></div></div>';

        //* Output the area, adding the content_class so that we can have multiples areas on a page
        printf( '<div class="accordion-slider-section-container"><div class="accordion-slider-section %s">', $content_class );

            for ($i=0; $i < $tabs; $i++) {

                //* Get the tab name
                $tab_content = get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_content', true );
                $tab_content = apply_filters( 'the_content', $tab_content );

                $padding = get_post_meta( $id, $context_prefix . $count . '_tab_' . $i . '_padding', true );
                $number = $i;

                if ( $padding == 'yes' || $padding == 'vertical' )
                    printf( '<div class="slide" id="tab-%s">',  $id );

                if ( $padding == 'no' || $padding == 'horizontal' )
                    printf( '<div class="slide no-padding" id="tab-%s">',  $id );

                    if ( $tab_content && ( $padding == 'yes' || $padding == 'horizontal' ) )
                        printf( '<div class="wrap">%s</div>', $tab_content );

                    if ( $tab_content && ( $padding == 'no' || $padding == 'vertical' ) )
                        printf( '<div class="alt-wrap">%s</div>', $tab_content );

                    //* Allow a theme to hook in if we wanted to do a loop or something here
                    do_action( 'redblue_section_tab_' . $i . '_content' );

                echo '</div>';

            }

        echo '</div></div>';

	echo '</section>'; // .wrap, section.section

}
