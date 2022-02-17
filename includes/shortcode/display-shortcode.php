<?php

function display_shortcode_before_after() {
    wp_register_style( 'ba_main', plugins_url( '/assets/css/main.css', BA_PLUGIN_URL ) );
    wp_register_script( 'ba_custom_js', plugins_url( '/assets/js/app.js', BA_PLUGIN_URL ) );

    wp_enqueue_style( 'ba_main' );
    wp_enqueue_script( 'ba_custom_js' );
	return before_afters();
}