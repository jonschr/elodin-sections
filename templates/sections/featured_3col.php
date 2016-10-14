<?php

function rb_section_featured_3col( $id, $count, $case, $context_prefix ) {

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
                    printf( '<a class="button button-small" href="%s">Read more</a>', $url_left );
                echo '</div>';
            echo '</div>';

            echo '<div class="column">';
                printf( '<div class="logo-image" style="background-image:url(%s);"><img src="%s" /></div>', $bkg_center, $image_url_center );
                echo '<div class="content-container">';
                    printf( '<h3 class="column-featured-heading">%s</h3>', $heading_center );
                    printf( '<div class="content">%s</div>', $content_center );
                    printf( '<a class="button button-small" href="%s">Read more</a>', $url_center );
                echo '</div>';
            echo '</div>';

            echo '<div class="column">';
                printf( '<div class="logo-image" style="background-image:url(%s);"><img src="%s" /></div>', $bkg_right, $image_url_right );
                echo '<div class="content-container">';
                    printf( '<h3 class="column-featured-heading">%s</h3>', $heading_right );
                    printf( '<div class="content">%s</div>', $content_right );
                    printf( '<a class="button button-small" href="%s">Read more</a>', $url_right );
                echo '</div>';
            echo '</div>';

        echo '</div>';

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section


}
