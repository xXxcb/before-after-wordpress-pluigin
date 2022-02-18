<?php

function display_shortcode_before_after( $atts = [] ) {
    wp_register_style( 'ba_main', plugins_url( '/assets/css/main.css', BA_PLUGIN_URL ) );
    wp_register_script( 'ba_custom_js', plugins_url( '/assets/js/app.js', BA_PLUGIN_URL ) );

    wp_enqueue_style( 'ba_main' );
    wp_enqueue_script( 'ba_custom_js' );

    $atts = array_change_key_case( (array) $atts, CASE_LOWER );
    $atts = shortcode_atts( array(
        'image_count' => 'all',
    ), $atts );

	return before_afters( $atts );
}