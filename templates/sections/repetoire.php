<?php

function rb_section_repetoire( $id, $count, $case ) {

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
	$content = get_post_meta( $id, 'rb_section_' . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
			printf( '<div class="section-content">%s</div>', $content );

        $songs = get_post_meta( $id, 'rb_section_' . $count . '_song', true );

        if ( $songs ) {

            echo '<div class="song-container">';

            for( $i = 0; $i < $songs; $i++ ) {

                $songname = get_post_meta( $id, 'rb_section_' . $count . '_song_' . $i .  '_song_title' , true );
                $songartist = get_post_meta( $id, 'rb_section_' . $count . '_song_' . $i . '_artist' , true );

                if ( $songname || $songartist )
                    echo '<div class="song-item">';

                if ( $songname )
                    printf( '<div class="song-inside song-name">%s</div>', $songname );

                if ( $songartist )
                    printf( '<div class="song-inside song-artist">%s</div>', $songartist );

                if ( $songname || $songartist )
                    echo '</div>'; // .song-item

            }

            echo '</div>'; // .song-container

        }

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section


}
