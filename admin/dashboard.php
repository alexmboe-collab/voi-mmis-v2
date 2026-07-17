<?php

require_once '../config/config.php';
require_once '../config/database.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

requireLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard | <?= APP_NAME ?></title>
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div style="padding:40px;">

<h1>Welcome to <?= APP_NAME ?></h1>

<hr><br>

<h2>Hello, <?= e($_SESSION['full_name']) ?></h2>

<p><strong>Username:</strong> <?= e($_SESSION['username']) ?></p>

<p><strong>Role:</strong> <?= e($_SESSION['role']) ?></p>

<p><strong>Login Time:</strong> <?= date('d M Y H:i', $_SESSION['login_time']) ?></p>

<br>

<a href="logout.php">Logout</a>

</div>

</body>
</html>