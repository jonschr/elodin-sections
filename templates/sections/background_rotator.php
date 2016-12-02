<?php

function rb_section_background_rotator( $id, $count, $case, $context_prefix ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );
	$class[] = 'slick-slider';

	//* Get the background image information
	$image_ids = get_post_meta( $id, $context_prefix . $count . '_backgrounds', true );

	// if ( $image_number )
	// 	$class[] = 'background-image';

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	$repeating_section_count = 0;

	printf ( '<section id="section-%s" class="%s">', $count, $class );

		foreach( $image_ids as $image_id ) {

			if ( $image_id ) {

				$image_url_array = wp_get_attachment_image_src( $image_id, 'full-bkg' );
				$image_url = $image_url_array[0];

				echo '<div class="slide">';

					do_action( 'before_inside_section_' . $count );

					//* Output the background div
					printf( '<div class="background-div" style="background-image:url(%s);"></div>', $image_url );

					//* Output the actual content
					echo '<div class="wrap">';
						printf( '<div class="slide-content">%s</div>', $content );
					echo '</div>'; // .wrap

					do_action( 'after_inside_section_' . $count );

				echo '</div>'; // .slide

			}
		}

	echo '</section>'; // .wrap, section.section

}
