<?php
/**
 * Dependencies API: Scripts functions
 *
 * @since 2.6.0
 *
 * @package ZelocoreCMS
 * @subpackage Dependencies
 */

/**
 * Initializes $zc_scripts if it has not been set.
 *
 * @since 4.2.0
 *
 * @global ZC_Scripts $zc_scripts
 *
 * @return ZC_Scripts ZC_Scripts instance.
 */
function zc_scripts() {
	global $zc_scripts;

	if ( ! ( $zc_scripts instanceof ZC_Scripts ) ) {
		$zc_scripts = new ZC_Scripts();
	}

	return $zc_scripts;
}

/**
 * Helper function to output a _doing_it_wrong message when applicable.
 *
 * @ignore
 * @since 4.2.0
 * @since 5.5.0 Added the `$handle` parameter.
 *
 * @param string $function_name Function name.
 * @param string $handle        Optional. Name of the script or stylesheet that was
 *                              registered or enqueued too early. Default empty.
 */
function _zc_scripts_maybe_doing_it_wrong( $function_name, $handle = '' ) {
	if ( did_action( 'init' ) || did_action( 'zc_enqueue_scripts' )
		|| did_action( 'admin_enqueue_scripts' ) || did_action( 'login_enqueue_scripts' )
	) {
		return;
	}

	$message = sprintf(
		/* translators: 1: zc_enqueue_scripts, 2: admin_enqueue_scripts, 3: login_enqueue_scripts */
		__( 'Scripts and styles should not be registered or enqueued until the %1$s, %2$s, or %3$s hooks.' ),
		'<code>zc_enqueue_scripts</code>',
		'<code>admin_enqueue_scripts</code>',
		'<code>login_enqueue_scripts</code>'
	);

	if ( $handle ) {
		$message .= ' ' . sprintf(
			/* translators: %s: Name of the script or stylesheet. */
			__( 'This notice was triggered by the %s handle.' ),
			'<code>' . $handle . '</code>'
		);
	}

	_doing_it_wrong(
		$function_name,
		$message,
		'3.3.0'
	);
}

/**
 * Adds the data for the recognized args and warns for unrecognized args.
 *
 * @see zc_enqueue_script()
 * @see zc_register_script()
 *
 * @ignore
 * @since 7.0.0
 *
 * @param ZC_Scripts $zc_scripts ZC_Scripts instance.
 * @param string     $handle     Script handle.
 * @param array      $args       Array of extra args for the script.
 *
 * @phpstan-param non-empty-string $handle
 * @phpstan-param array{
 *     in_footer?: bool,
 *     strategy?: 'async'|'defer',
 *     fetchpriority?: 'low'|'auto'|'high',
 *     module_dependencies?: array<non-empty-string|array{ id: non-empty-string, ... }>,
 * } $args
 */
