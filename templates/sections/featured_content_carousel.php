<?php

function rb_section_featured_content_carousel( $id, $count, $case, $context_prefix ) {

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

	//* Query details
	$post_type = get_post_meta( $id, $context_prefix . $count . '_content_type', true );
	$number_of_posts = get_post_meta( $id, $context_prefix . $count . '_items_to_display', true );
	$show_the_content = get_post_meta( $id, $context_prefix . $count . '_show_the_content', true );
	$link_to_item = get_post_meta( $id, $context_prefix . $count . '_link_to_item', true );
	$show_featured_image = get_post_meta( $id, $context_prefix . $count . '_show_featured_image', true );

	//* Markup for this section
	if ( $imageid )
		printf ( '<section id="section-%s" class="%s"><div class="background-div" style="background-image:url(%s)"></div><div class="wrap">', $count, $class, $imageurl );

	if ( !$imageid )
		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
			printf( '<div class="featuredcontent">%s</div><div class="clear"></div>', $content );

		//* Loop options
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $number_of_posts,
		);

		// The Query
		$cpt_query = new WP_Query( $args );

		// The Loop
		if ( $cpt_query->have_posts() ) {

			echo '<div class="featured-content-carousel-container"><div id="featured-content-carousel" class="loop-container">';

				while ( $cpt_query->have_posts() ) {

					$cpt_query->the_post();
					global $post;

					$title = get_the_title();
					$permalink = get_the_permalink();

					$image_id = get_post_thumbnail_id( $post->ID );
					$image_url_array = wp_get_attachment_image_src( $image_id, array( 600, 400, true ) );
					$background_image = $image_url_array[0];

					?>

					<div class="item">
						<?php
							echo '<div class="post-content">';

								//* Optionally, output the featured image
								if ( $show_featured_image == 'yes' && ( $link_to_item == 'yes' || $link_to_item == 'read more' ) )
									printf( '<a class="featured-image" href="%s" style="background-image:url(%s)"></a>', $permalink, $background_image );

								//* Output the featured image, no link
								if ( $show_featured_image == 'yes' && $link_to_item == 'no' )
									printf( '<div class="featured-image" style="background-image:url(%s)"></div>', $background_image );

								echo '<div class="the-content">';

									//* The title, linked
									if ( $link_to_item == 'yes' || $link_to_item == 'read more' )
										printf( '<h3 class="featured-content-heading"><a href="%s">%s</a></h3>', $permalink, $title );

									//* The title, unlinked
									if ( $link_to_item == 'no' )
										printf( '<h3 class="featured-content-heading">%s</h3>', $title );

									//* Optionally output the content
									if ( $show_the_content == 'yes' )
										echo wp_trim_words( get_the_content(), 15 );

									if ( current_user_can( 'edit_posts') )
										edit_post_link( 'Edit', '<p><small>', '</small></p>', '' );

								echo '</div>'; // .the-content
							echo '</div>'; // .post-content
						?>

					</div>

					<?php
				}

			echo '</div></div>';

		} else {
			echo 'No posts of this type found...';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

		do_action( 'after_inside_section_' . $count );

	echo '</div></section>'; // .wrap, section.section


}
