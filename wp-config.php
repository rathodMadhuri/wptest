<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpnew1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{uxFyr#t_)Z-gmJm!iKFUxH~^({hOaL&=A9cWqLT?njSb5Hct@uMogW DoI( ap*' );
define( 'SECURE_AUTH_KEY',  '<a[&u4SIt|c(P1]9{VT`1RX=a!uP~0v7,NZa<SH6|K>~}-NhUNP{^H#syy_z-F5H' );
define( 'LOGGED_IN_KEY',    '(O|y#2G4hZLe}lL!^l5qbsZ`E[zratjd{IVJDP$X7]RlA&0</WB_K(}%thJERymZ' );
define( 'NONCE_KEY',        'aT.;Jbds*ubsoFx8?s8YQ3UOaT]4;aY?KFxfucB,g1GPgOXp|K{PbmCLnsBL3L/f' );
define( 'AUTH_SALT',        'her1!GFECBe}aZ+Nh&+~w#9Aq>;t ok_OSm=mXioI/{*naYEx^{rM6_`$J8Wt~LY' );
define( 'SECURE_AUTH_SALT', 'z^wlvJ}s[{>{k#7in}OO8-Ip##Q~aIg*7w8R0TujQU#qm7czTc;%2/#Y)fzy?tYk' );
define( 'LOGGED_IN_SALT',   'f}Z<;evM(9<<J~lAuTo%_TUvnAfL8%N89h8hb|c&$y-m~?_ZJ] ; z6N[gzxW<=~' );
define( 'NONCE_SALT',       ' %/Mp~Q:+<2ozlNgU 25pMkH6.a/1N^eL6QSig5b]:}d|!&7eeSH_<H>;)3,`C+s' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
