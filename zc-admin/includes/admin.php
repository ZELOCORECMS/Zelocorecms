<?php
/**
 * Core Administration API
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 * @since 2.3.0
 */

if ( ! defined( 'ZC_ADMIN' ) ) {
	/*
	 * This file is being included from a file other than zc-admin/admin.php, so
	 * some setup was skipped. Make sure the admin message catalog is loaded since
	 * load_default_textdomain() will not have done so in this context.
	 */
	$admin_locale = get_locale();
	load_textdomain( 'default', ZC_LANG_DIR . '/admin-' . $admin_locale . '.mo', $admin_locale );
	unset( $admin_locale );
}

/** ZelocoreCMS Administration Hooks */
require_once ABSPATH . 'zc-admin/includes/admin-filters.php';

/** ZelocoreCMS Bookmark Administration API */
require_once ABSPATH . 'zc-admin/includes/bookmark.php';

/** ZelocoreCMS Comment Administration API */
require_once ABSPATH . 'zc-admin/includes/comment.php';

/** ZelocoreCMS Administration File API */
require_once ABSPATH . 'zc-admin/includes/file.php';

/** ZelocoreCMS Image Administration API */
require_once ABSPATH . 'zc-admin/includes/image.php';

/** ZelocoreCMS Media Administration API */
require_once ABSPATH . 'zc-admin/includes/media.php';

/** ZelocoreCMS Import Administration API */
require_once ABSPATH . 'zc-admin/includes/import.php';

/** ZelocoreCMS Misc Administration API */
require_once ABSPATH . 'zc-admin/includes/misc.php';

/** ZelocoreCMS Misc Administration API */
require_once ABSPATH . 'zc-admin/includes/class-zc-privacy-policy-content.php';

/** ZelocoreCMS Options Administration API */
require_once ABSPATH . 'zc-admin/includes/options.php';

/** ZelocoreCMS Plugin Administration API */
require_once ABSPATH . 'zc-admin/includes/plugin.php';

/** ZelocoreCMS Post Administration API */
require_once ABSPATH . 'zc-admin/includes/post.php';

/** ZelocoreCMS Administration Screen API */
require_once ABSPATH . 'zc-admin/includes/class-zc-screen.php';
require_once ABSPATH . 'zc-admin/includes/screen.php';

/** ZelocoreCMS Taxonomy Administration API */
require_once ABSPATH . 'zc-admin/includes/taxonomy.php';

/** ZelocoreCMS Template Administration API */
require_once ABSPATH . 'zc-admin/includes/template.php';

/** ZelocoreCMS List Table Administration API and base class */
require_once ABSPATH . 'zc-admin/includes/class-zc-list-table.php';
require_once ABSPATH . 'zc-admin/includes/class-zc-list-table-compat.php';
require_once ABSPATH . 'zc-admin/includes/list-table.php';

/** ZelocoreCMS Theme Administration API */
require_once ABSPATH . 'zc-admin/includes/theme.php';

/** ZelocoreCMS Privacy Functions */
require_once ABSPATH . 'zc-admin/includes/privacy-tools.php';

/** ZelocoreCMS Privacy List Table classes. */
// Previously in zc-admin/includes/user.php. Need to be loaded for backward compatibility.
require_once ABSPATH . 'zc-admin/includes/class-zc-privacy-requests-table.php';
require_once ABSPATH . 'zc-admin/includes/class-zc-privacy-data-export-requests-list-table.php';
require_once ABSPATH . 'zc-admin/includes/class-zc-privacy-data-removal-requests-list-table.php';

/** ZelocoreCMS User Administration API */
require_once ABSPATH . 'zc-admin/includes/user.php';

/** ZelocoreCMS Site Icon API */
require_once ABSPATH . 'zc-admin/includes/class-zc-site-icon.php';

/** ZelocoreCMS Update Administration API */
require_once ABSPATH . 'zc-admin/includes/update.php';

/** ZelocoreCMS Deprecated Administration API */
require_once ABSPATH . 'zc-admin/includes/deprecated.php';

/** ZelocoreCMS Multisite support API */
if ( is_multisite() ) {
	require_once ABSPATH . 'zc-admin/includes/ms-admin-filters.php';
	require_once ABSPATH . 'zc-admin/includes/ms.php';
	require_once ABSPATH . 'zc-admin/includes/ms-deprecated.php';
}
