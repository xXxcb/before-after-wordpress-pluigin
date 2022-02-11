<?php if ( !defined( 'ABSPATH' ) ) { die; } // Exit if accessed directly

/**
*    Plugin Name: BeforeAfter
*    Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
*    Description: A brief description of the Plugin.
*    Version: 1.2
*    Author: Carlos Burke
*    Author URI: http://URI_Of_The_Plugin_Author
*    Text Domain: beforeafter
*    License: A "Slug" license name e.g. GPL2
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

// HOOKS
register_activation_hook( __FILE__, 'ba_activate_plugin' );
add_action( 'admin_menu', 'ba_admin_menus' );
add_action( 'admin_init', 'ba_admin_init' );