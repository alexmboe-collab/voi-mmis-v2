<?php

require_once '../includes/bootstrap.php';

requireLogin();

$pageTitle = "Dashboard";

require_once '../includes/admin_header.php';

require_once '../includes/admin_sidebar.php';

?>

<h2>Dashboard</h2>

<p>Welcome back, <strong><?= e($_SESSION['full_name']) ?></strong>.</p>

<div class="card">

<h3>System Status</h3>

<p>Voi-MMIS Version <?= APP_VERSION ?></p>

<p>Logged in as <?= e($_SESSION['role']) ?></p>

</div>

<?php

require_once '../includes/admin_footer.php';