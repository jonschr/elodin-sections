<?php
/*
	Plugin Name: Red Blue Sections
	Plugin URI: http://redblue.us
	Description: An ACF addon which installs fields and basic layouts for flexible content areas.
	Version: 1.1
    Author: Jon Schroeder
    Author URI: http://redblue.us

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
*/

// Plugin directory
define( 'REDBLUE_SECTIONS', dirname( __FILE__ ) );

//* Register the custom page template
include_once( 'templates/add-template.php' );

//* Add the fields
include_once( 'fields/sections.php' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'redblue_sections_enqueue_scripts_styles' );
function redblue_sections_enqueue_scripts_styles() {

    //* Don't add these scripts and styles to the admin side of the site
    if ( is_admin() )
		return;

    //* Enqueue main style
    wp_enqueue_style( 'section-style', plugin_dir_url( __FILE__ ) . '/css/redblue-section-styles.css' );

    //* Slick slider
	wp_enqueue_script( 'slick-main', plugin_dir_url( __FILE__ ) . '/slick/slick.js', array( 'jquery' ), null );
	wp_enqueue_script( 'slick-init', plugin_dir_url( __FILE__ ) . '/js/slick-init.js', array( 'slick-main' ), null );
	wp_enqueue_style( 'slick-style', plugin_dir_url( __FILE__ ) . '/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', plugin_dir_url( __FILE__ ) . '/slick/slick-theme.css' );


}
