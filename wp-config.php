<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dev2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'M:KWzymkG]G+Lb*3r]7I*cX]T]4_zc)18Qqm3x|,fvzGn:I?#FVTP|n`CIR<:2,G' );
define( 'SECURE_AUTH_KEY',  '+d3tTXrgSy;~gjh:_& Vt$z3 }?!XOtuHmO-1pdf~KR9L:^X)UtoCP3N8x]OEh/r' );
define( 'LOGGED_IN_KEY',    'f3TpF:U6&Q:&fo-2v@G{st$Q8PpG[N3f572mGZ(Nz/ZL)WfS0E&tx^rzG?[+R@/L' );
define( 'NONCE_KEY',        'I8a4w0$o?g0Zbk0=m,NgweTRGknwUH,_89+&l2->$$OA/;A=YD 5MOhubYs4XsAw' );
define( 'AUTH_SALT',        'A}-G3I_?yO7Fb<7g` 78of(@+T-Jaot0bqz: p,N({^stC{i !=Jm{oqfao7*]S&' );
define( 'SECURE_AUTH_SALT', '++q}wpjJEQ#8A>t0e/.W;U>iG`,Qv}ho QjPYVojbCIm##BOBVp4arji}$cNv5Aa' );
define( 'LOGGED_IN_SALT',   'J|_VBR.Jm,4[4>?c!S|j 3I>:ddU*wP?YFFsZ?271:1/eO>MfpNdNb!xh1bnY~[H' );
define( 'NONCE_SALT',       'G}a>n;?tO .`F&u!TnZ2VLU%gHc?vqUtN]9qYQ&/;6l]9.^Ef#Z9XmVqS$ B$&%l' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
