<?php

require_once '../../includes/bootstrap.php';

requireLogin();

$pageTitle = "View User";

require_once '../../modules/users/model.php';

$userModel = new UserModel($pdo);

$id = (int) ($_GET['id'] ?? 0);

$user = $userModel->findOrFail($id);

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';

?>

<div class="page-title">

    <h2>User Profile</h2>

    <a href="index.php" class="btn">

        <i class="fas fa-arrow-left"></i>

        Back
    </a>

</div>

<div class="card">

    <table class="table">

        <tr>
            <th width="250">Full Name</th>
            <td><?= e($user['full_name']) ?></td>
        </tr>

        <tr>
            <th>Username</th>
            <td><?= e($user['username']) ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?= e($user['email']) ?></td>
        </tr>

        <tr>
            <th>Role</th>
            <td><?= e($user['role']) ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td>

                <?php if ($user['status'] === 'ACTIVE'): ?>

                    <span class="badge badge-success">

                        ACTIVE

                    </span>

                <?php else: ?>

                    <span class="badge badge-danger">

                        INACTIVE

                    </span>

                <?php endif; ?>

            </td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>

                <?= date(
                    'd M Y H:i',
                    strtotime($user['created_at'])
                ) ?>

            </td>
        </tr>

    </table>

</div>

<br>

<div class="page-title">

    <div>

        <a href="edit.php?id=<?= $user['id'] ?>"
           class="btn btn-warning">

            <i class="fas fa-edit"></i>

            Edit User

        </a>

        <a href="reset_password.php?id=<?= $user['id'] ?>"
           class="btn btn-success">

            <i class="fas fa-key"></i>

            Reset Password

        </a>

    </div>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>