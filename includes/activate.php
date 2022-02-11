<?php 

//Function to check WordPress required version
function ba_activate_plugin() {
	if( version_compare( get_bloginfo( 'version' ), '5.0', '<') ) {
		wp_die( __(  "You must update Wordpress to use this plugin", 'plugin' ) );
	}

	global $wpdb;

	// $wpdb->prefix : gets the prefix of of the wordpress installation eg. wp_ wf_
	$createSQL = "
		CREATE TABLE `" . $wpdb->prefix . "before_after` ( 
			`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`before_img` VARCHAR(256) NOT NULL,
			`after_img` VARCHAR(256) NOT NULL,
			PRIMARY KEY (`ID`)
		) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";


		require( ABSPATH . "/wp-admin/includes/upgrade.php" ); //File required to create and modify database tables
		dbDelta( $createSQL );

}