<?php

require_once '../includes/bootstrap.php';

requireLogin();

$pageTitle = "Dashboard";

require_once '../includes/admin_header.php';
require_once '../includes/admin_sidebar.php';

?>

<div class="content-wrapper">

    <?php require '../modules/dashboard/statistics.php'; ?>

    <?php require '../modules/dashboard/quick_actions.php'; ?>

    <?php require '../modules/dashboard/recent_users.php'; ?>

    <?php require '../modules/dashboard/system_info.php'; ?>

</div>

<?php require_once '../includes/admin_footer.php'; ?>