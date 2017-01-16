<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_testimonials_slider' );
function redblue_section_fields_testimonials_slider( $layouts ) {

    $layouts[] = array (
        'key' => '57f4036d0bda1',
        'name' => 'testimonials_slider',
        'label' => 'Testimonials Slider',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57f4036d0bda2',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_57f4036d0bda3',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 30,
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array (
                'key' => 'field_57f4036d0bda4',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 70,
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'section-class another-class',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'readonly' => 0,
                'disabled' => 0,
            ),
        ),
        'min' => '',
        'max' => '',
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_testimonials_slider', 10, 4 );
function redblue_section_markup_testimonials_slider( $id, $count, $case, $context_prefix ) {

	if ( $case != 'testimonials_slider' )
		return;

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

			wp_enqueue_style( 'testimonials-style' );

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
