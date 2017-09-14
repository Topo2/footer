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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '26yJk9+w]D?hg}3XY_4lGD3zOKW~xzbgYQE#TD]5lTMcyG-u.HLuu$Pl2$lez&vz');
define('SECURE_AUTH_KEY',  '&aaZ~~`.s~M_G?5f8fgE77xR{Xgt+%U`XM!t=`)<551S]G]3$bHj(#Vc}&b4_*RM');
define('LOGGED_IN_KEY',    '--aFLmyx8d(-gxL`3p67UgxqONX5f0[3e.}x9Yba{r<mKgwwZBa _R*Ijy5_lx9~');
define('NONCE_KEY',        'RH0~aX.$fCvjs~H~>.rW*T52PQaN.V67]}HcTJxb{ Ce/V`LqDx8:n+tgG0a+SYT');
define('AUTH_SALT',        'qy{NGEvzp1i^A}Xx0Dt!oY[Gr?,OGc`/_>JbU202.$ChyI4%hMU:c*c-8hOfsk/X');
define('SECURE_AUTH_SALT', '`~xC>2(Fhz0Rz@*d[^RZxyuOgUAKZKy}aOY ,u),94EzGy`qnHC5$K1>c3Ws|W#H');
define('LOGGED_IN_SALT',   'JbR)P`~n]q~)7ERc%}M#s>(y>`3?Hxmn+#mWMXf0 )YIV#Y^n~*/kTsMh)@b`+_N');
define('NONCE_SALT',       'OMt(i58nKod,L_Fr~N/}*ANz}s,lM-{_/=Mo;v$:t$0,SA%KDLvIBYMD!2GvZW=M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