function _zc_scripts_add_args_data( ZC_Scripts $zc_scripts, string $handle, array $args ): void {
	$allowed_keys = array( 'strategy', 'in_footer', 'fetchpriority', 'module_dependencies' );
	$unknown_keys = array_diff( array_keys( $args ), $allowed_keys );
	if ( ! empty( $unknown_keys ) ) {
		$trace         = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 2 );
		$function_name = ( $trace[1]['class'] ?? '' ) . ( $trace[1]['type'] ?? '' ) . ( $trace[1]['function'] ?? __FUNCTION__ );
		_doing_it_wrong(
			$function_name,
			sprintf(
				/* translators: 1: $args, 2: List of unrecognized keys, 3: List of supported keys. */
				__( 'Unrecognized key(s) in the %1$s param: %2$s. Supported keys: %3$s' ),
				'$args',
				implode( zc_get_list_item_separator(), $unknown_keys ),
				implode( zc_get_list_item_separator(), $allowed_keys )
			),
			'7.0.0'
		);
	}

	$in_footer = ! empty( $args['in_footer'] );
	if ( $in_footer ) {
		$zc_scripts->add_data( $handle, 'group', 1 );
	}
	if ( ! empty( $args['strategy'] ) ) {
		$zc_scripts->add_data( $handle, 'strategy', $args['strategy'] );
	}
	if ( ! empty( $args['fetchpriority'] ) ) {
		$zc_scripts->add_data( $handle, 'fetchpriority', $args['fetchpriority'] );
	}
	if ( ! empty( $args['module_dependencies'] ) ) {
		$zc_scripts->add_data( $handle, 'module_dependencies', $args['module_dependencies'] );

		/*
		 * A classic script with module dependencies must either be printed in the
		 * footer or use the 'defer' loading strategy. Otherwise, the script may be
		 * evaluated before the script modules import map is printed, causing
		 * dynamic imports to fail with a "Failed to resolve module specifier" error.
		 */
		$is_deferred = 'defer' === ( $args['strategy'] ?? null );
		if ( ! $in_footer && ! $is_deferred ) {
			$trace         = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 2 );
			$function_name = ( $trace[1]['class'] ?? '' ) . ( $trace[1]['type'] ?? '' ) . ( $trace[1]['function'] ?? __FUNCTION__ );
			_doing_it_wrong(
				$function_name,
				sprintf(
					/* translators: 1: 'module_dependencies', 2: Script handle, 3: 'in_footer', 4: 'strategy', 5: 'defer'. */
					__( 'When the %1$s arg is provided, the "%2$s" script must either be printed in the footer (%3$s set to true) or use a deferred loading %4$s (%5$s) so that the import map is printed before the script is evaluated.' ),
					'<code>module_dependencies</code>',
					$handle,
					'<code>in_footer</code>',
					'<code>strategy</code>',
					'<code>defer</code>'
				),
				'7.0.0'
			);
		}
	}
}

/**
 * Prints scripts in document head that are in the $handles queue.
 *
 * Called by admin-header.php and {@see 'zc_head'} hook. Since it is called by zc_head on every page load,
 * the function does not instantiate the ZC_Scripts object unless script names are explicitly passed.
 * Makes use of already-instantiated `$zc_scripts` global if present. Use provided {@see 'zc_print_scripts'}
 * hook to register/enqueue new scripts.
 *
 * @see ZC_Scripts::do_item()
 * @since 2.1.0
 *
 * @global ZC_Scripts $zc_scripts The ZC_Scripts object for printing scripts.
 *
 * @param string|string[]|false $handles Optional. Scripts to be printed. Default 'false'.
 * @return string[] On success, an array of handles of processed ZC_Dependencies items; otherwise, an empty array.
 */
function zc_print_scripts( $handles = false ) {
	global $zc_scripts;

	/**
	 * Fires before scripts in the $handles queue are printed.
	 *
	 * @since 2.1.0
	 */
	do_action( 'zc_print_scripts' );

	if ( '' === $handles ) { // For 'zc_head'.
		$handles = false;
	}

	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__ );

	if ( ! ( $zc_scripts instanceof ZC_Scripts ) ) {
		if ( ! $handles ) {
			return array(); // No need to instantiate if nothing is there.
		}
	}

	return zc_scripts()->do_items( $handles );
}

/**
 * Adds extra code to a registered script.
 *
 * Code will only be added if the script is already in the queue.
 * Accepts a string `$data` containing the code. If two or more code blocks
 * are added to the same script `$handle`, they will be printed in the order
 * they were added, i.e. the latter added code can redeclare the previous.
 *
 * @since 4.5.0
 *
 * @see ZC_Scripts::add_inline_script()
 *
 * @param string $handle   Name of the script to add the inline script to.
 * @param string $data     String containing the JavaScript to be added.
 * @param string $position Optional. Whether to add the inline script before the handle
 *                         or after. Default 'after'.
 * @return bool True on success, false on failure.
 */
function zc_add_inline_script( $handle, $data, $position = 'after' ) {
	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	if ( false !== stripos( $data, '</script>' ) ) {
		_doing_it_wrong(
			__FUNCTION__,
			sprintf(
				/* translators: 1: <script>, 2: zc_add_inline_script() */
				__( 'Do not pass %1$s tags to %2$s.' ),
				'<code>&lt;script&gt;</code>',
				'<code>zc_add_inline_script()</code>'
			),
			'4.5.0'
		);
		$data = trim( (string) preg_replace( '#<script[^>]*>(.*)</script>#is', '$1', $data ) );
	}

	return zc_scripts()->add_inline_script( $handle, $data, $position );
}

