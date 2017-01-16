<?php

function rb_section_google_maps( $id, $count, $case, $context_prefix ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the classes ready
	$class = implode( ' ', $class );

    $embed = get_post_meta( $id, $context_prefix . $count . '_embed', true );

	//* Markup for this section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

        echo '<div id="google-maps">';

            if ( $embed )
                echo $embed;

        echo '</div>';

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section


}
