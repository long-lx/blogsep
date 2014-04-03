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
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Oz&|!.x*urqIv.g)Y;];sC.qpxx0nIO^H:qoks6%f/PW`opN!zy@~ci]o;+T;(++');
define('SECURE_AUTH_KEY',  '^bZ8`fJ=l#bBi`J&*:2$SW@nXLjBC/S9_)]tDzEkm(8l=.ikz_dS @%vmXrNoNG4');
define('LOGGED_IN_KEY',    'a{(Z2V$$vv:BX|x3)EdYuEh+kD8a|H(S$3z#gbcjsIA]u!||M.m0yU5-Ia4a6{H~');
define('NONCE_KEY',        'FJ`;]:owI-F u9F+}CA!]D2DgA5/KvY)%WF-<vLu24-]Yb|H~;-4DmQ<ZqJUf8uB');
define('AUTH_SALT',        'Ai|!|by}f}tg`.oFj>Kz-B(0i@p7TwQ|cB0}W{w{JgNSb>P`|R*i7RRz(;@~A{J^');
define('SECURE_AUTH_SALT', 'p6rQeTK8&6w}S+=*:[X[v>~R%F>PG#uepykV0|+@-xx^g-k M*K-m&9kk=hWeS++');
define('LOGGED_IN_SALT',   ',lN<&d[J_%:|obe^@w?_4a^K^h+o,boE;^7!<&+9e|;4FJ+.~Bv~}Fw+YY!v~3yN');
define('NONCE_SALT',       'BT,+O;jP.-dAx!U;8fL$:SyfQ--vcD?3Zi88GF`l!}VgKFHq8y49&h~kp}o+t*6T');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
