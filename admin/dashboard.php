<?php

require_once '../includes/bootstrap.php';

requireLogin();

$pageTitle = "Dashboard";

require_once '../includes/admin_header.php';

require_once '../includes/admin_sidebar.php';

?>

<div class="page-header">

<h2>Dashboard</h2>

<p>Welcome back,
<strong><?= e($_SESSION['full_name']); ?></strong>

</p>

</div>

<div class="dashboard-grid">

<div class="dashboard-card">

<h3>Users</h3>

<h1>1</h1>

<p>Registered Users</p>

</div>

<div class="dashboard-card">

<h3>Projects</h3>

<h1>0</h1>

<p>Municipal Projects</p>

</div>

<div class="dashboard-card">

<h3>News</h3>

<h1>0</h1>

<p>Published News</p>

</div>

<div class="dashboard-card">

<h3>Complaints</h3>

<h1>0</h1>

<p>Citizen Complaints</p>

</div>

</div>

<div class="quick-actions">

<h3>Quick Actions</h3>

<a href="#" class="btn">Create Project</a>

<a href="#" class="btn">Publish News</a>

<a href="#" class="btn">Register User</a>

<a href="#" class="btn">Generate Report</a>

</div>

<?php

require_once '../includes/admin_footer.php';

?>