<?php
/**
 * Admin View: Notice - Reset Wizard
 *
 * @package Bstone_Demo_Importer
 */

defined( 'ABSPATH' ) || exit;

?>
<div id="message" class="updated bstone-demo-importer-message">
	<p><?php _e( '<strong>Reset Wizard</strong> &#8211; If you need to reset the WordPress back to default again :)', 'bstone-demo-importer' ); ?></p>
	<p class="submit"><a href="<?php echo esc_url( add_query_arg( 'do_reset_wordpress', 'true', admin_url( 'themes.php?page=demo-importer' ) ) ); ?>" class="button button-primary bstone-reset-wordpress"><?php _e( 'Run the Reset Wizard', 'bstone-demo-importer' ); ?></a> <a class="button-secondary skip" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'bstone-demo-importer-hide-notice', 'reset_notice' ), 'bstone_demo_importer_hide_notice_nonce', '_bstone_demo_importer_notice_nonce' ) ); ?>"><?php _e( 'Hide this notice', 'bstone-demo-importer' ); ?></a></p>
</div>
