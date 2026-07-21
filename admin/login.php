<?php

require_once '../config/config.php';
require_once '../config/database.php';
require_once '../includes/functions.php';
require_once '../includes/session.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = clean($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {

        $error = 'Please enter both username and password.';

    } else {

        $sql = "SELECT * FROM users
                WHERE username = :username
                AND status = 'ACTIVE'
                LIMIT 1";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':username' => $username
        ]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login_time'] = time();

            redirect('dashboard.php');

        } else {

            $error = 'Invalid username or password.';

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Login | <?= APP_NAME ?></title>

<!-- Google Fonts -->

<link rel="preconnect"
      href="https://fonts.googleapis.com">

<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<!-- Stylesheets -->

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/variables.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/reset.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/forms.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/alerts.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/login.css?v=<?= APP_VERSION ?>">

<link rel="stylesheet"
href="<?= BASE_URL ?>assets/css/responsive.css?v=<?= APP_VERSION ?>">

</head>

<body>

<div class="login-container">

    <!-- LEFT SIDE -->

    <div class="login-left">

        <img
            src="../assets/images/logo.png"
            alt="Municipality Logo">

        <h1>

            THE MUNICIPALITY OF VOI

        </h1>

        <p>

            Municipal Management Information System

        </p>

    </div>

    <!-- RIGHT SIDE -->

    <div class="login-right">

        <div class="login-card">

            <h2>Welcome Back</h2>

            <p>

                Sign in to continue to Voi-MMIS

            </p>

            <?php if ($error): ?>

                <div class="alert alert-danger">

                    <?= e($error) ?>

                </div>

            <?php endif; ?>

            <form method="POST">

                <div class="form-group">

                    <label class="form-label">

                        Username

                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        required>

                </div>

                <div class="form-group">

                    <label class="form-label">

                        Password

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100">

                    Login to Voi-MMIS

                </button>

            </form>

            <div class="mt-2 text-center">

                <small>

                    &copy; <?= date('Y') ?>

                    Municipality of Voi

                </small>

            </div>

        </div>

    </div>

</div>

</body>

</html>