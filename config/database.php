<?php
/**
 * ==========================================================
 * Municipality of Voi Management Information System (Voi-MMIS)
 * Database Connection
 * ==========================================================
 */

require_once __DIR__ . '/config.php';

/*
|--------------------------------------------------------------------------
| DATABASE SETTINGS
|--------------------------------------------------------------------------
|
| Change these values if your database credentials change.
|
*/

define('DB_HOST', 'localhost');
define('DB_NAME', 'voi_mmis');
define('DB_USER', 'root');
define('DB_PASS', 'root');   // Default for MAMP. Change if yours is different.
define('DB_PORT', '8889');   // MySQL port from MAMP

/*
|--------------------------------------------------------------------------
| PDO CONNECTION
|--------------------------------------------------------------------------
*/

try {

    $dsn = "mysql:host=" . DB_HOST .
           ";port=" . DB_PORT .
           ";dbname=" . DB_NAME .
           ";charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {

    die("Database Connection Failed: " . $e->getMessage());

}