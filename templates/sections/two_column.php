<?php

function rb_section_two_column( $id, $count, $case, $context_prefix ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = get_post_meta( $id, $context_prefix . $count . '_alignment', true );

    //* Get the background image information
    $imageid = (int) get_post_meta( $id, $context_prefix . $count . '_background', true );

    if ( $imageid ) {
        $imageurlarray = wp_get_attachment_image_src( $imageid, array( 1600, 1000 ) );
        $imageurl = $imageurlarray[0];
    }

    //* If there's a background image, then add a class to account for that
    if ( $imageid )
        $class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content_above = get_post_meta( $id, $context_prefix . $count . '_content_above', true );
	$content_above = apply_filters( 'the_content', $content_above );

	$content_one = get_post_meta( $id, $context_prefix . $count . '_content_one', true );
	$content_one = apply_filters( 'the_content', $content_one );

    $content_two = get_post_meta( $id, $context_prefix . $count . '_content_two', true );
	$content_two = apply_filters( 'the_content', $content_two );

	//* Output the container section
	printf( '<section id="section-%s" class="%s">', $count, $class );

	//* If there's a background image, output that
	if ( $imageid )
		printf( '<div class="background-div" style="background-image:url( %s )"></div>', $imageurl );

		do_action( 'before_inside_section_' . $count );

		echo '<div class="wrap">';

			if ( $content_above )
				printf( '<div class="content_above">%s</div>', $content_above );

	        echo '<div class="column-container">';

	    		printf( '<div class="column"><div class="content-wrap">%s</div></div>', $content_one );
	    		printf( '<div class="column"><div class="content-wrap">%s</div></div>', $content_two );

	        echo '</div>'; // .wrap
		echo '</div>'; // .column-container

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // section.section
}
