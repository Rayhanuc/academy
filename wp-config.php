<?php
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
define( 'DB_NAME', 'academy' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         'e#/:KkfS;z(#yJV^6ioIABv2)pRZ{q?}_z}a&u7>(Z]wx>/sc;!1VHM`T%ae^j#N' );
define( 'SECURE_AUTH_KEY',  'uys`jZUxU=>-#tlC}}J&*{kG~of;87>Byuo@Dzh9(y`DHrD^rN1SV+jQ2#W%KP1&' );
define( 'LOGGED_IN_KEY',    'IshQ0UhgK;XG(+4F62QEh+8NLio?B_Qj_-0von|3x6n7qn&{/xXPC*+A_V yhDQ(' );
define( 'NONCE_KEY',        '7p440lK>L7|~y7:|INLoP&5(]vXk6ugKW1aW$D}FzGxFCn /xfW[6}_JM:.h[vA(' );
define( 'AUTH_SALT',        '+J!V~fg~v`wGJ*C =_W6*2!7k|^74e!t0a)yu5yq)-Du`jx;j#j]f~U6l?45d2mH' );
define( 'SECURE_AUTH_SALT', 'ib!R$Ug%(5^S6F5,fi?37B1z]vn&l;LCuSC?h}~M<+Q1`S+qTZr>)8/OP.);P{v$' );
define( 'LOGGED_IN_SALT',   '{w4fZ4D0^1j}v q*^t}Atd(~m+,nfFHc^whN-|0Hm1je/N12_Nxc_c*-P(&nB?jf' );
define( 'NONCE_SALT',       'fm^z$:T9V}p3TVYy=+Bl&iv;5p&]7P>uB%1FV68psd/<k:}+~-nbLl[3)18_aqc~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ac_';

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
