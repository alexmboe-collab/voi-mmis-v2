<?php

/**
 * ==========================================================
 * Role-Based Access Control (RBAC)
 * Municipality of Voi Management Information System
 *
 * Developer : Mboe Alex Mwashamba
 * ==========================================================
 */

/**
 * Check whether the logged-in user has one of the required roles.
 *
 * @param array $roles
 * @return bool
 */
function hasRole(array $roles): bool
{
    if (!isset($_SESSION['role'])) {
        return false;
    }

    return in_array($_SESSION['role'], $roles, true);
}

/**
 * Restrict page access to specific roles.
 *
 * @param array $roles
 * @return void
 */
function requireRole(array $roles): void
{
    if (!hasRole($roles)) {

        http_response_code(403);

        exit('Access denied. You do not have permission to view this page.');

    }
}