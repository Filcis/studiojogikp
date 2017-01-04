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
define('DB_NAME', 'b3_19333615_a');

/** MySQL database username */
define('DB_USER', 'b3_19333615');

/** MySQL database password */
define('DB_PASSWORD', 'dupa12');

/** MySQL hostname */
define('DB_HOST', 'sql103.byethost3.com'	);

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
define('AUTH_KEY',         'mT]pdthtD.3<3jmxm6I6l5[9]9@s@sCO;92eqx_SHSHIUEu,y2<XjbjNz>@[Zcrgr');
define('SECURE_AUTH_KEY',  '||4[5Bo@s@s;D192i_w_SGSy<XIX.]6]6mQYNc}!A^yIQR!0|4|Jzozo85]5lalo9');
define('LOGGED_IN_KEY',    'X2{Am0B0gsv,zJUJ-KSKw_[8:8op+p9LAZ-#~OMAM$q$*;eTf>4kYk07I7jvnkZ[5');
define('NONCE_KEY',        'I7Modoo~!}!0gVth1D1e~w_wGS2Euiu+#WLWLMcQcQ^Auq{Qr!Gk|J[No7Y@z8Yz');
define('AUTH_SALT',        ':V-No}s0Rw0y3QuqQ*A6b+Ab+Ar}Qr}RNo}b^B^Ff^F1:Rs:Ss1wJk|Gkg|so+');
define('SECURE_AUTH_SALT', 'o~Cd_Tt2Tx2;TuHh_H#Lm]Xy73Uy3Yym{Lq{Pqm{7c@BcCc!Qv>Mn}N}_Ch_C9d~');
define('LOGGED_IN_SALT',   '84Y@z8Yz8K]Op:Op;]d!Cd~C_GX+6X$y3TyH#Lm<Lmi<3Yz3z7Y@Mnj<In>In@8h|');
define('NONCE_SALT',       '!CZRoG8SC0N|C0s|@VseW;L9W;#9+q#w[_9xp_eSpHPE$3{j^y{nbyi+tLiXuLEX2');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
