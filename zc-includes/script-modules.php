<?php
/**
 * Script Modules API: Script Module functions
 *
 * @since 6.5.0
 *
 * @package ZelocoreCMS
 * @subpackage Script Modules
 */

/**
 * Retrieves the main ZC_Script_Modules instance.
 *
 * This function provides access to the ZC_Script_Modules instance, creating one
 * if it doesn't exist yet.
 *
 * @since 6.5.0
 *
 * @global ZC_Script_Modules $zc_script_modules
 *
 * @return ZC_Script_Modules The main ZC_Script_Modules instance.
 */
function zc_script_modules(): ZC_Script_Modules {
	global $zc_script_modules;

	if ( ! ( $zc_script_modules instanceof ZC_Script_Modules ) ) {
		$zc_script_modules = new ZC_Script_Modules();
	}

	return $zc_script_modules;
}

/**
 * Registers the script module if no script module with that script module
 * identifier has already been registered.
 *
 * @since 6.5.0
 * @since 6.9.0 Added the $args parameter.
 *
 * @param string                              $id      The identifier of the script module. Should be unique. It will be used in the
 *                                                     final import map.
 * @param string                              $src     Optional. Full URL of the script module, or path of the script module relative
 *                                                     to the ZelocoreCMS root directory. If it is provided and the script module has
 *                                                     not been registered yet, it will be registered.
 * @param array<string|array<string, string>> $deps    {
 *                                                         Optional. List of dependencies.
 *
 *                                                         @type string|array<string, string> ...$0 {
 *                                                             An array of script module identifiers of the dependencies of this script
 *                                                             module. The dependencies can be strings or arrays. If they are arrays,
 *                                                             they need an `id` key with the script module identifier, and can contain
 *                                                             an `import` key with either `static` or `dynamic`. By default,
 *                                                             dependencies that don't contain an `import` key are considered static.
 *
 *                                                             @type string $id     The script module identifier.
 *                                                             @type string $import Optional. Import type. May be either `static` or
 *                                                                                  `dynamic`. Defaults to `static`.
 *                                                         }
 *                                                     }
 * @param string|false|null                   $version Optional. String specifying the script module version number. Defaults to false.
 *                                                     It is added to the URL as a query string for cache busting purposes. If $version
 *                                                     is set to false, the version number is the currently installed ZelocoreCMS version.
 *                                                     If $version is set to null, no version is added.
 * @param array<string, string|bool>          $args    {
 *     Optional. An array of additional args. Default empty array.
 *
 *     @type bool                $in_footer     Whether to print the script module in the footer. Only relevant to block themes. Default 'false'. Optional.
 *     @type 'auto'|'low'|'high' $fetchpriority Fetch priority. Default 'auto'. Optional.
 * }
 */
function zc_register_script_module( string $id, string $src, array $deps = array(), $version = false, array $args = array() ) {
	zc_script_modules()->register( $id, $src, $deps, $version, $args );
}

/**
 * Marks the script module to be enqueued in the page.
 *
 * If a src is provided and the script module has not been registered yet, it
 * will be registered.
 *
 * @since 6.5.0
 * @since 6.9.0 Added the $args parameter.
 *
 * @param string                              $id      The identifier of the script module. Should be unique. It will be used in the
 *                                                     final import map.
 * @param string                              $src     Optional. Full URL of the script module, or path of the script module relative
 *                                                     to the ZelocoreCMS root directory. If it is provided and the script module has
 *                                                     not been registered yet, it will be registered.
 * @param array<string|array<string, string>> $deps    {
 *                                                         Optional. List of dependencies.
 *
 *                                                         @type string|array<string, string> ...$0 {
 *                                                             An array of script module identifiers of the dependencies of this script
 *                                                             module. The dependencies can be strings or arrays. If they are arrays,
 *                                                             they need an `id` key with the script module identifier, and can contain
 *                                                             an `import` key with either `static` or `dynamic`. By default,
 *                                                             dependencies that don't contain an `import` key are considered static.
 *
 *                                                             @type string $id     The script module identifier.
 *                                                             @type string $import Optional. Import type. May be either `static` or
 *                                                                                  `dynamic`. Defaults to `static`.
 *                                                         }
 *                                                     }
 * @param string|false|null                   $version Optional. String specifying the script module version number. Defaults to false.
 *                                                     It is added to the URL as a query string for cache busting purposes. If $version
 *                                                     is set to false, the version number is the currently installed ZelocoreCMS version.
 *                                                     If $version is set to null, no version is added.
 * @param array<string, string|bool>          $args    {
 *     Optional. An array of additional args. Default empty array.
 *
 *     @type bool                $in_footer     Whether to print the script module in the footer. Only relevant to block themes. Default 'false'. Optional.
 *     @type 'auto'|'low'|'high' $fetchpriority Fetch priority. Default 'auto'. Optional.
 * }
 */
