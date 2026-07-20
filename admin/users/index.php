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

<div class="page-title">

<h2>User Management</h2>

<a href="create.php" class="btn btn-success">

<i class="fas fa-user-plus"></i>

Add User

</a>

</div>

<div class="card">

<p>

<strong>Total Users:</strong>

<?= $userModel->count(); ?>

</p>

</div>

<div class="card">

<table class="table">

<thead>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Username</th>

<th>Role</th>

<th>Status</th>

<th>Actions</th>

</tr>

</thead>

<tbody>

<?php foreach($users as $user): ?>

<tr>

<td><?= e($user['id']) ?></td>

<td><?= e($user['full_name']) ?></td>

<td><?= e($user['username']) ?></td>

<td><?= e($user['role']) ?></td>

<td>

<?php if($user['status']=="ACTIVE"): ?>

<span class="badge badge-success">

ACTIVE

</span>

<?php else: ?>

<span class="badge badge-danger">

INACTIVE

</span>

<?php endif; ?>

</td>

<td>

<a href="view.php?id=<?= $user['id'] ?>" class="btn">

View

</a>

<a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning">

Edit

</a>

<a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">

Delete

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>