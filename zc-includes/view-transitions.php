<?php
/**
 * View Transitions API.
 *
 * @package ZelocoreCMS
 * @subpackage View Transitions
 * @since 7.0.0
 */

/**
 * Enqueues View Transitions CSS for the admin.
 *
 * @since 7.0.0
 */
function zc_enqueue_view_transitions_admin_css(): void {
	zc_enqueue_style( 'zc-view-transitions-admin' );
}

/**
 * Gets the CSS for View Transitions in the admin.
 *
 * @since 7.0.0
 *
 * @return string The CSS.
 */
function zc_get_view_transitions_admin_css(): string {
	$affix = SCRIPT_DEBUG ? '' : '.min';
	$path  = ABSPATH . "zc-admin/css/view-transitions{$affix}.css";
	return file_get_contents( $path );
}
