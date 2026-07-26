<?php
/**
 * Used to set up and fix common variables and include
 * the ZelocoreCMS procedural and class library.
 *
 * Allows for some configuration in zc-config.php (see default-constants.php)
 *
 * @package ZelocoreCMS
 */

/**
 * Stores the location of the ZelocoreCMS directory of functions, classes, and core content.
 *
 * @since 1.0.0
 */
define( 'ZCINC', 'zc-includes' );

/**
 * Version information for the current ZelocoreCMS release.
 *
 * These can't be directly globalized in version.php. When updating,
 * include version.php from another installation and don't override
 * these values if already set.
 *
 * @global string   $zc_version              The ZelocoreCMS version string.
 * @global int      $zc_db_version           ZelocoreCMS database version.
 * @global string   $tinymce_version         TinyMCE version.
 * @global string   $required_php_version    The minimum required PHP version string.
 * @global string[] $required_php_extensions The names of required PHP extensions.
 * @global string   $required_mysql_version  The minimum required MySQL version string.
 * @global string   $zc_local_package        Locale code of the package.
 */
global $zc_version, $zc_db_version, $tinymce_version, $required_php_version, $required_php_extensions, $required_mysql_version, $zc_local_package;
require ABSPATH . ZCINC . '/version.php';
require ABSPATH . ZCINC . '/compat-utf8.php';
require ABSPATH . ZCINC . '/compat.php';
require ABSPATH . ZCINC . '/load.php';

// Check the server requirements.
zc_check_php_mysql_versions();

// Include files required for initialization.
require ABSPATH . ZCINC . '/class-zc-paused-extensions-storage.php';
require ABSPATH . ZCINC . '/class-zc-exception.php';
require ABSPATH . ZCINC . '/class-zc-fatal-error-handler.php';
require ABSPATH . ZCINC . '/class-zc-recovery-mode-cookie-service.php';
require ABSPATH . ZCINC . '/class-zc-recovery-mode-key-service.php';
require ABSPATH . ZCINC . '/class-zc-recovery-mode-link-service.php';
require ABSPATH . ZCINC . '/class-zc-recovery-mode-email-service.php';
require ABSPATH . ZCINC . '/class-zc-recovery-mode.php';
require ABSPATH . ZCINC . '/error-protection.php';
require ABSPATH . ZCINC . '/default-constants.php';
require_once ABSPATH . ZCINC . '/plugin.php';

/**
 * If not already configured, `$blog_id` will default to 1 in a single site
 * configuration. In multisite, it will be overridden by default in ms-settings.php.
 *
 * @since 2.0.0
 *
 * @global int $blog_id
 */
global $blog_id;

// Set initial default constants including ZC_MEMORY_LIMIT, ZC_MAX_MEMORY_LIMIT, ZC_DEBUG, SCRIPT_DEBUG, ZC_CONTENT_DIR and ZC_CACHE.
zc_initial_constants();

// Register the shutdown handler for fatal errors as soon as possible.
zc_register_fatal_error_handler();

// ZelocoreCMS calculates offsets from UTC.
// phpcs:ignore ZelocoreCMS.DateTime.RestrictedFunctions.timezone_change_date_default_timezone_set
date_default_timezone_set( 'UTC' );

// Standardize $_SERVER variables across setups.
zc_fix_server_vars();

// Check if the site is in maintenance mode.
zc_maintenance();

// Start loading timer.
timer_start();

// Check if ZC_DEBUG mode is enabled.
zc_debug_mode();

/**
 * Filters whether to enable loading of the advanced-cache.php drop-in.
 *
 * This filter runs before it can be used by plugins. It is designed for non-web
 * run-times. If false is returned, advanced-cache.php will never be loaded.
 *
 * @since 4.6.0
 *
 * @param bool $enable_advanced_cache Whether to enable loading advanced-cache.php (if present).
 *                                    Default true.
 */
if ( ZC_CACHE && apply_filters( 'enable_loading_advanced_cache_dropin', true ) && file_exists( ZC_CONTENT_DIR . '/advanced-cache.php' ) ) {
	// For an advanced caching plugin to use. Uses a static drop-in because you would only want one.
	include ZC_CONTENT_DIR . '/advanced-cache.php';

	// Re-initialize any hooks added manually by advanced-cache.php.
	if ( $zc_filter ) {
		$zc_filter = ZC_Hook::build_preinitialized_hooks( $zc_filter );
	}
}

