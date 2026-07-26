<?php
/**
 * ZelocoreCMS database access abstraction class.
 *
 * This file is deprecated, use 'zc-includes/class-zcdb.php' instead.
 *
 * @deprecated 6.1.0
 * @package ZelocoreCMS
 */

if ( function_exists( '_deprecated_file' ) ) {
	// Note: ZCINC may not be defined yet, so 'zc-includes' is used here.
	_deprecated_file( basename( __FILE__ ), '6.1.0', 'zc-includes/class-zcdb.php' );
}

/** zcdb class */
require_once __DIR__ . '/class-zcdb.php';
