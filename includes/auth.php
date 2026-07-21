<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * Authentication & Authorization
 * ==========================================================
 *
 * Developer : Mboe Alex Mwashamba
 * Version   : 2.0.0
 * ==========================================================
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/session.php';

/**
 * ==========================================================
 * Check whether user is logged in
 * ==========================================================
 */
function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}

/**
 * ==========================================================
 * Require Login
 * ==========================================================
 */
function requireLogin(): void
{
    if (!isLoggedIn()) {

        header('Location: ' . BASE_URL . 'admin/login.php');
        exit;

    }
}

/**
 * ==========================================================
 * Check if current user has one of the required roles
 * ==========================================================
 */
function hasRole(array $roles): bool
{
    if (!isset($_SESSION['role'])) {
        return false;
    }

    return in_array($_SESSION['role'], $roles, true);
}

/**
 * ==========================================================
 * Require Role
 * ==========================================================
 */
function requireRole(array $roles): void
{
    requireLogin();

    if (!hasRole($roles)) {

        http_response_code(403);

        die('Access Denied');

    }
}

/**
 * ==========================================================
 * Logout User
 * ==========================================================
 */
function logout(): void
{
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {

        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );

    }

    session_destroy();
}