<?php

require_once '../../includes/bootstrap.php';

requireLogin();

requireRole(['ICT_ADMIN']);

$pageTitle = "Reset Password";

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

$id = (int)($_GET['id'] ?? 0);

$user = $userModel->findOrFail($id);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = $_POST['password'] ?? '';

    $confirmPassword =
        $_POST['confirm_password'] ?? '';

    if (empty($password)) {

        $errors[] =
            "Password is required.";

    }

    if (strlen($password) < 6) {

        $errors[] =
            "Password must be at least 6 characters.";

    }

    if ($password !== $confirmPassword) {

        $errors[] =
            "Passwords do not match.";

    }

    if (empty($errors)) {

        if (
        $userModel->resetPassword(
         $id,
         $password
        )
    ) {

        $_SESSION['success'] =
         "Password reset successfully.";

        redirect('index.php');

    } else {

     $errors[] =
            "Failed to reset password.";

    }
        
    }

}

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>Reset Password</h2>

    <a href="index.php" class="btn">

        <i class="fas fa-arrow-left"></i>

        Back

    </a>

</div>

<div class="card">

    <p>

        Reset password for:

        <strong>

            <?= e($user['full_name']) ?>

        </strong>

    </p>

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

    <div class="form-group">

        <label>New Password</label>

        <input
            type="password"
            name="password"
            required>

    </div>

    <div class="form-group">

        <label>Confirm Password</label>

        <input
            type="password"
            name="confirm_password"
            required>

    </div>

    <button
        class="btn btn-success">

        <i class="fas fa-key"></i>

        Reset Password

    </button>

</form>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>