// Define ZC_LANG_DIR if not set.
zc_set_lang_dir();

// Load early ZelocoreCMS files.
require ABSPATH . ZCINC . '/class-zc-list-util.php';
require ABSPATH . ZCINC . '/class-zc-token-map.php';
require ABSPATH . ZCINC . '/utf8.php';
require ABSPATH . ZCINC . '/formatting.php';
require ABSPATH . ZCINC . '/meta.php';
require ABSPATH . ZCINC . '/functions.php';
require ABSPATH . ZCINC . '/class-zc-meta-query.php';
require ABSPATH . ZCINC . '/class-zc-matchesmapregex.php';
require ABSPATH . ZCINC . '/class-zc.php';
require ABSPATH . ZCINC . '/class-zc-error.php';
require ABSPATH . ZCINC . '/pomo/mo.php';
require ABSPATH . ZCINC . '/l10n/class-zc-translation-controller.php';
require ABSPATH . ZCINC . '/l10n/class-zc-translations.php';
require ABSPATH . ZCINC . '/l10n/class-zc-translation-file.php';
require ABSPATH . ZCINC . '/l10n/class-zc-translation-file-mo.php';
require ABSPATH . ZCINC . '/l10n/class-zc-translation-file-php.php';

/**
 * @since 0.71
 *
 * @global wpdb $wpdb ZelocoreCMS database abstraction object.
 */
global $wpdb;
// Include the wpdb class and, if present, a db.php database drop-in.
require_zc_db();

/**
 * @since 3.3.0
 *
 * @global string $table_prefix The database table prefix.
 */
if ( ! isset( $GLOBALS['table_prefix'] ) ) {
	$GLOBALS['table_prefix'] = $table_prefix;
}

// Set the database table prefix and the format specifiers for database table columns.
zc_set_wpdb_vars();

// Start the ZelocoreCMS object cache, or an external object cache if the drop-in is present.
zc_start_object_cache();

// Attach the default filters.
require ABSPATH . ZCINC . '/default-filters.php';

// Initialize multisite if enabled.
if ( is_multisite() ) {
	require ABSPATH . ZCINC . '/class-zc-site-query.php';
	require ABSPATH . ZCINC . '/class-zc-network-query.php';
	require ABSPATH . ZCINC . '/ms-blogs.php';
	require ABSPATH . ZCINC . '/ms-settings.php';
} elseif ( ! defined( 'MULTISITE' ) ) {
	define( 'MULTISITE', false );
}

register_shutdown_function( 'shutdown_action_hook' );

// Stop most of ZelocoreCMS from being loaded if SHORTINIT is enabled.
if ( SHORTINIT ) {
	return false;
}

// Load the L10n library.
require_once ABSPATH . ZCINC . '/l10n.php';
require_once ABSPATH . ZCINC . '/class-zc-textdomain-registry.php';
require_once ABSPATH . ZCINC . '/class-zc-locale.php';
require_once ABSPATH . ZCINC . '/class-zc-locale-switcher.php';

// Run the installer if ZelocoreCMS is not installed.
zc_not_installed();

