<?php
/**
 * Front to the ZelocoreCMS application. This file doesn't do anything, but loads
 * zc-blog-header.php which does and tells ZelocoreCMS to load the theme.
 *
 * @package ZelocoreCMS
 */

/**
 * Tells ZelocoreCMS to load the ZelocoreCMS theme and output it.
 *
 * @var bool
 */
define( 'ZC_USE_THEMES', true );

/** Loads the ZelocoreCMS Environment and Template */
require __DIR__ . '/zc-blog-header.php';
