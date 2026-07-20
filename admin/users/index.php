<?php

require_once '../../includes/bootstrap.php';

requireLogin();

$pageTitle = "User Management";

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

$users = $userModel->getAll();

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';
?>

<h2>User Management</h2>

<p>Total Users:
<strong><?= $userModel->count(); ?></strong>
</p>

<table border="1" cellpadding="10" cellspacing="0">

<thead>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Username</th>
<th>Role</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php foreach ($users as $user): ?>

<tr>

<td><?= e($user['id']); ?></td>

<td><?= e($user['full_name']); ?></td>

<td><?= e($user['username']); ?></td>

<td><?= e($user['role']); ?></td>

<td><?= e($user['status']); ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<?php require_once '../../includes/admin_footer.php'; ?>