// Load most of ZelocoreCMS.
require ABSPATH . ZCINC . '/class-zc-walker.php';
require ABSPATH . ZCINC . '/class-zc-ajax-response.php';
require ABSPATH . ZCINC . '/capabilities.php';
require ABSPATH . ZCINC . '/class-zc-roles.php';
require ABSPATH . ZCINC . '/class-zc-role.php';
require ABSPATH . ZCINC . '/class-zc-user.php';
require ABSPATH . ZCINC . '/class-zc-query.php';
require ABSPATH . ZCINC . '/query.php';
require ABSPATH . ZCINC . '/class-zc-date-query.php';
require ABSPATH . ZCINC . '/theme.php';
require ABSPATH . ZCINC . '/class-zc-theme.php';
require ABSPATH . ZCINC . '/class-zc-theme-json-schema.php';
require ABSPATH . ZCINC . '/class-zc-theme-json-data.php';
require ABSPATH . ZCINC . '/class-zc-theme-json.php';
require ABSPATH . ZCINC . '/class-zc-theme-json-resolver.php';
require ABSPATH . ZCINC . '/class-zc-duotone.php';
require ABSPATH . ZCINC . '/global-styles-and-settings.php';
require ABSPATH . ZCINC . '/class-zc-block-template.php';
require ABSPATH . ZCINC . '/class-zc-block-templates-registry.php';
require ABSPATH . ZCINC . '/block-template-utils.php';
require ABSPATH . ZCINC . '/block-template.php';
require ABSPATH . ZCINC . '/theme-templates.php';
require ABSPATH . ZCINC . '/theme-previews.php';
require ABSPATH . ZCINC . '/template.php';
require ABSPATH . ZCINC . '/https-detection.php';
require ABSPATH . ZCINC . '/https-migration.php';
require ABSPATH . ZCINC . '/class-zc-user-request.php';
require ABSPATH . ZCINC . '/user.php';
require ABSPATH . ZCINC . '/class-zc-user-query.php';
require ABSPATH . ZCINC . '/class-zc-session-tokens.php';
require ABSPATH . ZCINC . '/class-zc-user-meta-session-tokens.php';
require ABSPATH . ZCINC . '/general-template.php';
require ABSPATH . ZCINC . '/link-template.php';
require ABSPATH . ZCINC . '/author-template.php';
require ABSPATH . ZCINC . '/robots-template.php';
require ABSPATH . ZCINC . '/post.php';
require ABSPATH . ZCINC . '/class-walker-page.php';
require ABSPATH . ZCINC . '/class-walker-page-dropdown.php';
require ABSPATH . ZCINC . '/class-zc-post-type.php';
require ABSPATH . ZCINC . '/class-zc-post.php';
require ABSPATH . ZCINC . '/post-template.php';
require ABSPATH . ZCINC . '/revision.php';
require ABSPATH . ZCINC . '/post-formats.php';
require ABSPATH . ZCINC . '/post-thumbnail-template.php';
require ABSPATH . ZCINC . '/category.php';
require ABSPATH . ZCINC . '/class-walker-category.php';
require ABSPATH . ZCINC . '/class-walker-category-dropdown.php';
require ABSPATH . ZCINC . '/category-template.php';
require ABSPATH . ZCINC . '/comment.php';
require ABSPATH . ZCINC . '/class-zc-comment.php';
require ABSPATH . ZCINC . '/class-zc-comment-query.php';
require ABSPATH . ZCINC . '/class-walker-comment.php';
require ABSPATH . ZCINC . '/comment-template.php';
require ABSPATH . ZCINC . '/rewrite.php';
require ABSPATH . ZCINC . '/class-zc-rewrite.php';
require ABSPATH . ZCINC . '/feed.php';
require ABSPATH . ZCINC . '/bookmark.php';
require ABSPATH . ZCINC . '/bookmark-template.php';
require ABSPATH . ZCINC . '/kses.php';
require ABSPATH . ZCINC . '/cron.php';
require ABSPATH . ZCINC . '/deprecated.php';
require ABSPATH . ZCINC . '/script-loader.php';
if ( file_exists( ABSPATH . ZCINC . '/build/routes.php' ) ) {
	require ABSPATH . ZCINC . '/build/routes.php';
}
if ( file_exists( ABSPATH . ZCINC . '/build/pages.php' ) ) {
	require ABSPATH . ZCINC . '/build/pages.php';
}
require ABSPATH . ZCINC . '/taxonomy.php';
require ABSPATH . ZCINC . '/class-zc-taxonomy.php';
require ABSPATH . ZCINC . '/class-zc-term.php';
require ABSPATH . ZCINC . '/class-zc-term-query.php';
require ABSPATH . ZCINC . '/class-zc-tax-query.php';
require ABSPATH . ZCINC . '/update.php';
require ABSPATH . ZCINC . '/canonical.php';
require ABSPATH . ZCINC . '/shortcodes.php';
require ABSPATH . ZCINC . '/embed.php';
require ABSPATH . ZCINC . '/class-zc-embed.php';
require ABSPATH . ZCINC . '/class-zc-oembed.php';
require ABSPATH . ZCINC . '/class-zc-oembed-controller.php';
require ABSPATH . ZCINC . '/media.php';
require ABSPATH . ZCINC . '/http.php';
require ABSPATH . ZCINC . '/html-api/html5-named-character-references.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-attribute-token.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-span.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-doctype-info.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-text-replacement.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-decoder.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-tag-processor.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-unsupported-exception.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-active-formatting-elements.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-open-elements.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-token.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-stack-event.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-processor-state.php';
require ABSPATH . ZCINC . '/html-api/class-zc-html-processor.php';
require ABSPATH . ZCINC . '/class-zc-block-processor.php';
require ABSPATH . ZCINC . '/class-zc-http.php';
require ABSPATH . ZCINC . '/class-zc-http-streams.php';
require ABSPATH . ZCINC . '/class-zc-http-curl.php';
require ABSPATH . ZCINC . '/class-zc-http-proxy.php';
require ABSPATH . ZCINC . '/class-zc-http-cookie.php';
require ABSPATH . ZCINC . '/class-zc-http-encoding.php';
require ABSPATH . ZCINC . '/class-zc-http-response.php';
require ABSPATH . ZCINC . '/class-zc-http-requests-response.php';
require ABSPATH . ZCINC . '/class-zc-http-requests-hooks.php';
require ABSPATH . ZCINC . '/php-ai-client/autoload.php';
require ABSPATH . ZCINC . '/ai-client/adapters/class-zc-ai-client-http-client.php';
require ABSPATH . ZCINC . '/ai-client/adapters/class-zc-ai-client-cache.php';
require ABSPATH . ZCINC . '/ai-client/adapters/class-zc-ai-client-discovery-strategy.php';
require ABSPATH . ZCINC . '/ai-client/adapters/class-zc-ai-client-event-dispatcher.php';
require ABSPATH . ZCINC . '/ai-client/class-zc-ai-client-ability-function-resolver.php';
require ABSPATH . ZCINC . '/ai-client/class-zc-ai-client-prompt-builder.php';
require ABSPATH . ZCINC . '/ai-client.php';
require ABSPATH . ZCINC . '/class-zc-connector-registry.php';
require ABSPATH . ZCINC . '/connectors.php';
require ABSPATH . ZCINC . '/class-zc-icons-registry.php';
require ABSPATH . ZCINC . '/widgets.php';
require ABSPATH . ZCINC . '/class-zc-widget.php';
require ABSPATH . ZCINC . '/class-zc-widget-factory.php';
require ABSPATH . ZCINC . '/nav-menu-template.php';
require ABSPATH . ZCINC . '/nav-menu.php';
require ABSPATH . ZCINC . '/admin-bar.php';
require ABSPATH . ZCINC . '/class-zc-application-passwords.php';
require ABSPATH . ZCINC . '/abilities-api/class-zc-ability-category.php';
require ABSPATH . ZCINC . '/abilities-api/class-zc-ability-categories-registry.php';
require ABSPATH . ZCINC . '/abilities-api/class-zc-ability.php';
require ABSPATH . ZCINC . '/abilities-api/class-zc-abilities-registry.php';
require ABSPATH . ZCINC . '/abilities-api.php';
require ABSPATH . ZCINC . '/abilities.php';
require ABSPATH . ZCINC . '/rest-api.php';
require ABSPATH . ZCINC . '/rest-api/class-zc-rest-server.php';
require ABSPATH . ZCINC . '/rest-api/class-zc-rest-response.php';
require ABSPATH . ZCINC . '/rest-api/class-zc-rest-request.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-posts-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-attachments-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-global-styles-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-post-types-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-post-statuses-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-revisions-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-global-styles-revisions-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-template-revisions-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-autosaves-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-template-autosaves-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-taxonomies-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-terms-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-menu-items-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-menus-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-menu-locations-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-users-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-comments-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-search-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-blocks-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-block-types-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-block-renderer-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-settings-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-themes-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-plugins-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-block-directory-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-edit-site-export-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-pattern-directory-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-block-patterns-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-block-pattern-categories-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-application-passwords-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-site-health-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-sidebars-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-widget-types-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-widgets-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-templates-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-url-details-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-navigation-fallback-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-font-families-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-font-faces-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-font-collections-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-icons-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-abilities-v1-categories-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-abilities-v1-list-controller.php';
require ABSPATH . ZCINC . '/rest-api/endpoints/class-zc-rest-abilities-v1-run-controller.php';
require ABSPATH . ZCINC . '/rest-api/fields/class-zc-rest-meta-fields.php';
require ABSPATH . ZCINC . '/rest-api/fields/class-zc-rest-comment-meta-fields.php';
require ABSPATH . ZCINC . '/rest-api/fields/class-zc-rest-post-meta-fields.php';
require ABSPATH . ZCINC . '/rest-api/fields/class-zc-rest-term-meta-fields.php';
require ABSPATH . ZCINC . '/rest-api/fields/class-zc-rest-user-meta-fields.php';
require ABSPATH . ZCINC . '/rest-api/search/class-zc-rest-search-handler.php';
require ABSPATH . ZCINC . '/rest-api/search/class-zc-rest-post-search-handler.php';
require ABSPATH . ZCINC . '/rest-api/search/class-zc-rest-term-search-handler.php';
require ABSPATH . ZCINC . '/rest-api/search/class-zc-rest-post-format-search-handler.php';
require ABSPATH . ZCINC . '/sitemaps.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps-index.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps-provider.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps-registry.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps-renderer.php';
require ABSPATH . ZCINC . '/sitemaps/class-zc-sitemaps-stylesheet.php';
require ABSPATH . ZCINC . '/sitemaps/providers/class-zc-sitemaps-posts.php';
require ABSPATH . ZCINC . '/sitemaps/providers/class-zc-sitemaps-taxonomies.php';
require ABSPATH . ZCINC . '/sitemaps/providers/class-zc-sitemaps-users.php';
require ABSPATH . ZCINC . '/class-zc-block-bindings-source.php';
require ABSPATH . ZCINC . '/class-zc-block-bindings-registry.php';
require ABSPATH . ZCINC . '/class-zc-block-editor-context.php';
require ABSPATH . ZCINC . '/class-zc-block-type.php';
require ABSPATH . ZCINC . '/class-zc-block-pattern-categories-registry.php';
require ABSPATH . ZCINC . '/class-zc-block-patterns-registry.php';
require ABSPATH . ZCINC . '/class-zc-block-styles-registry.php';
require ABSPATH . ZCINC . '/class-zc-block-type-registry.php';
require ABSPATH . ZCINC . '/class-zc-block.php';
require ABSPATH . ZCINC . '/class-zc-block-list.php';
require ABSPATH . ZCINC . '/class-zc-block-metadata-registry.php';
require ABSPATH . ZCINC . '/class-zc-block-parser-block.php';
require ABSPATH . ZCINC . '/class-zc-block-parser-frame.php';
require ABSPATH . ZCINC . '/class-zc-block-parser.php';
require ABSPATH . ZCINC . '/class-zc-classic-to-block-menu-converter.php';
require ABSPATH . ZCINC . '/class-zc-navigation-fallback.php';
require ABSPATH . ZCINC . '/block-bindings.php';
require ABSPATH . ZCINC . '/block-bindings/pattern-overrides.php';
require ABSPATH . ZCINC . '/block-bindings/post-data.php';
require ABSPATH . ZCINC . '/block-bindings/post-meta.php';
require ABSPATH . ZCINC . '/block-bindings/term-data.php';
require ABSPATH . ZCINC . '/blocks.php';
require ABSPATH . ZCINC . '/blocks/index.php';
require ABSPATH . ZCINC . '/block-editor.php';
require ABSPATH . ZCINC . '/block-patterns.php';
require ABSPATH . ZCINC . '/class-zc-block-supports.php';
require ABSPATH . ZCINC . '/block-supports/utils.php';
require ABSPATH . ZCINC . '/block-supports/align.php';
require ABSPATH . ZCINC . '/block-supports/auto-register.php';
require ABSPATH . ZCINC . '/block-supports/custom-classname.php';
require ABSPATH . ZCINC . '/block-supports/generated-classname.php';
require ABSPATH . ZCINC . '/block-supports/settings.php';
require ABSPATH . ZCINC . '/block-supports/elements.php';
require ABSPATH . ZCINC . '/block-supports/colors.php';
require ABSPATH . ZCINC . '/block-supports/typography.php';
require ABSPATH . ZCINC . '/block-supports/border.php';
require ABSPATH . ZCINC . '/block-supports/layout.php';
require ABSPATH . ZCINC . '/block-supports/position.php';
require ABSPATH . ZCINC . '/block-supports/spacing.php';
require ABSPATH . ZCINC . '/block-supports/dimensions.php';
require ABSPATH . ZCINC . '/block-supports/duotone.php';
require ABSPATH . ZCINC . '/block-supports/shadow.php';
require ABSPATH . ZCINC . '/block-supports/background.php';
require ABSPATH . ZCINC . '/block-supports/block-style-variations.php';
require ABSPATH . ZCINC . '/block-supports/aria-label.php';
require ABSPATH . ZCINC . '/block-supports/anchor.php';
require ABSPATH . ZCINC . '/block-supports/block-visibility.php';
require ABSPATH . ZCINC . '/block-supports/custom-css.php';
require ABSPATH . ZCINC . '/style-engine.php';
require ABSPATH . ZCINC . '/style-engine/class-zc-style-engine.php';
require ABSPATH . ZCINC . '/style-engine/class-zc-style-engine-css-declarations.php';
require ABSPATH . ZCINC . '/style-engine/class-zc-style-engine-css-rule.php';
require ABSPATH . ZCINC . '/style-engine/class-zc-style-engine-css-rules-store.php';
require ABSPATH . ZCINC . '/style-engine/class-zc-style-engine-processor.php';
require ABSPATH . ZCINC . '/fonts/class-zc-font-face-resolver.php';
require ABSPATH . ZCINC . '/fonts/class-zc-font-collection.php';
require ABSPATH . ZCINC . '/fonts/class-zc-font-face.php';
require ABSPATH . ZCINC . '/fonts/class-zc-font-library.php';
require ABSPATH . ZCINC . '/fonts/class-zc-font-utils.php';
require ABSPATH . ZCINC . '/fonts.php';
require ABSPATH . ZCINC . '/class-zc-script-modules.php';
require ABSPATH . ZCINC . '/script-modules.php';
require ABSPATH . ZCINC . '/interactivity-api/class-zc-interactivity-api.php';
require ABSPATH . ZCINC . '/interactivity-api/class-zc-interactivity-api-directives-processor.php';
require ABSPATH . ZCINC . '/interactivity-api/interactivity-api.php';
require ABSPATH . ZCINC . '/class-zc-plugin-dependencies.php';
require ABSPATH . ZCINC . '/class-zc-url-pattern-prefixer.php';
require ABSPATH . ZCINC . '/class-zc-speculation-rules.php';
require ABSPATH . ZCINC . '/speculative-loading.php';
require ABSPATH . ZCINC . '/view-transitions.php';

