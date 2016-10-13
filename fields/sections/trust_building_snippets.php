<?php

/**
 * Trust-building snippets
 */

$layouts[] = $snippets = array (
    'key' => 'field_KrDToViPTWRa',
    'name' => 'trust_building_snippets',
    'label' => 'Trust Building Snippets',
    'display' => 'block',
    'sub_fields' => array (
        array (
            'key' => 'field_gRsYnQjGiHfj',
            'label' => 'Snippets',
            'name' => 'repeater',
            'type' => 'repeater',
            'instructions' => 'Only about 10 words and a small image will likely look good in these sections.',
            'collapsed' => 'field_QdnLmzrUdkrF',
            'min' => '3',
            'max' => '',
            'layout' => 'row',
            'button_label' => 'Add Snippet',
            'sub_fields' => array (
                array (
                    'key' => 'field_QdnLmzrUdkrF',
                    'label' => 'Snippet',
                    'name' => 'content',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 1,
                    'rows' => 3,
                ),
            ),
        ),
        array (
            'key' => 'field_vUpvZxpGbVDU',
            'label' => 'Background Image',
            'name' => 'background',
            'type' => 'image',
            'wrapper' => array (
                'width' => 30,
            ),
            'preview_size' => 'thumbnail',
        ),
        array (
            'key' => 'field_PdPRoQYNmBdt',
            'label' => 'Class',
            'name' => 'class',
            'type' => 'text',
            'wrapper' => array (
                'width' => 70,
            ),
            'default_value' => '',
            'placeholder' => 'section-class another-class',
        ),
    ),
    'min' => '',
    'max' => '',
);
