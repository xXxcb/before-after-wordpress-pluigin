<?php 

function ba_admin_init() {
	include ( 'enqueue.php' );

	add_action( 'admin_enqueue_scripts', 'ba_admin_enqueue' );
	add_action( 'admin_enqueue_scripts', 'ba_admin_select_enqueue' );
}