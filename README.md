# Red Blue Sections
Red Blue Sections extends the Advanced Custom Fields for Genesis themes. It sets up a new page template for this purpose, registers the necessary fields, and sets up basic layouts for some commonly-used sections.

*This plugin requires the Advanced Custom Fields Pro plugin, and the Genesis framework. Without both of these installed and active, it probably won't do anything.*

## Remove unused sections
To remove sections you won't be using in this project, use the following filter in your functions.php file (or plugin):

```php
//* Remove sections
add_filter( 'redblue_section_remove_layouts', 'redblue_section_remove_testimonials_sections' );
function redblue_section_remove_testimonials_sections( $sections ) {
	$sections[] = 'testimonials_slider';
    $sections[] = 'whatever_section_you_want_to_remove';
	return $sections;
}
```

## Style-ready classes
A few classes have been set up by default to allow for more flexibility for sections. These can be added at the bottom of each section.

### For use on all sections
- **align-center** – aligns everything inside the section to center on desktop and tablet, but leaves it left-aligned it on mobile. NOTE: some sections, due to their specific layouts, have defaults that already center align things.
- **full-height** – makes the section full-height on desktop (100% of the height of the browser viewport). NOTE: This may cause unexpected behavior on some sections with complex layouts.
- **limit-height** – constrain the height of a section that, by default, would ordinarily take up the entire vertical height of the viewport.
- **limit-width** – constrain the width of the text in a content section to 600 pixels, rather than going all the way across the page.

### For use on anything with a background
- **full-color** – removes the automatic overlay on the section background
