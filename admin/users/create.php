<?php

require_once '../../includes/bootstrap.php';

requireLogin();

requireRole(['ICT_ADMIN']);

$pageTitle = "Add User";

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

$errors = [];

$data = [
    'full_name' => '',
    'username' => '',
    'email' => '',
    'role' => '',
    'status' => 'ACTIVE'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['full_name'] = trim($_POST['full_name'] ?? '');
    $data['username'] = trim($_POST['username'] ?? '');
    $data['email'] = trim($_POST['email'] ?? '');
    $data['role'] = trim($_POST['role'] ?? '');
    $data['status'] = trim($_POST['status'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

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
    }

    if ($userModel->usernameExists($data['username'])) {
        $errors[] = "Username already exists.";
    }

    if (!empty($data['email'])) {

    // Check email format
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Please enter a valid email address.";

    }
    // Check whether email already exists
    elseif ($userModel->emailExists($data['email'])) {

        $errors[] = "This email address is already registered.";

    }

    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
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

        $data['password'] = $password;

        if ($userModel->create($data)) {

            $_SESSION['success'] =
                "User created successfully.";

            redirect('index.php');
        }
    }
}

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>Add New User</h2>

    <a href="index.php" class="btn">

        <i class="fas fa-arrow-left"></i>

        Back

    </a>

</div>

<?php if(!empty($errors)): ?>

<div class="alert alert-danger">

    <ul>

    <?php foreach($errors as $error): ?>

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

        <label>Password *</label>

        <input type="password"
               name="password"
               required>

    </div>

    <div class="form-group">

        <label>Confirm Password *</label>

        <input type="password"
               name="confirm_password"
               required>

    </div>

    <div class="form-group">

        <label>Role *</label>

        <select name="role" required>

            <option value="">Select Role</option>

            <option value="ICT_ADMIN">ICT Administrator</option>

            <option value="MUNICIPAL_MANAGER">
                Municipal Manager
            </option>

            <option value="DIRECTOR">Director</option>

            <option value="CUSTOMER_CARE">
                Customer Care
            </option>

            <option value="REVENUE">Revenue</option>

            <option value="PUBLIC">Public User</option>

        </select>

    </div>

    <div class="form-group">

        <label>Status</label>

        <select name="status">

            <option value="ACTIVE">Active</option>

            <option value="INACTIVE">Inactive</option>

        </select>

    </div>

</div>

<br>

<button class="btn btn-success">

    <i class="fas fa-save"></i>

    Save User

</button>

</form>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>