<?php

function display_shortcode_before_after() {
    wp_register_style( 'ba_main', plugins_url( '/assets/css/main.css', BA_PLUGIN_URL ) );
    wp_register_script( 'ba_custom_js', plugins_url( '/assets/js/app.js', BA_PLUGIN_URL ) );

    wp_register_style( 'ba_main_ba', plugins_url( '/assets/css/before-after.css', BA_PLUGIN_URL ) );
    wp_register_script( 'ba_custom_js_ba', plugins_url( '/assets/js/before-after.js', BA_PLUGIN_URL ) );

    wp_enqueue_style( 'ba_main' );
    wp_enqueue_script( 'ba_custom_js' );
    wp_enqueue_style( 'ba_main_ba' );
    wp_enqueue_script( 'ba_custom_js_ba' );
	return before_afters();
}