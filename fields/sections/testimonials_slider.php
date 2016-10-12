<?php

/**
 * Testimonials slider
 */

$layouts[] = $testimonials_slider = array (
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
