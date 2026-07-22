<?php

require_once '../../includes/bootstrap.php';

requireLogin();

requireRole(['ICT_ADMIN']);

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

$id = (int)($_GET['id'] ?? 0);

/*
==========================================================
Prevent deleting yourself
==========================================================
*/

if ($id === $_SESSION['user_id']) {

    die(
        "You cannot delete your own account."
    );

}

$user = $userModel->findOrFail($id);

/*
==========================================================
Delete User
==========================================================
*/

if ($userModel->delete($id)) {

    $_SESSION['success'] =
        "User deleted successfully.";

} else {

    $_SESSION['error'] =
        "Failed to delete user.";

}

redirect('index.php');