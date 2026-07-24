<?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the zc-config.php file. The zc-config.php
 * file will then load the zc-settings.php file, which
 * will then set up the ZelocoreCMS environment.
 *
 * If the zc-config.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * zc-config.php file.
 *
 * Will also search for zc-config.php in ZelocoreCMS' parent
 * directory to allow the ZelocoreCMS directory to remain
 * untouched.
 *
 * @package ZelocoreCMS
 */

/** Define ABSPATH as this file's directory */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/*
 * The error_reporting() function can be disabled in php.ini. On systems where that is the case,
 * it's best to add a dummy function to the zc-config.php file, but as this call to the function
 * is run prior to zc-config.php loading, it is wrapped in a function_exists() check.
 */
if ( function_exists( 'error_reporting' ) ) {
	/*
	 * Initialize error reporting to a known set of levels.
	 *
	 * This will be adapted in zc_debug_mode() located in zc-includes/load.php based on ZC_DEBUG.
	 * @see https://www.php.net/manual/en/errorfunc.constants.php List of known error levels.
	 */
	error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );
}

/*
 * If zc-config.php exists in the ZelocoreCMS root, or if it exists in the root and zc-settings.php
 * doesn't, load zc-config.php. The secondary check for zc-settings.php has the added benefit
 * of avoiding cases where the current directory is a nested installation, e.g. / is ZelocoreCMS(a)
 * and /blog/ is ZelocoreCMS(b).
 *
 * If neither set of conditions is true, initiate loading the setup process.
 */
if ( file_exists( ABSPATH . 'zc-config.php' ) ) {

	/** The config file resides in ABSPATH */
	require_once ABSPATH . 'zc-config.php';

} elseif ( @file_exists( dirname( ABSPATH ) . '/zc-config.php' ) && ! @file_exists( dirname( ABSPATH ) . '/zc-settings.php' ) ) {

	/** The config file resides one level above ABSPATH but is not part of another installation */
	require_once dirname( ABSPATH ) . '/zc-config.php';

} else {

	// A config file doesn't exist.

	define( 'WPINC', 'zc-includes' );
	require_once ABSPATH . WPINC . '/version.php';
	require_once ABSPATH . WPINC . '/compat.php';
	require_once ABSPATH . WPINC . '/load.php';

	// Check for the required PHP version and for the MySQL extension or a database drop-in.
	zc_check_php_mysql_versions();

	// Standardize $_SERVER variables across setups.
	zc_fix_server_vars();

	define( 'ZC_CONTENT_DIR', ABSPATH . 'zc-content' );
	require_once ABSPATH . WPINC . '/functions.php';

	$path = zc_guess_url() . '/zc-admin/setup-config.php';

	// Redirect to setup-config.php.
	if ( ! str_contains( $_SERVER['REQUEST_URI'], 'setup-config' ) ) {
		header( 'Location: ' . $path );
		exit;
	}

	zc_load_translations_early();

	// Die with an error message.
	$die = '<p>' . sprintf(
		/* translators: %s: zc-config.php */
		__( "There doesn't seem to be a %s file. It is needed before the installation can continue." ),
		'<code>zc-config.php</code>'
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: 1: Documentation URL, 2: zc-config.php */
		__( 'Need more help? <a href="%1$s">Read the support article on %2$s</a>.' ),
		__( 'https://developer.zelocorecms.org/advanced-administration/zelocorecms/zc-config/' ),
		'<code>zc-config.php</code>'
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: zc-config.php */
		__( "You can create a %s file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file." ),
		'<code>zc-config.php</code>'
	) . '</p>';
	$die .= '<p><a href="' . $path . '" class="button button-large">' . __( 'Create a Configuration File' ) . '</a></p>';

	zc_die( $die, __( 'ZelocoreCMS &rsaquo; Error' ) );
}
