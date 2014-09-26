<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


switch ($_SERVER['SERVER_ADDR'])
{
    //Ambiente Local
    case '127.0.0.1':
		define('DB_NAME', '3burger');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');
		break;
	case '192.168.0.107':
		define('DB_NAME', '3burger');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');
		break;
	case '192.168.0.104':
		define('DB_NAME', '3burger');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');
		break;
	default:
		define('DB_NAME', '3burger');
		define('DB_USER', '3burger');
		define('DB_PASSWORD', 'i37fhhef36');
		define('DB_HOST', 'localhost');
		break;
}




/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'sz@yoZ*|c^D%qN?HHHLR!QE)G/qdB2j+[hhLh6#E#s%zQ6k;/1g.|6z.D;is{onQ');
define('SECURE_AUTH_KEY',  'oA;|P.vuS6mexba 3l0TSDuK+ O#X9yF:=%x;<7iD2UzCwH-p-`No8:w.H,I ~uE');
define('LOGGED_IN_KEY',    'JeBj%dIvlN8-%F{DI$zGCek@;w.f6sFqI0b_mj(3~G9gmDwKE4B+!dL!A%WgFl I');
define('NONCE_KEY',        '_U2s(0Q e6Y2Ty9Ci|hht7|h1?(0`P;AVCeAg-<Q_Mu_g?HqRbuR.sK|~Y0kKR<h');
define('AUTH_SALT',        '[O:[ E-R2*fQ}/.$lVOS9(,+9O!sZDnv+cYVby*<;6b6v>92yFTO+];Rxdp6Ke)0');
define('SECURE_AUTH_SALT', 'us!16o*lL-YJL*J e>B>~>Vlw/h=V:)wt-pOAVHWgExt6v+%BF|aou02k$A--rZ{');
define('LOGGED_IN_SALT',   'l)cVrvQ)f@dCpt `.Kcpv&yBpIXCd6Zn6^Ot(~das;4(pne08Ke&oRTk(ka+3::1');
define('NONCE_SALT',       'KgED&M52+6uc3GZE_$%B4bkQRc:&&.3|DIQ~7sb~*(fOlJwIwP:|R>$|<|Z)+-u>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
