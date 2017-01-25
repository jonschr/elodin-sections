<?php

/**
 * A function that can check whether sections exist on the current page
 * @return array: an array of the types of sections that exist (returns nothing if there aren't any)
 */
function redblue_sections_exist() {
    
    $id = get_the_id();

    //* Find rows in each of the possible types of sections
    $rows_flexible = get_post_meta( $id, 'page_flexible_content', true );
    $rows_above = get_post_meta( $id, 'page_default_above', true );
    $rows_below = get_post_meta( $id, 'page_default_below', true );

    if ( !is_array( $rows_flexible ) && !is_array( $rows_above ) && !is_array( $rows_below ) )
        return;

    $section_types = array();

    if ( is_array( $rows_flexible ) )
        $section_types[] = 'flexible-sections';

    if ( is_array( $rows_above ) )
        $section_types[] = 'sections-top';

    if ( is_array( $rows_below ) )
        $section_types[] = 'sections-bottom';

    return $section_types;

}



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

            $key = sprintf( '%s %s', $term->taxonomy, $term->slug );
            $value = sprintf( '%s: %s (%s)', $term->taxonomy, $term->name, $term->count );

            $termchoices[$key] = $value;

        }
    }

    return $termchoices;
}
