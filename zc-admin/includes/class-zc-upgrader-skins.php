<?php
/**
 * The User Interface "Skins" for the ZelocoreCMS File Upgrader
 *
 * @package ZelocoreCMS
 * @subpackage Upgrader
 * @since 2.8.0
 * @deprecated 4.7.0
 */

_deprecated_file( basename( __FILE__ ), '4.7.0', 'class-zc-upgrader.php' );

/** ZC_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-zc-upgrader-skin.php';

/** Plugin_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-plugin-upgrader-skin.php';

/** Theme_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-theme-upgrader-skin.php';

/** Bulk_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-bulk-upgrader-skin.php';

/** Bulk_Plugin_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-bulk-plugin-upgrader-skin.php';

/** Bulk_Theme_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-bulk-theme-upgrader-skin.php';

/** Plugin_Installer_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-plugin-installer-skin.php';

/** Theme_Installer_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-theme-installer-skin.php';

/** Language_Pack_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-language-pack-upgrader-skin.php';

/** Automatic_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-automatic-upgrader-skin.php';

/** ZC_Ajax_Upgrader_Skin class */
require_once ABSPATH . 'zc-admin/includes/class-zc-ajax-upgrader-skin.php';
