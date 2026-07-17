<?php

require_once '../config/config.php';
require_once '../includes/session.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}
exit;