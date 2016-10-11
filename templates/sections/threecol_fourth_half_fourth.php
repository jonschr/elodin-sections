<?php

function rb_section_threecol_fourth_half_fourth( $id, $count, $case ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case );

	//* Get the background image information
	$imageid = (int) get_post_meta( $id, 'rb_section_' . $count . '_background', true );

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
	$headercontent = get_post_meta( $id, 'rb_section_' . $count . '_headercontent', true );
	$headercontent = apply_filters( 'the_content', $headercontent );

	$contentleft = get_post_meta( $id, 'rb_section_' . $count . '_contentleft', true );
	$contentleft = apply_filters( 'the_content', $contentleft );

	$contentcenter = get_post_meta( $id, 'rb_section_' . $count . '_contentcenter', true );
	$contentcenter = apply_filters( 'the_content', $contentcenter );

	$contentright = get_post_meta( $id, 'rb_section_' . $count . '_contentright', true );
	$contentright = apply_filters( 'the_content', $contentright );

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

	do_action( 'before_inside_section_' . $count );

	if ( $headercontent )
		printf( '<div class="header-content">%s</div>', $headercontent );

	printf( '<div class="content-thirds-container"><div class="one-fourth first">%s</div><div class="one-half">%s</div><div class="one-fourth">%s</div></div>', $contentleft, $contentcenter, $contentright );

	do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section


}