/**
 * Registers a new script.
 *
 * Registers a script to be enqueued later using the zc_enqueue_script() function.
 *
 * @see ZC_Dependencies::add()
 * @see ZC_Dependencies::add_data()
 *
 * @since 2.1.0
 * @since 4.3.0 A return value was added.
 * @since 6.3.0 The $in_footer parameter of type boolean was overloaded to be an $args parameter of type array.
 * @since 6.9.0 The $fetchpriority parameter of type string was added to the $args parameter of type array.
 * @since 7.0.0 The $module_dependencies parameter of type string[] was added to the $args parameter of type array.
 *
 * @param string           $handle Name of the script. Should be unique.
 * @param string|false     $src    Full URL of the script, or path of the script relative to the ZelocoreCMS root directory.
 *                                 If source is set to false, script is an alias of other scripts it depends on.
 * @param string[]         $deps   Optional. An array of registered script handles this script depends on. Default empty array.
 * @param string|bool|null $ver    Optional. String specifying script version number, if it has one, which is added to the URL
 *                                 as a query string for cache busting purposes. If version is set to false, a version
 *                                 number is automatically added equal to current installed ZelocoreCMS version.
 *                                 If set to null, no version is added.
 * @param array|bool       $args   {
 *     Optional. An array of extra args for the script. Default empty array.
 *     Otherwise, it may be a boolean in which case it determines whether the script is printed in the footer. Default false.
 *
 *     @type string $strategy            Optional. If provided, may be either 'defer' or 'async'.
 *     @type bool   $in_footer           Optional. Whether to print the script in the footer. Default 'false'.
 *     @type string $fetchpriority       Optional. The fetch priority for the script. Default 'auto'.
 *     @type array  $module_dependencies Optional. IDs for module dependencies loaded via dynamic import. Default empty array.
 *                                                                    For the full data format, see the `$deps` param of {@see zc_register_script_module()}.
 *                                                                    When provided, the script must either be printed in the footer (with
 *                                                                    `in_footer` set to true) or use a deferred loading `strategy` (`defer`),
 *                                                                    so that the script modules import map is printed before the script
 *                                                                    is evaluated. Otherwise dynamic imports may fail to resolve.
 * }
 * @return bool Whether the script has been registered. True on success, false on failure.
 *
 * @phpstan-param non-empty-string $handle
 * @phpstan-param non-empty-string|false $src
 * @phpstan-param non-empty-string[] $deps
 * @phpstan-param array{
 *     in_footer?: bool,
 *     strategy?: 'async'|'defer',
 *     fetchpriority?: 'low'|'auto'|'high',
 *     module_dependencies?: array<non-empty-string|array{ id: non-empty-string, ... }>,
 * }|bool $args
 */
function zc_register_script( $handle, $src, $deps = array(), $ver = false, $args = array() ) {
	if ( ! is_array( $args ) ) {
		$args = array(
			'in_footer' => (bool) $args,
		);
	}
	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	$zc_scripts = zc_scripts();

	$registered = $zc_scripts->add( $handle, $src, $deps, $ver );
	_zc_scripts_add_args_data( $zc_scripts, $handle, $args );

	return $registered;
}

/**
 * Localizes a script.
 *
 * Works only if the script has already been registered.
 *
 * Accepts an associative array `$l10n` and creates a JavaScript object:
 *
 *     "$object_name": {
 *         key: value,
 *         key: value,
 *         ...
 *     }
 *
 * @see ZC_Scripts::localize()
 * @link https://core.trac.zelocorecms.org/ticket/11520
 *
 * @since 2.2.0
 *
 * @todo Documentation cleanup
 *
 * @param string               $handle      Script handle the data will be attached to.
 * @param string               $object_name Name for the JavaScript object. Passed directly, so it should be qualified JS variable.
 *                                          Example: '/[a-zA-Z0-9_]+/'.
 * @param array<string, mixed> $l10n        The data itself. The data can be either a single or multi-dimensional array.
 * @return bool True if the script was successfully localized, false otherwise.
 */
