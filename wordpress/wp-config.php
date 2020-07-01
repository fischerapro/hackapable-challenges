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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'GC+<M4UMqMaj>}Nf' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'acyb5G<1wo[+syB]av^$7fWlV<?0}<XBC@8g$nQ6g?duE,r`+|+ZY_}/^B7r,^t5');
define('SECURE_AUTH_KEY',  '+MJr!EM<@0{~|TFb;R<,*R2ZVz(HXRFj9;A%epOpL%x*6u&qG)mO,64<sxXUy?x(');
define('LOGGED_IN_KEY',    '!ZZ&~![VxBV*pR0kn88}<?9u3w[!=yys[eqFqvr g}zUA$9`JFoK}2D*}m*qM-a_');
define('NONCE_KEY',        'k^G^%(CGpB`oh#0{1d2myUwvNgl||)B&9(0t@Yxg2flia?:kG^]#|V!zE,2RG3(l');
define('AUTH_SALT',        'HIrY9>j[p4-KREV1l;M}yQMIrqW$Z|u#fDzF+ nTb+(/|!%BY$9;nKJCrYM-Pxkm');
define('SECURE_AUTH_SALT', 'Fx-c.y~EPR  d-<ZqEjCuG{uMu|F]|4)Ux54oWwpyd-Q<_Gq8Nu>U 7iT1+MF**3');
define('LOGGED_IN_SALT',   'z/$t.*xV6]dEEp r`|-NW{iy<)pjk-s?UHeE-L:7Lg 6Sbk}TP]fjjk5.fsQR |i');
define('NONCE_SALT',       'M*q0Db`m|m+$nB}~wL|7C/4MY0*v=p{~5qsTRQU?ctbX+1(:pm7}=+^b@yKrjSF=');

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD', 'direct');
