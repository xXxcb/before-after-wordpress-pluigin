<?php

function ba_admin_enqueue() {
	if( !isset($_GET['page']) || isset($_GET['page']) != "ba_options"  ) {
		return;
	}

//    wp_register_style( 'ba_main', plugins_url( '/assets/css/main.css', BA_PLUGIN_URL ) );
	wp_register_style( 'ba_bootstrap', plugins_url( '/assets/css/theme.min.css', BA_PLUGIN_URL ) );

//	wp_register_style( 'ba_datatables_style', 'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css', '1.10.22', true );
//
//	wp_register_script( 'ba_custom_js', plugins_url( '/assets/js/app.js', BA_PLUGIN_URL ), array( 'jquery' ) );
//
//	// wp_register_script( 'ba_jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', '3.5.1', true );
//
	wp_register_script( 'ba_jquery_datatables', 'https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js', array('jquery'), '1.10.22' );
//	wp_localize_script( 'ba_jquery_datatables', 'datatablesajax', array('ajaxurl' => admin_url('admin-ajax.php')));
//
//	wp_register_script( 'ba_bootstrap_datatables', 'https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js', array(), '1.10.22', true );
//
//    wp_enqueue_style( 'ba_main' );
	wp_enqueue_style( 'ba_bootstrap' );
//	wp_enqueue_style( 'ba_datatables_style' );
//
//	wp_enqueue_script( 'ba_custom_js' );
//	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'ba_jquery_datatables' );
//  wp_enqueue_script( 'ba_bootstrap_datatables' );

}

function ba_admin_select_enqueue() {
	if( !isset($_GET['page'] ) || isset( $_GET['page']) != "ba_select_page" ) {
		return;
	}


}