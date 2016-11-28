<?php

/**
 * Return an array of all of the terms on a site, for use in setting up a selection of all terms
 * @return array
 */
function redblue_section_get_term_list() {

    $taxonomies = get_taxonomies(
        array(
            'public' => true,
            'show_ui' => true,
        ),
        'names'
    );

    $termchoices = array();
    foreach( $taxonomies as $taxonomy ) {

        // echo $taxonomy;

        $terms = get_terms(
            $taxonomy,
            array(
                'hide_empty' => true,
            )
        );

        foreach ( $terms as $term ) {

            $key = sprintf( '%s %s', $term->taxonomy, $term->name );
            $value = sprintf( '%s: %s (%s)', $term->taxonomy, $term->name, $term->count );

            $termchoices[$key] = $value;

        }
    }

    return $termchoices;
}