function zc_enqueue_script_module( string $id, string $src = '', array $deps = array(), $version = false, array $args = array() ) {
	zc_script_modules()->enqueue( $id, $src, $deps, $version, $args );
}

/**
 * Unmarks the script module so it is no longer enqueued in the page.
 *
 * @since 6.5.0
 *
 * @param string $id The identifier of the script module.
 */
function zc_dequeue_script_module( string $id ) {
	zc_script_modules()->dequeue( $id );
}

/**
 * Deregisters the script module.
 *
 * @since 6.5.0
 *
 * @param string $id The identifier of the script module.
 */
function zc_deregister_script_module( string $id ) {
	zc_script_modules()->deregister( $id );
}

/**
 * Overrides the text domain and path used to load translations for a script module.
 *
 * Translations for script modules are loaded automatically from the default
 * text domain and language directory. Use this function only when a module's
 * text domain differs from `'default'` or when translation files live outside
 * the standard location, for example plugin modules using their own text domain.
 *
 * @since 7.0.0
 *
 * @see ZC_Script_Modules::set_translations()
 *
 * @param string $id     The identifier of the script module.
 * @param string $domain Optional. Text domain. Default 'default'.
 * @param string $path   Optional. The full file path to the directory containing translation files.
 * @return bool True if the text domain was registered, false if the module is not registered.
 */
function zc_set_script_module_translations( string $id, string $domain = 'default', string $path = '' ): bool {
	return zc_script_modules()->set_translations( $id, $domain, $path );
}

/**
 * Registers all the default ZelocoreCMS Script Modules.
 *
 * @since 6.7.0
 */
function zc_default_script_modules() {
	$suffix = defined( 'ZC_RUN_CORE_TESTS' ) ? '.min' : zc_scripts_get_suffix();

	/*
	 * Expects multidimensional array like:
	 *
	 *     'interactivity/index.js' => array('dependencies' => array(…), 'version' => '…'),
	 *     'interactivity-router/index.js' => array('dependencies' => array(…), 'version' => '…'),
	 *     'block-library/navigation/view.js' => …
	 */
	$assets_file = ABSPATH . WPINC . '/assets/script-modules-packages.php';
	$assets      = file_exists( $assets_file ) ? include $assets_file : array();

	foreach ( $assets as $file_name => $script_module_data ) {
		/*
		 * Build the ZelocoreCMS Script Module ID from the file name.
		 * Prepend `@zelocorecms/` and remove extensions and `/index` if present:
		 *   - interactivity/index.min.js         => @zelocorecms/interactivity
		 *   - interactivity-router/index.min.js  => @zelocorecms/interactivity-router
		 *   - block-library/navigation/view.js   => @zelocorecms/block-library/navigation/view
		 */
		$script_module_id = '@zelocorecms/' . preg_replace( '~(?:/index)?(?:\.min)?\.js$~D', '', $file_name, 1 );

		/*
		 * The Interactivity API is designed with server-side rendering as its primary goal, so all of its script modules
		 * should be loaded with low fetchpriority and printed in the footer since they should not be needed in the
		 * critical rendering path. Also, the @zelocorecms/a11y script module is intended to be used as a dynamic import
		 * dependency, in which case the fetchpriority is irrelevant. See <https://make.zelocorecms.org/core/2024/10/14/updates-to-script-modules-in-6-7/>.
		 * However, in case it is added as a static import dependency, the fetchpriority is explicitly set to be 'low'
		 * since the module should not be involved in the critical rendering path, and if it is, its fetchpriority will
		 * be bumped to match the fetchpriority of the dependent script.
		 */
		$args = array();
		if (
			str_starts_with( $script_module_id, '@zelocorecms/interactivity' ) ||
			str_starts_with( $script_module_id, '@zelocorecms/block-library' ) ||
			'@zelocorecms/a11y' === $script_module_id
		) {
			$args['fetchpriority'] = 'low';
			$args['in_footer']     = true;
		}

		// Marks all Core blocks as compatible with client-side navigation.
		if ( str_starts_with( $script_module_id, '@zelocorecms/block-library' ) ) {
			zc_interactivity()->add_client_navigation_support_to_script_module( $script_module_id );
		}

		if ( '' !== $suffix ) {
			$file_name = str_replace( '.js', $suffix . '.js', $file_name );
		}

		$path        = includes_url( "js/dist/script-modules/{$file_name}" );
		$module_deps = $script_module_data['module_dependencies'] ?? array();
		zc_register_script_module( $script_module_id, $path, $module_deps, $script_module_data['version'], $args );
	}
}

/**
 * Enqueues script modules required by the block editor.
 *
 * @since 6.9.0
 */
function zc_enqueue_block_editor_script_modules() {
	/*
	 * Enqueue the LaTeX to MathML loader for the math block editor.
	 * The loader dynamically imports the main LaTeX to MathML module when needed.
	 */
	zc_enqueue_script_module( '@zelocorecms/latex-to-mathml/loader' );
}
