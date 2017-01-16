<?php

/**
 * Two-column
 */

$layouts[] = $two_column = array (
    'key' => 'fqscmHNXnwwW',
    'name' => 'two_column',
    'label' => 'Two Column (vertically aligned)',
    'display' => 'block',
    'sub_fields' => array (
        array (
            'key' => 'field_fqscmagagaHgNXnwwW',
            'label' => 'Alignment',
            'name' => 'alignment',
            'type' => 'radio',
            'instructions' => 'How would you like these sections aligned on desktop?',
            'required' => 1,
            'choices' => array (
                'autowidth' => 'Automatic width',
                'thirdleft' => '1/3 left, 2/3 right',
                'thirdright' => '2/3 left, 1/3 right',
                'halfhalf' => 'Half and half',
            ),
            'wrapper' => array (
                'width' => 60,
            ),
            'layout' => 'horizontal',
        ),
        array (
            'key' => 'field_fqscmagagaHgNXnwwW1',
            'label' => 'Content above',
            'name' => 'content_above_selection',
            'type' => 'radio',
            'instructions' => 'Content above the two-column area?',
            'required' => 1,
            'choices' => array (
                'no' => 'No',
                'yes' => 'Yes'
            ),
            'wrapper' => array (
                'width' => 40,
            ),
            'layout' => 'horizontal',
        ),
        array (
            'key' => 'field_fqscmHNXnwwW12ga',
            'label' => 'Content above',
            'name' => 'content_above',
            'type' => 'wysiwyg',
            'conditional_logic' => array (
				array (
					array (
						'field' => 'field_fqscmagagaHgNXnwwW1',
						'operator' => '==',
						'value' => 'yes',
					),
				),
			),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array (
            'key' => 'field_fqscmHNXnwwW1',
            'label' => 'Content',
            'name' => 'content_one',
            'type' => 'wysiwyg',
            'wrapper' => array (
                'width' => 50,
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array (
            'key' => 'field_fqscmHNXnwgagawW1',
            'label' => 'Content',
            'name' => 'content_two',
            'type' => 'wysiwyg',
            'wrapper' => array (
                'width' => 50,
            ),
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array (
            'key' => 'field_fqscmHNXnwwW2',
            'label' => 'Background Image',
            'name' => 'background',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 50,
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
        ),
        array (
            'key' => 'field_fqscmHNXnwwW3',
            'label' => 'Class',
            'name' => 'class',
            'type' => 'text',
            'wrapper' => array (
                'width' => '50',
            ),
            'placeholder' => 'section-class another-class',
        ),
    ),
);