function zc_localize_script( $handle, $object_name, $l10n ) {
	$zc_scripts = zc_scripts();

	return $zc_scripts->localize( $handle, $object_name, $l10n );
}

/**
 * Sets translated strings for a script.
 *
 * Works only if the script has already been registered.
 *
 * @see ZC_Scripts::set_translations()
 * @since 5.0.0
 * @since 5.1.0 The `$domain` parameter was made optional.
 *
 * @global ZC_Scripts $zc_scripts The ZC_Scripts object for printing scripts.
 *
 * @param string $handle Script handle the textdomain will be attached to.
 * @param string $domain Optional. Text domain. Default 'default'.
 * @param string $path   Optional. The full file path to the directory containing translation files.
 * @return bool True if the text domain was successfully localized, false otherwise.
 */
function zc_set_script_translations( $handle, $domain = 'default', $path = '' ) {
	global $zc_scripts;

	if ( ! ( $zc_scripts instanceof ZC_Scripts ) ) {
		_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );
		return false;
	}

	return $zc_scripts->set_translations( $handle, $domain, $path );
}

/**
 * Removes a registered script.
 *
 * Note: there are intentional safeguards in place to prevent critical admin scripts,
 * such as jQuery core, from being unregistered.
 *
 * @see ZC_Dependencies::remove()
 *
 * @since 2.1.0
 *
 * @global string $pagenow The filename of the current screen.
 *
 * @param string $handle Name of the script to be removed.
 */
function zc_deregister_script( $handle ) {
	global $pagenow;

	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	/**
	 * Do not allow accidental or negligent de-registering of critical scripts in the admin.
	 * Show minimal remorse if the correct hook is used.
	 */
	$current_filter = current_filter();
	if ( ( is_admin() && 'admin_enqueue_scripts' !== $current_filter ) ||
		( 'zc-login.php' === $pagenow && 'login_enqueue_scripts' !== $current_filter )
	) {
		$not_allowed = array(
			'jquery',
			'jquery-core',
			'jquery-migrate',
			'jquery-ui-core',
			'jquery-ui-accordion',
			'jquery-ui-autocomplete',
			'jquery-ui-button',
			'jquery-ui-datepicker',
			'jquery-ui-dialog',
			'jquery-ui-draggable',
			'jquery-ui-droppable',
			'jquery-ui-menu',
			'jquery-ui-mouse',
			'jquery-ui-position',
			'jquery-ui-progressbar',
			'jquery-ui-resizable',
			'jquery-ui-selectable',
			'jquery-ui-slider',
			'jquery-ui-sortable',
			'jquery-ui-spinner',
			'jquery-ui-tabs',
			'jquery-ui-tooltip',
			'jquery-ui-widget',
			'underscore',
			'backbone',
		);

		if ( in_array( $handle, $not_allowed, true ) ) {
			_doing_it_wrong(
				__FUNCTION__,
				sprintf(
					/* translators: 1: Script name, 2: zc_enqueue_scripts */
					__( 'Do not deregister the %1$s script in the administration area. To target the front-end theme, use the %2$s hook.' ),
					"<code>$handle</code>",
					'<code>zc_enqueue_scripts</code>'
				),
				'3.6.0'
			);
			return;
		}
	}

	zc_scripts()->remove( $handle );
}

