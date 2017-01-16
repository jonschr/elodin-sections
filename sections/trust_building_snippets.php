<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_trust_building_snippets' );
function redblue_section_fields_trust_building_snippets( $layouts ) {

    $layouts[] = array (
        'key' => 'field_KrDToViPTWRa',
        'name' => 'trust_building_snippets',
        'label' => 'Trust Building Snippets',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_gRsYnQjGiHfj',
                'label' => 'Snippets',
                'name' => 'repeater',
                'type' => 'repeater',
                'instructions' => 'Only about 10 words and a small image will likely look good in these sections.',
                'collapsed' => 'field_QdnLmzrUdkrF',
                'min' => '3',
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Add Snippet',
                'sub_fields' => array (
                    array (
                        'key' => 'field_QdnLmzrUdkrF',
                        'label' => 'Snippet',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'toolbar' => 'basic',
                        'media_upload' => 1,
                        'rows' => 3,
                    ),
                ),
            ),
            array (
                'key' => 'field_vUpvZxpGbVDU',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 30,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_PdPRoQYNmBdt',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_trust_building_snippets', 10, 4 );
function redblue_section_markup_trust_building_snippets( $id, $count, $case, $context_prefix ) {

	if ( $case != 'trust_building_snippets' )
		return;

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
	$contents = get_post_meta( $id, $context_prefix . $count . '_repeater', true );

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		do_action( 'before_inside_section_' . $count );

        if ( $contents ) {

			if ( $contents == 3 )
				$classadded = ' three';

			if ( $contents == 4 )
				$classadded = ' four';

			if ( $contents == 5 )
				$classadded = ' five';

            printf( '<div class="contents-container %s">', $classadded );

            for( $i = 0; $i < $contents; $i++ ) {

                $content = apply_filters( 'the_content', get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i .  '_content' , true ) );

                if ( $content )
                    printf( '<div class="snippet-content"><div class="snippet-padding">%s</div></div>', $content );

            }

            echo '</div>'; // .contents-container

        }

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
