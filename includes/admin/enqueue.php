<?php

function ba_admin_enqueue() {
	if( !isset($_GET['page']) || isset($_GET['page']) != "ba_options"  ) {
		return;
	}

	wp_register_style( 'ba_bootstrap', plugins_url( '/assets/css/theme.min.css', BA_PLUGIN_URL ) );
    wp_register_script( 'ba_custom_swal', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js', '11.4.0', true );

	wp_enqueue_style( 'ba_bootstrap' );
    wp_enqueue_script( 'ba_custom_swal' );
}

function ba_admin_select_enqueue() {
	if( !isset($_GET['page'] ) || isset( $_GET['page']) != "ba_select_page" ) {
		return;
	}
}