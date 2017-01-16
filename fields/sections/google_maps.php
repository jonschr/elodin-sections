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
            'instructions' => 'Use a Google Maps embed at whatever zoom level you\'d like to use.',
            'required' => 1,
            'conditional_logic' => 0,
        ),
        array (
            'key' => 'field_oLedymgj9A6GgHvCmFD2',
            'label' => 'Height of the map',
            'name' => 'height',
            'type' => 'number',
            'wrapper' => array (
                'width' => 50,
            ),
        ),
        array (
            'key' => 'field_oLedymgj9A6GgHvCmFD3',
            'label' => 'Class',
            'name' => 'class',
            'type' => 'text',
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => 50,
            ),
            'placeholder' => 'section-class another-class',
        ),
    ),
    'min' => '',
    'max' => '',
);
