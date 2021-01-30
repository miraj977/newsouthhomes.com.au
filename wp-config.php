<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nsh');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', 'root');
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
define('AUTH_KEY', '02j*]0@F!/ZR@fg@N4G{bA|&S0N#)WG@F(mJy=b#t0<BBa_:3|Y1u30$F,mwpS2x');
define('SECURE_AUTH_KEY', ',~zdRRe:|+}S:G2UbcUVhq{5%;I_?j.`;t2aD<9_m3S?CJg0vKw#53Ok=QwPs4>(');
define('LOGGED_IN_KEY', 'FXYG5*jDut`rs a3U+;_FF3Q9Gy/uH%D9OY_[<|hTL`D2#*`kpe$LOUq6wKqElC1');
define('NONCE_KEY', '1b#8y+dT8mLwet2)-m9*wJ7MqZ?XnfdE.usjt$G1lb::J#gr$e]p8^-H!mtwa<3&');
define('AUTH_SALT', 'D_Y~^KC&6/ FC;.|}t~`ld~66yq#W,i_ifYF+<>MrP3EmL g<f%QD(bab,E(D?}m');
define('SECURE_AUTH_SALT', '<*ufN$3[Zzu)P6&0r+7t$w8H1YTL29va7`e`h/d%s /qG|fj(Hv>hW(/D3i)K:y ');
define('LOGGED_IN_SALT', '*#?T&n9P}yThiH|Gu6~ZX/FVfH2K0}J?R%`;i1Lc it7RStn}<81t&{y~yyd;_DU');
define('NONCE_SALT', 'vMOZGiQvxJ 2AP<07X.>j(.>)>+R_M]t+%c!M}H)GYM%>PZ|?+~ALIEQ{LE^>*%)');
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
// define('SCRIPT_DEBUG', true);
// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);
//define('WP_MEMORY_LIMIT', '512M');
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';