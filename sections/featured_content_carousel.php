<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_content_carousel' );
function redblue_section_fields_featured_content_carousel( $layouts ) {

    $layouts[] = array (
        'key' => 'YBinxxpagazJfud',
        'name' => 'featured_content_carousel',
        'label' => 'Featured Content Carousel',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_YBinxxpzJfuda2',
                'label' => 'Content above the carousel',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_YBinxxpzJfuda3',
                'label' => 'Content type',
                'name' => 'content_type',
                'type' => 'select',
                'choices' => get_post_types( array( 'public' => true ), 'names' ),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxxou3ggpzJfuda3',
                'label' => 'Category (optional)',
                'name' => 'taxonomy_term_selection',
                'type' => 'select',
                'allow_null' => 1,
                'ui' => 0,
                'choices' => redblue_section_get_term_list(),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxxskyifuda3',
                'label' => 'Max number of items',
                'name' => 'items_to_display',
                'type' => 'number',
                'default_value' => '99',
                'paceholder' => '99',
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxxwworggJfuda3',
                'label' => 'Show the content',
                'name' => 'show_the_content',
                'type' => 'radio',
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'layout' => 'horizontal',
                'default_value' => 'yes',
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxwtlkjggJfuda3',
                'label' => 'Link to item',
                'name' => 'link_to_item',
                'type' => 'radio',
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                    'read more' => 'Read More',
                ),
                'default_value' => 'yes',
                'layout' => 'horizontal',
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxwgagwtlkjggJfuda3',
                'label' => 'Show featured image',
                'name' => 'show_featured_image',
                'type' => 'radio',
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'default_value' => 'yes',
                'layout' => 'horizontal',
                'wrapper' => array (
                    'width' => 33,
                ),
            ),
            array (
                'key' => 'field_YBinxaaxpzJfuda3',
                'label' => 'Background Image',
                'name' => 'background',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 50,
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
                'key' => 'field_YBinxxpzJfuda4',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '50',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_featured_content_carousel', 10, 4 );
function redblue_section_markup_featured_content_carousel( $id, $count, $case, $context_prefix ) {

	if ( $case != 'featured_content_carousel' )
		return;

    //* Enqueue the scripts
    wp_enqueue_script( 'slick-main' );
    wp_enqueue_script( 'background-image-slider-init' );
    wp_enqueue_script( 'featured-content-carousel-init' );

    //* Enqueue the styles
    wp_enqueue_style( 'slick-style' );
    wp_enqueue_style( 'slick-theme' );

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

		//* Query details
		$post_type = get_post_meta( $id, $context_prefix . $count . '_content_type', true );
		$tax_and_terms = get_post_meta( $id, $context_prefix . $count . '_taxonomy_term_selection', true );

		//* Add some query arguments if this is an event (to get the event in the right order)
		if ( $post_type == 'events' ) {

			//* Let's do the loop to grab the next upcoming event
			$eventargs = array(
				'order'          => 'ASC',
				'orderby'        => 'meta_value_num',
				'meta_key'       => 'be_event_start',
				'meta_query'     => array(
					array(
						'key'     => 'be_event_end',
						'value'   => time(),
						'compare' => '>',
					)
				)
			);

			$args = wp_parse_args( $eventargs, $args );
		}

		//* Add some query arguments if there's a taxonomy term selected
		if ( $tax_and_terms ) {

			$tax_and_terms = explode( " ", $tax_and_terms );

			// print_r( $tax_and_terms );
			$taxonomy = $tax_and_terms[0];
			$term = $tax_and_terms[1];

			// echo 'Taxonomy is... ' . $taxonomy;
			// echo 'Term is... ' . $term;

			$taxargs = array(
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term
					)
				)
			);

			$args = wp_parse_args( $taxargs, $args );
		}

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
