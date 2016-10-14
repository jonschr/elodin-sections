<?php

function rb_section_trust_building_snippets( $id, $count, $case, $context_prefix ) {

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
