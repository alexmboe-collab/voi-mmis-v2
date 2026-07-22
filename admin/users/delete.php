requireLogin();

$id = (int)($_GET['id'] ?? 0);

if ($id === $_SESSION['user_id']) {

    die("You cannot delete your own account.");
}

$userModel->delete($id);

$_SESSION['success'] =
"User deleted successfully.";

redirect('index.php');