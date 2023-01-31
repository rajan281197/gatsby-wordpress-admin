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
define( 'DB_NAME', 'gatsby-wordpress-admin' );

/** Database username */
define( 'DB_USER', 'root' );

define('FS_METHOD', 'direct');


/** Database password */
define( 'DB_PASSWORD', 'Creole@123' );

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
define( 'AUTH_KEY',         'snIgo;x+N$yX){a}Lq:cG7I@8=Ja/mwM(H_3[Gz;kKm1|0.M]IYVA;i4XQ)i-Mt&' );
define( 'SECURE_AUTH_KEY',  '7SEV;p&6RaXvi_-W8VB/p4GAqTs&eqRE/t2Kopn&=yLv:%Ey?9OxPw!pn84*&ylh' );
define( 'LOGGED_IN_KEY',    '1Qe4@Izy2CgnGl*u]~MYH~IZ#JA}3sx2t7-d0,lXKg?qt<3<)jU_+M]Z3)ZP :$>' );
define( 'NONCE_KEY',        '8]M]X@sz$Bs hjdWG:F-GYy21!c]*YV42gyc09w_C3cU-@y9L;,9X?DE%_80PiSQ' );
define( 'AUTH_SALT',        '=BWNTZdx4;n5r0m#d>*2 Q@#4!b>0GZvjVm%c_uvb.P06YwvFU Kr8BakVhi=(rJ' );
define( 'SECURE_AUTH_SALT', 'a~ta$jLIdpMm8rLeG@9wOZuGnL!UqdBu2dP0Q6p[@e^:y%>:4r=c,,?5p@7w8ULP' );
define( 'LOGGED_IN_SALT',   'i3roM#Bp,*,AmWbFKhPmF1H-**DmF?V)sEM9f4I6]u>EC}^?~s09uyXMD&feag5e' );
define( 'NONCE_SALT',       '.:<bY3b9an!o{1;=?-(6AHLk|K{_2TQMA{ehYO_[,ovi5EC>wk<0?yMO.*EKKqh<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gb_';

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


define("WP_DEBUG", false);
define("WP_DEBUG_LOG", false);
define("GRAPHQL_DEBUG", true);



/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
