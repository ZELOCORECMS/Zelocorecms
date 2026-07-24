<?php
/**
 * Upgrade ZelocoreCMS Page.
 *
 * @package ZelocoreCMS
 * @subpackage Administration
 */

/**
 * We are upgrading ZelocoreCMS.
 *
 * @since 1.5.1
 * @var bool
 */
define( 'ZC_INSTALLING', true );

/** Load ZelocoreCMS Bootstrap */
require dirname( __DIR__ ) . '/zc-load.php';

nocache_headers();

require_once ABSPATH . 'zc-admin/includes/upgrade.php';

delete_site_transient( 'update_core' );

$step = $_GET['step'] ?? 0;

// Do it. No output.
if ( 'upgrade_db' === $step ) {
	zc_upgrade();
	die( '0' );
}

/**
 * @global string   $zc_version              The ZelocoreCMS version string.
 * @global string   $required_php_version    The minimum required PHP version string.
 * @global string[] $required_php_extensions The names of required PHP extensions.
 * @global string   $required_mysql_version  The minimum required MySQL version string.
 * @global wpdb     $wpdb                    ZelocoreCMS database abstraction object.
 */
global $zc_version, $required_php_version, $required_php_extensions, $required_mysql_version, $wpdb;

$step = (int) $step;

$php_version   = PHP_VERSION;
$mysql_version = $wpdb->db_version();
$php_compat    = version_compare( $php_version, $required_php_version, '>=' );
if ( file_exists( ZC_CONTENT_DIR . '/db.php' ) && empty( $wpdb->is_mysql ) ) {
	$mysql_compat = true;
} else {
	$mysql_compat = version_compare( $mysql_version, $required_mysql_version, '>=' );
}

$missing_extensions = array();

if ( isset( $required_php_extensions ) && is_array( $required_php_extensions ) ) {
	foreach ( $required_php_extensions as $extension ) {
		if ( extension_loaded( $extension ) ) {
			continue;
		}

		$missing_extensions[] = sprintf(
			/* translators: 1: URL to ZelocoreCMS release notes, 2: ZelocoreCMS version number, 3: The PHP extension name needed. */
			__( 'You cannot upgrade because <a href="%1$s">ZelocoreCMS %2$s</a> requires the %3$s PHP extension.' ),
			$version_url,
			$zc_version,
			$extension
		);
	}
}

header( 'Content-Type: ' . get_option( 'html_type' ) . '; charset=' . get_option( 'blog_charset' ) );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php echo get_option( 'blog_charset' ); ?>" />
	<meta name="robots" content="noindex,nofollow" />
	<title><?php _e( 'ZelocoreCMS &rsaquo; Update' ); ?></title>
	<?php zc_admin_css( 'install', true ); ?>
</head>
<body class="zc-core-ui admin-color-modern">
<p id="logo"><?php _e( 'ZelocoreCMS' ); ?></p>

<?php if ( (int) get_option( 'db_version' ) === $zc_db_version || ! is_blog_installed() ) : ?>

<h1><?php _e( 'No Update Required' ); ?></h1>
<p><?php _e( 'Your ZelocoreCMS database is already up to date!' ); ?></p>
<p class="step"><a class="button button-large" href="<?php echo esc_url( get_option( 'home' ) ); ?>/"><?php _e( 'Continue' ); ?></a></p>

	<?php
elseif ( ! $php_compat || ! $mysql_compat ) :
	$version_url = sprintf(
		/* translators: %s: ZelocoreCMS version. */
		esc_url( __( 'https://zelocorecms.org/documentation/zelocorecms-version/version-%s/' ) ),
		sanitize_title( $zc_version )
	);

	$php_update_message = '</p><p>' . sprintf(
		/* translators: %s: URL to Update PHP page. */
		__( '<a href="%s">Learn more about updating PHP</a>.' ),
		esc_url( zc_get_update_php_url() )
	);

	$annotation = zc_get_update_php_annotation();

	if ( $annotation ) {
		$php_update_message .= '</p><p><em>' . $annotation . '</em>';
	}

	if ( ! $mysql_compat && ! $php_compat ) {
		$message = sprintf(
			/* translators: 1: URL to ZelocoreCMS release notes, 2: ZelocoreCMS version number, 3: Minimum required PHP version number, 4: Minimum required MySQL version number, 5: Current PHP version number, 6: Current MySQL version number. */
			__( 'You cannot update because <a href="%1$s">ZelocoreCMS %2$s</a> requires PHP version %3$s or higher and MySQL version %4$s or higher. You are running PHP version %5$s and MySQL version %6$s.' ),
			$version_url,
			$zc_version,
			$required_php_version,
			$required_mysql_version,
			$php_version,
			$mysql_version
		) . $php_update_message;
	} elseif ( ! $php_compat ) {
		$message = sprintf(
			/* translators: 1: URL to ZelocoreCMS release notes, 2: ZelocoreCMS version number, 3: Minimum required PHP version number, 4: Current PHP version number. */
			__( 'You cannot update because <a href="%1$s">ZelocoreCMS %2$s</a> requires PHP version %3$s or higher. You are running version %4$s.' ),
			$version_url,
			$zc_version,
			$required_php_version,
			$php_version
		) . $php_update_message;
	} elseif ( ! $mysql_compat ) {
		$message = sprintf(
			/* translators: 1: URL to ZelocoreCMS release notes, 2: ZelocoreCMS version number, 3: Minimum required MySQL version number, 4: Current MySQL version number. */
			__( 'You cannot update because <a href="%1$s">ZelocoreCMS %2$s</a> requires MySQL version %3$s or higher. You are running version %4$s.' ),
			$version_url,
			$zc_version,
			$required_mysql_version,
			$mysql_version
		);
	}

	echo '<p>' . $message . '</p>';
elseif ( count( $missing_extensions ) > 0 ) :
	echo '<p>' . implode( '</p><p>', $missing_extensions ) . '</p>';
else :
	switch ( $step ) :
		case 0:
			$goback = zc_get_referer();
			if ( $goback ) {
				$goback = sanitize_url( $goback );
				$goback = urlencode( $goback );
			}
			?>
	<h1><?php _e( 'Database Update Required' ); ?></h1>
<p><?php _e( 'ZelocoreCMS has been updated! Next and final step is to update your database to the newest version.' ); ?></p>
<p><?php _e( 'The database update process may take a little while, so please be patient.' ); ?></p>
<p class="step"><a class="button button-large button-primary" href="upgrade.php?step=1&amp;backto=<?php echo $goback; ?>"><?php _e( 'Update ZelocoreCMS Database' ); ?></a></p>
			<?php
			break;
		case 1:
			zc_upgrade();

			$backto = ! empty( $_GET['backto'] ) ? zc_unslash( urldecode( $_GET['backto'] ) ) : __get_option( 'home' ) . '/';
			$backto = esc_url( $backto );
			$backto = zc_validate_redirect( $backto, __get_option( 'home' ) . '/' );
			?>
	<h1><?php _e( 'Update Complete' ); ?></h1>
	<p><?php _e( 'Your ZelocoreCMS database has been successfully updated!' ); ?></p>
	<p class="step"><a class="button button-large" href="<?php echo $backto; ?>"><?php _e( 'Continue' ); ?></a></p>
			<?php
			break;
endswitch;
endif;
?>
</body>
</html>
