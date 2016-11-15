<?php

/**
 * Featured Content Checkerboard
 */

$layouts[] = $featured_content_checkerboard = array (
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
                'width' => 20,
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
            'layout' => 'vertical',
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
                'width' => 20,
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
            'layout' => 'vertical',
            'wrapper' => array (
                'width' => 20,
            ),
        ),
        array (
            'key' => 'field_YBigbxnCgageebUfuda3',
            'label' => 'Label (optional)',
            'name' => 'label',
            'type' => 'text',
            'wrapper' => array (
                'width' => 40,
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
