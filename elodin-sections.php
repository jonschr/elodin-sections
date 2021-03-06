<?php
/*
	Plugin Name: Elodin Sections
	Plugin URI: https://github.com/jonschr/elodin-sections
    GitHub Plugin URI: https://github.com/jonschr/elodin-sections
    Description: An ACF addon which installs fields and basic layouts for flexible content areas.
	Version: 1.1.3
    Author: Jon Schroeder
    Author URI: https://elod.in

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/


/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'REDBLUE_SECTIONS', dirname( __FILE__ ) );

// Define the version of the plugin
define ( 'REDBLUE_SECTIONS_VERSION', '1.1.2' );

/**
 * Add a notification if ACF isn't installed and active
 */
add_action( 'admin_notices', 'redblue_sections_error_notice_ACF' );
function redblue_sections_error_notice_ACF() {

    if( !class_exists( 'acf' ) ) {
        echo '<div class="error notice"><p>Please install and activate the <a target="_blank" href="https://www.advancedcustomfields.com/pro/">Advanced Custom Fields Pro</a> plugin. Without it, the Red Blue Sections plugin won\'t work properly.</p></div>';
    }

    //* Testing to see whether we have the Pro version of ACF installed
    if( class_exists( 'acf' ) && !class_exists( 'acf_pro_updates' ) ) {
        echo '<div class="error notice"><p>It looks like you\'ve installed the free version of Advanced Custom Fields. To work properly, the Red Blue Sections plugin requires <a target="_blank" href="https://www.advancedcustomfields.com/pro/">the Pro version</a> instead.</p></div>';
    }
}

/**
 * Add a notification if Genesis isn't installed and active
 */
add_action( 'admin_notices', 'redblue_sections_error_notice_genesis' );
function redblue_sections_error_notice_genesis() {
    if( !function_exists( 'genesis' ) ) {
        echo '<div class="error notice"><p>Please install and activate the <a target="_blank" href="http://my.studiopress.com/themes/genesis/">Genesis Framework</a> parent theme, then install a child theme. Without the framework, the Red Blue Sections plugin won\'t work properly.</p></div>';
    }
}

/**
 * Start the plugin
 * NOTE: I'd rather check to see if Genesis is active here as well; however, it appears that the genesis_init hook fires too late to allow for the template to be added
 */
if ( class_exists( 'acf_pro_updates' ) ) {

    //* Get common functions
    include_once( 'lib/common.php' );

    //* Add the fields
    include_once( 'lib/fields.php' );

    //* Register the custom page template
    include_once( 'lib/add-template.php' );

    //* Add functions to set up the body class and figure out the type of sections we might have
    include_once( 'lib/output-setup.php' );

    //* Disable Gutenberg if we're on the custom template
    include_once( 'lib/disable-gutenberg-on-flexible-template.php' );

    //* The sections themselves
    require_once( 'sections/fullwidth.php' );
    require_once( 'sections/featured_items.php' );
    require_once( 'sections/featured_items_carousel.php' );
    require_once( 'sections/two_column.php' );
    require_once( 'sections/checkerboard.php' );
    require_once( 'sections/featured_3col.php' );
    require_once( 'sections/background_rotator.php' );
    require_once( 'sections/background_image_slider.php' );
    require_once( 'sections/background_video.php' );
    require_once( 'sections/featured_content_checkerboard.php' );
    require_once( 'sections/featured_content_carousel.php' );
    require_once( 'sections/testimonials_slider.php' );
    require_once( 'sections/sliding_accordion.php' );
    require_once( 'sections/trust_building_snippets.php' );
    require_once( 'sections/google_maps.php' );
    require_once( 'sections/scrollspy_nav.php' );
    require_once( 'sections/image.php' );
    require_once( 'sections/blocks.php' );
    // require_once( 'sections/threecol_fourth_half_fourth.php' ); // deprecated

    //* Output the actual sections
    include_once( 'lib/output-sections.php' );
}

