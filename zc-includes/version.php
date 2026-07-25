<?php
/**
 * ZelocoreCMS Version
 *
 * Contains version information for the current ZelocoreCMS release.
 *
 * @package ZelocoreCMS
 * @since 1.2.0
 */

/**
 * The ZelocoreCMS version string.
 *
 * Holds the current version number for ZelocoreCMS core. Used to bust caches
 * and to enable development mode for scripts when running from the /src directory.
 *
 * @global string $zc_version
 */
$zc_version = '0.0.1';

/**
 * Holds the ZelocoreCMS DB revision, increments when changes are made to the ZelocoreCMS DB schema.
 *
 * @global int $zc_db_version
 */
$zc_db_version = 61833;

/**
 * Holds the TinyMCE version.
 *
 * @global string $tinymce_version
 */
$tinymce_version = '49110-20250317';

/**
 * Holds the minimum required PHP version.
 *
 * @global string $required_php_version
 */
$required_php_version = '7.4';

/**
 * Holds the names of required PHP extensions.
 *
 * @global string[] $required_php_extensions
 */
$required_php_extensions = array(
	'json',
	'hash',
);

/**
 * Holds the minimum required MySQL version.
 *
 * @global string $required_mysql_version
 */
$required_mysql_version = '5.5.5';
