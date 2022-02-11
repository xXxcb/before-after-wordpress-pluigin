<?php

function ba_admin_menus() {
	add_menu_page( 
		'B/A Options',
		'B/A Options',
		'manage_options',
		'ba_options',
		'ba_plugin_opts_page',
        'dashicons-image-flip-horizontal',
        20
	);

    add_submenu_page(
        'ba_options',
        'Add New',
        'Add New',
        'manage_options',
        'ba_select_page',
        'ba_plugin_select_page'
    );
}

function ba_admin_sub_menus() {

}