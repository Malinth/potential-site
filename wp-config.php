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
define('DB_NAME', 'potentialsite_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'j>C^.z7kX//+)v2,*iq:L@[XOu2RZ+^Rly}L91MRN|-3tJt>n#W$6a`7$i`-Bf.r');
define('SECURE_AUTH_KEY',  'veyIJQtRZmDe?id|,deN|-mx+|{3u=:GVL.N-8`idng?uj/9]b]m#%jEltFY3LaQ');
define('LOGGED_IN_KEY',    'A1U+8Q5^c}p@!V?7:+9+*NEb&nL<fjmzfig+(~=BW0%X-&(BGs|VM+PB9;S!ELH ');
define('NONCE_KEY',        'T9jLAk^3 u>2+@*Oa+BBxKII+=WKl%FI<zW]ZQ188.>YLQHQ`+:^CJ1I#u[2a=i-');
define('AUTH_SALT',        'MFM!5lar&As29uKeDY!ak%K_+FLA,Al;$fQFY<(SJc9CT@eS@)>tR%MSMyJ-Bl=X');
define('SECURE_AUTH_SALT', 'o-<]f~3b/Kam,}3 3aqJ,>Q?C]8N0KPh*+8UR|R5zk-tzJ0W+8_w$:R]%V%B.Q@0');
define('LOGGED_IN_SALT',   '2=mf3;.m#KJ6UZu2gSje~O:f-`1]|>WK4B8&>rYB~|Tm]l^mMH~``!6ExCr2Zq:w');
define('NONCE_SALT',       '|pPb-EY[Qh7|IE12Sch+i<RY3TzxNxQOqvB(-]64(S|s7=x<V4Mk}@k|dp^9kv F');

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
// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings 
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
