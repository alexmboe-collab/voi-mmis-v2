<?php
/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * (Voi-MMIS)
 * ==========================================================
 *
 * File        : admin_header.php
 * Description : Shared header for all administration pages.
 *
 * Developer   : Mboe Alex Mwashamba
 * Version     : 2.0.0
 * ==========================================================
 */

if (!defined('APP_NAME')) {
    exit('No direct script access allowed.');
}

$pageTitle = $pageTitle ?? 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= e($pageTitle); ?> | <?= APP_SHORT_NAME; ?></title>

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/admin.css?v=<?= time(); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="admin-wrapper">