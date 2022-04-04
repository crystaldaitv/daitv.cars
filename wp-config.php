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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wptest' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/** The FS direct. */
define('FS_METHOD', 'direct');

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
define( 'AUTH_KEY',         'q4t[]kR!LBt;|5u@DA;kEX^RRU%XU?Zi%oQ,nmT`(DVKtD]gl~lhnIGrP$8Q70y_' );
define( 'SECURE_AUTH_KEY',  'XfG>m&/~nlIGoDxCwCE)%I8Hld`|A*aPIVDr LmuT~!B$I:n&ej[$tXmccXcb#&Y' );
define( 'LOGGED_IN_KEY',    'G<-!B9=~AoUrND[6^uv}OC(JBT^[(h_/Uodqy9Ob=!#F7wvu/vZvf;5V3D~N~jQy' );
define( 'NONCE_KEY',        '60awI8cCsLoK@iXNZD_p.yfDncEBkFL%C$FYV4;1r=AC9[!=!F`yC8!wt*I{_y6W' );
define( 'AUTH_SALT',        '50X6B9?CbQ]2ws9Mc#6i~=58~p?c4fyENQs-p]zO[6^)q!cY?3hp|M8[a_BqsPtF' );
define( 'SECURE_AUTH_SALT', '^ei-Qma [?u>c6v9# ,*:}%Uf48^]W5y:-,/^-=N;^zf<4}Yk>l2[!XrsIIv2xr/' );
define( 'LOGGED_IN_SALT',   '2dqhEufme+j!~3!J5w{_3iRwv$-3gy<i|0Z*Sa3s,4G3=m(Ct5Y?#Hx?Ape<a2om' );
define( 'NONCE_SALT',       '{@y{9#9gm4Hy^S86Ow/5b 8!P)G>AP.ZhXZw;IOt8D%CKAV!5=p+=dO;tC^f:-_>' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
