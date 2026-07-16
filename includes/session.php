<?php
/**
 * ==========================================================
 * The Municipality of Voi Management Information System (Voi-MMIS)
 * Secure Session Management
 * ==========================================================
 */

if (!defined('APP_NAME')) {
    die('Direct access is not permitted.');
}

/*
|--------------------------------------------------------------------------
| Session Configuration
|--------------------------------------------------------------------------
*/

session_name(SESSION_NAME);

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false,      // Change to true when using HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
|--------------------------------------------------------------------------
| Regenerate Session ID
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['created'])) {

    session_regenerate_id(true);

    $_SESSION['created'] = time();

}