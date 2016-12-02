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
            'required' => 1,
            'choices' => array (
                'thirdleft' => 'One-third left, two-thirds right',
                'thirdright' => 'Two-thirds left, one-third right',
                'halfhalf' => 'Half and half',
            ),
            'layout' => 'horizontal',
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
