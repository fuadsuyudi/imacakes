<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'imacscom_imacakes');

/** MySQL database username */
define('DB_USER', 'imacscom');

/** MySQL database password */
define('DB_PASSWORD', 'ima54541');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'ts{wmC0n=%SNxF98~t4AKB`4p`s)#ll>W,3X|!o-#xZ;.<Uzq/6PS|>|b4[192Zr');
define('SECURE_AUTH_KEY',  '<w|<t,P|n(vbh;~zYv+44TTI+u3vG[l@;m[[4MZt~e2|`Y98},EUd=*oxeGOja8w');
define('LOGGED_IN_KEY',    'qcTe:1|K/?`[:UrC)*DG;M:>,Q4l4lw~]JC_>C2agz;m$j9!),3 zBDKnTd(9vA>');
define('NONCE_KEY',        ':FM4Inz<!,J.rF3&A$[8OKB2Y1=hrbY0+ksPD2y+8%Mb;n91i1i}A+-P2dq>||H;');
define('AUTH_SALT',        '[SC[K4/0kC-tKMrk$#v=]GoG9I2pN/v)MvDe`OS@DRA8:zR@lKub}37)BWQrS*(L');
define('SECURE_AUTH_SALT', 'jznc&TYl&+g|>3[`1|m~9_C]Ilk]wZW%Ep8RcU1h-4.,/+2++-9a@DZkec-r:Y|e');
define('LOGGED_IN_SALT',   'I%^~XDN[|xH%oZ yt?VKh=3hkn,l0Hn^:%aG3km6k_[:QM-NJsW[%tjNaM1#V=9h');
define('NONCE_SALT',       'wM`!&o?|Y /;$%V+zKY*|XTo)?H/h!U+;1j@NZ~fpz7i0kO%B*NsPv6dK1t)zUNr');

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