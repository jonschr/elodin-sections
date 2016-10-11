<?php

function rb_section_featureditems( $id, $count, $case ) {

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

		do_action( 'before_inside_section_' . $count );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		if ( $content )
			printf( '<div class="featuredcontent">%s</div><div class="clear"></div>', $content );


		$itemsclass[0] = 'items';

		//* Figure out how many featured items we'll have (to add to the class)
		$featureditems = get_post_meta( $id, 'rb_section_' . $count . '_repeater', true );

		if ( ( $featureditems % 4 == 0 ) && !( $featureditems % 3 == 0 ) )
			$itemsclass[] = 'force-four-columns';

		$itemsclass = implode( ' ', $itemsclass );

		if ( $featureditems )
			printf( '<div class="%s">', $itemsclass );

				for ( $i=0; $i < $featureditems ; $i++ ) {

					echo '<div class="item"><div class="item-container">';

						//* Get the video information
						$video = get_post_meta( $id, 'rb_section_' . $count . '_repeater_' . $i . '_video', true );

						if ( $video ) {
							$oembed = wp_oembed_get( $video, array( 'width' => '390', 'height' => '150' ) );
							echo '<div class="embed-container">';
								echo $oembed;
							echo '</div>';
						}

						//* Get the background image information
						$featured_imageid = (int) get_post_meta( $id, 'rb_section_' . $count . '_repeater_' . $i . '_image', true );

						if ( $featured_imageid ) {
							$featured_imageurlarray = wp_get_attachment_image_src( $featured_imageid, array( 390, 150 ) );
							$featured_imageurl = $featured_imageurlarray[0];
						}

						//* Get heading information
						$featured_heading = get_post_meta( $id, 'rb_section_' . $count . '_repeater_' . $i . '_heading', true );

						//* Get content information
						$featured_content = get_post_meta( $id, 'rb_section_' . $count . '_repeater_' . $i . '_content', true );

						//* Get the link information
						$featured_link = get_post_meta( $id, 'rb_section_' . $count . '_repeater_' . $i . '_link', true );

						if ( $featured_imageid && !$video )
							printf( '<div class="flex-featured-image"><img src="%s" /></div>', $featured_imageurl );

						if ( $featured_heading  && !$featured_link )
							printf( '<h3>%s</h3>', $featured_heading );

						if ( $featured_heading  && $featured_link )
							printf( '<h3><a href="%s">%s</a></h3>', $featured_heading, $featured_link );

						if ( $featured_content )
							echo apply_filters( 'the_content', $featured_content );

						if ( $featured_imageid )
							printf( '<div class="featured-image-bkg" style="background-image:url(%s);"></div>', $featured_imageurl );

					echo '</div></div>'; // .item-container, .item
				}

		if ( $featureditems )
			echo '</div>'; // .items

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section


}
