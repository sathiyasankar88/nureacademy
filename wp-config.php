<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'UmgsUntFU1ZNdWQmVzx4dipePiU6YXlBOiBUVj8jb1lhRTdldHZpbGY+am9IOWJkQXo5ZHJuQ29HSld+TCklLw==' );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nure-academy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Inf0tech$12#' );

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
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(i?piTTLpf&DpCrl!P7I;zqDx@Z`C]G;|6~?P3P-50o;F|Ds<wH`I9ykwr *^F5,' );
define( 'SECURE_AUTH_KEY',  '(M}H/P3y<)3{uuDe!Ocq*kNcz|SC#lG:~4&!9|$Fp4FD5Q?W9{9-k6Rq*T6Q*l`y' );
define( 'LOGGED_IN_KEY',    'L?HeefF~)j/9<*5.T}0NJkH${QsR79D(=Do2s3u~0dV>9ZH1P.E^yER~`em^9Eg#' );
define( 'NONCE_KEY',        'OA6tEi^>Q|,z=0`!rab66X[-OljOOE1jEBX@2XAhY@%j @@.Pswlj4I,vqjxcZ/%' );
define( 'AUTH_SALT',        'V.8=X60b>>6k`9m%g^.#jB=_r.:x )@O8[c%^w M`yPtjtM4f<dU)/@|3kpV251P' );
define( 'SECURE_AUTH_SALT', '7!%mC-R?*-yXRV68ICA0?_R=YVzHa E-9R=MrJKfM=3M@Y[W!q$gwX+OUZMj|9qF' );
define( 'LOGGED_IN_SALT',   ',sbJOTR bd]6K3+USIW5aj;*e)gr9Y,K%7(w<{Kzn!w ?zCI8z<t4!0|KhS5E2g2' );
define( 'NONCE_SALT',       ']pfBS=[EI2jnADuxcR d8@|97c%_mss|j>;BXuEg}_Q-5foj$y0t,D%9KvHv5Hcs' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
