<?php
/**
 * Custom background script.
 *
 * This file is deprecated, use 'zc-admin/includes/class-custom-background.php' instead.
 *
 * @deprecated 5.3.0
 * @package ZelocoreCMS
 * @subpackage Administration
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

_deprecated_file( basename( __FILE__ ), '5.3.0', 'zc-admin/includes/class-custom-background.php' );

/** Custom_Background class */
require_once ABSPATH . 'zc-admin/includes/class-custom-background.php';
