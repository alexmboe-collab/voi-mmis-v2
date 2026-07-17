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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | <?= APP_NAME ?></title>
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="login-container">

<div class="login-card">

<div class="logo">

<img src="../assets/images/logo.png" alt="Municipality Logo">

<h2>Municipality of Voi</h2>

<p>Municipal Management Information System</p>

</div>

<?php if ($error): ?>

<div class="error"><?= e($error) ?></div>

<?php endif; ?>

<form method="POST">

<div class="form-group">

<label>Username</label>

<input type="text" name="username" required>

</div>

<div class="form-group">

<label>Password</label>

<input type="password" name="password" required>

</div>

<button type="submit">Login</button>

</form>

<div class="footer">

&copy; <?= date('Y') ?> Municipality of Voi

</div>

</div>

</div>

</body>
</html>