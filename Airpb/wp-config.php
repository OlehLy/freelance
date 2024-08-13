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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         '1rhSVIyagbsiNWiZ4SDFCCaXw3/lDiuNr5hkyPSDx8BF6sgK74t25iOxeRY8ra6pfCE5pND8e2gyqmJ9ZnrnOw==');
define('SECURE_AUTH_KEY',  'jbkFpl79oXtH7j5wlf1PLx0YQgRaKG90BFY1uggG1T3mZBC3Z5+5hx+EwJvsMHp0un4JZ7GceU9z4h5JAQIS5g==');
define('LOGGED_IN_KEY',    'uNY3IECHztW3ajZ4L3Ago+1335lWf1CqWyQVDO6X7nMfORKHYEgCk9Ez4cZlE1lQ0cD36yMZN2mXs+qawGECbQ==');
define('NONCE_KEY',        'NQ3eKDZEkhfiEd2mt6Gv0TG1jJxXva4YhRznQSmbNp4MLOsxJasxuXMivVMqXPijYliV1jjwRl8RQ77ZI0vk7Q==');
define('AUTH_SALT',        'J4Xp+tRKqgC3FOT5ULMY/Wz4PT22Go89hCgIHSrxE1tqv86MRLKJbBlOpdHmmKmLBegS+Fi/kEFJffjfVsHlnw==');
define('SECURE_AUTH_SALT', '7+AUzL5WhlaOtQqGlEHqP/+NOLmGGCe1rBo71WMqyfZaBJ3PhGDQNl1OKtdkArXTwYOhYRRRUJkD5r6AlCYIvQ==');
define('LOGGED_IN_SALT',   'sEEqRBA/0o1Ynr+NNdXoD0RZ50wH/zC311moR8G6VTPGSclx6lsmYOB0pZ388te8ZciuNiK7wvoILEUWrD+96A==');
define('NONCE_SALT',       'prsb1EkpakThKi9gwctGxu4EyGPzSAwogF55Q6dqfY2pXEtZ27yko9O6/GXxU2BcVe1xXopOG084KH4mjrR64w==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
