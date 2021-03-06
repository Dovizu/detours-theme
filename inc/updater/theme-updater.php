<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Reyl Pro
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'reyl_pro_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new reyl_pro_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => QL_STORE_URL, // Site where EDD is hosted
		'item_name' => QL_THEME_NAME, // Name of theme
		'theme_slug' => QL_THEME_SLUG, // Theme slug
		'version' => QL_THEME_VERSION, // The current version of this theme
		'author' => QL_THEME_AUTHOR, // The author of this theme
		'download_id' => '', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'reyl-pro' ),
		'enter-key' => __( 'Enter your theme license key.', 'reyl-pro' ),
		'license-key' => __( 'License Key', 'reyl-pro' ),
		'license-action' => __( 'License Action', 'reyl-pro' ),
		'deactivate-license' => __( 'Deactivate License', 'reyl-pro' ),
		'activate-license' => __( 'Activate License', 'reyl-pro' ),
		'status-unknown' => __( 'License status is unknown.', 'reyl-pro' ),
		'renew' => __( 'Renew?', 'reyl-pro' ),
		'unlimited' => __( 'unlimited', 'reyl-pro' ),
		'license-key-is-active' => __( 'License key is active.', 'reyl-pro' ),
		'expires%s' => __( 'Expires %s.', 'reyl-pro' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'reyl-pro' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'reyl-pro' ),
		'license-key-expired' => __( 'License key has expired.', 'reyl-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'reyl-pro' ),
		'license-is-inactive' => __( 'License is inactive.', 'reyl-pro' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'reyl-pro' ),
		'site-is-inactive' => __( 'Site is inactive.', 'reyl-pro' ),
		'license-status-unknown' => __( 'License status is unknown.', 'reyl-pro' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'reyl-pro' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'reyl-pro' )
	)

);