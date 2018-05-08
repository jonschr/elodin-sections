<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_items_carousel' );
function redblue_section_fields_featured_items_carousel( $layouts ) {

    $layouts[] = array (
        'key' => '9jJg6BQ42JuEAAA',
        'name' => 'featured_items_carousel',
        'label' => 'Featured Item Carousel',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_9jJg6BQ42JuE1',
                'label' => 'Content above',
                'name' => 'content_above_selection',
                'type' => 'radio',
                'instructions' => 'Content above the featured items carousel?',
                'required' => 1,
                'choices' => array (
                    'no' => 'No',
                    'yes' => 'Yes'
                ),
                'wrapper' => array (
                    'width' => '',
                ),
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_9jJg6BQ42JuE11',
                'label' => 'Content above',
                'name' => 'content_above',
                'type' => 'wysiwyg',
                'wrapper' => array (
                    'class' => 'acf-limit-height',
                ),
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_9jJg6BQ42JuE1',
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
                'key' => 'field_9jJg6BQ42JuE2',
                'label' => 'Featured Item',
                'name' => 'repeater',
                'type' => 'repeater',
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_9jJg6BQ42JuE3',
                'layout' => 'block',
                'button_label' => 'Add Featured Item',
                'sub_fields' => array (
                    array (
                        'key' => 'field_9jJg6BQ42JuE4',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'wrapper' => array (
                            'width' => '20',
                            'class' => 'acf-limit-height'
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_9jJg6BQ42JuE5',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'wrapper' => array (
                            'width' => '80',
                            'class' => 'acf-limit-height'
                        ),
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                ),
            ),
            array (
                'key' => 'field_9jJg6BQ42JuE6',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 30,
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_9jJg6BQ42JuE7',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 70,
                ),
                'default_value' => '',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_featured_items_carousel', 10, 4 );
function redblue_section_markup_featured_items_carousel( $id, $count, $case, $context_prefix ) {

	if ( $case != 'featured_items_carousel' )
		return;

    //* Enqueue the scripts
    wp_enqueue_script( 'slick-main' );

    //* Enqueue the styles
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme' );
    wp_enqueue_style( 'dashicons' );

    $rand = rand( 1, 5000 );

    ?>
    <script>
    jQuery(document).ready(function( $ ) {
        $('#featured-item-carousel-<?php echo $rand; ?>').slick({
            dots: false,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            speed: 2000,
            fade: false,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                breakpoint: 600,
                    settings: {
                        dots: false,
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
    </script>
    <?php

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the background image information
	$imageid = (int) get_post_meta( $id, $context_prefix . $count . '_background', true );

	if ( $imageid ) {
		$imageurlarray = wp_get_attachment_image_src( $imageid, 'full-bkg' );
		$imageurl = $imageurlarray[0];
	}

	//* If there's a background image, then add a class to account for that
	if ( $imageid )
		$class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );


	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

    if ( !$imageid )
        printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );
		
        do_action( 'before_inside_section_' . $count );

		if ( $content )
			printf( '<div class="featuredcontent">%s</div><div class="clear"></div>', $content );


		$itemsclass[0] = 'items';

		//* Figure out how many featured items we'll have (to add to the class)
		$featureditems = get_post_meta( $id, $context_prefix . $count . '_repeater', true );

		if ( ( $featureditems % 4 == 0 ) && !( $featureditems % 3 == 0 ) )
			$itemsclass[] = 'force-four-columns';

		$itemsclass = implode( ' ', $itemsclass );

		if ( $featureditems )
			printf( '<div id="featured-item-carousel-%s" class="%s">', $rand, $itemsclass );

				for ( $i=0; $i < $featureditems ; $i++ ) {

					echo '<div class="slide"><div class="slide-container">';

						//* Get the background image information
						$featured_imageid = (int) get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_image', true );

						if ( $featured_imageid ) {
							$featured_imageurlarray = wp_get_attachment_image_src( $featured_imageid, 'large' );
							$featured_imageurl = $featured_imageurlarray[0];
						}

						//* Get content information
						$featured_content = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_content', true );

						//* Get the link information
						$featured_link = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_link', true );

						if ( $featured_imageid && !$video )
							printf( '<div class="flex-featured-image"><img src="%s" /></div>', $featured_imageurl );

						if ( $featured_heading )
							printf( '<h3>%s</h3>', $featured_heading );

						if ( $featured_content )
							echo apply_filters( 'the_content', $featured_content );

						// if ( $featured_imageid )
						// 	printf( '<div class="featured-image-bkg" style="background-image:url(%s);"></div>', $featured_imageurl );

						if ( $featured_link )
							printf( '</a>', $featured_link );

					echo '</div></div>'; // .item-container, .item
				}

		if ( $featureditems )
			echo '</div>'; // .items

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
