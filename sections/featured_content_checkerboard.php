<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_content_checkerboard' );
function redblue_section_fields_featured_content_checkerboard( $layouts ) {

    $layouts[] = array (
        'key' => 'gbxnCboTxmbU66',
        'name' => 'featured_content_checkerboard',
        'label' => 'Featured Content Checkerboard',
        'display' => 'block',
        'description' => 'This section will display the most recent post of a given content type.',
        'sub_fields' => array (
            array (
                'key' => 'field_gbxnCboTxmbU6a',
                'label' => 'Alignment',
                'name' => 'alignment',
                'type' => 'radio',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 50,
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    'left' => 'Content left',
                    'right' => 'Content right',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_YBigbxnCgageebUfuda3',
                'label' => 'Label (optional)',
                'name' => 'label',
                'type' => 'text',
                'wrapper' => array (
                    'width' => 50,
                ),
            ),
            array (
                'key' => 'field_gbxnCboTxmbUuda3',
                'label' => 'Content type',
                'name' => 'content_type',
                'type' => 'select',
                'choices' => get_post_types( array( 'public' => true ), 'names' ),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 25,
                ),
            ),
            array (
                'key' => 'field_YBinxxgaagwweggpzJfuda3',
                'label' => 'Category (optional)',
                'name' => 'taxonomy_term_selection',
                'type' => 'select',
                'allow_null' => 1,
                'ui' => 0,
                'choices' => redblue_section_get_term_list(),
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 25,
                ),
            ),
            array (
                'key' => 'field_YBigbxnCboTxmbUfuda3',
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
                    'width' => 50,
                ),
            ),

            array (
                'key' => 'field_gbxnCboTxmbU69',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
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
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_featured_content_checkerboard', 10, 4 );
function redblue_section_markup_featured_content_checkerboard( $id, $count, $case, $context_prefix ) {

	if ( $case != 'featured_content_checkerboard' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

    //* We still need the checkerboard class on this section
    $class[] = 'checkerboard';

    $class[] = get_post_meta( $id, $context_prefix . $count . '_alignment', true );

	//* Get the background image information
	$image = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_background', true ) );

	//* Get the classes ready
	$class = implode( ' ', $class );

    $label = get_post_meta( $id, $context_prefix . $count . '_label', true );

    $link_to_item = get_post_meta( $id, $context_prefix . $count . '_link_to_item', true );

	//* Output the container section
	printf( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		$post_type = get_post_meta( $id, $context_prefix . $count . '_content_type', true );

		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => 1,
		);

		//* Query details
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

            while ( $cpt_query->have_posts() ) {

                $cpt_query->the_post();
                global $post;

                $title = get_the_title();
                $permalink = get_the_permalink();

                $image_id = get_post_thumbnail_id( $post->ID );
                $image_url_array = wp_get_attachment_image_src( $image_id, array( 800, 800 ) );
                $background_image = $image_url_array[0];

        		printf( '<div class="checkerboard-image" style="background-image: url(%s)">', $background_image );

                    if ( $label )
                        printf( '<div class="label">%s</div>', $label );

                echo '</div>'; // .checkerboard-image

                echo '<div class="checkerboard-content"><div class="content-wrap">';

                    if ( $link_to_item == 'yes' || $link_to_item == 'read more' )
                        printf( '<h2><a href="%s">%s</a></h2>', $permalink, $title );

                    if ( $link_to_item == 'no' )
                        printf( '<h2>%s</h2>', $title );

					if ( $post_type != 'events' )
	                    the_excerpt();


					if ( $post_type == 'events' ) {
						echo apply_filters( 'the_content', get_post_meta( get_the_id(), 'event_excerpt', true ) );

					}


                    if ( $link_to_item == 'read more' )
                        printf( '<p><a href="%s" class="button button-small">Read more</a></p>', $permalink );

                    if ( current_user_can( 'edit_posts') )
                        edit_post_link( 'Edit', '<p><small>', '</small></p>', '' );

                echo '</div></div>';

                if ( current_user_can( 'edit_posts') )
                    edit_post_link( 'Edit', '<p><small>', '</small></p>', '' );

            }

        } else {
            // silence is golden
        }

        /* Restore original Post Data */
        wp_reset_postdata();

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section

}
