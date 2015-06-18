<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** // 
/** The name of the database for WordPress */
define('DB_NAME', 'try');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '3l[x]p?6<=Wm/9;f>Roho{Uvd8`L~+oolc-`w@zb}P2[hDZ&?^u^d#O+ow7Y.2Ls');
define('SECURE_AUTH_KEY',  ',%(` .-u%:mi=0#D/Zy2O(o[N+`p@_J/R&3Pg&$k-L@q9[i@L3s4(#D9)kAzw*32');
define('LOGGED_IN_KEY',    'c+E{(,V.[HGilXZIQMJB00^P-6aRBd3d-exE3d69S77(ot/.Q8?AGgC@DlgNeUGo');
define('NONCE_KEY',        '`JFqGaqISoHrTLjZ&2+/ycbbKtjxDu;vxWm$zBZt@y@T7Q,CdI#7`]hpib_b1FZV');
define('AUTH_SALT',        '_W[@_BOr1^x9lds:$P$n2|>Y|o(9wbd+G{e$=j?^k|^Jc541ku$6q,jO[i8SzQ<!');
define('SECURE_AUTH_SALT', '>FU0t}3b()b<aCvS]$&Ow+ :/BRU@j<hLUB E*g8K1={O:hmE7JU_f1{yO2&%=HI');
define('LOGGED_IN_SALT',   'eOI?J.P+m~5jd{}PQ.{?VSpv0tKqtP6gAX5~kL1U!D0[`,S-ZT`5K[vP$<}XH!bf');
define('NONCE_SALT',       'sU)#rUYCL+nGp|-:]@,Wiq@[@<f^ ~`X^57QEa68Lg1=F}O4Q`AF~|$BNHUAS&rB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'qwe_';

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
