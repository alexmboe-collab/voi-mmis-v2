<?php
/**
 * ==========================================================
 * The Municipality of Voi Management Information System (Voi-MMIS)
 * Global Configuration File
 * ==========================================================
 *
 * This file contains application-wide settings.
 * Every page should include this file.
 *
 * Developer : Mboe Alex Mwashamba
 * Version   : 2.0.0
 * ==========================================================
 */

// ----------------------------------------------------------
// APPLICATION INFORMATION
// ----------------------------------------------------------

define('APP_NAME', 'The Municipality of Voi Management Information System');

define('APP_SHORT_NAME', 'Voi-MMIS');

define('APP_VERSION', '2.0.0');

define('DEVELOPER', 'Mboe Alex Mwashamba');


// ----------------------------------------------------------
// MUNICIPALITY INFORMATION
// ----------------------------------------------------------

define('MUNICIPALITY_NAME', 'The Municipality of Voi');

define('COUNTY_NAME', 'County Government of Taita Taveta');


// ----------------------------------------------------------
// ENVIRONMENT
// ----------------------------------------------------------

define('ENVIRONMENT', 'development');

// development
// production


// ----------------------------------------------------------
// TIMEZONE
// ----------------------------------------------------------

date_default_timezone_set('Africa/Nairobi');


// ----------------------------------------------------------
// BASE URL
// ----------------------------------------------------------

define('BASE_URL', 'http://localhost/voi-mmis/');


// ----------------------------------------------------------
// DIRECTORY PATHS
// ----------------------------------------------------------

define('ROOT_PATH', dirname(__DIR__));

define('UPLOAD_PATH', ROOT_PATH . '/uploads/');

define('ASSETS_PATH', ROOT_PATH . '/assets/');


// ----------------------------------------------------------
// SESSION
// ----------------------------------------------------------

define('SESSION_NAME', 'VOI_MMIS_SESSION');


// ----------------------------------------------------------
// FILE UPLOAD SETTINGS
// ----------------------------------------------------------

define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024);

// 10MB


// ----------------------------------------------------------
// ERROR REPORTING
// ----------------------------------------------------------

if (ENVIRONMENT === 'development') {

    error_reporting(E_ALL);

    ini_set('display_errors', 1);

} else {

    error_reporting(0);

    ini_set('display_errors', 0);

}