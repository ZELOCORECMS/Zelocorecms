<?php
/**
 * Font Library administration screen.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 * @since 7.0.0
 */

/** ZelocoreCMS Administration Bootstrap */
require_once __DIR__ . '/admin.php';

if ( ! current_user_can( 'edit_theme_options' ) ) {
	zc_die(
		'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
		'<p>' . __( 'Sorry, you are not allowed to manage fonts on this site.' ) . '</p>',
		403
	);
}

// Check if Gutenberg build files are available
if ( ! function_exists( 'zc_font_library_zc_admin_render_page' ) ) {
	zc_die(
		'<h1>' . __( 'Font Library is not available.' ) . '</h1>' .
		'<p>' . __( 'The Font Library requires Gutenberg build files. Please run <code>npm install</code> to build the necessary files.' ) . '</p>',
		503
	);
}

// Set the page title
$title = _x( 'Fonts', 'Font Library admin page title' );

require_once ABSPATH . 'zc-admin/admin-header.php';

// Render the Font Library page
zc_font_library_zc_admin_render_page();

require_once ABSPATH . 'zc-admin/admin-footer.php';
