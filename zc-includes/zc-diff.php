<?php
/**
 * ZelocoreCMS Diff bastard child of old MediaWiki Diff Formatter.
 *
 * Basically all that remains is the table structure and some method names.
 *
 * @package ZelocoreCMS
 * @subpackage Diff
 */

// Don't load directly.
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'Text_Diff', false ) ) {
	/** Text_Diff class */
	require ABSPATH . ZCINC . '/Text/Diff.php';
	/** Text_Diff_Renderer class */
	require ABSPATH . ZCINC . '/Text/Diff/Renderer.php';
	/** Text_Diff_Renderer_inline class */
	require ABSPATH . ZCINC . '/Text/Diff/Renderer/inline.php';
	/** Text_Exception class */
	require ABSPATH . ZCINC . '/Text/Exception.php';
}

require ABSPATH . ZCINC . '/class-zc-text-diff-renderer-table.php';
require ABSPATH . ZCINC . '/class-zc-text-diff-renderer-inline.php';
