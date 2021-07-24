<?php
define('WP_AUTO_UPDATE_CORE', false);// This setting was defined by WordPress Toolkit to prevent WordPress auto-updates. Do not change it to avoid conflicts with the WordPress Toolkit auto-updates feature.
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
define('DB_NAME', 'admin_ascensia');

/** MySQL database username */
define('DB_USER', 'admin_ascensia');

/** MySQL database password */
define('DB_PASSWORD', 'ascensia123!@#');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY', '1pWXH2)7y+ygJ+hM15k4E~_8Gi)s(nWY(a;7f0_#I2i29HF1/vm[52W7;FG~[23E');
define('SECURE_AUTH_KEY', 'E8E6gGn%XSQ#/06ssW1l]P7~(5kP!M;6X9/52YX/6HE08(TlrU7)d5Ss!P(B~XU8');
define('LOGGED_IN_KEY', '#I7vZvsWa5b21QLDCpK3-A/e47n4-45Q5x~89&P83Gb@&7zRR7*m5%t4CB!2:*sa');
define('NONCE_KEY', '*_6fy94Dp17(Cke*97fw]ox[#O9Hb]u[D1tru0[4j3|X&6BfJ)L&lHbF~3lk[8(q');
define('AUTH_SALT', '(457|*|)jg47l5&6y8QG_vfaHRv)Zz83%_j+H+mo4T55]SSCU1UA52SNP8wn47|v');
define('SECURE_AUTH_SALT', 'h0)WtRzp~41MhCxvG-_)OQKM[%*20bWjhq!W@4_J0X+t8-6~wM]78082Vo104d5T');
define('LOGGED_IN_SALT', '!g7!7pF)-Mgz6xFA-0W+HNdx4Yj9PR%f10|6qQT&@0rzPZ8p&2h5ux2+0:JLB#n2');
define('NONCE_SALT', ';7iT2x/[L|cPK3%D8G]nDW@zEAJ16N4F_7(7R!3NlbI*F2_03X3h)/zNo*3(E%8:');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Z25yCf_';

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
define( 'WP_POST_REVISIONS', 10 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
