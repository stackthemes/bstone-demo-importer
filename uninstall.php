<?php
/**
 * Bstone Demo Importer Uninstall
 *
 * Uninstalls the plugin and associated data.
 *
 * @package Importer\Unistaller
 * @version 1.0.0
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb;

delete_transient( 'bstone_demo_importer_packages' );

/*
 * Only remove ALL demo importer data if BDIM_REMOVE_ALL_DATA constant is set to true in user's
 * wp-config.php. This is to prevent data loss when deleting the plugin from the backend
 * and to ensure only the site owner can perform this action.
 */
if ( defined( 'BDIM_REMOVE_ALL_DATA' ) && true === BDIM_REMOVE_ALL_DATA ) {
	// Delete options.
	$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'bstone_demo_importer\_%';" );
}
