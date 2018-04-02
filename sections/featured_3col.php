<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_3col' );
function redblue_section_fields_featured_3col( $layouts ) {

    $layouts[] = array (
        'key' => 'RjNWCcMfsiEU1',
        'name' => 'featured_3col',
        'label' => 'Three Column',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_RjNWCcMfsiEU2',
                'label' => 'Heading content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU7_left',
                'label' => 'Icon left',
                'name' => 'icon_left',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcasdfggeiEU7_left',
                'label' => 'Background image left',
                'name' => 'image_left',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU7_center',
                'label' => 'Icon center',
                'name' => 'icon_center',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcasdfggeiEU7_center',
                'label' => 'Background image center',
                'name' => 'image_center',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU7_right',
                'label' => 'Icon right',
                'name' => 'icon_right',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcasdfggeiEU7_right',
                'label' => 'Background image right',
                'name' => 'image_right',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 16,
                ),
                'preview_size' => 'thumbnail',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEadsfleft',
                'label' => 'Heading left',
                'name' => 'heading_left',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                ),
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEadsfcenter',
                'label' => 'Heading center',
                'name' => 'heading_center',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                ),
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEadsfright',
                'label' => 'Heading right',
                'name' => 'heading_right',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                ),
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU9left',
                'label' => 'Content left',
                'name' => 'content_left',
                'type' => 'textarea',
                'wrapper' => array (
                    'width' => 32,
                ),
                'rows' => 3,
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU9center',
                'label' => 'Content center',
                'name' => 'content_center',
                'type' => 'textarea',
                'wrapper' => array (
                    'width' => 32,
                ),
                'rows' => 3,
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU9right',
                'label' => 'Content right',
                'name' => 'content_right',
                'type' => 'textarea',
                'wrapper' => array (
                    'width' => 32,
                ),
                'rows' => 3,
                'new_lines' => 'wpautop',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6_left',
                'label' => 'Link left',
                'name' => 'link_left',
                'type' => 'url',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6_center',
                'label' => 'Link center',
                'name' => 'link_center',
                'type' => 'url',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6_right',
                'label' => 'Link right',
                'name' => 'link_right',
                'type' => 'url',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6a_left',
                'label' => 'Button text left',
                'name' => 'button_text_left',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6a_center',
                'label' => 'Button text center',
                'name' => 'button_text_center',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU6a_right',
                'label' => 'Button text right',
                'name' => 'button_text_right',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 32,
                    'class' => '',
                    'id' => '',
                ),
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU10',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'wrapper' => array (
                    'width' => 50,
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_RjNWCcMfsiEU11',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 50,
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_featured_3col', 10, 4 );
function redblue_section_markup_featured_3col( $id, $count, $case, $context_prefix ) {

	if ( $case != 'featured_3col' || is_admin() )
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
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

    //* Get the headings
    $heading_left = get_post_meta( $id, $context_prefix . $count . '_heading_left', true );
    $heading_center = get_post_meta( $id, $context_prefix . $count . '_heading_center', true );
    $heading_right = get_post_meta( $id, $context_prefix . $count . '_heading_right', true );

    //* Get the contents
    $content_left = apply_filters( 'the_content', get_post_meta( $id, $context_prefix . $count . '_content_left', true ) );
    $content_center = apply_filters( 'the_content', get_post_meta( $id, $context_prefix . $count . '_content_center', true ) );
    $content_right = apply_filters( 'the_content', get_post_meta( $id, $context_prefix . $count . '_content_right', true ) );

    //* Get the logos
    $logo_left = get_post_meta( $id, $context_prefix . $count . '_icon_left', true );
	$image_url_array_left = wp_get_attachment_image_src( $logo_left, 'thumbnail' );
	$image_url_left = $image_url_array_left[0];

    $logo_center = get_post_meta( $id, $context_prefix . $count . '_icon_center', true );
	$image_url_array_center = wp_get_attachment_image_src( $logo_center, 'thumbnail' );
	$image_url_center = $image_url_array_center[0];

    $logo_right = get_post_meta( $id, $context_prefix . $count . '_icon_right', true );
	$image_url_array_right = wp_get_attachment_image_src( $logo_right, 'thumbnail' );
	$image_url_right = $image_url_array_right[0];

    //* Get the background images
    $bkg_left = get_post_meta( $id, $context_prefix . $count . '_image_left', true );
	$bkg_array_left = wp_get_attachment_image_src( $bkg_left, 'full' );
	$bkg_left = $bkg_array_left[0];

    $bkg_center = get_post_meta( $id, $context_prefix . $count . '_image_center', true );
	$bkg_array_center = wp_get_attachment_image_src( $bkg_center, 'full' );
	$bkg_center = $bkg_array_center[0];

    $bkg_right = get_post_meta( $id, $context_prefix . $count . '_image_right', true );
	$bkg_array_right = wp_get_attachment_image_src( $bkg_right, 'full' );
	$bkg_right = $bkg_array_right[0];

    //* Get the links
    $url_left = get_post_meta( $id, $context_prefix . $count . '_link_left', true );
    $url_center = get_post_meta( $id, $context_prefix . $count . '_link_center', true );
    $url_right = get_post_meta( $id, $context_prefix . $count . '_link_right', true );

    //* Get the button text
    $button_text_left = get_post_meta( $id, $context_prefix . $count . '_button_text_left', true );
    $button_text_center = get_post_meta( $id, $context_prefix . $count . '_button_text_center', true );
    $button_text_right = get_post_meta( $id, $context_prefix . $count . '_button_text_right', true );

    if ( !$button_text_left )
        $button_text_left = 'Read more';

    if ( !$button_text_center )
        $button_text_center = 'Read more';

    if ( !$button_text_right )
        $button_text_right = 'Read more';

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
			printf( '<div class="section-content">%s</div>', $content );

        echo '<div class="container-3col">';

            echo '<div class="column">';
                printf( '<div class="logo-image" style="background-image:url(%s);"><img src="%s" /></div>', $bkg_left, $image_url_left );
                echo '<div class="content-container">';
                    printf( '<h3 class="column-featured-heading">%s</h3>', $heading_left );
                    printf( '<div class="content">%s</div>', $content_left );

                    if ( $url_left )
                        printf( '<a class="button button-small" href="%s">%s</a>', $url_left, $button_text_left );
                        
                echo '</div>';
            echo '</div>';

            echo '<div class="column">';
                printf( '<div class="logo-image" style="background-image:url(%s);"><img src="%s" /></div>', $bkg_center, $image_url_center );
                echo '<div class="content-container">';
                    printf( '<h3 class="column-featured-heading">%s</h3>', $heading_center );
                    printf( '<div class="content">%s</div>', $content_center );

                    if ( $url_center )
                        printf( '<a class="button button-small" href="%s">%s</a>', $url_center, $button_text_center );

                echo '</div>';
            echo '</div>';

            echo '<div class="column">';
                printf( '<div class="logo-image" style="background-image:url(%s);"><img src="%s" /></div>', $bkg_right, $image_url_right );
                echo '<div class="content-container">';
                    printf( '<h3 class="column-featured-heading">%s</h3>', $heading_right );
                    printf( '<div class="content">%s</div>', $content_right );

                    if ( $url_right )
                        printf( '<a class="button button-small" href="%s">%s</a>', $url_right, $button_text_right );

                echo '</div>';
            echo '</div>';

        echo '</div>';

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section

}