add_action( 'after_setup_theme', array( zc_script_modules(), 'add_hooks' ) );
add_action( 'after_setup_theme', array( zc_interactivity(), 'add_hooks' ) );

/**
 * @since 3.3.0
 *
 * @global ZC_Embed $zc_embed ZelocoreCMS Embed object.
 */
$GLOBALS['zc_embed'] = new ZC_Embed();

/**
 * ZelocoreCMS Textdomain Registry object.
 *
 * Used to support just-in-time translations for manually loaded text domains.
 *
 * @since 6.1.0
 *
 * @global ZC_Textdomain_Registry $zc_textdomain_registry ZelocoreCMS Textdomain Registry.
 */
$GLOBALS['zc_textdomain_registry'] = new ZC_Textdomain_Registry();
$GLOBALS['zc_textdomain_registry']->init();

// ZelocoreCMS AI Client initialization.
ZC_AI_Client_Discovery_Strategy::init();
ZelocoreCMS\AiClient\AiClient::setCache( new ZC_AI_Client_Cache() );
ZelocoreCMS\AiClient\AiClient::setEventDispatcher( new ZC_AI_Client_Event_Dispatcher() );

// Load multisite-specific files.
if ( is_multisite() ) {
	require ABSPATH . ZCINC . '/ms-functions.php';
	require ABSPATH . ZCINC . '/ms-default-filters.php';
	require ABSPATH . ZCINC . '/ms-deprecated.php';
}

