<?php

require_once '../includes/bootstrap.php';

requireLogin();

require_once '../modules/users/model.php';

$userModel = new UserModel($pdo);

$pageTitle = "Dashboard";

require_once '../modules/dashboard/statistics.php';

$stats = dashboardStats($pdo);

require_once '../includes/admin_header.php';

require_once '../includes/admin_sidebar.php';

?>

<!-- ==========================================================
     Dashboard Content
========================================================== -->

<div class="content-wrapper">

    <!-- Page Header -->

  <div class="page-title">

    <div>

        <h2>Dashboard</h2>

        <p class="page-subtitle">

            Municipal Management Information System

        </p>

        <p>

            Welcome back,

            <strong><?= e($_SESSION['full_name']) ?></strong>

        </p>

    </div>

        <div>

            <span class="badge badge-success">

                <?= date('l, d F Y') ?>

            </span>

        </div>

    </div>

    <div class="dashboard-grid">

    <div class="dashboard-card card-users">

        <div>

            <h3>Total Users</h3>

            <h1><?= $userModel->count(); ?></h1>

        </div>

        <i class="fas fa-users dashboard-icon"></i>

    </div>

    <div class="dashboard-card card-projects">

        <div>

            <h3>Projects</h3>

            <h1>0</h1>

        </div>

        <i class="fas fa-road dashboard-icon"></i>

    </div>

    <div class="dashboard-card card-complaints">

        <div>

            <h3>Complaints</h3>

            <h1>0</h1>

        </div>

        <i class="fas fa-comments dashboard-icon"></i>

    </div>

    <div class="dashboard-card card-documents">

        <div>

            <h3>Documents</h3>

            <h1>0</h1>

        </div>

        <i class="fas fa-folder dashboard-icon"></i>

    </div>

</div>