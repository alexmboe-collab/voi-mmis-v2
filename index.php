<?php

require_once 'config/config.php';
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/session.php';

if (!isset($_SESSION['visits'])) {

    $_SESSION['visits'] = 1;

} else {

    $_SESSION['visits']++;

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Session Test</title>

</head>

<body>

<h1><?= APP_NAME ?></h1>

<hr>

<h2>Session Working Successfully</h2>

<p>

Session Name:

<strong><?= session_name(); ?></strong>

</p>

<p>

Session ID:

<strong><?= session_id(); ?></strong>

</p>

<p>

Visits:

<strong><?= $_SESSION['visits']; ?></strong>

</p>

<p>

Current Time:

<strong><?= date('d M Y H:i:s'); ?></strong>

</p>

</body>

</html>