// Define constants that rely on the API to obtain the default value.
// Define must-use plugin directory constants, which may be overridden in the sunrise.php drop-in.
zc_plugin_directory_constants();

/**
 * @since 3.9.0
 *
 * @global array $zc_plugin_paths
 */
$GLOBALS['zc_plugin_paths'] = array();

// Load must-use plugins.
foreach ( zc_get_mu_plugins() as $mu_plugin ) {
	$_zc_plugin_file = $mu_plugin;
	include_once $mu_plugin;
	$mu_plugin = $_zc_plugin_file; // Avoid stomping of the $mu_plugin variable in a plugin.

	/**
	 * Fires once a single must-use plugin has loaded.
	 *
	 * @since 5.1.0
	 *
	 * @param string $mu_plugin Full path to the plugin's main file.
	 */
	do_action( 'mu_plugin_loaded', $mu_plugin );
}
unset( $mu_plugin, $_zc_plugin_file );

// Load network activated plugins.
if ( is_multisite() ) {
	foreach ( zc_get_active_network_plugins() as $network_plugin ) {
		zc_register_plugin_realpath( $network_plugin );

		$_zc_plugin_file = $network_plugin;
		include_once $network_plugin;
		$network_plugin = $_zc_plugin_file; // Avoid stomping of the $network_plugin variable in a plugin.

		/**
		 * Fires once a single network-activated plugin has loaded.
		 *
		 * @since 5.1.0
		 *
		 * @param string $network_plugin Full path to the plugin's main file.
		 */
		do_action( 'network_plugin_loaded', $network_plugin );
	}
	unset( $network_plugin, $_zc_plugin_file );
}

