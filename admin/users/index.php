<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * User Management
 *
 * File: admin/users/index.php
 * Developer: Mboe Alex Mwashamba
 * Version: 2.0.0
 * ==========================================================
 */

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

require_once '../../includes/bootstrap.php';

requireLogin();

/*
|--------------------------------------------------------------------------
| Page Information
|--------------------------------------------------------------------------
*/

$pageTitle = "User Management";

/*
|--------------------------------------------------------------------------
| Load User Model
|--------------------------------------------------------------------------
*/

require_once '../../modules/users/model.php';

/*
|--------------------------------------------------------------------------
| Initialize Model
|--------------------------------------------------------------------------
*/

$userModel = new UserModel($pdo);

/*
|--------------------------------------------------------------------------
| Search Filters
|--------------------------------------------------------------------------
*/

$search = trim($_GET['search'] ?? '');
$role = trim($_GET['role'] ?? '');
$status = trim($_GET['status'] ?? '');

/*
|--------------------------------------------------------------------------
| Retrieve Users
|--------------------------------------------------------------------------
*/

$users = $userModel->getAll($search, $role, $status);

/*
|--------------------------------------------------------------------------
| Load Layout
|--------------------------------------------------------------------------
*/

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';

?>

<!-- ===================================================== -->
<!-- PAGE TITLE -->
<!-- ===================================================== -->

<div class="page-title">

    <h2>User Management</h2>

    <a href="create.php" class="btn btn-success">

        <i class="fas fa-user-plus"></i>

        Add User

    </a>

</div>

<!-- ===================================================== -->
<!-- TOTAL USERS -->
<!-- ===================================================== -->

<div class="card">

    <p>

        <strong>Total Users:</strong>

        <?= $userModel->count(); ?>

    </p>

</div>

<!-- ===================================================== -->
<!-- SEARCH -->
<!-- ===================================================== -->

<div class="card">

<form method="GET">

<div class="search-grid">

<input
type="text"
name="search"
placeholder="Search name or username"
value="<?= e($search) ?>">

<select name="role">

<option value="">All Roles</option>

<option value="ADMIN" <?= $role=='ADMIN' ? 'selected' : '' ?>>
Administrator
</option>

<option value="ICT" <?= $role=='ICT' ? 'selected' : '' ?>>
ICT Officer
</option>

<option value="REVENUE" <?= $role=='REVENUE' ? 'selected' : '' ?>>
Revenue Officer
</option>

<option value="MANAGER" <?= $role=='MANAGER' ? 'selected' : '' ?>>
Municipal Manager
</option>

</select>

<select name="status">

<option value="">All Status</option>

<option value="ACTIVE" <?= $status=='ACTIVE' ? 'selected' : '' ?>>
Active
</option>

<option value="INACTIVE" <?= $status=='INACTIVE' ? 'selected' : '' ?>>
Inactive
</option>

</select>

<button type="submit" class="btn">

<i class="fas fa-search"></i>

Search

</button>

</div>

</form>

</div>

<!-- ===================================================== -->
<!-- USERS TABLE -->
<!-- ===================================================== -->

<div class="card">

<div class="table-responsive">

<table class="table">

<thead>

<tr>

<th>ID</th>

<th>Full Name</th>

<th>Username</th>

<th>Role</th>

<th>Status</th>

<th width="170">Actions</th>

</tr>

</thead>

<tbody>

<?php if (!empty($users)): ?>

<?php foreach ($users as $user): ?>

<tr>

<td><?= e($user['id']) ?></td>

<td><?= e($user['full_name']) ?></td>

<td><?= e($user['username']) ?></td>

<td><?= e($user['role']) ?></td>

<td>

<?php
$statusClass = ($user['status'] === 'ACTIVE')
    ? 'badge-success'
    : 'badge-danger';
?>

<span class="badge <?= $statusClass; ?>">

<?= e($user['status']); ?>

</span>

</td>

<td>

<a
href="view.php?id=<?= $user['id'] ?>"
class="btn"
title="View">

<i class="fas fa-eye"></i>

</a>

<a
href="edit.php?id=<?= $user['id'] ?>"
class="btn btn-warning"
title="Edit">

<i class="fas fa-edit"></i>

</a>

<a
href="delete.php?id=<?= $user['id'] ?>"
class="btn btn-danger"
title="Delete"
onclick="return confirm('Are you sure you want to delete this user?');">

<i class="fas fa-trash"></i>

</a>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="6" style="text-align:center; padding:30px;">

No users found.

</td>

</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>