<?php

/////////////////////////
// SECTIONS ADD FIELDS //
/////////////////////////

/**
 * Add fields for the section
 */
add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_video' );
function redblue_section_fields_background_video( $layouts ) {

    $layouts[] = array (
        'key' => '57eac9e2d0d01',
        'name' => 'background_video',
        'label' => 'Background Video',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_57eac9e2d0d02',
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
                'key' => 'field_57eac9e2d0d03',
                'label' => 'Class',
                'name' => 'class',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 100,
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
             array (
                'key' => 'field_57eac967asheks05',
                'label' => 'Direct link to URL (Option A)',
                'name' => 'video_url',
                'type' => 'url',
                'instructions' => 'If you\'re using a URL (Option A), you can leave both video files below blank. If you\'re instead using a file which will live in WordPress (Option B), it\'s best to supply both filetypes.<br/>If this is a Vimeo link, it should look something like this: <a href="https://player.vimeo.com/external/293021235.hd.mp4?s=08a3590ddf3f55ce74ca4262633e0737954f8d71" target="_blank">https://player.vimeo.com/external/293021235.hd.mp4?s=08a3590ddf3f55ce74ca4262633e0737954f8d71</a>',
            ),
            array (
                'key' => 'field_57eac9fad0d05',
                'label' => '.mp4 video file (Option B)',
                'name' => 'video_mp4',
                'type' => 'file',
                'wrapper' => array (
                    'width' => 33,
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'mp4',
            ),
            array (
                'key' => 'field_57eaca10d0d06',
                'label' => '.webm video file (Option B)',
                'name' => 'video_webm',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 33,
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => 'webm',
            ),
            array (
                'key' => 'field_57ead9641a26d',
                'label' => 'Fallback image',
                'name' => 'image_fallback',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => 33,
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
        ),
        'min' => '',
        'max' => '',
    );

	return $layouts;
}

//////////////////////////
// SECTIONS ADD LAYOUTS //
//////////////////////////

add_action( 'redblue_sections_add_layout', 'redblue_section_markup_background_video', 10, 4 );
function redblue_section_markup_background_video( $id, $count, $case, $context_prefix ) {

	if ( $case != 'background_video' )
		return;

    //* Do the function which figures out which classes we need
	$class = rb_section_class_setup( $id, $count, $case, $context_prefix );

	//* Get the background image information
    $video_url = get_post_meta( $id, $context_prefix . $count . '_video_url', true );
	$video_mp4 = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_video_mp4', true ) );
    $video_webm = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_video_webm', true ) );
	$image_fallback = wp_get_attachment_url( get_post_meta( $id, $context_prefix . $count . '_image_fallback', true ) );

	//* Get the classes ready
	$class = implode( ' ', $class );

	//* Variables for this section
	$content = get_post_meta( $id, $context_prefix . $count . '_content', true );
	$content = apply_filters( 'the_content', $content );

	//* Output the container section
	printf ( '<section id="section-%s" class="%s">', $count, $class );

		do_action( 'before_inside_section_' . $count );

		if ( $content )
		printf( '<div class="wrap">%s</div>', $content );

			//* Output the video itself
			printf( '<video class="background_video_the_video" autoplay muted loop playsinline poster="%s" preload="auto" class="video-playing">', $image_fallback );

                if ( $video_url )
                    printf( '<source src="%s" type="video/mp4">', $video_url );

				if ( $video_mp4 && !$video_url )
					printf( '<source src="%s" type="video/mp4">', $video_mp4 );

				if ( $video_webm && !$video_url )
					printf( '<source src="%s" type="video/webm">', $video_webm );

			echo '</video>';

		do_action( 'after_inside_section_' . $count );

	echo '</section>'; // .wrap, section.section

}