/**
 * Fires once all must-use and network-activated plugins have loaded.
 *
 * @since 2.8.0
 */
do_action( 'muplugins_loaded' );

if ( is_multisite() ) {
	ms_cookie_constants();
}

// Define constants after multisite is loaded.
zc_cookie_constants();

// Define and enforce our SSL constants.
zc_ssl_constants();

// Create common globals.
require ABSPATH . ZCINC . '/vars.php';

// Make taxonomies and posts available to plugins and themes.
// @plugin authors: warning: these get registered again on the init hook.
create_initial_taxonomies();
create_initial_post_types();

zc_start_scraping_edited_file_errors();

// Register the default theme directory root.
register_theme_directory( get_theme_root() );

if ( ! is_multisite() && zc_is_fatal_error_handler_enabled() ) {
	// Handle users requesting a recovery mode link and initiating recovery mode.
	zc_recovery_mode()->initialize();
}

// To make get_plugin_data() available in a way that's compatible with plugins also loading this file, see #62244.
require_once ABSPATH . 'zc-admin/includes/plugin.php';

// Load active plugins.
foreach ( zc_get_active_and_valid_plugins() as $plugin ) {
	zc_register_plugin_realpath( $plugin );

	$plugin_data = get_plugin_data( $plugin, false, false );

	$textdomain = $plugin_data['TextDomain'];
	if ( $textdomain ) {
		if ( $plugin_data['DomainPath'] ) {
			$GLOBALS['zc_textdomain_registry']->set_custom_path( $textdomain, dirname( $plugin ) . $plugin_data['DomainPath'] );
		} else {
			$GLOBALS['zc_textdomain_registry']->set_custom_path( $textdomain, dirname( $plugin ) );
		}
	}

	$_zc_plugin_file = $plugin;
	include_once $plugin;
	$plugin = $_zc_plugin_file; // Avoid stomping of the $plugin variable in a plugin.

	/**
	 * Fires once a single activated plugin has loaded.
	 *
	 * @since 5.1.0
	 *
	 * @param string $plugin Full path to the plugin's main file.
	 */
	do_action( 'plugin_loaded', $plugin );
}
unset( $plugin, $_zc_plugin_file, $plugin_data, $textdomain );

