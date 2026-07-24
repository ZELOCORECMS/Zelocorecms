<?php
/**
 * The base configuration for ZelocoreCMS
 *
 * The zc-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "zc-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.zelocorecms.org/advanced-administration/zelocorecms/zc-config/
 *
 * @package ZelocoreCMS
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for ZelocoreCMS */
define( 'DB_NAME', 'zelocorecms' );

/** Database username */
define( 'DB_USER', 'zelocore' );

/** Database password */
define( 'DB_PASSWORD', 'Zelocore@12345' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.zelocorecms.org/secret-key/1.1/salt/ ZelocoreCMS.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q|g2MJ:I1o$:m+w(K94-I^nM?iak>$=D$__}&o-Y0kSH:pO*[R|ZXOl)C_O|GA1}' );
define( 'SECURE_AUTH_KEY',  'j[j]7r.JS3VwZ$!g]~ 7iY7EHJ!}T_fc,EyGL.5g@tc;30o%|u(zXd7.3hF5?GN)' );
define( 'LOGGED_IN_KEY',    '+SdEP8ub(|;Qo(WCKm%my_/lhK7O4ZIe.F4$dn(39NY6wM;Wxgoe=0n6%,m/hiJN' );
define( 'NONCE_KEY',        'fYq^f6}%#6m,WH_)QuL#1Lh_1^IpXXR>TKN@^cbCo`|PoBsf&>/1Ca{YXYXa!;be' );
define( 'AUTH_SALT',        '-97*|.IR0,aB_ [T6Br~>y!i4!#K.bcNGqP/{,60({wh@W/SyaEXn1NQ4l$q%p^6' );
define( 'SECURE_AUTH_SALT', ')6/kB@C`Cc4I&YbgZ~)i2>+v+mDEq8{!FXOd;R^}*;D6$+rWI+%VO++>nd7!1gpQ' );
define( 'LOGGED_IN_SALT',   'D(0JD-Q`9VbY}ag@zjIt1@5prZ%Z>Es.9n})AH?y0Z1X`2Iwsp+k>ZshBVm:0b/3' );
define( 'NONCE_SALT',       'V3jsqJOHJ&x?3DGUv(0~]6RsblFsLCp(&1D6i<U6{}NPFi0:<9(O3~-HAwe~p4Cb' );

/**#@-*/

/**
 * ZelocoreCMS database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after ZelocoreCMS is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.zelocorecms.org/advanced-administration/zelocorecms/zc-config/#table-prefix
 */
$table_prefix = 'zc_';

/**
 * For developers: ZelocoreCMS debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use ZC_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.zelocorecms.org/advanced-administration/debug/debug-zelocorecms/
 */
define( 'ZC_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the ZelocoreCMS directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up ZelocoreCMS vars and included files. */
require_once ABSPATH . 'zc-settings.php';
