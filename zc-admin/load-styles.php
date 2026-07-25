<?php

/*
 * The error_reporting() function can be disabled in php.ini. On systems where that is the case,
 * it's best to add a dummy function to the zc-config.php file, but as this call to the function
 * is run prior to zc-config.php loading, it is wrapped in a function_exists() check.
 */
if ( function_exists( 'error_reporting' ) ) {
	/*
	 * Disable error reporting.
	 *
	 * Set this to error_reporting( -1 ) for debugging.
	 */
	error_reporting( 0 );
}

// Set ABSPATH for execution.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __DIR__ ) . '/' );
}

define( 'ZCINC', 'zc-includes' );
define( 'ZC_CONTENT_DIR', ABSPATH . 'zc-content' );

require ABSPATH . 'zc-admin/includes/noop.php';
require ABSPATH . ZCINC . '/theme.php';
require ABSPATH . ZCINC . '/class-zc-theme-json-resolver.php';
require ABSPATH . ZCINC . '/global-styles-and-settings.php';
require ABSPATH . ZCINC . '/script-loader.php';
require ABSPATH . ZCINC . '/version.php';

$protocol = $_SERVER['SERVER_PROTOCOL'];
if ( ! in_array( $protocol, array( 'HTTP/1.1', 'HTTP/2', 'HTTP/2.0', 'HTTP/3' ), true ) ) {
	$protocol = 'HTTP/1.0';
}

$load = $_GET['load'];
if ( is_array( $load ) ) {
	ksort( $load );
	$load = implode( '', $load );
}

$load = preg_replace( '/[^a-z0-9,_-]+/i', '', $load );
$load = array_unique( explode( ',', $load ) );

if ( empty( $load ) ) {
	header( "$protocol 400 Bad Request" );
	exit;
}

$rtl            = ( isset( $_GET['dir'] ) && 'rtl' === $_GET['dir'] );
$expires_offset = 31536000; // 1 year.
$out            = '';

$zc_styles = new ZC_Styles();
zc_default_styles( $zc_styles );

$etag = $zc_styles->get_etag( $load );

if ( isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) && stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) === $etag ) {
	header( "$protocol 304 Not Modified" );
	exit;
}

foreach ( $load as $handle ) {
	if ( ! array_key_exists( $handle, $zc_styles->registered ) ) {
		continue;
	}

	$style = $zc_styles->registered[ $handle ];

	if ( empty( $style->src ) ) {
		continue;
	}

	$path = ABSPATH . $style->src;

	if ( $rtl && ! empty( $style->extra['rtl'] ) ) {
		// All default styles have fully independent RTL files.
		$path = str_replace( '.min.css', '-rtl.min.css', $path );
	}

	$content = get_file( $path ) . "\n";

	// Note: str_starts_with() is not used here, as zc-includes/compat.php is not loaded in this file.
	if ( 0 === strpos( $style->src, '/' . ZCINC . '/css/' ) ) {
		$content = str_replace( '../images/', '../' . ZCINC . '/images/', $content );
		$content = str_replace( '../js/tinymce/', '../' . ZCINC . '/js/tinymce/', $content );
		$content = str_replace( '../fonts/', '../' . ZCINC . '/fonts/', $content );
		$out    .= $content;
	} else {
		$out .= str_replace( '../images/', 'images/', $content );
	}
}

header( "Etag: $etag" );
header( 'Content-Type: text/css; charset=UTF-8' );
header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + $expires_offset ) . ' GMT' );
header( "Cache-Control: public, max-age=$expires_offset" );

echo $out;
exit;
