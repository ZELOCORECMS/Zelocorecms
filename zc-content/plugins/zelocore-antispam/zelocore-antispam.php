<?php
/**
 * @package ZelocoreAntispam
 */
/*
Plugin Name: Zelocore Anti-spam: Spam Protection
Plugin URI: https://zelocorecms.org/
Description: The native spam protection engine for ZelocoreCMS. Zelocore Anti-spam keeps your site protected from comment spam, pingback spam, and contact form spam — even while you sleep. Activate the plugin and enter your API key on the settings page to get started.
Version: 1.0.0
Requires at least: 0.0.1
Requires PHP: 8.2
Author: ZelocoreCMS Team
Author URI: https://zelocorecms.org/
License: GPLv2 or later
Text Domain: zelocore-antispam
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

Copyright 2025 ZelocoreCMS Contributors.
*/

if ( ! function_exists( 'add_action' ) ) {
	echo 'Zelocore Anti-spam is a ZelocoreCMS plugin and cannot be called directly.';
	exit;
}

define( 'ZELOCORE_ANTISPAM_VERSION',         '1.0.0' );
define( 'ZELOCORE_ANTISPAM_MINIMUM_ZC_VERSION', '0.0.1' );
define( 'ZELOCORE_ANTISPAM_PLUGIN_DIR',      plugin_dir_path( __FILE__ ) );
define( 'ZELOCORE_ANTISPAM_DELETE_LIMIT',    10000 );

register_activation_hook( __FILE__,   array( 'ZelocoreAntispam', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'ZelocoreAntispam', 'plugin_deactivation' ) );

require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam.php';
require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-widget.php';
require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-rest-api.php';

add_action( 'init',          array( 'ZelocoreAntispam', 'init' ) );
add_action( 'rest_api_init', array( 'ZelocoreAntispam_REST_API', 'init' ) );

if ( function_exists( 'zc_get_connectors' ) && file_exists( ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-connector.php' ) ) {
	require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-connector.php';
	add_action( 'init', array( 'ZelocoreAntispam_Connector', 'init' ) );
}

if ( function_exists( 'zc_register_ability' ) && file_exists( ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-abilities.php' ) ) {
	require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-abilities.php';
	add_action(
		'init',
		function () {
			if ( ZelocoreAntispam::get_api_key() ) {
				ZelocoreAntispam_Abilities::init();
			}
		}
	);
}

if ( is_admin() || ( defined( 'ZC_CLI' ) && ZC_CLI ) ) {
	require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-admin.php';
	add_action( 'init', array( 'ZelocoreAntispam_Admin', 'init' ) );
}

if ( defined( 'ZC_CLI' ) && ZC_CLI ) {
	require_once ZELOCORE_ANTISPAM_PLUGIN_DIR . 'class-zelocore-antispam-cli.php';
}
