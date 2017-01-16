<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_items' );
function redblue_section_fields_featured_items( $layouts ) {

    $layouts[] = array (
        'key' => '57a4d8e26c31c',
        'name' => 'featured_items',
        'label' => 'Featured Items',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57a4d8e26c31d',
                'label' => 'Heading',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
            ),
            array (
                'key' => 'field_57a4d8ef6c320',
                'label' => 'Featured Item',
                'name' => 'repeater',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_57a4ef54eec57',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'Add Featured Item',
                'sub_fields' => array (
                    array (
                        'key' => 'field_57a4ef54eec57',
                        'label' => 'Heading',
                        'name' => 'heading',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 25,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array (
                        'key' => 'field_57a4efbeeec59',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 25,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                    array (
                        'key' => 'field_57a4ef37eec56',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 25,
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
                        'key' => 'field_57a4ef90eec58',
                        'label' => 'Video',
                        'name' => 'video',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 25,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                    array (
                        'key' => 'field_57a4d9866c325',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => 100,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => 8,
                        'new_lines' => 'wpautop',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
            ),
            array (
                'key' => 'field_57a4d8e26c31e',
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
                'key' => 'field_57a4d8e26c31f',
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

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_featured_items', 10, 4 );
function redblue_section_markup_featured_items( $id, $count, $case, $context_prefix ) {

	if ( $case != 'featured_items' )
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

    		do_action( 'before_inside_section_' . $count );

    	if ( !$imageid )
    		printf ( '<section id="section-%s" class="%s"><div class="wrap">', $count, $class );

    		if ( $content )
    			printf( '<div class="featuredcontent">%s</div><div class="clear"></div>', $content );


    		$itemsclass[0] = 'items';

    		//* Figure out how many featured items we'll have (to add to the class)
    		$featureditems = get_post_meta( $id, $context_prefix . $count . '_repeater', true );

    		if ( ( $featureditems % 4 == 0 ) && !( $featureditems % 3 == 0 ) )
    			$itemsclass[] = 'force-four-columns';

    		$itemsclass = implode( ' ', $itemsclass );

    		if ( $featureditems )
    			printf( '<div class="%s">', $itemsclass );

    				for ( $i=0; $i < $featureditems ; $i++ ) {

    					echo '<div class="item"><div class="item-container">';

    						//* Get the video information
    						$video = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_video', true );

    						if ( $video ) {
    							$oembed = wp_oembed_get( $video, array( 'width' => '390', 'height' => '150' ) );
    							echo '<div class="embed-container">';
    								echo $oembed;
    							echo '</div>';
    						}

    						//* Get the background image information
    						$featured_imageid = (int) get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_image', true );

    						if ( $featured_imageid ) {
    							$featured_imageurlarray = wp_get_attachment_image_src( $featured_imageid, array( 400, 200 ) );
    							$featured_imageurl = $featured_imageurlarray[0];
    						}

    						//* Get heading information
    						$featured_heading = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_heading', true );

    						//* Get content information
    						$featured_content = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_content', true );

    						//* Get the link information
    						$featured_link = get_post_meta( $id, $context_prefix . $count . '_repeater_' . $i . '_link', true );

    						if ( $featured_link )
    							printf( '<a href="%s">', $featured_link );

    						if ( $featured_imageid && !$video )
    							printf( '<div class="flex-featured-image"><img src="%s" /></div>', $featured_imageurl );

    						if ( $featured_heading )
    							printf( '<h3>%s</h3>', $featured_heading );

    						if ( $featured_content )
    							echo apply_filters( 'the_content', $featured_content );

    						// if ( $featured_imageid )
    						// 	printf( '<div class="featured-image-bkg" style="background-image:url(%s);"></div>', $featured_imageurl );

    						if ( $featured_link )
    							printf( '</a>', $featured_link );

    					echo '</div></div>'; // .item-container, .item
    				}

    		if ( $featureditems )
    			echo '</div>'; // .items

    		do_action( 'after_inside_section_' . $count );

    	echo '</div></section>'; // .wrap, section.section

}