//* Enqueue admin scripts and styles
add_action( 'acf/input/admin_head', 'redblue_sections_admin_scripts' );
function redblue_sections_admin_scripts() {

    if ( !is_admin() )
        return;

    //* Make all ACF boxes start each pageload closed (this makes it easier to use)
    wp_enqueue_script( 'redblue-sections-close-on-load', plugin_dir_url( __FILE__ ) . 'js/admin_close_everything_on_load.js', array( 'jquery' ), REDBLUE_SECTIONS_VERSION, true );

    //* Prevent one-click (accidental) deletions of fields
    // wp_enqueue_script( 'redblue-sections-delete-confirmation-box', plugin_dir_url( __FILE__ ) . 'js/admin_delete_confirmation_box.js', array( 'jquery' ), null );

    //* Custom styles for the admin area
    wp_enqueue_style( 'redblue-sections-admin-style', plugin_dir_url( __FILE__ ) . 'css/admin-style.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );

}

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'redblue_sections_enqueue_scripts_styles' );
function redblue_sections_enqueue_scripts_styles() {

    //* Don't add these scripts and styles to the admin side of the site
    if ( is_admin() )
		return;

    //* Enqueue main style
    wp_enqueue_style( 'redblue-section-style', plugin_dir_url( __FILE__ ) . 'css/redblue-section-styles.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );

    //* Google maps scrollfix
    wp_register_script( 'google-maps-scrollfix', plugin_dir_url( __FILE__ ) . 'js/google-maps-scrollfix.js', array( 'jquery' ), REDBLUE_SECTIONS_VERSION, true );

    ///////////
    // SLICK //
    ///////////

    //* Slick slider main scripts
	wp_register_script( 'slick-main', plugin_dir_url( __FILE__ ) . 'slick/slick.min.js', array( 'jquery' ), REDBLUE_SECTIONS_VERSION, true );
	wp_register_script( 'slick-init', plugin_dir_url( __FILE__ ) . 'js/slick-init.js', array( 'slick-main' ), REDBLUE_SECTIONS_VERSION, true );

    //* Slick styles
    wp_register_style( 'slick-style', plugin_dir_url( __FILE__ ) . 'slick/slick.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );
    wp_register_style( 'slick-theme', plugin_dir_url( __FILE__ ) . 'slick/slick-theme.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );

    //* Specific slider scripts
    wp_register_script( 'background-image-slider-init', plugin_dir_url( __FILE__ ) . 'js/background_image_slider-init.js', array( 'slick-main' ), REDBLUE_SECTIONS_VERSION, true );
    wp_register_script( 'background-rotator-init', plugin_dir_url( __FILE__ ) . 'js/background_rotator-init.js', array( 'slick-main' ), REDBLUE_SECTIONS_VERSION, true );
    wp_register_script( 'featured-content-carousel-init', plugin_dir_url( __FILE__ ) . 'js/featured_content_carousel-init.js', array( 'slick-main' ), REDBLUE_SECTIONS_VERSION, true );
    wp_register_script( 'featured-item-carousel-init', plugin_dir_url( __FILE__ ) . 'js/featured-item-carousel-init.js', array( 'slick-main' ), REDBLUE_SECTIONS_VERSION, true );

    ///////////////
    // SCROLLSPY //
    ///////////////

    // wp_register_script( 'scrollspy', plugin_dir_url( __FILE__ ) . '/js/scrollspy.js', array( 'jquery' ), null, true );
    // wp_register_script( 'sections-smoothscroll', plugin_dir_url( __FILE__ ) . '/js/smoothscroll.js', array( 'jquery' ), null, true );
    // wp_register_script( 'throttle', plugin_dir_url( __FILE__ ) . '/js-lib/throttle_and_debounce/throttle_and_debounce.js', array( 'jquery' ), null, true );
    wp_register_script( 'ddscrollspy', plugin_dir_url( __FILE__ ) . '/js-lib/ddscrollspy/ddscrollspy.js', array( 'jquery' ), REDBLUE_SECTIONS_VERSION, true );
    wp_register_script( 'ddscrollspy-init', plugin_dir_url( __FILE__ ) . '/js/ddscrollspy-init.js', array( 'ddscrollspy' ), REDBLUE_SECTIONS_VERSION, true );

    //////////////////
    // FONT AWESOME //
    //////////////////

    //* Accordion script
    wp_register_style( 'font-awesome', plugin_dir_url( __FILE__ ) . '/js-lib/font-awesome-4.7.0/css/font-awesome.min.css', array(), REDBLUE_SECTIONS_VERSION, 'screen' );

}

//////////////////
// BASIC SIZING //
//////////////////

add_image_size( 'background-fullscreen', 1800, 1000, true );

//* Set a content width so that videos and images aren't tiny by default
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}