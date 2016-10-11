<?php


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_57a38f24e9031',
	'title' => 'Sections',
	'fields' => array (
		array (
			'key' => 'field_57a38f30e0b68',
			'label' => 'Flexible Content Area',
			'name' => 'rb_section',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add Section',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '57a3dc7ce8c04',
					'name' => 'background_rotator',
					'label' => 'Background Rotator',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57a3dc7ce8c05',
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
							'key' => 'field_57a3dc7ce8c07',
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
							'key' => 'field_57a3dca1e8c08',
							'label' => 'Background images',
							'name' => 'backgrounds',
							'type' => 'gallery',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'min' => 1,
							'max' => 10,
							'preview_size' => 'thumbnail',
							'insert' => 'append',
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
				),
				array (
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
							'key' => 'field_57eac9fad0d05',
							'label' => '.mp4 video file',
							'name' => 'video_mp4',
							'type' => 'file',
							'instructions' => '',
							'required' => 1,
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
							'mime_types' => '',
						),
						array (
							'key' => 'field_57eaca10d0d06',
							'label' => '.webm video file',
							'name' => 'video_webm',
							'type' => 'file',
							'instructions' => '',
							'required' => 1,
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
							'mime_types' => '',
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
				),
				array (
					'key' => '57a38f3ad4c9f',
					'name' => 'fullwidth',
					'label' => 'Fullwidth',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57a38fbce0b6b',
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
							'key' => 'field_57a38f9de0b6a',
							'label' => 'Background Image',
							'name' => 'background',
							'type' => 'image',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => 30,
								'class' => '',
								'id' => '',
							),
							'return_format' => '',
							'preview_size' => 'thumbnail',
							'library' => '',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'field_57a38f62e0b69',
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
				),
				array (
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
				),
				array (
					'key' => '57ec236529c66',
					'name' => 'checkerboard',
					'label' => 'Checkerboard',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57ec238829c6a',
							'label' => 'Alignment',
							'name' => 'alignment',
							'type' => 'radio',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
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
							'key' => 'field_57ec236529c67',
							'label' => 'Content',
							'name' => 'content',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 50,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57ec236529c68',
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
							'key' => 'field_57ec236529c69',
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
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57ea25c1b1e1b',
					'name' => 'repetoire',
					'label' => 'Repetoire',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57ea25d1b1e1f',
							'label' => 'Song',
							'name' => 'song',
							'type' => 'repeater',
							'instructions' => '',
							'required' => '',
							'conditional_logic' => '',
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => '',
							'max' => '',
							'layout' => 'table',
							'button_label' => 'Add Song',
							'sub_fields' => array (
								array (
									'key' => 'field_57ea25e5b1e20',
									'label' => 'Song Title',
									'name' => 'song_title',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => 50,
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
									'key' => 'field_57ea25f0b1e21',
									'label' => 'Artist',
									'name' => 'artist',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => 50,
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
							),
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '57a4d8e26c31c',
					'name' => 'featureditems',
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
				),
				array (
					'key' => '57ab2187b42c4',
					'name' => 'threecol-25-50-25',
					'label' => 'Three columns (fourth-half-fourth)',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_57ab246e544c2',
							'label' => 'Header Content',
							'name' => 'headercontent',
							'type' => 'wysiwyg',
							'instructions' => 'This is a content area that will appear <em>above</em> this entire section (if you needed a heading for this section, for example, or a few words that are center-aligned, that could go here).',
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
							'key' => 'field_57ab2187b42c5',
							'label' => 'Content left',
							'name' => 'contentleft',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57ab21c5b42c8',
							'label' => 'Content center',
							'name' => 'contentcenter',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57ab21ddb42c9',
							'label' => 'Content right',
							'name' => 'contentright',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 33,
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
						),
						array (
							'key' => 'field_57ab2187b42c6',
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
							'key' => 'field_57ab2187b42c7',
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
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-flexible-content.php',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'custom_fields',
		2 => 'discussion',
		3 => 'comments',
		4 => 'revisions',
		5 => 'author',
		6 => 'format',
		7 => 'featured_image',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

endif;
