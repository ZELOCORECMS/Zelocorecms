<?php
/**
 * Error Protection API: Functions
 *
 * @package ZelocoreCMS
 * @since 5.2.0
 */

/**
 * Get the instance for storing paused plugins.
 *
 * @return ZC_Paused_Extensions_Storage
 */
function zc_paused_plugins() {
	static $storage = null;

	if ( null === $storage ) {
		$storage = new ZC_Paused_Extensions_Storage( 'plugin' );
	}

	return $storage;
}

/**
 * Get the instance for storing paused extensions.
 *
 * @return ZC_Paused_Extensions_Storage
 */
function zc_paused_themes() {
	static $storage = null;

	if ( null === $storage ) {
		$storage = new ZC_Paused_Extensions_Storage( 'theme' );
	}

	return $storage;
}

/**
 * Get a human readable description of an extension's error.
 *
 * @since 5.2.0
 *
 * @param array $error Error details from `error_get_last()`.
 * @return string Formatted error description.
 */
function zc_get_extension_error_description( $error ) {
	$constants   = get_defined_constants( true );
	$constants   = $constants['Core'] ?? $constants['internal'];
	$core_errors = array();

	foreach ( $constants as $constant => $value ) {
		if ( str_starts_with( $constant, 'E_' ) ) {
			$core_errors[ $value ] = $constant;
		}
	}

	if ( isset( $core_errors[ $error['type'] ] ) ) {
		$error['type'] = $core_errors[ $error['type'] ];
	}

	/* translators: 1: Error type, 2: Error line number, 3: Error file name, 4: Error message. */
	$error_message = __( 'An error of type %1$s was caused in line %2$s of the file %3$s. Error message: %4$s' );

	return sprintf(
		$error_message,
		"<code>{$error['type']}</code>",
		"<code>{$error['line']}</code>",
		"<code>{$error['file']}</code>",
		"<code>{$error['message']}</code>"
	);
}

/**
 * Registers the shutdown handler for fatal errors.
 *
 * The handler will only be registered if {@see zc_is_fatal_error_handler_enabled()} returns true.
 *
 * @since 5.2.0
 */
function zc_register_fatal_error_handler() {
	if ( ! zc_is_fatal_error_handler_enabled() ) {
		return;
	}

	$handler = null;
	if ( defined( 'ZC_CONTENT_DIR' ) && is_readable( ZC_CONTENT_DIR . '/fatal-error-handler.php' ) ) {
		$handler = include ZC_CONTENT_DIR . '/fatal-error-handler.php';
	}

	if ( ! is_object( $handler ) || ! is_callable( array( $handler, 'handle' ) ) ) {
		$handler = new ZC_Fatal_Error_Handler();
	}

	register_shutdown_function( array( $handler, 'handle' ) );
}

/**
 * Checks whether the fatal error handler is enabled.
 *
 * A constant `ZC_DISABLE_FATAL_ERROR_HANDLER` can be set in `zc-config.php` to disable it, or alternatively the
 * {@see 'zc_fatal_error_handler_enabled'} filter can be used to modify the return value.
 *
 * @since 5.2.0
 *
 * @return bool True if the fatal error handler is enabled, false otherwise.
 */
function zc_is_fatal_error_handler_enabled() {
	$enabled = ! defined( 'ZC_DISABLE_FATAL_ERROR_HANDLER' ) || ! ZC_DISABLE_FATAL_ERROR_HANDLER;

	/**
	 * Filters whether the fatal error handler is enabled.
	 *
	 * **Important:** This filter runs before it can be used by plugins. It cannot
	 * be used by plugins, mu-plugins, or themes. To use this filter you must define
	 * a `$zc_filter` global before ZelocoreCMS loads, usually in `zc-config.php`.
	 *
	 * Example:
	 *
	 *     $GLOBALS['zc_filter'] = array(
	 *         'zc_fatal_error_handler_enabled' => array(
	 *             10 => array(
	 *                 array(
	 *                     'accepted_args' => 0,
	 *                     'function'      => function() {
	 *                         return false;
	 *                     },
	 *                 ),
	 *             ),
	 *         ),
	 *     );
	 *
	 * Alternatively you can use the `ZC_DISABLE_FATAL_ERROR_HANDLER` constant.
	 *
	 * @since 5.2.0
	 *
	 * @param bool $enabled True if the fatal error handler is enabled, false otherwise.
	 */
	return apply_filters( 'zc_fatal_error_handler_enabled', $enabled );
}

/**
 * Access the ZelocoreCMS Recovery Mode instance.
 *
 * @since 5.2.0
 *
 * @return ZC_Recovery_Mode
 */
function zc_recovery_mode() {
	static $zc_recovery_mode;

	if ( ! $zc_recovery_mode ) {
		$zc_recovery_mode = new ZC_Recovery_Mode();
	}

	return $zc_recovery_mode;
}
