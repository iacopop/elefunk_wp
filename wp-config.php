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
define('DB_NAME', 'elefunk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'yEX`3O[=hV2[NHNdki>l!+Da/%8cWl.Ogv1u{jWZ2Lzy,GRm{@4e<I;|xD#Q+_Jo');
define('SECURE_AUTH_KEY',  'U+|v{`K+~aGxTS<s59dSKBeGa+VtD60SsH1V {ApjenyvcFag+a;V^vjQlwPigDc');
define('LOGGED_IN_KEY',    'kQ~j> 4/[B+A%3M.+NFRiDkSeM)l`1R+)!M0o^|k-:?3f5PCHBLr5A!,{iThBBI|');
define('NONCE_KEY',        '3Ppk+F+|w~rD7llJOtg q<Eim15Y5s+w}$g 5mQ[t>G!6TGCyLMr^[;%>olLP-vP');
define('AUTH_SALT',        'wGb*`)K:.-Y31{>k>dcas^v+T|L:{d-:fdV}kt+cX+)a!m{V)m1tG40KS1^[;EDc');
define('SECURE_AUTH_SALT', '`,u=iL!!$HwaAB(D#.r?%2[{8zS/{L92M`Zn;$k!XBfH4+CC@Y6.qNDX[ui[q#|u');
define('LOGGED_IN_SALT',   'Rzg<HJAq#O?!i$IhZzrb%S(a(!G`$8P,c]3p,e|t`+38+W4hPDsycr%s%XT$ZTN9');
define('NONCE_SALT',       '.2foRaZb-KUr^s|3ekl`N+`UulD-|$j.BlbQ-]amK::s;lJFw;]uZ|8)hSpQ;~0&');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');
define('WP_CACHE', true);
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
