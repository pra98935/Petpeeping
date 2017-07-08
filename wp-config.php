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
define('DB_NAME', 'pet');

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
define('AUTH_KEY',         '&y/995%WWB;TZd*)*3s-8s(4p<E>`6nm7;gCgZ_l*Ec(vG)|SxV!}G8n|*:+)dyA');
define('SECURE_AUTH_KEY',  '5ZS#HdlsugK[GgDW_*g$p0O&BE,,QF 6J0;@t5hq5ls#pnTS<y2E@b1sB#Pn0x1L');
define('LOGGED_IN_KEY',    'S?c2|~g;u8$!kOTH6W.BG/]HuEzRf?mSE>;IiQ{mDpy(?VpV|5Z#Fc`aM/?#BAr!');
define('NONCE_KEY',        'My;|mo[d{1/YO*Mp3HxwfbFn)La{Z$TH-WN=T@D1(VD-D2,;Hxd4KQ5)UBm^ld0i');
define('AUTH_SALT',        '!@eDj>5 &G&d.{&y%`??_V;K_~xslo~U0EV]lgy3`yz/fb;4du4V j,36[S;6 4Y');
define('SECURE_AUTH_SALT', '_=!}gl0Ms+fC}BO|4Ub5nr5Vy|l$Wj$Wa;$$8++qD 2, oCnAIWrd;f%<= k#KNT');
define('LOGGED_IN_SALT',   '>yH.Rp_A?8F!dmQ[ZJ%O+ ]= n_Kh :%/$.<zQ# >zVAL.ZPAKq92j-2D5}LY>[O');
define('NONCE_SALT',       'uL_oRWQxin,Ro[vC=a4yOr`nM[j+tT!=.yST^Z50:h8TY|fOYV-k_6FOjha:[nQD');

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