// Load pluggable functions.
require ABSPATH . ZCINC . '/pluggable.php';
require ABSPATH . ZCINC . '/pluggable-deprecated.php';

// Set internal encoding.
zc_set_internal_encoding();

// Run zc_cache_postload() if object cache is enabled and the function exists.
if ( ZC_CACHE && function_exists( 'zc_cache_postload' ) ) {
	zc_cache_postload();
}

/**
 * Fires once activated plugins have loaded.
 *
 * Pluggable functions are also available at this point in the loading order.
 *
 * @since 1.5.0
 */
do_action( 'plugins_loaded' );

// Define constants which affect functionality if not already defined.
zc_functionality_constants();

// Add magic quotes and set up $_REQUEST ( $_GET + $_POST ).
zc_magic_quotes();

/**
 * Fires when comment cookies are sanitized.
 *
 * @since 2.0.11
 */
do_action( 'sanitize_comment_cookies' );

/**
 * ZelocoreCMS Query object
 *
 * @since 2.0.0
 *
 * @global ZC_Query $zc_the_query ZelocoreCMS Query object.
 */
$GLOBALS['zc_the_query'] = new ZC_Query();

/**
 * Holds the reference to {@see $zc_the_query}.
 * Use this global for ZelocoreCMS queries
 *
 * @since 1.5.0
 *
 * @global ZC_Query $zc_query ZelocoreCMS Query object.
 */
