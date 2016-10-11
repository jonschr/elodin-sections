<?php

function rb_section_background_video( $id, $count, $case ) {

	//* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case );

	//* Get the background image information
	$video_mp4 = wp_get_attachment_url( get_post_meta( $id, 'rb_section_' . $count . '_video_mp4', true ) );
    $video_webm = wp_get_attachment_url( get_post_meta( $id, 'rb_section_' . $count . '_video_webm', true ) );
	$image_fallback = wp_get_attachment_url( get_post_meta( $id, 'rb_section_' . $count . '_image_fallback', true ) );

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, 'rb_section_' . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Output the container section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
		printf( '<div class="section-content">%s</div>', $content );

			//* Output the video itself
			printf( '<video class="background_video_the_video" autoplay="" muted="" loop="loop" poster="%s" preload="auto" class="video-playing">', $image_fallback );


				if ( $video_mp4 )
					printf( '<source src="%s" type="video/mp4">', $video_mp4 );

				if ( $video_webm )
					printf( '<source src="%s" type="video/webm">', $video_webm );

			echo '</video>';

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section
}
