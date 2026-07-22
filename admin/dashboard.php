<?php

/**
 * ==========================================================
 * Dashboard
 * The Municipality of Voi Management Information System
 * Developer: Mboe Alex Mwashamba
 * ==========================================================
 */

require_once '../includes/bootstrap.php';

requireLogin();

$pageTitle = "Dashboard";

/*
|--------------------------------------------------------------------------
| Load Dashboard Models
|--------------------------------------------------------------------------
*/

require_once '../modules/dashboard/model.php';

$dashboard = new DashboardModel($pdo);

/*
|--------------------------------------------------------------------------
| Load User Models
|--------------------------------------------------------------------------
*/

require_once '../modules/users/model.php';

$userModel = new UserModel($pdo);

/*
|--------------------------------------------------------------------------
| Load Project Models
|--------------------------------------------------------------------------
*/

require_once '../modules/projects/model.php';

$projectModel = new ProjectModel($pdo);

/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
*/

require_once '../includes/admin_header.php';
require_once '../includes/admin_sidebar.php';

?>

<div class="content-wrapper">

    <?php require '../modules/dashboard/welcome.php'; ?>

    <?php require '../modules/dashboard/statistics.php'; ?>

    <?php require '../modules/dashboard/user_analytics.php'; ?>

    <?php require '../modules/dashboard/quick_actions.php'; ?>

    <?php require '../modules/dashboard/recent_users.php'; ?>

    <?php require '../modules/dashboard/system_info.php'; ?>

</div>

<?php require_once '../includes/admin_footer.php'; ?>