<?php
/**
 * Administration Functions
 *
 * This file is deprecated, use 'zc-admin/includes/admin.php' instead.
 *
 * @deprecated 2.5.0
 * @package ZelocoreCMS
 * @subpackage Administration
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

_deprecated_file( basename( __FILE__ ), '2.5.0', 'zc-admin/includes/admin.php' );

/** ZelocoreCMS Administration API: Includes all Administration functions. */
require_once ABSPATH . 'zc-admin/includes/admin.php';
