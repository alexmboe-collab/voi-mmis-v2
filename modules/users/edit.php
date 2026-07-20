<?php

/**
 * ==========================================================
 * The Municipality of Voi Management Information System
 * User Management - Edit User
 *
 * Developer : Mboe Alex Mwashamba
 * Version   : 2.0.0
 * ==========================================================
 */

require_once '../../includes/bootstrap.php';

requireLogin();

$pageTitle = "Edit User";

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

/*
|--------------------------------------------------------------------------
| Load the User Being Edited
|--------------------------------------------------------------------------
*/

$id = (int) ($_GET['id'] ?? 0);

$user = $userModel->find($id);

if (!$user) {

    $_SESSION['error'] = "User not found.";

    redirect('index.php');
}

$errors = [];

$data = [
    'full_name' => $user['full_name'],
    'username' => $user['username'],
    'email' => $user['email'],
    'role' => $user['role'],
    'status' => $user['status']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['full_name'] = trim($_POST['full_name'] ?? '');
    $data['username'] = trim($_POST['username'] ?? '');
    $data['email'] = trim($_POST['email'] ?? '');
    $data['role'] = trim($_POST['role'] ?? '');
    $data['status'] = trim($_POST['status'] ?? '');

    /*
    ==========================================================
    Validation
    ==========================================================
    */

    if (empty($data['full_name'])) {
        $errors[] = "Full name is required.";
    }

    if (empty($data['username'])) {
        $errors[] = "Username is required.";
    } elseif ($userModel->usernameExists($data['username'], $id)) {
        $errors[] = "Username already exists.";
    }

    if (!empty($data['email'])) {

        // Check email format
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

            $errors[] = "Please enter a valid email address.";

        }
        // Check whether email already exists (excluding this user)
        elseif ($userModel->emailExists($data['email'], $id)) {

            $errors[] = "This email address is already registered.";

        }

    }

    if (empty($data['role'])) {
        $errors[] = "Role is required.";
    }

    /*
    ==========================================================
    Save
    ==========================================================
    */

    if (empty($errors)) {

        if ($userModel->update($id, $data)) {

            $_SESSION['success'] =
                "User updated successfully.";

            redirect('index.php');
        }
    }
}

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>Edit User</h2>

    <a href="index.php" class="btn">

        <i class="fas fa-arrow-left"></i>

        Back

    </a>

</div>

<?php if (!empty($errors)): ?>

<div class="alert alert-danger">

    <ul>

    <?php foreach ($errors as $error): ?>

        <li><?= e($error) ?></li>

    <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<div class="card">

<form method="POST">

<div class="form-grid">

    <div class="form-group">

        <label>Full Name *</label>

        <input type="text"
               name="full_name"
               value="<?= e($data['full_name']) ?>"
               required>

    </div>

    <div class="form-group">

        <label>Username *</label>

        <input type="text"
               name="username"
               value="<?= e($data['username']) ?>"
               required>

    </div>

    <div class="form-group">

        <label>Email</label>

        <input type="email"
               name="email"
               value="<?= e($data['email']) ?>">

    </div>

    <div class="form-group">

        <label>Role *</label>

        <select name="role" required>

            <option value="">Select Role</option>

            <option value="ICT_ADMIN" <?= $data['role'] == 'ICT_ADMIN' ? 'selected' : '' ?>>
                ICT Administrator
            </option>

            <option value="MUNICIPAL_MANAGER" <?= $data['role'] == 'MUNICIPAL_MANAGER' ? 'selected' : '' ?>>
                Municipal Manager
            </option>

            <option value="DIRECTOR" <?= $data['role'] == 'DIRECTOR' ? 'selected' : '' ?>>
                Director
            </option>

            <option value="CUSTOMER_CARE" <?= $data['role'] == 'CUSTOMER_CARE' ? 'selected' : '' ?>>
                Customer Care
            </option>

            <option value="REVENUE" <?= $data['role'] == 'REVENUE' ? 'selected' : '' ?>>
                Revenue
            </option>

            <option value="PUBLIC" <?= $data['role'] == 'PUBLIC' ? 'selected' : '' ?>>
                Public User
            </option>

        </select>

    </div>

    <div class="form-group">

        <label>Status</label>

        <select name="status">

            <option value="ACTIVE" <?= $data['status'] == 'ACTIVE' ? 'selected' : '' ?>>
                Active
            </option>

            <option value="INACTIVE" <?= $data['status'] == 'INACTIVE' ? 'selected' : '' ?>>
                Inactive
            </option>

        </select>

    </div>

</div>

<br>

<button class="btn btn-success">

    <i class="fas fa-save"></i>

    Save Changes

</button>

</form>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>