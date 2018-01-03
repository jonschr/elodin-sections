# Red Blue Sections
Red Blue Sections extends the Advanced Custom Fields for Genesis themes. It sets up a new page template for this purpose, registers the necessary fields, and sets up basic layouts for some commonly-used sections.

*This plugin requires the Advanced Custom Fields Pro plugin, and the Genesis framework. Without both of these installed and active, it probably won't do anything.*


## Style-ready classes
A few classes have been set up by default to allow for more flexibility for sections. These can be added at the bottom of each section, separated by spaces, e.g. **align-center full-height**

### For use on all sections
- **align-center** – aligns everything inside the section to center on desktop and tablet, but leaves it left-aligned it on mobile. NOTE: some sections, due to their specific layouts, have defaults that already center align things.
- **full-height** – makes the section full-height on desktop (100% of the height of the browser viewport). NOTE: This may cause unexpected behavior on some sections with complex layouts.
- **limit-height** – constrain the height of a section that, by default, would ordinarily take up the entire vertical height of the viewport (there are only a couple of sections where this is necessary, as most are not full-height by default).
- **limit-width** – constrain the width of the text in a content section to 600 pixels, rather than going all the way across the page. Often customized in terms of width by the theme.
- **dark** – use a dark color scheme instead of the usual light one

### Padding setups ###
These are mosly useful on full-width sections, but can be used on a few others as well (e.g. on background video)
- **no-padding** – eliminates all padding and maximum width on a section (useful for embedding things that should touch all edges of a section)
- **no-padding-vertical**
- **no-padding-horizontal**
- **no-padding-top**
- **no-padding-bottom**

### For use on anything with a background
- **full-color** – removes the automatic dark overlay on the section background, and allows either a background image or a background video to show up at full color instead (text may be hard to read over this). This class can also be used on individual slides on some rotators, and on those using this on the section itself will have no effect.


## Remove unused sections
The best practice for removing fields, the for the lonevity of the site you're working on, is to remove _all_ sections, then immediately re-add just the ones that this site will be using. That means if we add more sections to the site, they won't automatically pop into the site's backend.

```php
//* Remove all of the sections
remove_all_filters( 'redblue_section_add_layout' );

//* Uncomment the lines below to re-add the layouts that we'll actually be using
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_image_slider' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_rotator' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_background_video' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_checkerboard' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_3col' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_content_carousel' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_content_checkerboard' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_featured_items' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_fullwidth' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_google_maps' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_scrollspy_nav' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_sliding_accordion' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_testimonials_slider' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_trust_building_snippets' );
// add_filter( 'redblue_section_add_layout', 'redblue_section_fields_two_column' );
```

## Add sections

If you'd like to add a section for a specific project, you can use the **redblue_section_add_layout** filter to do that. This is what makes this plugin extensible. [Official ACF guide](https://www.advancedcustomfields.com/resources/register-fields-via-php/) (keep in mind that you're only adding *layouts*, not entire field groups, so the fields listed at the bottom of this page will likely be the most helpful). Alternately, you can generate a layout through the ACF interface, then export the code as pdf and essentially copy the appropriate section into place.

```php
//* Add sections
add_filter( 'redblue_section_add_layout', 'redblue_section_add_another_fullwidth_section' );
function redblue_section_add_another_fullwidth_section( $layout ) {
	$layouts[] = array (
	    'key' => 'must_be_unique',
	    'name' => 'fullwidth_section',
	    'label' => 'Fullwidth section added by theme',
	    'sub_fields' => array (
	        array (
	            'key' => 'field_57a38fbce0b6b',
	            'label' => 'Content',
	            'name' => 'content',
	            'type' => 'wysiwyg',
	            'required' => 0,
	            'conditional_logic' => 0,
	        ),
	    ),
	);

	return $layouts;
}
```

## Allow sections to be used on another content type
In this example, we're adding sections to a content type called "ministries."

```php
//* Add sections above content section
add_filter( 'redblue_section_above_content_display', 'prefix_add_sections_to_your_cpt', 1, 10 );

//* Add sections below content section
add_filter( 'redblue_section_above_content_display', 'prefix_add_sections_to_your_cpt', 1, 10 );

function prefix_add_sections_to_your_cpt( $args ) {

	$new_args = array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'ministries',
			),
		),
	);

	return array_merge( $args, $new_args );
}
```

Or, if you'd like, you can replace the content altogether with the sections
```php
//* Replace the content with a section builder
add_filter( 'redblue_section_instead_of_content_display', 'prefix_add_instead_of_section', 1, 10 );
function prefix_add_instead_of_section( $args ) {

	$new_args = array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'ministries',
			),
		),
	);

	return array_merge( $args, $new_args );
}
```