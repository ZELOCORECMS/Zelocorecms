<?php
/**
 * Connectors administration screen.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 * @since 7.0.0
 */

/** ZelocoreCMS Administration Bootstrap */
require_once __DIR__ . '/admin.php';

if ( ! current_user_can( 'manage_options' ) ) {
	zc_die(
		'<h1>' . __( 'You need a higher level of permission.' ) . '</h1>' .
		'<p>' . __( 'Sorry, you are not allowed to manage connectors on this site.' ) . '</p>',
		403
	);
}

if ( ! class_exists( '\ZelocoreCMS\AiClient\AiClient' ) || ! function_exists( 'zc_options_connectors_zc_admin_render_page' ) ) {
	zc_die(
		'<h1>' . __( 'Connectors are not available.' ) . '</h1>' .
		'<p>' . __( 'The Connectors page requires build files. Please run <code>npm install</code> to build the necessary files.' ) . '</p>',
		503
	);
}

// Set the page title.
$title = __( 'Connectors' );

// Set parent file for menu highlighting.
$parent_file = 'options-general.php';

require_once ABSPATH . 'zc-admin/admin-header.php';

// Render the Connectors page.
zc_options_connectors_zc_admin_render_page();

require_once ABSPATH . 'zc-admin/admin-footer.php';
