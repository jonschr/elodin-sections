<?php

function rb_section_testimonials_slider( $id, $count, $case ) {

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
			printf( '<div class="featuredcontent">%s</div><div class="clear"></div>', $content );

		$args = array(
			'post_type' => 'testimonials',
			'posts_per_page' => 5,
		);

		// The Query
		$cpt_query = new WP_Query( $args );

		// The Loop
		if ( $cpt_query->have_posts() ) {

			echo '<div class="testimonial-slider-container"><div id="testimonial-slider" class="loop-container">';

				while ( $cpt_query->have_posts() ) {

					$cpt_query->the_post();

					global $post;

					// $title = get_the_title();
					$title = get_post_meta( get_the_ID(), '_rbt_testimonials_title', true );

					?>

					<div class="item">
						<?php
							echo '<div class="post-content">';
								echo wp_trim_words( get_the_content(), 70 );
								// the_content( 'Read more...' );

								if ( current_user_can( 'edit_posts') )
									edit_post_link( 'Edit testimonial', '<small>', '</small>', '' );

							echo '</div>';
						?>
						<cite class="testimonials-author">
							<span class="testimonials-name"><?php the_title(); ?></span>
							<span class="testimonials-title"><?php echo $title; ?></span>
						</cite>
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
