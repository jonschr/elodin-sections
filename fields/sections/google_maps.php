<?php

/**
 * Full width
 */

$layouts[] = $google_maps = array (
    'key' => 'oLedymgj9A6GgHvCmFD',
    'name' => 'google_maps',
    'label' => 'Google Map',
    'display' => 'block',
    'sub_fields' => array (
        array (
            'key' => 'field_oLedymgj9A6GgHvCmFD1',
            'label' => 'Embed Code',
            'name' => 'embed',
            'type' => 'text',
            'instructions' => 'Use a Google Maps embed code (not just the URL)',
            'required' => 1,
            'conditional_logic' => 0,
        ),
        array (
            'key' => 'field_oLedymgj9A6GgHvCmFD3',
            'label' => 'Class',
            'name' => 'class',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
            ),
            'placeholder' => 'section-class another-class',
        ),
    ),
    'min' => '',
    'max' => '',
);
