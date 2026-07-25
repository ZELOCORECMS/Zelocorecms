<?php
/**
 * Loads the ZelocoreCMS environment and template.
 *
 * @package ZelocoreCMS
 */

if ( ! isset( $zc_did_header ) ) {

	$zc_did_header = true;

	// Load the ZelocoreCMS library.
	require_once __DIR__ . '/zc-load.php';

	// Set up the ZelocoreCMS query.
	wp();

	// Load the theme template.
	require_once ABSPATH . ZCINC . '/template-loader.php';

}