$GLOBALS['zc_query'] = $GLOBALS['zc_the_query'];

/**
 * Holds the ZelocoreCMS Rewrite object for creating pretty URLs
 *
 * @since 1.5.0
 *
 * @global ZC_Rewrite $zc_rewrite ZelocoreCMS rewrite component.
 */
$GLOBALS['zc_rewrite'] = new ZC_Rewrite();

/**
 * ZelocoreCMS Object
 *
 * @since 2.0.0
 *
 * @global ZC $zc Current ZelocoreCMS environment instance.
 */
$GLOBALS['zc'] = new ZC();

/**
 * ZelocoreCMS Widget Factory Object
 *
 * @since 2.8.0
 *
 * @global ZC_Widget_Factory $zc_widget_factory
 */
$GLOBALS['zc_widget_factory'] = new ZC_Widget_Factory();

/**
 * ZelocoreCMS User Roles
 *
 * @since 2.0.0
 *
 * @global ZC_Roles $zc_roles ZelocoreCMS role management object.
 */
$GLOBALS['zc_roles'] = new ZC_Roles();

/**
 * Fires before the theme is loaded.
 *
 * @since 2.6.0
 */
do_action( 'setup_theme' );

// Define the template related constants and globals.
zc_templating_constants();
zc_set_template_globals();

// Load the default text localization domain.
load_default_textdomain();

$locale      = get_locale();
$locale_file = ZC_LANG_DIR . "/$locale.php";
if ( ( 0 === validate_file( $locale ) ) && is_readable( $locale_file ) ) {
	require $locale_file;
}
unset( $locale_file );

/**
 * ZelocoreCMS Locale object for loading locale domain date and various strings.
 *
 * @since 2.1.0
 *
 * @global ZC_Locale $zc_locale ZelocoreCMS date and time locale object.
 */
$GLOBALS['zc_locale'] = new ZC_Locale();

/**
 * ZelocoreCMS Locale Switcher object for switching locales.
 *
 * @since 4.7.0
 *
 * @global ZC_Locale_Switcher $zc_locale_switcher ZelocoreCMS locale switcher object.
 */
$GLOBALS['zc_locale_switcher'] = new ZC_Locale_Switcher();
$GLOBALS['zc_locale_switcher']->init();

// Load the functions for the active theme, for both parent and child theme if applicable.
foreach ( zc_get_active_and_valid_themes() as $theme ) {
	$zc_theme = zc_get_theme( basename( $theme ) );

	$zc_theme->load_textdomain();

	if ( file_exists( $theme . '/functions.php' ) ) {
		include $theme . '/functions.php';
	}
}
unset( $theme, $zc_theme );

/**
 * Fires after the theme is loaded.
 *
 * @since 3.0.0
 */
do_action( 'after_setup_theme' );

// Create an instance of ZC_Site_Health so that Cron events may fire.
if ( ! class_exists( 'ZC_Site_Health' ) ) {
	require_once ABSPATH . 'zc-admin/includes/class-zc-site-health.php';
}
ZC_Site_Health::get_instance();

// Set up current user.
$GLOBALS['zc']->init();

/**
 * Fires after ZelocoreCMS has finished loading but before any headers are sent.
 *
 * Most of ZC is loaded at this stage, and the user is authenticated. ZC continues
 * to load on the {@see 'init'} hook that follows (e.g. widgets), and many plugins instantiate
 * themselves on it for all sorts of reasons (e.g. they need a user, a taxonomy, etc.).
 *
 * If you wish to plug an action once ZC is loaded, use the {@see 'zc_loaded'} hook below.
 *
 * @since 1.5.0
 */
do_action( 'init' );

// Check site status.
if ( is_multisite() ) {
	$file = ms_site_check();
	if ( true !== $file ) {
		require $file;
		die();
	}
	unset( $file );
}

/**
 * This hook is fired once ZC, all plugins, and the theme are fully loaded and instantiated.
 *
 * Ajax requests should use zc-admin/admin-ajax.php. admin-ajax.php can handle requests for
 * users not logged in.
 *
 * @link https://developer.zelocorecms.org/plugins/javascript/ajax
 *
 * @since 3.0.0
 */
do_action( 'zc_loaded' );
