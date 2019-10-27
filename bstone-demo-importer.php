<?php
/**
 * Plugin Name: Bstone Demo Importer
 * Plugin URI: https://wpbstone.com/
 * Description: Import Bstone theme demos content, widgets and theme settings with just one click.
 * Version: 1.0.1
 * Author: Stack Themes
 * Author URI: https://stackthemes.net/
 * License: GPLv3 or later
 * Text Domain: bstone-demo-importer
 * Domain Path: /languages/
 *
 * @package Bstone_Demo_Importer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$bstone_theme = wp_get_theme();

if ( 'Bstone' == $bstone_theme->name || 'Bstone' == $bstone_theme->parent_theme ) {

	// Define BDIM_PLUGIN_FILE.
	if ( ! defined( 'BDIM_PLUGIN_FILE' ) ) {
		define( 'BDIM_PLUGIN_FILE', __FILE__ );
	}

	// Demo Importer URI
	if ( ! defined( 'BDIM_URI' ) ) {
		define( 'BDIM_URI', plugins_url( '/', BDIM_PLUGIN_FILE ) );
	}

	// Include the main Bstone Demo Importer class.
	if ( ! class_exists( 'Bstone_Demo_Importer' ) ) {
		include_once dirname( __FILE__ ) . '/includes/class-bstone-demo-importer.php';
	}


	// if ( !defined( 'BSTONETT_PRO_DIR' ) ) {
	// 	define( 'BSTONETT_PRO_DIR', plugin_dir_path( BDIM_PLUGIN_FILE ) );
	// }

	/**
	 * Main instance of Bstone Demo importer.
	 *
	 * Returns the main instance of TGDM to prevent the need to use globals.
	 *
	 * @since  1.0.0
	 * @return Bstone_Demo_Importer
	 */
	function bdim() {
		return Bstone_Demo_Importer::instance();
	}

	// Sync Demos List
	add_action( 'wp_ajax_nopriv_bdim_sync_demos_list', 'bdim_sync_demos_list' );
	add_action( 'wp_ajax_bdim_sync_demos_list', 'bdim_sync_demos_list' );

	function bdim_sync_demos_list() {
		defined( 'WP_UNINSTALL_PLUGIN' );

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

		die();
	}

	// Global for backwards compatibility.
	$GLOBALS['bstone-demo-importer'] = bdim();
}
