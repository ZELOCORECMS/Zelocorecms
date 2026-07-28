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

// Load .env file if it exists and values are not already set in the environment
if ( file_exists( __DIR__ . '/.env' ) ) {
    $lines = file( __DIR__ . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
    foreach ( $lines as $line ) {
        $line = trim( $line );
        if ( $line === '' || $line[0] === '#' ) {
            continue;
        }
        if ( strpos( $line, '=' ) !== false ) {
            list( $key, $value ) = explode( '=', $line, 2 );
            $key   = trim( $key );
            $value = trim( $value, " \t\n\r\0\x0B\"'" );
            if ( ! array_key_exists( $key, $_ENV ) && ! array_key_exists( $key, $_SERVER ) ) {
                putenv( "$key=$value" );
                $_ENV[ $key ]    = $value;
                $_SERVER[ $key ] = $value;
            }
        }
    }
}

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for ZelocoreCMS */
define( 'DB_NAME',     getenv( 'DB_DATABASE' ) );

/** Database username */
define( 'DB_USER',     getenv( 'DB_USERNAME' ) );

/** Database password */
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

/** Database hostname */
define( 'DB_HOST',     getenv( 'DB_HOST' ) );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET',  'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE',  '' );

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
define( 'AUTH_KEY',         getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY',  getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY',    getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY',        getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT',        getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT',   getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT',       getenv( 'NONCE_SALT' ) );

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
$table_prefix = getenv( 'DB_TABLE_PREFIX' ) ?: 'zc_';

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
define( 'ZC_DEBUG', filter_var( getenv( 'APP_DEBUG' ), FILTER_VALIDATE_BOOLEAN ) );

/* Add any custom values between this line and the "stop editing" line. */

define( 'APP_ENV', getenv( 'APP_ENV' ) );
define( 'APP_URL', getenv( 'APP_URL' ) );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the ZelocoreCMS directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up ZelocoreCMS vars and included files. */
require_once ABSPATH . 'zc-settings.php';
