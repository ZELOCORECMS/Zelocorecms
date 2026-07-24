<?php
/**
 * Multisite themes administration panel.
 *
 * @package ZelocoreCMS
 * @subpackage Multisite
 * @since 3.0.0
 */

require_once __DIR__ . '/admin.php';

zc_redirect( network_admin_url( 'themes.php' ) );
exit;
