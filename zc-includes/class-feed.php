<?php
/**
 * Feed API
 *
 * @package ZelocoreCMS
 * @subpackage Feed
 * @deprecated 4.7.0
 */

_deprecated_file( basename( __FILE__ ), '4.7.0', 'fetch_feed()' );

if ( ! class_exists( 'SimplePie\SimplePie', false ) ) {
	require_once ABSPATH . ZCINC . '/class-simplepie.php';
}

require_once ABSPATH . ZCINC . '/class-zc-feed-cache.php';
require_once ABSPATH . ZCINC . '/class-zc-feed-cache-transient.php';
require_once ABSPATH . ZCINC . '/class-zc-simplepie-file.php';
require_once ABSPATH . ZCINC . '/class-zc-simplepie-sanitize-kses.php';
