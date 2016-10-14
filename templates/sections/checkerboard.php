<?php

function rb_section_checkerboard( $id, $count, $case, $context_prefix ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = get_post_meta( $id, $context_prefix . $count . '_alignment', true );

	//* Get the background image information
	$image = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_background', true ) );

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Output the container section
	printf( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		printf( '<div class="checkerboard-image" style="background-image: url(%s)"></div>', $image );
		printf( '<div class="checkerboard-content"><div class="content-wrap">%s</div></div>', $content );

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section
}
