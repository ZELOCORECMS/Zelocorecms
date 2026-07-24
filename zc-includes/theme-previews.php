<?php
/**
 * Theme previews using the Site Editor for block themes.
 *
 * @package ZelocoreCMS
 */

/**
 * Filters the blog option to return the path for the previewed theme.
 *
 * @since 6.3.0
 *
 * @param string $current_stylesheet The current theme's stylesheet or template path.
 * @return string The previewed theme's stylesheet or template path.
 */
function zc_get_theme_preview_path( $current_stylesheet = null ) {
	if ( ! current_user_can( 'switch_themes' ) ) {
		return $current_stylesheet;
	}

	$preview_stylesheet = ! empty( $_GET['zc_theme_preview'] ) ? sanitize_text_field( zc_unslash( $_GET['zc_theme_preview'] ) ) : null;
	$zc_theme           = zc_get_theme( $preview_stylesheet );
	if ( ! is_zc_error( $zc_theme->errors() ) ) {
		if ( current_filter() === 'template' ) {
			$theme_path = $zc_theme->get_template();
		} else {
			$theme_path = $zc_theme->get_stylesheet();
		}

		return sanitize_text_field( $theme_path );
	}

	return $current_stylesheet;
}

/**
 * Adds a middleware to `apiFetch` to set the theme for the preview.
 * This adds a `zc_theme_preview` URL parameter to API requests from the Site Editor, so they also respond as if the theme is set to the value of the parameter.
 *
 * @since 6.3.0
 */
function zc_attach_theme_preview_middleware() {
	// Don't allow non-admins to preview themes.
	if ( ! current_user_can( 'switch_themes' ) ) {
		return;
	}

	zc_add_inline_script(
		'zc-api-fetch',
		sprintf(
			'wp.apiFetch.use( wp.apiFetch.createThemePreviewMiddleware( %s ) );',
			zc_json_encode( sanitize_text_field( zc_unslash( $_GET['zc_theme_preview'] ) ), JSON_HEX_TAG | JSON_UNESCAPED_SLASHES )
		),
		'after'
	);
}

/**
 * Set a JavaScript constant for theme activation.
 *
 * Sets the JavaScript global ZC_BLOCK_THEME_ACTIVATE_NONCE containing the nonce
 * required to activate a theme. For use within the site editor.
 *
 * @see https://github.com/ZelocoreCMS/gutenberg/pull/41836
 *
 * @since 6.3.0
 * @access private
 */
function zc_block_theme_activate_nonce() {
	$nonce_handle = 'switch-theme_' . zc_get_theme_preview_path();
	?>
	<script>
		window.ZC_BLOCK_THEME_ACTIVATE_NONCE = <?php echo zc_json_encode( zc_create_nonce( $nonce_handle ), JSON_HEX_TAG | JSON_UNESCAPED_SLASHES ); ?>;
	</script>
	<?php
}

/**
 * Add filters and actions to enable Block Theme Previews in the Site Editor.
 *
 * The filters and actions should be added after `pluggable.php` is included as they may
 * trigger code that uses `current_user_can()` which requires functionality from `pluggable.php`.
 *
 * @since 6.3.2
 */
function zc_initialize_theme_preview_hooks() {
	if ( ! empty( $_GET['zc_theme_preview'] ) ) {
		add_filter( 'stylesheet', 'zc_get_theme_preview_path' );
		add_filter( 'template', 'zc_get_theme_preview_path' );
		add_action( 'init', 'zc_attach_theme_preview_middleware' );
		add_action( 'admin_head', 'zc_block_theme_activate_nonce' );
	}
}
