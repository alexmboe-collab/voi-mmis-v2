<?php

require_once
'../../includes/bootstrap.php';

requireLogin();

$pageTitle =
"Projects";

require_once
'../../modules/projects/model.php';

$projectModel =
new ProjectModel($pdo);

$projects =
$projectModel->getAll();

require_once
'../../includes/admin_header.php';

require_once
'../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>Projects</h2>

    <a href="create.php" class="btn btn-success">

        <i class="fas fa-plus"></i>

        Add Project

    </a>

</div>

<div class="card">

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Ward</th>
                    <th>Budget</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                <?php if (empty($projects)): ?>

                    <tr>

                        <td colspan="6">

                            No projects found.

                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($projects as $project): ?>

                        <tr>

                            <td>
                                <?= $project['id'] ?>
                            </td>

                            <td>
                                <?= e($project['project_name']) ?>
                            </td>

                            <td>
                                <?= e($project['ward']) ?>
                            </td>

                            <td>
                                KES <?= number_format(
                                    $project['budget']
                                ) ?>
                            </td>

                            <td>
                                <?= e($project['status']) ?>
                            </td>

                            <td>

                                <a href="view.php?id=<?= $project['id'] ?>"
                                   class="btn btn-sm">

                                    View

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php require_once
'../../includes/admin_footer.php'; ?>