/**
 * Enqueues a script.
 *
 * Registers the script if `$src` provided (does NOT overwrite), and enqueues it.
 *
 * @see ZC_Dependencies::add()
 * @see ZC_Dependencies::add_data()
 * @see ZC_Dependencies::enqueue()
 *
 * @since 2.1.0
 * @since 6.3.0 The $in_footer parameter of type boolean was overloaded to be an $args parameter of type array.
 * @since 6.9.0 The $fetchpriority parameter of type string was added to the $args parameter of type array.
 * @since 7.0.0 The $module_dependencies parameter of type string[] was added to the $args parameter of type array.
 *
 * @param string           $handle Name of the script. Should be unique.
 * @param string           $src    Full URL of the script, or path of the script relative to the ZelocoreCMS root directory.
 *                                 Default empty.
 * @param string[]         $deps   Optional. An array of registered script handles this script depends on. Default empty array.
 * @param string|bool|null $ver    Optional. String specifying script version number, if it has one, which is added to the URL
 *                                 as a query string for cache busting purposes. If version is set to false, a version
 *                                 number is automatically added equal to current installed ZelocoreCMS version.
 *                                 If set to null, no version is added.
 * @param array|bool $args {
 *     Optional. An array of extra args for the script. Default empty array.
 *     Otherwise, it may be a boolean in which case it determines whether the script is printed in the footer. Default false.
 *
 *     @type string $strategy            Optional. If provided, may be either 'defer' or 'async'.
 *     @type bool   $in_footer           Optional. Whether to print the script in the footer. Default 'false'.
 *     @type string $fetchpriority       Optional. The fetch priority for the script. Default 'auto'.
 *     @type array  $module_dependencies Optional. IDs for module dependencies loaded via dynamic import. Default empty array.
 *                                       For the full data format, see the `$deps` param of {@see zc_register_script_module()}.
 *                                       When provided, the script must either be printed in the footer (with
 *                                       `in_footer` set to true) or use a deferred loading `strategy` (`defer`),
 *                                       so that the script modules import map is printed before the script
 *                                       is evaluated. Otherwise dynamic imports may fail to resolve.
 * }
 *
 * @phpstan-param non-empty-string $handle
 * @phpstan-param string $src
 * @phpstan-param non-empty-string[] $deps
 * @phpstan-param array{
 *     in_footer?: bool,
 *     strategy?: 'async'|'defer',
 *     fetchpriority?: 'low'|'auto'|'high',
 *     module_dependencies?: array<non-empty-string|array{ id: non-empty-string, ... }>,
 * }|bool $args
 */
function zc_enqueue_script( $handle, $src = '', $deps = array(), $ver = false, $args = array() ) {
	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	$zc_scripts = zc_scripts();

	if ( $src || ! empty( $args ) ) {
		/** @var array{ 0: non-empty-string, 1?: string } $_handle */
		$_handle = explode( '?', $handle );
		if ( ! is_array( $args ) ) {
			$args = array(
				'in_footer' => (bool) $args,
			);
		}

		if ( $src ) {
			$zc_scripts->add( $_handle[0], $src, $deps, $ver );
		}
		if ( ! empty( $args ) ) {
			_zc_scripts_add_args_data( $zc_scripts, $_handle[0], $args );
		}
	}

	$zc_scripts->enqueue( $handle );
}

/**
 * Removes a previously enqueued script.
 *
 * @see ZC_Dependencies::dequeue()
 *
 * @since 3.1.0
 *
 * @param string $handle Name of the script to be removed.
 */
function zc_dequeue_script( $handle ) {
	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	zc_scripts()->dequeue( $handle );
}

/**
 * Determines whether a script has been added to the queue.
 *
 * For more information on this and similar theme functions, check out
 * the {@link https://developer.zelocorecms.org/themes/basics/conditional-tags/
 * Conditional Tags} article in the Theme Developer Handbook.
 *
 * @since 2.8.0
 * @since 3.5.0 'enqueued' added as an alias of the 'queue' list.
 *
 * @param string $handle Name of the script.
 * @param string $status Optional. Status of the script to check. Default 'enqueued'.
 *                       Accepts 'enqueued', 'registered', 'queue', 'to_do', and 'done'.
 * @return bool Whether the script is queued.
 */
function zc_script_is( $handle, $status = 'enqueued' ) {
	_zc_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );

	return (bool) zc_scripts()->query( $handle, $status );
}

/**
 * Adds metadata to a script.
 *
 * Works only if the script has already been registered.
 *
 * Possible values for $key and $value:
 * 'strategy' string 'defer' or 'async'.
 *
 * @since 4.2.0
 * @since 6.9.0 Updated possible values to remove reference to 'conditional' and add 'strategy'.
 *
 * @see ZC_Dependencies::add_data()
 *
 * @param string $handle Name of the script.
 * @param string $key    Name of data point for which we're storing a value.
 * @param mixed  $value  String containing the data to be added.
 * @return bool True on success, false on failure.
 */
function zc_script_add_data( $handle, $key, $value ) {
	return zc_scripts()->add_data( $handle, $key, $value );
}
