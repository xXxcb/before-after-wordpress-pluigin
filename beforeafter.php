<?php if ( !defined( 'ABSPATH' ) ) { die; } // Exit if accessed directly

/**
*    Plugin Name: Before|After
*    Plugin URI: https://adretreaver.com/contact-us/
*    Description: This plugin list images in a beautiful gallery and allows you to present a before and after slider.
*    Version: 1.6.3
*    Author: Carlos Burke
*    Author URI: https://adretreaver.com/
*    Text Domain: beforeafter
**/

// Prevents hacker from accessing the plugin fole directly
if ( !function_exists('add_action') ) {
    echo __("Nothing to see here!");
    exit;
}

// Setup
define( 'BA_PLUGIN_URL', __FILE__ );

// INCLUDES
include ( 'includes/activate.php' ); // including file to help with activating plugin
include ( 'includes/admin/menus.php' );
include ( 'includes/admin/options-page.php' );
include ( 'includes/admin/selection-page.php' );
include ( 'includes/admin/init.php' );
include ( 'includes/admin/get-beforeafter.php' );
include ( 'includes/shortcode/display-shortcode.php' );

// HOOKS
register_activation_hook( __FILE__, 'ba_activate_plugin' );
add_action( 'admin_init', 'ba_admin_init' );
add_action( 'admin_menu', 'ba_admin_menus' );

// Shortcodes
add_shortcode( 'disp_before_after', 'display_shortcode_before_after' );