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
href="<?= BASE_URL ?>assets/css/admin.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/components.css?v=<?= APP_VERSION ?>">

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

    <div class="logo-section">

        <img src="<?= BASE_URL ?>assets/images/county-logo.png">

    </div>

    <div class="system-title">

        <h2>COUNTY GOVERNMENT OF TAITA TAVETA</h2>

        <h1>THE MUNICIPALITY OF VOI</h1>

        <p>Municipal Management Information System (Voi-MMIS)</p>

    </div>

    <div class="user-section">

        <img src="<?= BASE_URL ?>assets/images/municipality-logo.png">

    </div>

</header>

<div class="body-wrapper">