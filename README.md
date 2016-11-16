# Red Blue Sections
Red Blue Sections extends the Advanced Custom Fields for Genesis themes. It sets up a new page template for this purpose, registers the necessary fields, and sets up basic layouts for some commonly-used sections.

*This plugin requires the Advanced Custom Fields Pro plugin, and the Genesis framework. Without both of these installed and active, it probably won't do anything.*

## Remove unused sections
To remove sections you won't be using in this project, use the 'redblue_section_remove_layouts' in your functions.php file (or plugin):

```php
//* Remove sections (all sections being removed below)
add_filter( 'redblue_section_remove_layouts', 'redblue_section_remove_testimonials_sections' );
function redblue_section_remove_testimonials_sections( $sections ) {
	// $sections[] = 'whatever_section_you_want_to_remove';
	$sections[] = 'background_rotator';
	$sections[] = 'background_video';
	$sections[] = 'checkerboard';
	$sections[] = 'featured_3col';
	$sections[] = 'featured_content_carousel';
	$sections[] = 'featured-content_checkerboard';
	$sections[] = 'featureditems';
	$sections[] = 'fullwidth';
	$sections[] = 'testimonials_slider';
	$sections[] = 'threecol_fourth_half_fourth';
	$sections[] = 'trust_building_snippets';
	$sections[] = 'two_column';
	return $sections;
}
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

## Style-ready classes
A few classes have been set up by default to allow for more flexibility for sections. These can be added at the bottom of each section, separated by spaces, e.g. **align-center full-height**

### For use on all sections
- **align-center** – aligns everything inside the section to center on desktop and tablet, but leaves it left-aligned it on mobile. NOTE: some sections, due to their specific layouts, have defaults that already center align things.
- **full-height** – makes the section full-height on desktop (100% of the height of the browser viewport). NOTE: This may cause unexpected behavior on some sections with complex layouts.
- **limit-height** – constrain the height of a section that, by default, would ordinarily take up the entire vertical height of the viewport.
- **limit-width** – constrain the width of the text in a content section to 600 pixels, rather than going all the way across the page.

### For use on anything with a background
- **full-color** – removes the automatic overlay on the section background
