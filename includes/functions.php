<?php
/**
 * ==========================================================
 * The Municipality of Voi Management Information System (Voi-MMIS)
 * Helper Functions
 * ==========================================================
 */

if (!defined('APP_NAME')) {
    die('Direct access is not permitted.');
}

/**
 * Redirect to another page
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

/**
 * Escape HTML output
 */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Remove unwanted characters from input
 */
function clean(string $value): string
{
    return trim(strip_tags($value));
}

/**
 * Format a MySQL datetime
 */
function formatDate(string $date): string
{
    return date('d M Y H:i', strtotime($date));
}

/**
 * Generate a secure random token
 */
function generateToken(int $length = 32): string
{
    return bin2hex(random_bytes($length));
}

/**
 * Generate a Complaint Tracking Number
 */
function generateTrackingNumber(string $prefix = 'CMP'): string
{
    return sprintf(
        '%s-%s-%04d',
        strtoupper($prefix),
        date('Ymd'),
        rand(1, 9999)
    );
}

/**
 * Display formatted file size
 */
function formatBytes(int $bytes): string
{
    if ($bytes >= 1073741824)
        return number_format($bytes / 1073741824, 2) . ' GB';

    if ($bytes >= 1048576)
        return number_format($bytes / 1048576, 2) . ' MB';

    if ($bytes >= 1024)
        return number_format($bytes / 1024, 2) . ' KB';

    return $bytes . ' Bytes';
}