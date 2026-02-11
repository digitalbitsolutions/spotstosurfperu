<?php
/**
 * The base configuration for WordPress
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define( 'DB_NAME', 'NOMBRE_DE_TU_BD' );
define( 'DB_USER', 'USUARIO_DE_TU_BD' );
define( 'DB_PASSWORD', 'PASSWORD_DE_TU_BD' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 */
define( 'AUTH_KEY',         '7046a503b614f462a74bf48f40eb0ffdbe875943' );
define( 'SECURE_AUTH_KEY',  'c587863e482945e1b3d5bcb8707b5e6e9c390f38' );
define( 'LOGGED_IN_KEY',    '1139743ea3bae576598b82cf840afdc51f503d5c' );
define( 'NONCE_KEY',        'dbfa1b479bc6a9b2b94569cc31415f0d6c4dfcc9' );
define( 'AUTH_SALT',        'dc70148525725ed4164dfa3197e56a957f173819' );
define( 'SECURE_AUTH_SALT', '1942147b79f2fa25952718c2198285a36012ef3f' );
define( 'LOGGED_IN_SALT',   'a67b160f0bc3490ec3e5256f925bf9bec2f5096e' );
define( 'NONCE_SALT',       '3b1acaea5c9433f9d48006ca1961cbc6e83dfaef' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
	$_SERVER['HTTPS'] = 'on';
}

define( 'DISALLOW_FILE_EDIT', true );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
