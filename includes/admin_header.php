<?php

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

<title><?= e($pageTitle) ?> | <?= APP_SHORT_NAME ?></title>

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/variables.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/reset.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/layout.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/cards.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/forms.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/tables.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/alerts.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/utilities.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/dashboard.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/responsive.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="wrapper">

<header class="topbar">

    <div class="topbar-left">

        <img src="<?= BASE_URL ?>assets/images/county-logo.png"
             alt="County Logo"
             class="logo">

        <div class="system-name">

            <h3>COUNTY GOVERNMENT OF TAITA TAVETA</h3>

            <h1>THE MUNICIPALITY OF VOI</h1>

            <small>Municipal Management Information System (Voi-MMIS)</small>

        </div>

    </div>

    <div class="topbar-right">

        <span>

            <i class="fas fa-user-circle"></i>

            <?= e($_SESSION['full_name']); ?>

        </span>

        <img src="<?= BASE_URL ?>assets/images/municipality-logo.png"
             alt="Municipality Logo"
             class="logo">

    </div>

</header>

<div class="body-wrapper">