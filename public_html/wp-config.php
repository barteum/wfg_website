<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
define( 'WP_CACHE', true ) ;
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
define('WP_HOME', 'https://walkforgod.org');
define('WP_SITEURL', 'https://walkforgod.org');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'walkforg_wfg');

/** MySQL database username */
define('DB_USER', 'walkforg_wfg');

/** MySQL database password */
define('DB_PASSWORD', 'Alosvite12');

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
define('AUTH_KEY',         'z(2V1Z&+$-WZ@4x={Bvc6Ai-Lx3`K3>j 1<jfFm|.Mmt1WGKhXT B  kPJV%Ve6S');
define('SECURE_AUTH_KEY',  'S9eCv.(XaB+Cv.`2sY(_F.-:R=]1 eh?6:B6tCF^Ksir,5Gs8L,+y}=gwtq1aysZ');
define('LOGGED_IN_KEY',    '-0+ZD9L!~1>N`vpvs>2/#dWRg_+Y9pN#:?nnoKF^sJLfvMxbAl|DhrD~D=e)1vjh');
define('NONCE_KEY',        'Q:1V%Bvu;CU4.;+&u]>xv [YVKDIX6:{w-fB`4V^6D|Rv!>>] WHD~Sd Q^3KpaX');
define('AUTH_SALT',        'pF|R!qWFF-:SD1(GI4#Cyp[*tx0RgN2-7=`|-6oMUVHf`HA~QzUqi-=`m+J:x#8]');
define('SECURE_AUTH_SALT', 'L?=>la5O--*WUkU;-z+D)iUx%VA2t``sjh:29,Dm)g@ 9e8-~RNIXRc-CKgV.FIb');
define('LOGGED_IN_SALT',   '%<j;BRvF{-,*2L**{#.xW:2f]-gcG0=C%??1$si;r_yc+,-`vj|S3Y(=bR<optfv');
define('NONCE_SALT',       'XHYsyEyiawleo3sK6dI-=nLJH#/jIY~Yg<)^fo16%cry;*VVc;:ZA-+Uw|Qw_3V-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
