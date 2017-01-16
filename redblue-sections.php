<?php
/*
	Plugin Name: Red Blue Sections
	Plugin URI: http://redblue.us
	Description: An ACF addon which installs fields and basic layouts for flexible content areas.
	Version: 0.1
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

/* Prevent direct access to the plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

// Plugin directory
define( 'REDBLUE_SECTIONS', dirname( __FILE__ ) );

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

    //* Register the custom page template
    include_once( 'templates/template-common-functions.php' );

    //* Register the custom page template
    include_once( 'templates/add-template.php' );

    //* Add to the default page template
    include_once( 'templates/page-default.php' );

    //* The sections themselves
    require_once( 'sections/fullwidth.php' );
    require_once( 'sections/featured_items.php' );
    require_once( 'sections/two_column.php' );
    require_once( 'sections/checkerboard.php' );
    require_once( 'sections/featured_3col.php' );
    require_once( 'sections/background_rotator.php' );
    require_once( 'sections/background_video.php' );
    // require_once( 'sections/threecol_fourth_half_fourth.php' );
    require_once( 'sections/featured_content_checkerboard.php' );
    require_once( 'sections/featured_content_carousel.php' );
    require_once( 'sections/testimonials_slider.php' );
    require_once( 'sections/trust_building_snippets.php' );
    require_once( 'sections/google_maps.php' );

    //* Add the fields
    include_once( 'fields/sections.php' );

    //* Do our main function to include scripts and styles
    add_action( 'wp_enqueue_scripts', 'redblue_sections_enqueue_scripts_styles' );
}

//* Enqueue Scripts and Styles
function redblue_sections_enqueue_scripts_styles() {

    //* Don't add these scripts and styles to the admin side of the site
    if ( is_admin() )
		return;

    //* Enqueue main style
    wp_enqueue_style( 'section-style', plugin_dir_url( __FILE__ ) . '/css/redblue-section-styles.css' );

    //* Google maps scrollfix
    wp_register_script( 'google-maps-scrollfix', plugin_dir_url( __FILE__ ) . '/js/google-maps-scrollfix.js', array( 'jquery' ), null );

    //* Slick slider
	wp_enqueue_script( 'slick-main', plugin_dir_url( __FILE__ ) . '/slick/slick.js', array( 'jquery' ), null );
	wp_enqueue_script( 'slick-init', plugin_dir_url( __FILE__ ) . '/js/slick-init.js', array( 'slick-main' ), null );
	wp_enqueue_style( 'slick-style', plugin_dir_url( __FILE__ ) . '/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', plugin_dir_url( __FILE__ ) . '/slick/slick-theme.css' );

}

/**
 * Add a 'Delete confirmation dialgue box' for removing ACF Flexible Content Row
 * @author Ben Bankley (this is incredible, thank you Ben!)
 * https://acfextras.com/flexible-content-page-builder/
 */
add_action( 'acf/input/admin_head', 'redblue_sections_delete_dialogue' );
function redblue_sections_delete_dialogue() {
    ?>
    <script type="text/javascript">
        (function($) {

            acf.add_action('ready', function(){

                $('body').on('click', 'li.acf-fc-show-on-hover a.acf-icon.-minus.small', function( e ){

                    return confirm("Do you really want to delete this?");
                });
            });
        })(jQuery);
    </script>
    <?php
}

/**
 * Start with all boxes closed, for a less intimidating UI and to avoid accidentally editing the wrong box.
 */
add_action('acf/input/admin_head', 'redblue_sections_acf_input_admin_head');
function redblue_sections_acf_input_admin_head() {
    ?>
        <script type="text/javascript">
        jQuery(function(){
          jQuery('.layout').addClass('-collapsed');
        });
        </script>
    <?php
}

//* Set a content width so that videos and images on half-half sections show up correctly
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}
